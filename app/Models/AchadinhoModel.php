<?php

namespace App\Models;

use CodeIgniter\Model;

class AchadinhoModel extends Model
{
    protected $table            = 'achadinhos';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'title',
        'slug',
        'category',
        'description',
        'price_original',
        'price_promo',
        'discount_percent',
        'image_url',
        'affiliate_url',
        'shopee_item_id',
        'youtube_short_url',
        'clicks_count',
        'is_featured',
        'status',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules      = [
        'title'         => 'required|min_length[3]|max_length[255]',
        'price_promo'   => 'required|decimal',
        'affiliate_url' => 'required|valid_url',
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $beforeInsert = ['generateSlug'];
    protected $beforeUpdate = ['generateSlug'];

    protected function generateSlug(array $data)
    {
        if (isset($data['data']['title']) && empty($data['data']['slug'])) {
            $data['data']['slug'] = url_title($data['data']['title'], '-', true);
        }
        return $data;
    }

    /**
     * Increment click counter
     */
    public function registrarClique(int $id)
    {
        return $this->where('id', $id)
                    ->set('clicks_count', 'clicks_count + 1', false)
                    ->update();
    }
}
