<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
    protected $fillable = [
        "name",
        "description",
        "price",
        "img_url",
        "category_id",
    ];
    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);

    }
    public function orders()
    {
        return $this->belongsToMany(Order::class,'order_items')->withPivot('quantity','price','total');
    }
}
