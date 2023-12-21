<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'App\Entities\User';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'name',
        'email',
        'password',
        'reset_hash',
        'reset_expire_at',
        'thumbnail',
        // Campo active não colocado, pois existe a manipulação de formulário
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'id'                    => 'permit_empty|is_natural_no_zero',
        'name'                  => 'required|min_length[3]|max_length[125]',
        'email'                 => 'required|valid_email|max_length[230]|is_unique[users.email,id,{id}]',
        'password'              => 'required|min_length[6]',
        'password_confirmation' => 'required_with[password]|matches[password]'
    ];
    protected $validationMessages   = [
        'name' => [
            'required' => 'O campo (Nome) é requerido.',
        ],
        'email' => [
            'required'  => 'O campo (E-mail) é requerido.',
            'valid_email' => 'O campo (E-mail) deve conter um endereço de e-mail válido.',
            'is_unique' => 'Este (E-mail) já foi escolhido. Por favor tente outro e-mail.'
        ],
        'password' => [
            'required' => 'O campo (Senha) deve conter pelo menos 6 caracteres no tamanho.',
            'min_length' => 'O campo (Senha) deve conter pelo menos 6 caracteres no tamanho.'
        ],
        'password_confirmation' => [
            'required_with' => 'O campo (Confirmar senha) deve ser fornecido.',
            'matches' => 'O campo (confirmar senha) não é igual ao campo (Senha).'
        ]
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['passwordHash'];
    protected $afterInsert    = [];
    protected $beforeUpdate   = ['passwordHash'];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    protected function passwordHash(array $data)
    {
        if (isset($data['data']['password'])) {
            $data['data']['password_hash'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);

            unset($data['data']['password']);
            unset($data['data']['password_confirmation']);
        }

        return $data;
    }
}
