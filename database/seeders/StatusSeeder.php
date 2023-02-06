<?php

namespace Database\Seeders;
use App\Models\Status_offer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_offers')->insert([
            'name'	=> 'Deal','Revisi',     
    ]);
     
    }
}