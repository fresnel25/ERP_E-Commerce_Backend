<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{

    protected $table = 'leaves';

    use HasFactory;

    public function LeaveUser(){
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function LeaveCreate(){
        return $this->hasOne('App\Models\User', 'id', 'create_id');
    }

}
