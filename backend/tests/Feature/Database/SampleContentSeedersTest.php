<?php

namespace Tests\Feature\Database;

use App\Models\Artifact;
use App\Models\Faq;
use App\Models\Profile;
use App\Models\Publication;
use App\Models\Review;
use App\Models\Visit;
use Database\Seeders\ArtifactSeeder;
use Database\Seeders\DatabaseSeeder;
use Database\Seeders\PublicationSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\File;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class SampleContentSeedersTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return array<string, array{0: class-string, 1: class-string, 2: string, 3: string}>
     */
    public static function sampleSeeders(): array
    {
        return [
            'artifacts' => [ArtifactSeeder::class, Artifact::class, 'artifacts', 'name'],
            'publications' => [PublicationSeeder::class, Publication::class, 'publications', 'title'],
        ];
    }

    #[DataProvider('sampleSeeders')]
    public function test_seeder_is_idempotent_and_keeps_admin_edits(
        string $seeder,
        string $model,
        string $dataName,
        string $editableColumn,
    ): void {
        $expected = count(File::getRequire(database_path("seeders/data/{$dataName}.php")));

        $this->seed($seeder);
        $this->seed($seeder);
        $this->assertSame($expected, $model::query()->count());

        $record = $model::query()->firstOrFail();
        $record->update([$editableColumn => 'Edited by admin']);

        $this->seed($seeder);

        $this->assertSame($expected, $model::query()->count());
        $this->assertSame('Edited by admin', $record->fresh()->{$editableColumn});
    }

    public function test_database_seeder_includes_sample_content_outside_production(): void
    {
        $this->configureAdmin();

        $this->app->make(DatabaseSeeder::class)->run();

        $this->assertSame(1, Profile::query()->count());
        $this->assertGreaterThan(0, Faq::query()->count());
        $this->assertGreaterThan(0, Artifact::query()->count());
        $this->assertGreaterThan(0, Publication::query()->count());
        $this->assertSame(0, Visit::query()->count());
        $this->assertSame(0, Review::query()->count());
    }

    public function test_database_seeder_skips_sample_content_in_production(): void
    {
        $this->configureAdmin();
        $this->app->detectEnvironment(fn () => 'production');

        $this->app->make(DatabaseSeeder::class)->run();

        $this->assertSame(1, Profile::query()->count());
        $this->assertGreaterThan(0, Faq::query()->count());
        $this->assertSame(0, Artifact::query()->count());
        $this->assertSame(0, Publication::query()->count());
    }

    /**
     * AdminUserSeeder reads its values from config/admin.php.
     */
    private function configureAdmin(): void
    {
        config(['admin' => [
            'name' => 'Admin Test',
            'username' => 'admin',
            'email' => 'admin@example.test',
            'password' => 'password-rahasia-123',
        ]]);
    }
}
