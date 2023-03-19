@extends('layouts.app')

@section('title') Show @endsection

@section('content')
<div class="card" style="margin-top: 10px;">
    <div class="card-header">
        Post Info
    </div>
    <div class="card-body">
        <h5 class="card-title">Title: {{$post['title']}}</h5>
        <p class="card-text">Description: {{$post['description']}}</p>
        <p class="card-text">Post Creator: {{$post->User->name ?? "Not Found"}}</p>
        <p class="card-text">Created at: {{$post['created_at']}}</p>
    </div>
</div>


@foreach($post->comments as $comment)
<div class="card" style="margin-top: 10px;">
    <div class="card-header">
        Comment:
    </div>
    <div class="card-body">
        <p class="card-text">{{$comment->body}}</p>
        <p class="card-text">Created at: {{$comment->created_at}}</p>
    </div>
</div>
@endforeach




<div class="card" style="margin-top: 10px;">
    <div class="card-header">
        Insert Comment
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('comments.store') }}">
            @csrf
            <div class="form-group">
                <label for="body">Comment</label>
                <textarea class="form-control" id="body" name="body" rows="3"></textarea>
            </div>
            <input type="hidden" name="commentable_id" value="{{ $post->id }}">
            <input type="hidden" name="commentable_type" value="App\Models\Post">
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
</div>
@endsection
