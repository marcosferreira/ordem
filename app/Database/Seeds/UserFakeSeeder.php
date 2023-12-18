<?php

namespace App\Database\Seeds;

use App\Models\UserModel;
use CodeIgniter\Database\Seeder;
use Faker\Factory;

class UserFakeSeeder extends Seeder
{
    public function run()
    {
        $userModel = new UserModel();
        $fake = Factory::create();

        $usersCreate = 50;

        $userList = [];

        for ($i=0; $i < $usersCreate; $i++) { 
            array_push($userList, [
                'name'          => $fake->unique()->name(),
                'email'          => $fake->unique()->email(),
                'password_hash' => '123456', // change the fake seeder when your hash
                'active'        => true,
            ]);
        }

        // echo '<pre>';
        // print_r($userList);
        // exit;

        $userModel->skipValidation(true) // bypass in validation
                  ->protect(false) // bypass in protect allowedFields
                  ->insertBatch($userList);

        echo "$usersCreate criados com sucesso";
    }
}
