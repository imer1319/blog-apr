<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
        ]);

        $post = Post::create([
            'title' => $request->get('title'),
            'url' => Str::slug($request->get('title'))
        ]);

        return redirect()->route('admin.posts.edit', $post);
    }

    public function edit(Post $post)
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.posts.edit', compact('categories', 'tags', 'post'));
    }
    public function update(Post $post, Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'tags' => 'required',
            'category_id' => 'required',
            'excerpt' => 'required',
        ]);
        $post->title = $request->get('title');
        $post->url = Str::slug($request->get('title'));
        $post->body = $request->get('body');
        $post->excerpt = $request->get('excerpt');
        $post->published_at = Carbon::parse($request->get('published_at'));
        $post->category_id = $request->get('category_id');
        $post->save();
        $post->tags()->sync($request->get('tags'));
        return  redirect()->route('admin.posts.edit', $post)->with('flash', 'Tu publicacion fue creada');
    }
}
