<?php

namespace Tests\Feature\Database;

use App\Models\Faq;
use Database\Seeders\FaqSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\File;
use Tests\TestCase;

class FaqSeederTest extends TestCase
{
    use RefreshDatabase;

    public function test_seeds_every_entry_from_the_data_file_and_is_idempotent(): void
    {
        $expected = count(File::getRequire(database_path('seeders/data/faqs.php')));

        $this->seed(FaqSeeder::class);
        $this->seed(FaqSeeder::class);

        $this->assertSame($expected, Faq::query()->count());
    }

    public function test_does_not_overwrite_admin_edits(): void
    {
        $this->seed(FaqSeeder::class);
        $faq = Faq::query()->firstOrFail();
        $faq->update(['answer' => 'Edited by admin']);

        $this->seed(FaqSeeder::class);

        $this->assertSame('Edited by admin', $faq->fresh()->answer);
        $this->assertSame(
            count(File::getRequire(database_path('seeders/data/faqs.php'))),
            Faq::query()->count(),
        );
    }
}
