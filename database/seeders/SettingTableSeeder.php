<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('setting')->insert([
            'id_setting' => 1,
            'nama_perusahaan' => 'sakashop',
            'alamat' => 'testing',
            'telepon' => '085679',
            'path_logo' => '/img/logo.jpg',
        ]);
    }
}
