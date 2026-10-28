<?php

namespace Database\Seeders;

use App\Models\Profile;
use Database\Seeders\Concerns\SeedsFromData;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    use SeedsFromData;

    /**
     * Insert the singleton profile (id = 1) only when it is missing,
     * so edits made by admins are never overwritten.
     */
    public function run(): void
    {
        $data = $this->seedData('profile');

        Profile::unguarded(function () use ($data) {
            Profile::query()->firstOrCreate(['id' => 1], $data);
        });
    }
}
