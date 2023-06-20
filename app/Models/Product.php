<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'categore', 'image',
                            'description', 'quantity', 'price'];

    public function getShoppingcart() {
        return $this->hasMany('App\Models\Shoppingcart');
    }

    public function getOrder() {
        return $this->hasMany('App\Models\Orders');
    }
}
