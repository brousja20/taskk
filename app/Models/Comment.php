<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // relationship to user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // relationship to blog
    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

    // relationship to comments replies
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
