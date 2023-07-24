<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index()
    {
        return view('posts', [
            'posts' => Post::latest()->filter()->paginate(8),
            'categories' => Category::all(),
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            'post' => $post
        ]);
    }


    public function create()
    {
        return view('components.create');
    }

    public function store()
    {


        $attributes = request()->validate([
           'title' => 'required',
            'excerpt' => 'required',
            'thumbnail' => 'required|image',
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);
        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('public/storage/thumbnails');
        Post::create($attributes);

        return redirect('/');
    }

}
