<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $with = ['category', 'author'];
    protected $fillable = ['title', 'category_id',
        'user_id', 'slug',
        'excerpt', 'body',
        'thumbnail'];

    public function scopeFilter($query) // Post::newQuery()->filter()
    {
        if (request('search')) {
            $query
                ->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('body', 'like', '%' . request('search') . '%');
        }

    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function category()
    {
       return $this->belongsTo(Category::class);
    }
    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }
}

