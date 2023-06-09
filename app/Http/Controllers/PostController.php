<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Storage;
use App\Jobs\PruneOldPostsJob;




class PostController extends Controller
{
    public function index()
    {
        $allPosts = Post::withTrashed()->paginate(10);
        return view('post.index', ['posts' => $allPosts]);
    }

    public function show($post)
    {
        $post = Post::where('id', $post)->first(); //Post model object ... select * from posts where id = 1 limit 1;
        return view('post.show', ['post' => $post]);
    }

    public function create()
    {
        $users = User::all();
        return view('post.create', ['users' => $users]);
    }

    public function edit($post)
    {
        $post = Post::where('id', $post)->first(); //Post model object ... select * from posts where id = 1 limit 1;
        $users = User::all();
        return view('post.edit', ['post' => $post, 'users' => $users]);
    }

    public function store(StorePostRequest $request)
    {
        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->post_creator,
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->storeAs('public/posts', $image->getClientOriginalName());
            $post->image_path = $path;
        }


        $post->save();
        $post->syncTags(explode(',', $request->input('tags')));
        return redirect()->route('posts.index')->with('success', 'posts added successfully!');
    }

    public function destroy($post)
    {
        $post = Post::findOrFail($post);
        if ($post->image && Storage::exists($post->image)) {
            Storage::delete($post->image);
        }
        $post->delete();
        return back()->with('success', 'post deleted successfully!');
    }

    public function update($post, StorePostRequest $request)
    {
        $post = Post::findOrFail($post);

        if ($request->hasFile('image')) {
            if ($post->image_path) {
                Storage::delete($post->image_path);
            }
                $image = $request->file('image');
                $path = $image->storeAs('public/posts', $image->getClientOriginalName());
                $post->image_path = $path;
        }

        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->post_creator,
        ]);
        $post->refreshSlug();

        return redirect()->route('posts.index')->with('success', 'post updated successfully!');
    }


    public function restore($post)
    {
        $post = Post::withTrashed()->findOrFail($post);
        $post->restore();
        return back()->with('success', 'post restored successfully!');
    }


    public function pruneOldPosts()
    {
        PruneOldPostsJob::dispatch();
        return "Old posts pruning job dispatched!";
    }
}
