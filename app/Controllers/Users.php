<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;

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

    public function getUsers()
    {
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
            $userName = esc($user->name);
            $data[] = [
                'imagem' => $user->thumbnail,
                'nome' => anchor("users/show/$user->id", esc($user->name), 'title="Exibir usuário: ' . esc($user->name) . '"'),
                'email' => esc($user->email),
                'ativo' => ($user->active == true ? '<span class="text-success"><i class="fa fa-unlock"></i> Ativo</span>' : '<span class="text-warning"><i class="fa fa-lock"></i> Inativo</span>'),
            ];
        }

        $response = [
            'data' => $data,
        ];

        return $this->response->setJSON($response);
    }

    public function show(int $id = null)
    {
        $user = $this->showOr404($id);

        $data = [
            'title' => "Detalhes do usuário ".esc($user->name),
            'user' => $user,
        ];

        return view('Users/show', $data);
    }

    public function edit(int $id = null)
    {
        if ($this->request->is('post')) {
            $userUpdate = [
                'name' => $this->request->getVar('name'),
                'email' => $this->request->getVar('email'),
            ];

            $this->userModel->update($id, $userUpdate);
        }

        $user = $this->showOr404($id);
        $data = [
            'title' => "Detalhes do usuário ".esc($user->name),
            'user' => $user,
        ];

        return view('Users/edit', $data);
    }

    /**
     * Method get user
     * 
     * @param integer $id
     * @return PageNotFoundException|object
     */
    private function showOr404(int $id = null)
    {
        if (!$id || !$user = $this->userModel->withDeleted(true)->find($id)) {
            throw PageNotFoundException::forPageNotFound("Usuário $id não encontrado");
        }
        
        return $user;
    }
}
