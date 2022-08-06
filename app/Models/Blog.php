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

        // if ($filters['user_id'] ?? false) {
        //     $query->where('user_id', 'like', '%' . request('user_id') . '%');
        // }
    }

    protected $fillable = ['name', 'text', 'author', 'user_id'];

    // relationship to user
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}