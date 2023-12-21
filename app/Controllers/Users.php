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
        if (!$this->request->isAJAX()) return redirect()->to('users');

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
            'title' => "Detalhes do usuário " . esc($user->name),
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
            return redirect()->to("users/show/$id");
        }

        $user = $this->showOr404($id);
        $data = [
            'title' => "Detalhes do usuário " . esc($user->name),
            'user' => $user,
        ];

        return view('Users/edit', $data);
    }

    public function update()
    {
        if (!$this->request->is('ajax')) return redirect()->to('users');

        $res = [];

        // Envia o hash do token do form
        $res['csrf_token']   = csrf_hash();

        // Recupera o post da requisição
        $post = $this->request->getPost();

        // Se o campo senha estiver vazio, remove os atributos desnecessários
        if (empty($post['password'])) {
            // Se isto não for feito, o hashPassword() fará o hash de uma string vazia.
            unset($post['password']);
            unset($post['password_confirmation']);
        }

        // Valida a instância de usuário
        $user = $this->showOr404($post['id']);

        // Preenche os atributos do usuário com os valores do post
        $user->fill($post);

        if ($user->hasChanged() == false) {
            $res['info'] = "Não há dados para serem atualizados";
            return $this->response->setJSON($res);
        }

        if ($this->userModel->protect(false)->save($user)) {
            session()->setFlashdata('saved_successfully', 'Dados salvos com sucesso!');            
            return $this->response->setJSON($res);
        }

        $res['error'] = "Por favor verifique os erros de abaixo e tente novamente";
        $res['errors_model'] = $this->userModel->errors();

        // Retorna para o ajax request
        return $this->response->setJSON($res);
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
