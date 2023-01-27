<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\login;

class LoginData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $login = [
            [
                'name' => 'Administrator',
                'username' => 'admin',
                'password' => bcrypt('123456'),
                'level' => 1,
                'email' => 'sayaadmin@gmail.com'
            ],
            [
                'name' => 'Owner',
                'username' => 'owner',
                'password' => bcrypt('123456'),
                'level' => 1,
                'email' => 'sayaowner@gmail.com',
            ],
        ];
        foreach ($login as $key => $value) {
            Login::create($value);
        }
    }
}
