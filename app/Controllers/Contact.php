<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use Config\Services;

class Contact extends ResourceController
{
    public function send()
    {
        // 1. Coleta de dados via JSON ou POST tradicional
        $json = $this->request->getJSON();
        
        $honeypot = $json->b_hp ?? $this->request->getPost('b_hp') ?? $this->request->getPost('website_trap_field') ?? '';
        $name     = trim($json->name ?? $this->request->getPost('name') ?? '');
        $phone    = trim($json->phone ?? $json->telefone ?? $this->request->getPost('phone') ?? $this->request->getPost('telefone') ?? '');
        $email    = trim($json->email ?? $this->request->getPost('email') ?? '');
        $message  = trim($json->message ?? $this->request->getPost('message') ?? '');

        // 2. Proteção Anti-Spam: Honeypot (se preenchido, é um bot; simula sucesso silencioso)
        if (!empty($honeypot)) {
            log_message('notice', 'Honeypot acionado no formulário de contato. IP: ' . $this->request->getIPAddress());
            return $this->respondCreated(['status' => 'success', 'message' => 'Mensagem recebida com sucesso!']);
        }

        // 3. Proteção contra Flood / Rate Limiting (Máximo 5 envios a cada 10 minutos por IP)
        $throttler = Services::throttler();
        $clientIp  = $this->request->getIPAddress();
        $rateLimitKey = 'contact_form_' . md5($clientIp);

        if ($throttler->check($rateLimitKey, 5, 600) === false) {
            return $this->fail('Limite temporário de envios atingido. Por favor, aguarde alguns minutos.', 429);
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

        // Anti-Spam: Bloqueio de excesso de URLs na mensagem (mais de 3 links = spam comum)
        preg_match_all('#https?://#i', $message, $urlMatches);
        if (count($urlMatches[0]) > 3) {
            log_message('warning', 'Mensagem descartada por excesso de URLs suspeitas. IP: ' . $clientIp);
            return $this->failValidationErrors('Mensagem bloqueada pelo filtro de segurança.');
        }

        // Sanitização das entradas para evitar XSS
        $safeName    = esc(strip_tags($name));
        $safeEmail   = filter_var($email, FILTER_SANITIZE_EMAIL);
        $safePhone   = esc(strip_tags($phone));
        $safeMessage = esc(strip_tags($message));

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

        return $this->respondCreated(['status' => 'success', 'message' => 'Mensagem recebida com sucesso!']);
    }
}
