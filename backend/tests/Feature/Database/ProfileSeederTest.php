<?php

namespace Tests\Feature\Database;

use App\Models\Profile;
use Database\Seeders\ProfileSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfileSeederTest extends TestCase
{
    use RefreshDatabase;

    public function test_creates_the_singleton_profile_and_is_idempotent(): void
    {
        $this->seed(ProfileSeeder::class);
        $this->seed(ProfileSeeder::class);

        $this->assertSame(1, Profile::query()->count());
        $this->assertEquals(1, Profile::query()->value('id'));
    }

    public function test_does_not_overwrite_admin_edits(): void
    {
        $this->seed(ProfileSeeder::class);
        Profile::query()->findOrFail(1)->update(['vision' => 'Edited by admin']);

        $this->seed(ProfileSeeder::class);

        $this->assertSame('Edited by admin', Profile::query()->findOrFail(1)->vision);
    }
}