<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(AdminUserSeeder::class);
        $this->call(class: UserSeeder::class);
        $this->call(class: CategorySeeder::class);
        $this->call(class: LocationSeeder::class);
        $this->call(class: PromotionSeeder::class);
    }
}
