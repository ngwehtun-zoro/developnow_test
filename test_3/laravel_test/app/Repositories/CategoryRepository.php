<?php

namespace App\Repositories;

use App\Models\ProductCategory;
use App\Contracts\CategoryRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function __construct(
        private ProductCategory $model
    ) {
    }

    public function getCategories(): LengthAwarePaginator
    {
        return $this->model->paginate();
    }

    public function getCategory(int $categoryId): ?ProductCategory
    {
        return $this->model->find($categoryId);
    }

    public function createCategory(array $data): ProductCategory
    {
        return $this->model->create($data);
    }

    public function updateCategory(int $id, array $data): ?bool
    {
        return $this->model->find($id)?->update($data);
    }

    public function deleteCategory(int $id): ?bool
    {
        return $this->model->find($id)?->delete();
    }
}
