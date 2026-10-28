<?php

namespace Database\Seeders;

use App\Models\Publication;
use Database\Seeders\Concerns\SeedsFromData;
use Illuminate\Database\Seeder;

/**
 * Sample content for local development. Not run in production.
 */
class PublicationSeeder extends Seeder
{
    use SeedsFromData;

    public function run(): void
    {
        $this->insertMissing(Publication::class, 'slug', 'publications');
    }
}
