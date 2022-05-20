<?php

namespace App\Contracts;

interface ProductRepositoryInterface
{
    public function getProducts();
    public function getProduct(int $productId);
    public function updateProduct(int $id, array $data);
    public function deleteProduct(int $productId);
    public function createProduct(array $data);
}
