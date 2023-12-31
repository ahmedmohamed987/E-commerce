<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $fillable = ['user_id'];

    public function getAllUsers() {
        return $this->belongsTo('App\Models\Alluser', 'user_id');
    }
}
