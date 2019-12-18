<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [
        'id',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
