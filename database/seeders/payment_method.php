<?php

namespace Database\Seeders;

use App\Models\payment_method;
use Illuminate\Database\Seeder;
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
       
        $data = [
            'cash','transfer','kredit'
        ];

        foreach ($data as $value){
            payment_method::insert([
                'method'=> $value
            ]);
    }
    }
}