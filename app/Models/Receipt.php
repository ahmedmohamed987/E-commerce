<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;
    protected $fillable = ['order_id'];

    public function getOrder() {
        return $this->belongsTo('App\Models\Order', 'order_id');
    }
}
