<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendances';

    use HasFactory;

    public function AttendanceUser(){
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function AttendanceCreate(){
        return $this->hasOne('App\Models\User', 'id', 'create_id');
    }
}
