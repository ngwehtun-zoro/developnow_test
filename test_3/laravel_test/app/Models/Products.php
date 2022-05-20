<?php

namespace App\Models;

use App\Contracts\ProductInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Products extends Model implements ProductInterface
{
    use SoftDeletes;
    use HasFactory;

    protected $table = "products";
    protected $connection = "mysql";
    protected $fillable = [
        'name',
        'image',
        'price',
        'category_id'
    ];

    public function setPriceAttribute($price)
    {
        $this->attributes['price'] = $price * 1000;
    }

    public function getPriceAttribute($price)
    {
        return $price / 1000;
    }

    public function categories(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }
}
