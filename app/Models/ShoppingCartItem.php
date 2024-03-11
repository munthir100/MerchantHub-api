<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCartItem extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'shopping_cart_id', 'quantity', 'options'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function cart()
    {
        return $this->belongsTo(ShoppingCart::class, 'shopping_cart_id');
    }
}
