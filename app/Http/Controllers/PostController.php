<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $allPosts = Post::all(); //select * from posts
        return view('post.index', ['posts' => $allPosts]);
    }

    public function show($id)
    {
        $post = Post::where('id', $id)->first(); //Post model object ... select * from posts where id = 1 limit 1;
        return view('post.show', ['post' => $post]);
    }
    public function create()
    {
        $users = User::all();
        return view('post.create', ['users' => $users]);
    }

    public function edit()
    {
        $post =  [
            'id' => "3",
            'title' => 'Laravel',
            'post_creator' => 'Radwa',
            'description' => 'Laravel is a framework based on PHP'
        ];
        return view('post.edit', ['post' => $post]);
    }
    public function store(Request $request)
    {
        $title = request()->title;
        $description = request()->description;
        $postCreator = request()->post_creator;
        Post::create([
            'title' => $title,
            'description' => $description,
            'user_id' => $postCreator,
        ]);

        return redirect()->route('posts.index');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index');
    }
}
