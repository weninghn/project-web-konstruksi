<?php

namespace Database\Seeders;

use App\Models\payment_methods;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class payment_method extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_methods')->insert([
            'method'	=> 'cash',
            
    ]);
        DB::table('payment_methods')->insert([
            'method'	=> 'Transfer',
            
    ]);
    }
}