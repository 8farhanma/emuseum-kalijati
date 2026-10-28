<?php

namespace Database\Seeders;

use App\Models\Artifact;
use Database\Seeders\Concerns\SeedsFromData;
use Illuminate\Database\Seeder;

/**
 * Sample content for local development. Not run in production.
 */
class ArtifactSeeder extends Seeder
{
    use SeedsFromData;

    public function run(): void
    {
        $this->insertMissing(Artifact::class, 'code', 'artifacts');
    }
}
