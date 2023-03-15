<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//user
use App\Models\User;

class Post extends Model
{
    use HasFactory;

    //campos que se pueden llenar
    protected $fillable = [
        'title',
        'description',
        'image',
        'user_id'
    ];

    //relacion uno a muchos inversa
    public function user()
    {
        return $this->belongsTo(User::class)->select('name', 'username',);
    }

    //comentarios
    public function comments()
    {
        return $this->hasMany(Comments::class);
    }
}
