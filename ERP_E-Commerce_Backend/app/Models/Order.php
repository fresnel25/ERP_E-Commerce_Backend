<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    public function OrderUser(){
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
