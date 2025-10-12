<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Promotion>
 */
class PromotionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence;
        return [
            "uuid" => (string) Str::uuid(),
            "title"=> $title,
            "slug"=> Str::slug($title),
            "description"=> $this->faker->paragraph,
            "price"=> $this->faker->randomFloat(2, 0, 100),
            "owner_id"=> User::factory(),
            "status"=> $this->faker->randomElement(['draft', 'published']),
            "is_approved"=> $this->faker->boolean,
        ];
    }
}
