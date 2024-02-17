<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserContract extends Model
{
    protected $table = 'user_contracts';

    use HasFactory;

    public function ContractUser(){
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function ContractCreate(){
        return $this->hasOne('App\Models\User', 'id', 'create_id');
    }
}
