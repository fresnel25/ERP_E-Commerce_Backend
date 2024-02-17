<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMonthlyPayment extends Model
{
    protected $table = 'user_monthly_payments';

    use HasFactory;

    public function PaymentUser(){
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function PaymentCreate(){
        return $this->hasOne('App\Models\User', 'id', 'create_id');
    }
     
}
