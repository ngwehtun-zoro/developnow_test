<?php

namespace App\Contracts;

interface CategoryRepositoryInterface
{
    public function getCategories();
    public function getCategory(int $categoryId);
    public function createCategory(array $data);
    public function updateCategory(int $id, array $data);
    public function deleteCategory(int $id);
}
