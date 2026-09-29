<?php

/**
 * Vertex AI Helper para CodeIgniter 4
 * Focado na chamada da API do Vertex AI (Gemini 1.5 Flash / Gemini 2.0)
 * para Triagem de Leads e geração de conteúdo.
 */

if (!function_exists('vertex_generate_content')) {
    /**
     * Envia um prompt para o Vertex AI (Gemini) e retorna a resposta de texto.
     * 
     * @param string $prompt A mensagem ou contexto a ser analisado pela IA.
     * @param string $model O modelo a ser utilizado (padrão: gemini-1.5-flash)
     * @return string|null A resposta da IA ou null em caso de falha.
     */
    function vertex_generate_content(string $prompt, string $model = 'gemini-1.5-flash-001')
    {
        // Puxa as variáveis do .env (ou define o default que vimos no Cérebro)
        $projectId = getenv('VERTEX_PROJECT_ID') ?: 'magnusmedia-146112';
        $location = getenv('VERTEX_LOCATION') ?: 'us-central1';
        
        // Em um ambiente Cloud Run, podemos pegar o token do metadata server.
        // Localmente, precisaremos definir a variável VERTEX_ACCESS_TOKEN.
        $accessToken = get_vertex_access_token();

        if (empty($accessToken)) {
            log_message('error', 'VertexHelper: Não foi possível obter o Access Token.');
            return null;
        }

        $endpoint = "https://{$location}-aiplatform.googleapis.com/v1/projects/{$projectId}/locations/{$location}/publishers/google/models/{$model}:generateContent";

        $payload = [
            "contents" => [
                [
                    "role" => "user",
                    "parts" => [
                        ["text" => $prompt]
                    ]
                ]
            ],
            "generationConfig" => [
                "temperature" => 0.2, // Temperatura baixa para respostas estruturadas (Triagem)
                "maxOutputTokens" => 1024,
            ]
        ];

        $ch = curl_init($endpoint);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $accessToken,
            'Content-Type: application/json; charset=utf-8'
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode >= 200 && $httpCode < 300) {
            $data = json_decode($response, true);
            if (isset($data['candidates'][0]['content']['parts'][0]['text'])) {
                return $data['candidates'][0]['content']['parts'][0]['text'];
            }
        }

        log_message('error', 'VertexHelper: Erro na API do Vertex AI. HTTP ' . $httpCode . ' - ' . $response);
        return null;
    }
}

if (!function_exists('get_vertex_access_token')) {
    /**
     * Obtém o token de acesso OAuth2.
     * Tenta primeiro a variável de ambiente (desenvolvimento local).
     * Caso contrário, consulta o Metadata Server do GCP (Cloud Run).
     */
    function get_vertex_access_token()
    {
        $localToken = getenv('VERTEX_ACCESS_TOKEN');
        if (!empty($localToken)) {
            return $localToken;
        }

        // Tenta obter do Metadata Server (quando rodando dentro do Cloud Run)
        $metadataUrl = 'http://metadata.google.internal/computeMetadata/v1/instance/service-accounts/default/token';
        
        $ch = curl_init($metadataUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 2); // Timeout super curto para não travar localmente
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Metadata-Flavor: Google'
        ]);
        $response = curl_exec($ch);
        curl_close($ch);

        if ($response) {
            $data = json_decode($response, true);
            return $data['access_token'] ?? null;
        }

        return null;
    }
}

if (!function_exists('triagem_lead_inteligente')) {
    /**
     * Função pronta para ser usada no Contact.php.
     * Recebe os dados do formulário e retorna uma análise executiva estruturada.
     */
    function triagem_lead_inteligente($nome, $email, $mensagem)
    {
        $prompt = "Você é um assistente executivo de triagem de leads da Magnus Media.\n"
                . "Analise a mensagem recebida pelo site e classifique o lead.\n\n"
                . "DADOS DO LEAD:\n"
                . "Nome: {$nome}\n"
                . "E-mail: {$email}\n"
                . "Mensagem: {$mensagem}\n\n"
                . "Retorne APENAS um resumo executivo com os seguintes tópicos:\n"
                . "1. Grau de Interesse (Quente, Morno, Frio ou Spam)\n"
                . "2. Intenção do Contato (Ex: Orçamento, Dúvida, Parceria)\n"
                . "3. Sugestão rápida de resposta.";

        return vertex_generate_content($prompt);
    }
}
