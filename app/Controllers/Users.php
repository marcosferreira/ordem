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
}
