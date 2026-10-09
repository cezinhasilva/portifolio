<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Files\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class Dashboard extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $query = $this->db->query('SELECT * FROM projects ORDER BY created_at DESC');
        $projects = $query->getResultArray();

        return view('dashboard/index', ['projects' => $projects]);
    }

    public function createUser()
    {
        $users = new \CodeIgniter\Shield\Models\UserModel();
        $user = new \CodeIgniter\Shield\Entities\User([
            'username' => 'admin',
            'email'    => 'admin@cezinhasilva.com',
            'password' => 'CezinhaAdmin2026!'
        ]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('user');
        return 'User created! admin / CezinhaAdmin2026!';
    }

    public function migrate()
    {
        $migrate = \Config\Services::migrations();
        try {
            $migrate->setNamespace('CodeIgniter\Shield')->latest();
            $migrate->setNamespace('App')->latest();
            return 'Migrations ran successfully!';
        } catch (\Throwable $e) {
            return $e->getMessage();
        }
    }

    public function achadinhos()
    {
        $query = $this->db->query('SELECT * FROM achadinhos ORDER BY created_at DESC');
        $achadinhos = $query->getResultArray();

        // Buscar usuarios cadastrados no CodeIgniter Shield
        $users = [];
        try {
            $users = $this->db->table('users')
                ->select('users.id, users.username, users.active, users.last_active, users.created_at, auth_identities.secret as email, GROUP_CONCAT(auth_groups_users.group SEPARATOR ", ") as groups')
                ->join('auth_identities', 'auth_identities.user_id = users.id AND auth_identities.type = "email_password"', 'left')
                ->join('auth_groups_users', 'auth_groups_users.user_id = users.id', 'left')
                ->groupBy('users.id')
                ->orderBy('users.id', 'DESC')
                ->get()
                ->getResultArray();
        } catch (\Throwable $e) {
            log_message('error', '[Dashboard] Erro ao carregar usuarios: ' . $e->getMessage());
        }

        return view('dashboard/achadinhos', [
            'achadinhos' => $achadinhos,
            'users'      => $users,
        ]);
    }

    public function deleteAchadinho($id)
    {
        $this->db->table('achadinhos')->where('id', $id)->delete();
        return redirect()->to('/dashboard/achadinhos')->with('message', 'Achadinho removido!');
    }

    public function create()
    {
        return view('dashboard/create');
    }

    public function store()
    {
        $rules = [
            'title' => 'required|min_length[3]|max_length[255]',
            'description' => 'required',
            'image' => [
                'label' => 'Image File',
                'rules' => [
                    'uploaded[image]',
                    'is_image[image]',
                    'mime_in[image,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    'max_size[image,2048]', // 2MB
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $img = $this->request->getFile('image');

        if (!$img->hasMoved()) {
            $newName = $img->getRandomName();

            // Resize image using Intervention Image
            $manager = new ImageManager(new Driver());
            $image = $manager->read($img->getTempName());
            $image->resize(800, 600);

            // Ensure directory exists
            if (!is_dir(FCPATH . 'uploads')) {
                mkdir(FCPATH . 'uploads', 0777, true);
            }

            $image->save(FCPATH . 'uploads/' . $newName);

            // Save to database
            $data = [
                'title' => $this->request->getPost('title'),
                'description' => $this->request->getPost('description'),
                'image_path' => 'uploads/' . $newName,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            $this->db->table('projects')->insert($data);

            return redirect()->to('/dashboard')->with('message', 'Projeto criado com sucesso!');
        }

        return redirect()->back()->withInput()->with('error', 'Falha no upload da imagem.');
    }
}

