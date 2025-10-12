<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Location;
use App\Models\Promotion;
use Illuminate\Database\Seeder;

class PromotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::pluck('id')->all();
        $locations = Location::pluck('id')->all();

        Promotion::factory()
            ->count(10)
            ->create()
            ->each(function (Promotion $promotion) use ($categories, $locations) {
                $categories = collect($categories)->random(rand(1, 5))->all();
                $promotion->categories()->sync($categories);

                $locations = collect($locations)->random(rand(1, 5))->all();
                $promotion->locations()->sync($locations);
            });
    }
}
