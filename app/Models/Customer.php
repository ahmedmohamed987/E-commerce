<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = ['first_name', 'last_name',
                            'location', 'phone_number', 'user_id'];

    public function getAllUsers() {
        return $this->belongsTo('App\Models\Alluser', 'user_id');
    }

    public function getCreditcard() {
        return $this->hasOne('App\Models\Creditcard');
    }

    public function getShoppingcart() {
        return $this->hasOne('App\Models\Shoppingcart');
    }

    public function getOrder() {
        return $this->hasMany('App\Models\Order');
    }
}
