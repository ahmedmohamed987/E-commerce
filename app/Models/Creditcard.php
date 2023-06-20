<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Creditcard extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id', 'card_number', 'card_name',
                            'cvv', 'expiry_date'];

    public function getCustomer() {
        return $this->belongsTo('App\Models\customer', 'customer_id');
    }
}
