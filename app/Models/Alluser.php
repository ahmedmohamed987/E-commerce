<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alluser extends Model
{
    use HasFactory;
    protected $fillable = ['role', 'email', 'password'];

    public function getAdmin() {
        return $this->hasOne('App\Models\Admin');
    }

    public function getCustomer() {
        return $this->hasOne('App\Models\customer');
    }
}
