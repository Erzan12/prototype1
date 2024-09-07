<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all(); // fetch all posts
        return view('posts.index', compact('posts'));
    }
    
    public function create()
    {
        return view('posts.create'); // show form to create a post
    }

    public function store(Request $request)
    {
        // Validate the request (optional)
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        // Create a new post excluding the _token field
        Post::create($request->except('_token'));

        // Redirect or return a response
        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    public function edit(Post $post)
    {
        return view ('posts.edit',compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        // Validate the updated data
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
        // update the post
        $post->update($request->except(['_token', '_method']));

        return redirect()->route('posts.index')->with('success', 'Post updated successfully');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
    }
}
