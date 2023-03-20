<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{

    public function store(Request $request)
    {
        $comment = new Comment;
        $comment->body = $request->body;
        $comment->commentable_id = $request->commentable_id;
        $comment->commentable_type = $request->commentable_type;
        $comment->save();
        return back()->with('success','comment added successfully!');;
    }

    public function update(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->body = $request->body;
        $comment->save();
        return back()->with('success','comment updated successfully!');;
    }


    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return back()->with('success','comment deleted successfully!');;
    }
}
