<?php 
use App\Models\Users;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Bcrypt;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
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
            'email'	=> 'admin@gmail.com',
            'password'	=> bcrypt('admin123')
    ]);
    DB::table('users')->insert([
        'name'	=> 'owner',
        'email'	=> 'owner@gmail.com',
        'password'	=> bcrypt('owner123')
]);
    }
}