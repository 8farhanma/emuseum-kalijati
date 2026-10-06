<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tb_faq')->insert([
            [
                'pertanyaan' => 'Apakah ada biaya masuk?',
                'jawaban'    => 'Isi jawaban.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pertanyaan' => 'Jam buka?',
                'jawaban'    => 'Isi jawaban.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pertanyaan' => 'Bagaimana mendaftar kunjungan rombongan?',
                'jawaban'    => 'Isi jawaban.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}