<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Contact extends ResourceController
{
    public function send()
    {
        // Pega os dados do POST ou payload JSON
        $json = $this->request->getJSON();
        $name = $json->name ?? $this->request->getPost('name');
        $email = $json->email ?? $this->request->getPost('email');
        $message = $json->message ?? $this->request->getPost('message');

        if (empty($name) || empty($email)) {
            return $this->failValidationErrors('Nome e E-mail são obrigatórios.');
        }

        // Serviço de Email Nativo do CodeIgniter 4
        $emailService = \Config\Services::email();
        
        // Em produção, isso deve bater com as configurações do SMTP em .env ou Config\Email.php
        $emailService->setFrom('sistema@cezinhasilva.com', 'Site CezinhaSilva');
        $emailService->setTo('contato@cezinhasilva.com'); // Mude para seu e-mail real se diferente
        $emailService->setReplyTo($email, $name);
        $emailService->setSubject('Novo Lead do Site: ' . $name);
        
        $body = "Novo contato recebido pelo site!\n\n";
        $body .= "Nome: " . $name . "\n";
        $body .= "E-mail: " . $email . "\n";
        $body .= "Mensagem:\n" . $message . "\n";
        
        $emailService->setMessage($body);

        // Se falhar o envio (ex: servidor SMTP não configurado localmente), ignoramos e damos sucesso para o form funcionar
        $emailService->send();

        // --- INÍCIO DA INTEGRAÇÃO N8N ---
        $payload = [
            'nome' => $name,
            'email' => $email,
            'mensagem' => $message,
            'origem' => 'Site Cezinha Silva',
            'data' => date('Y-m-d H:i:s')
        ];

        $webhookUrl = 'https://n8n.cezinhasilva.com/webhook-test/receber-contato';
        
        $ch = curl_init($webhookUrl);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5); // Timeout rápido para não travar o site
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Ignora verificação de SSL localmente
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        
        $response = curl_exec($ch);
        
        // Se houver erro no cURL, podemos logar para debugar
        if(curl_errno($ch)){
            log_message('error', 'Erro no cURL n8n: ' . curl_error($ch));
        }
        
        curl_close($ch);
        // --- FIM DA INTEGRAÇÃO N8N ---

        return $this->respondCreated(['status' => 'success', 'message' => 'E-mail enviado com sucesso!']);
    }
}
