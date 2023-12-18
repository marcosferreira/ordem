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
        if (!$this->request->isAJAX()) {
            return redirect()->back();
        }

        $attr = [
            'id',
            'name',
            'email',
            'active',
            'thumbnail',
        ];

        $userList = $this->userModel->select($attr)->findAll();

        echo "<pre>";
        print_r($userList);
    }
}
