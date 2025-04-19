<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['title', 'description', 'url'];
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
