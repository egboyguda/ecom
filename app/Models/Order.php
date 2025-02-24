<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'phone',
        'status',
        'total',

    ];
    public function products()
    {
        return $this->belongsToMany(Product::class,'order_items')->withPivot('quantity','price','total');

    }
}
