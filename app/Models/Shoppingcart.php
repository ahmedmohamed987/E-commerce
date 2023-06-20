<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shoppingcart extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id', 'product_id',
                            'product_quantity', 'total_price'];

    public function getCustomer() {
        return $this->belongsTo('App\Models\customer', 'customer_id');
    }

    public function getProduct() {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }

    // public function getOrder() {
    //     return $this->hasOne('App\Models\Order');
    // }
}
