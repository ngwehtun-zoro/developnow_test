<?php

namespace App\Repositories;

use App\Contracts\ProductInterface;
use App\Contracts\ProductRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductRepository implements ProductRepositoryInterface
{
    public function __construct(
        private ProductInterface $model
    ) {
    }

    public function createProduct(array $data)
    {
        return $this->model->create($data);
    }

    public function getProduct(int $productId): ?ProductInterface
    {
        return $this->model->find($productId);
    }

    public function getProducts(): LengthAwarePaginator
    {
        return $this->model->paginate();
    }

    public function updateProduct(int $productId, array $data): bool|null
    {
        return $this->model->find($productId)?->update($data);
    }

    public function deleteProduct(int $productId): bool|null
    {
        return $this->model->find($productId)?->delete();
    }
}
