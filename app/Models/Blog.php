<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    // finds all blogs with selected author
    public function scopeFilter($query, array $filters) {
        if ($filters['author'] ?? false) {
            $query->where('author', 'like', '%' . request('author') . '%');
        }
    }

    // protected $fillable = ['name', 'text', 'author', 'user_id'];

    // relationship to user
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    // relationship to comments
    public function comments() {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }
}
