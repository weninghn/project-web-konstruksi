<?php 
namespace Database\Seeders;
use App\Models\Users;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Bcrypt;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'name'	=> 'admin',
            'addres' => 'solo',
            'slug' => 'admin',
            'phone' => '081238839',
            'email'	=> 'admin22@gmail.com',
            'password'	=> bcrypt('admin123'),
            'role_id' => '1'
    ]);
    DB::table('users')->insert([
        'name'	=> 'owner',
        'addres' => 'solo',
        'slug' => 'owner',
        'phone' => '0812438839',
        'email'	=> 'owner22@gmail.com',
        'password'	=> bcrypt('owner123'),
        'role_id' => '2'
]);
    }
}