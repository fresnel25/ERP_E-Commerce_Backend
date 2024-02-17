<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    public function PostCategory(){
        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }

    public function PostUser(){
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function PostOrder(){
        return $this->hasOne('App\Models\Order', 'id', '_id');
    }

}
