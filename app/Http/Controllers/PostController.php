<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;


class PostController extends Controller
{
    public function index()
    {
        $allPosts = Post::withTrashed()->paginate(3);
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

    public function edit($id)
    {
        $post = Post::where('id', $id)->first(); //Post model object ... select * from posts where id = 1 limit 1;
        $users = User::all();
        return view('post.edit', ['post' => $post, 'users' => $users]);
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
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
    }

    public function update($id, Request $request)
    {
        $post = Post::findOrFail($id);
        $post->title = request()->title;
        $post->description = request()->description;
        $post->user_id = request()->post_creator;
        $post->save();
        return redirect()->route('posts.index');
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->findOrFail($id);
        $post->restore();

        return redirect()->route('posts.index')->with('success', 'Post restored successfully');
    }


}
