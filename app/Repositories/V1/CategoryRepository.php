<?php

namespace App\Repositories\V1;

use App\Contracts\V1\CategoryInterface;
use App\DataTransferObjects\V1\CategoryDTO;
use App\Filters\CategoryFilter;
use App\Models\Category;

class CategoryRepository extends BaseRepository implements CategoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
    }

    public function gettingAllData($queryParams = [])
    {
        $queryBuilder = Category::latest();
        return resolve(CategoryFilter::class)->getResults([
            'builder' => $queryBuilder,
            'params' => $queryParams
        ]);
    }

    public function addingData(CategoryDTO $categoryDTO): Category
    {
        return Category::create($categoryDTO->toArray());
    }

    public function gettingSingleData($category) {
        return Category::findByIdentifier($category->uuid);
    }

    public function updatingData(CategoryDTO $categoryDTO, Category $category): Category
    {
        $category->update($categoryDTO->toArray());
        return $category->fresh();
    }

    public function deletingData($category) {
        return $category->delete();
    }
}
