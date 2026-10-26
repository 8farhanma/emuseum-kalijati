<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfilSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tb_profil')->insert([
            'id_profil'  => 1,
            'sejarah'    => 'Isi sejarah Rumah Sejarah Kalijati (ganti lewat admin).',
            'visi'       => 'Isi visi.',
            'misi'       => 'Isi misi.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}