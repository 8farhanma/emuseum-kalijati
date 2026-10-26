<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RuntimeException;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $data = $this->validatedConfig();

        // Idempotent: dicari berdasarkan username, dijalankan berulang tidak membuat duplikat.
        $admin = User::firstOrNew(['username' => $data['username']]);

        $admin->name = $data['name'];
        $admin->email = $data['email'];
        $admin->role = 'admin'; // role diset eksplisit (tidak fillable)

        // Hash ulang hanya jika password berubah (cast 'hashed' pada model User).
        if (! $admin->exists || ! Hash::check($data['password'], $admin->password)) {
            $admin->password = $data['password'];
        }

        $admin->save();
    }

    /** Fail fast: hentikan seeding jika konfigurasi admin kosong/tidak valid. */
    private function validatedConfig(): array
    {
        $validator = Validator::make(config('admin'), [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:12'],
        ]);

        if ($validator->fails()) {
            throw new RuntimeException(
                'Konfigurasi admin tidak valid (cek ADMIN_* di .env): '
                .implode('; ', $validator->errors()->all())
            );
        }

        return $validator->validated();
    }
}
