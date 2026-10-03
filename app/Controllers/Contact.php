<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use Config\Services;

class Contact extends ResourceController
{
    public function send()
    {
        $clientIp = $this->request->getIPAddress();
        $fakeSuccessResponse = ['status' => 'success', 'message' => 'Mensagem recebida com sucesso! Entraremos em contato em breve.'];

        // 1. Coleta de dados via JSON ou POST tradicional
        try {
            $json = $this->request->getJSON();
        } catch (\Throwable $e) {
            $json = null;
        }
        
        $honeypot = trim((string)($json->b_hp ?? $this->request->getPost('b_hp') ?? $this->request->getPost('website_trap_field') ?? ''));
        $formTime = (int) ($json->form_time ?? $this->request->getPost('form_time') ?? 0);
        $name     = trim((string)($json->name ?? $this->request->getPost('name') ?? ''));
        $phone    = trim((string)($json->phone ?? $json->telefone ?? $this->request->getPost('phone') ?? $this->request->getPost('telefone') ?? ''));
        $email    = trim((string)($json->email ?? $this->request->getPost('email') ?? ''));
        $message  = trim((string)($json->message ?? $this->request->getPost('message') ?? ''));

        // =========================================================================
        // CAMADA 1: HONEYPOT TRAP (Invisível para humanos, preenchido por robôs)
        // =========================================================================
        if (!empty($honeypot)) {
            log_message('notice', "[Anti-Spam Honeypot] Robô interceptado. IP: {$clientIp}");
            return $this->respondCreated($fakeSuccessResponse);
        }

        // =========================================================================
        // CAMADA 2: TIME-GATE (Mínimo de tempo humano para preenchimento)
        // =========================================================================
        $elapsed = time() - $formTime;
        if ($formTime > 0 && $elapsed < 3) {
            log_message('notice', "[Anti-Spam Time-Gate] Envio em {$elapsed}s ignorado. IP: {$clientIp}");
            return $this->respondCreated($fakeSuccessResponse);
        }

        // =========================================================================
        // CAMADA 3: RATE LIMITING POR IP (Throttler - máx 3 envios a cada 15 min)
        // =========================================================================
        $throttler    = Services::throttler();
        $rateLimitKey = 'contact_form_' . md5($clientIp);

        if ($throttler->check($rateLimitKey, 3, 900) === false) {
            log_message('warning', "[Anti-Spam Rate Limit] Excesso de tentativas do IP {$clientIp}");
            return $this->fail('Limite temporário de envios atingido para sua rede. Por favor, aguarde alguns minutos antes de tentar novamente.', 429);
        }

        // =========================================================================
        // CAMADA 5: FILTRO HEURÍSTICO (Anti-cirílico e múltiplos links)
        // =========================================================================
        $hasCyrillic = (bool) preg_match('/[\p{Cyrillic}]/u', $message);
        $linkCount   = preg_match_all('/https?:\/\//i', $message);
        if ($hasCyrillic || $linkCount > 1) {
            log_message('notice', "[Anti-Spam Heurística] Padrão de spam detectado (cirílico: " . ($hasCyrillic ? 'sim' : 'não') . ", links: {$linkCount}). IP: {$clientIp}");
            return $this->respondCreated($fakeSuccessResponse);
        }

        // 4. Validação Estrita dos Campos
        if (empty($name) || empty($email) || empty($phone) || empty($message)) {
            return $this->failValidationErrors('Por favor, preencha todos os campos obrigatórios (Nome, WhatsApp/Telefone, E-mail e Mensagem).');
        }

        if (mb_strlen($name) > 100) {
            return $this->failValidationErrors('O campo Nome não pode exceder 100 caracteres.');
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL) || mb_strlen($email) > 150) {
            return $this->failValidationErrors('Por favor, informe um endereço de e-mail corporativo válido.');
        }

        // Limpeza e validação de telefone (mínimo 8 dígitos numéricos)
        $cleanPhoneDigits = preg_replace('/\D/', '', $phone);
        if (strlen($cleanPhoneDigits) < 8 || strlen($cleanPhoneDigits) > 16) {
            return $this->failValidationErrors('Por favor, informe um número de WhatsApp ou telefone válido.');
        }

        if (mb_strlen($message) > 3000) {
            return $this->failValidationErrors('A mensagem é muito longa (máximo de 3000 caracteres).');
        }

        // Sanitização das entradas para evitar XSS
        $safeName    = esc(strip_tags($name));
        $safeEmail   = filter_var($email, FILTER_SANITIZE_EMAIL);
        $safePhone   = esc(strip_tags($phone));
        $safeMessage = esc(strip_tags($message));

        // =========================================================================
        // CAMADA 4: COOLDOWN DE DUPLICIDADE POR E-MAIL (Mesmo remetente em 2 horas)
        // Evita reenvios contínuos de madrugada / scripts repetitivos
        // =========================================================================
        $cleanEmail  = strtolower($safeEmail);
        $cache       = Services::cache();
        $cooldownKey = 'lead_cooldown_' . md5($cleanEmail);

        if ($cache->get($cooldownKey)) {
            log_message('notice', "[Anti-Spam Cooldown] Submissão recente para {$cleanEmail}. Descartando disparo de e-mail/webhook.");
            return $this->respondCreated([
                'status'  => 'success',
                'message' => 'Recebemos sua mensagem! Nossa equipe já possui seu contato registrado recentemente e responderá em breve.'
            ]);
        }

        // Salva cooldown no cache por 2 horas (7200 segundos)
        $cache->save($cooldownKey, time(), 7200);

        // 5. Serviço de E-mail Nativo do CodeIgniter 4 (Fallback / Contingência)
        try {
            $emailService = Services::email();
            $emailService->setFrom('sistema@cezinhasilva.com', 'Site CezinhaSilva');
            $emailService->setTo('contato@cezinhasilva.com');
            $emailService->setReplyTo($safeEmail, $safeName);
            $emailService->setSubject('Novo Lead do Site: ' . $safeName);
            
            $body  = "Novo contato recebido pelo site!\n\n";
            $body .= "Nome: " . $safeName . "\n";
            $body .= "WhatsApp / Telefone: " . $safePhone . "\n";
            $body .= "E-mail: " . $safeEmail . "\n";
            $body .= "IP Origem: " . $clientIp . "\n\n";
            $body .= "Mensagem:\n" . $safeMessage . "\n";
            
            $emailService->setMessage($body);
            $emailService->send();
        } catch (\Throwable $e) {
            log_message('error', 'Falha no envio de e-mail nativo: ' . $e->getMessage());
        }

        // 6. Integração com Automação n8n (Webhook)
        $payload = [
            'nome'      => $safeName,
            'email'     => $safeEmail,
            'telefone'  => $safePhone,
            'mensagem'  => $safeMessage,
            'origem'    => 'Site Cezinha Silva',
            'ip'        => $clientIp,
            'data'      => date('Y-m-d H:i:s')
        ];

        // URL do webhook configurável via .env, com fallback para a rota de produção
        $webhookUrl = env('N8N_WEBHOOK_URL', 'https://n8n.cezinhasilva.com/webhook/receber-contato');
        
        $ch = curl_init($webhookUrl);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 6);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        
        $response = curl_exec($ch);
        
        if (curl_errno($ch)) {
            log_message('error', 'Erro no cURL n8n (' . $webhookUrl . '): ' . curl_error($ch));
        }
        curl_close($ch);

        return $this->respondCreated(['status' => 'success', 'message' => 'Mensagem recebida com sucesso! Entraremos em contato em breve.']);
    }
}
