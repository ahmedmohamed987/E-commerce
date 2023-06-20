<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id', 'product_id', 'payment_type',
                            'shipping', 'order_cost'];

    // public function getShoppingcart() {
    //     return $this->belongsTo('App\Models\Shoppingcart', 'shoppingcart_id');
    // }

    public function getReceipt() {
        return $this->hasOne('App\Models\Receipt');
    }

    public function getCustomer() {
        return $this->belongsTo('App\Models\Customer', 'customer_id');
    }

    public function getProduct() {
        return $this->belongsTo('App\Models\Product', 'Product_id');
    }
}
