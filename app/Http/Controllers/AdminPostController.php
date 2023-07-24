<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {
       return view('admin.posts.index', [
           'posts' => Post::latest()->filter()->paginate(10)
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

    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' =>$post]);
    }
    public function update(Post $post)
    {
        $attributes = request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'thumbnail' => 'required|image',
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);
        $attributes['thumbnail'] = request()->file('thumbnail')->store('public/storage/thumbnails');

        $post->update($attributes);
        return redirect('/admin/posts');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/admin/posts');
    }
}
