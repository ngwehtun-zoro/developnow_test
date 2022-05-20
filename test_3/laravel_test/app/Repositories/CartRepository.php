<?php

namespace App\Repositories;

use App\Models\Cart;
use App\Contracts\CartRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class CartRepository implements CartRepositoryInterface
{
    public function __construct(
        private Cart $model
    ) {
    }
    public function getCarts(): LengthAwarePaginator
    {
        return $this->model->paginate();
    }

    public function getCart(int $cartId): ?Cart
    {
        return $this->model->find($cartId);
    }

    public function createCart(array $data): Cart
    {
        return $this->model->create($data);
    }

    public function updateCart(int $id, array $data): ?bool
    {
        return $this->model->find($id)?->update($data);
    }

    public function deleteCart(int $id): ?bool
    {
        return $this->model->find($id)?->delete();
    }
}
