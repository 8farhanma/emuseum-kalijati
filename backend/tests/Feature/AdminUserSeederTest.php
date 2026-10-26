<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\AdminUserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use RuntimeException;
use Tests\TestCase;

class AdminUserSeederTest extends TestCase
{
    use RefreshDatabase;

    private function setAdminConfig(array $override = []): void
    {
        config(['admin' => array_merge([
            'name' => 'Admin Test',
            'username' => 'admin',
            'email' => 'admin@example.test',
            'password' => 'password-rahasia-123',
        ], $override)]);
    }

    public function test_creates_admin_with_admin_role(): void
    {
        $this->setAdminConfig();

        $this->seed(AdminUserSeeder::class);

        $admin = User::where('username', 'admin')->firstOrFail();
        $this->assertSame('admin', $admin->role);
        $this->assertTrue(Hash::check('password-rahasia-123', $admin->password));
    }

    public function test_is_idempotent(): void
    {
        $this->setAdminConfig();

        $this->seed(AdminUserSeeder::class);
        $this->seed(AdminUserSeeder::class);

        $this->assertSame(1, User::where('username', 'admin')->count());
    }

    public function test_fails_fast_when_password_is_empty(): void
    {
        $this->setAdminConfig(['password' => '']);

        $this->expectException(RuntimeException::class);

        $this->seed(AdminUserSeeder::class);
    }

    public function test_fails_fast_when_password_too_short(): void
    {
        $this->setAdminConfig(['password' => 'pendek']);

        $this->expectException(RuntimeException::class);

        $this->seed(AdminUserSeeder::class);
    }
}
