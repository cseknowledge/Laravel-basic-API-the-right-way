<?php

namespace App\Contracts\V1;

use App\DataTransferObjects\V1\CategoryDTO;
use App\Models\Category;

interface CategoryInterface extends BaseInterface
{
    public function addingData(CategoryDTO $categoryDTO): Category;
    public function gettingSingleData($category);
    public function updatingData(CategoryDTO $categoryDTO, Category $category): Category;
    public function deletingData($category);
}
