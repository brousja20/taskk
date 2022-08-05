<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters) {
        if ($filters['author'] ?? false) {
            $query->where('author', 'like', '%' . request('author') . '%');
        }
    }

    protected $fillable = ['name', 'text', 'author'];

}
