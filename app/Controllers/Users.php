<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Users extends BaseController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Lista de usuários do sistema',
            'users' => $this->userModel->findAll()
        ];

        return view('Users/index', $data);
    }

    public function getUsers() {
        if (!$this->request->isAJAX()) return redirect()->back();

        $attr = [
            'id',
            'name',
            'email',
            'active',
            'thumbnail',
        ];

        $usersList = $this->userModel->select($attr)->findAll();

        // Receive the object array users to ajax DataTable
        $data = [];

        foreach ($usersList as $user) {
            $data[] = [
                'imagem' => $user->thumbnail,
                'nome' => esc($user->name),
                'email' => esc($user->email),
                'ativo' => ($user->active == true ? '<span class="text-success"><i class="fa fa-unlock"></i> Ativo</span>' : '<span class="text-warning"><i class="fa fa-lock"></i> Inativo</span>'),
            ];
        }

        $response = [
            'data' => $data,
        ];

        return $this->response->setJSON($response);
    }
}
