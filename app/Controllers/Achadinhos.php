<?php

namespace App\Controllers;

use App\Models\AchadinhoModel;
use CodeIgniter\HTTP\ResponseInterface;

class Achadinhos extends BaseController
{
    protected $achadinhoModel;

    public function __construct()
    {
        $this->achadinhoModel = new AchadinhoModel();
    }

    /**
     * Vitrine principal de achadinhos (Mobile-First)
     */
    public function index()
    {
        $categoriaSelecionada = $this->request->getGet('categoria');
        $busca = $this->request->getGet('q');

        $query = $this->achadinhoModel->where('status', 'ativo');

        if (!empty($categoriaSelecionada) && $categoriaSelecionada !== 'todos') {
            $query->where('category', $categoriaSelecionada);
        }

        if (!empty($busca)) {
            $query->groupStart()
                  ->like('title', $busca)
                  ->orLike('description', $busca)
                  ->groupEnd();
        }

        $produtos = $query->orderBy('is_featured', 'DESC')
                          ->orderBy('created_at', 'DESC')
                          ->findAll(24);

        // Categorias fixas com ícones e contadores
        $categorias = [
            'todos'             => ['nome' => '🔥 Todos os Achados', 'icone' => 'local_fire_department'],
            'Casa Inteligente'  => ['nome' => '💡 Casa Inteligente', 'icone' => 'smart_toy'],
            'Casa & Cozinha'    => ['nome' => '🍳 Cozinha & Praticidade', 'icone' => 'restaurant'],
            'Organização'       => ['nome' => '📦 Organização & Limpeza', 'icone' => 'cleaning_services'],
            'Utilidades'        => ['nome' => '⚡ Utilidades do Dia', 'icone' => 'bolt'],
        ];

        $data = [
            'titulo'               => 'Achadinhos Shopee | Casa Inteligente & Praticidade',
            'meta_descricao'       => 'Os melhores achados e ofertas secretas da Shopee para transformar sua casa com praticidade, automação e preço baixo.',
            'produtos'             => $produtos,
            'categorias'           => $categorias,
            'categoriaAtual'       => $categoriaSelecionada ?: 'todos',
            'busca'                => $busca ?: '',
        ];

        return view('achadinhos/index', $data);
    }

    /**
     * Redirecionamento seguro contabilizando métricas de clique
     */
    public function go($id = null)
    {
        if (!$id) {
            return redirect()->to('/achadinhos');
        }

        $produto = $this->achadinhoModel->find($id);

        if (!$produto || empty($produto['affiliate_url'])) {
            return redirect()->to('/achadinhos');
        }

        // Incrementa o contador de cliques para análise de ROI
        $this->achadinhoModel->registrarClique((int) $id);

        return redirect()->to($produto['affiliate_url']);
    }

    /**
     * Endpoint API para receber produtos enviados pelo n8n
     * POST /api/achadinhos/salvar
     */
    public function apiSalvar(): ResponseInterface
    {
        $tokenEsperado = env('ACHADINHOS_API_SECRET', 'shopee_cezinha_secret_2026');
        $authHeader = $this->request->getHeaderLine('X-API-KEY') ?: $this->request->getHeaderLine('Authorization');

        $tokenRecebido = str_replace('Bearer ', '', $authHeader);

        if (empty($tokenRecebido) || $tokenRecebido !== $tokenEsperado) {
            return $this->response->setStatusCode(401)->setJSON([
                'success' => false,
                'message' => 'Acesso não autorizado. Chave de API inválida.',
            ]);
        }

        $rawBody = $this->request->getBody();
        $json = json_decode($rawBody, true);
        if (!$json) {
            $json = $this->request->getJSON(true) ?: [];
        }

        if (empty($json) || empty($json['title']) || empty($json['affiliate_url'])) {
            return $this->response->setStatusCode(400)->setJSON([
                'success' => false,
                'message' => 'Dados incompletos. Título e affiliate_url são obrigatórios.',
            ]);
        }

        // Cálculo automático de porcentagem de desconto se não enviado
        $priceOriginal = !empty($json['price_original']) ? (float) $json['price_original'] : null;
        $pricePromo = (float) ($json['price_promo'] ?? 0);
        $discount = (int) ($json['discount_percent'] ?? 0);

        if ($priceOriginal && $pricePromo && $priceOriginal > $pricePromo && $discount === 0) {
            $discount = (int) round((($priceOriginal - $pricePromo) / $priceOriginal) * 100);
        }

        $dadosProduto = [
            'title'             => trim($json['title']),
            'description'       => trim($json['description'] ?? ''),
            'category'          => $json['category'] ?? 'Casa & Cozinha',
            'price_original'    => $priceOriginal,
            'price_promo'       => $pricePromo,
            'discount_percent'  => $discount,
            'image_url'         => $json['image_url'] ?? null,
            'affiliate_url'     => $json['affiliate_url'],
            'shopee_item_id'    => $json['shopee_item_id'] ?? null,
            'youtube_short_url' => $json['youtube_short_url'] ?? null,
            'is_featured'       => !empty($json['is_featured']) ? 1 : 0,
            'status'            => 'ativo',
        ];

        // Se veio o shopee_item_id, verifica se o produto já existe para atualizar
        if (!empty($dadosProduto['shopee_item_id'])) {
            $existente = $this->achadinhoModel->where('shopee_item_id', $dadosProduto['shopee_item_id'])->first();
            if ($existente) {
                $this->achadinhoModel->update($existente['id'], $dadosProduto);
                return $this->response->setJSON([
                    'success' => true,
                    'action'  => 'updated',
                    'id'      => $existente['id'],
                    'message' => 'Produto atualizado com sucesso!',
                ]);
            }
        }

        $novoId = $this->achadinhoModel->insert($dadosProduto);

        if ($novoId) {
            return $this->response->setStatusCode(201)->setJSON([
                'success' => true,
                'action'  => 'created',
                'id'      => $novoId,
                'message' => 'Produto cadastrado na vitrine com sucesso!',
            ]);
        }

        return $this->response->setStatusCode(500)->setJSON([
            'success' => false,
            'message' => 'Erro ao salvar o produto no banco de dados.',
            'errors'  => $this->achadinhoModel->errors(),
        ]);
    }
}
