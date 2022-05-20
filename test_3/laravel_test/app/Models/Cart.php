<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    protected $table = "cart_items";
    protected $connection = "mysql";
    protected $fillable = [
        'id',
        'product_id'
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Products::class, 'id', 'product_id');
    }
}
