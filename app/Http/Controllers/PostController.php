<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Récupérer les posts avec pagination
        $posts = Post::latest()->paginate(10);
        return view('timeline.index', compact('posts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required|max:180',
        ]);

        $post = new Post();
        $post->body = $request->body;
        $post->user_id = Auth::id();
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }
}
