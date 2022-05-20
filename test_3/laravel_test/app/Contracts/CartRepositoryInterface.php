<?php

namespace App\Contracts;

interface CartRepositoryInterface
{
    public function getCarts();
    public function getCart(int $cartId);
    public function createCart(array $data);
    public function updateCart(int $id, array $data);
    public function deleteCart(int $id);
}
