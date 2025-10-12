<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use App\Support\Constants\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $name = $this->command->ask('Enter admin name', 'Super Admin');
        $email = $this->command->ask('Enter admin email', 'admin@example.com');
        $password = $this->command->secret('Enter admin password (hidden)');

        if (! $password) {
            $this->command->error('Password cannot be empty!');
            return;
        }

        $user = User::updateOrCreate(
            ['email' => $email],
            [
                "uuid" => (string) Str::uuid(),
                'name' => $name,
                'email_verified_at' => now(),
                'password' => Hash::make($password),
                'role' => Role::ADMIN,
                'remember_token' => Str::random(10),
            ]
        );

        $this->command->info("Admin user created: {$user->email}");
    }
}
