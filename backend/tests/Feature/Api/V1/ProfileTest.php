<?php

namespace Tests\Feature\Api\V1;

use Database\Seeders\ProfileSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_returns_the_museum_profile_publicly(): void
    {
        $this->seed(ProfileSeeder::class);

        $this->getJson('/api/v1/profile')
            ->assertOk()
            ->assertJsonStructure(['data' => ['history', 'vision', 'mission']])
            ->assertJsonMissingPath('data.id');
    }

    public function test_it_returns_404_when_the_profile_does_not_exist(): void
    {
        $this->getJson('/api/v1/profile')
            ->assertNotFound()
            ->assertExactJson(['message' => 'Resource not found.']);
    }
}
