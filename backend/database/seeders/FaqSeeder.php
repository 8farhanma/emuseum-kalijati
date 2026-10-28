<?php

namespace Database\Seeders;

use App\Models\Faq;
use Database\Seeders\Concerns\SeedsFromData;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    use SeedsFromData;

    public function run(): void
    {
        $this->insertMissing(Faq::class, 'question', 'faqs');
    }
}
