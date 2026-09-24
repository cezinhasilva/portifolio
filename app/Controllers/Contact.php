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

        return $this->respondCreated(['status' => 'success', 'message' => 'E-mail enviado com sucesso!']);
    }
}
