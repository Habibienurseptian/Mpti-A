<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Threads extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'content',
        'image',
        'upvote',
    ];

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function user(){
        return $this-> belongsTo(User::class);
    }

}
