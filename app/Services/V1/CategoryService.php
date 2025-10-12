<?php

namespace App\Services\V1;

use App\Models\Category;
use Illuminate\Support\Str;
use App\DataTransferObjects\V1\CategoryDTO;

class CategoryService extends BaseService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        $this->initCategory();
    }

    public function all(array $queryParams = [])
    {
        return $this->categoryRepository->getAllData($queryParams);
    }

    public function store(array $validatedData): Category
    {
        $categoryDTO = CategoryDTO::fromRequest($validatedData);
        return $this->categoryRepository->addData($categoryDTO);
    }

    public function show($category) {
        return $this->categoryRepository->getSingleData($category);
    }

    public function update(array $validatedData, Category $category)
    {
        $categoryDTO = CategoryDTO::fromRequest($validatedData);
        return $this->categoryRepository->updateData($categoryDTO, $category);
    }

    public function delete($category) {
        return $this->categoryRepository->deleteData($category);
    }
}
