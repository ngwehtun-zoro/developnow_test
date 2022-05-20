<?php

namespace App\Providers;

use App\Models\Products;
use App\Contracts\ProductInterface;
use App\Repositories\CartRepository;
use App\Repositories\ProductRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\CategoryRepository;
use App\Contracts\CartRepositoryInterface;
use App\Contracts\ProductRepositoryInterface;
use App\Contracts\CategoryRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->bindModels();
        $this->bindRepositories();
    }

    public function bindModels(): void
    {
        $this->app->bind(ProductInterface::class, function () {
            return new Products();
        });
    }

    public function bindRepositories(): void
    {
        $this->app->bind(CartRepositoryInterface::class, CartRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
    }
}
