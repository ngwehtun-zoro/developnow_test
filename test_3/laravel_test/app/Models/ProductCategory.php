<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductCategory extends Model
{
    use HasFactory;

    protected $table = "products_categories";
    protected $connection = "mysql";
    protected $fillable = ['name'];

    public function products(): HasMany
    {
        return $this->hasMany(Products::class, 'category_id', 'id');
    }
}
