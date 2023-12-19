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

        $usersCreate = 50000;

        $userList = [];

        for ($i=0; $i < $usersCreate; $i++) { 
            array_push($userList, [
                'name'          => $fake->unique()->name(),
                'email'          => $fake->unique()->email(),
                'password_hash' => '123456', // change the fake seeder when your hash
                'active'        => $fake->numberBetween(0,1),
            ]);
        }

        // echo '<pre>';
        // print_r($userList);
        // exit;

        $userModel->skipValidation(true) // bypass in validation
                  ->protect(false) // bypass in protect allowedFields
                  ->insertBatch($userList);
        echo "\n";
        echo "$usersCreate criados com sucesso";
    }
}
