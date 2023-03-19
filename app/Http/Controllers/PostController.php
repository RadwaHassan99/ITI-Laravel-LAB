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
        $allPosts = Post::paginate(3);
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
        return redirect()->route('posts.index');
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
    /*
    public function storeComment(Request $request)
{
    $comment = new Comment;
    $comment->body = $request->body;
    $comment->commentable_id = $request->commentable_id;
    $comment->commentable_type = $request->commentable_type;
    $comment->save();
    return back();
}*/


}
