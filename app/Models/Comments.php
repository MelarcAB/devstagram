<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;


    //post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    //user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
