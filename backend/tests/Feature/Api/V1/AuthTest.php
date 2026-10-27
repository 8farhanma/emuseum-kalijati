<?php

namespace Tests\Feature\Api\V1;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    private const URL = '/api/v1/auth';

    private function admin(): User
    {
        return User::factory()->admin()->create([
            'username' => 'admin',
            'password' => 'rahasia-123',
        ]);
    }

    public function test_login_returns_token_and_user(): void
    {
        $this->admin();

        $this->postJson(self::URL.'/login', ['username' => 'admin', 'password' => 'rahasia-123'])
            ->assertOk()
            ->assertJsonStructure(['data' => [
                'token', 'token_type', 'expires_at',
                'user' => ['id', 'name', 'username', 'email', 'role'],
            ]])
            ->assertJsonPath('data.token_type', 'Bearer')
            ->assertJsonPath('data.user.role', 'admin')
            ->assertJsonMissingPath('data.user.password');

        $this->assertDatabaseCount('personal_access_tokens', 1);
    }

    public function test_login_with_wrong_password_is_rejected(): void
    {
        $this->admin();

        $this->postJson(self::URL.'/login', ['username' => 'admin', 'password' => 'salah'])
            ->assertUnprocessable()
            ->assertJsonValidationErrors('username');

        $this->assertDatabaseCount('personal_access_tokens', 0);
    }

    public function test_login_requires_username_and_password(): void
    {
        $this->postJson(self::URL.'/login', [])
            ->assertUnprocessable()
            ->assertJsonValidationErrors(['username', 'password']);
    }

    public function test_login_is_rate_limited(): void
    {
        $this->admin();

        for ($i = 0; $i < 5; $i++) {
            $this->postJson(self::URL.'/login', ['username' => 'admin', 'password' => 'salah'])
                ->assertUnprocessable();
        }

        $this->postJson(self::URL.'/login', ['username' => 'admin', 'password' => 'salah'])
            ->assertTooManyRequests();
    }

    public function test_me_requires_authentication(): void
    {
        $this->getJson(self::URL.'/me')->assertUnauthorized();
    }

    public function test_me_returns_current_user(): void
    {
        $token = $this->admin()->createToken('test')->plainTextToken;

        $this->withToken($token)->getJson(self::URL.'/me')
            ->assertOk()
            ->assertJsonPath('data.username', 'admin')
            ->assertJsonMissingPath('data.password');
    }

    public function test_logout_revokes_current_token(): void
    {
        $token = $this->admin()->createToken('test')->plainTextToken;

        $this->withToken($token)->postJson(self::URL.'/logout')->assertNoContent();

        // Cek DB, bukan request ulang: guard Laravel meng-cache user dalam satu proses test.
        $this->assertDatabaseCount('personal_access_tokens', 0);
    }
}
