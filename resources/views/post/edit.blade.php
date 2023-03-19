@extends('layouts.app')

@section('title') Edit @endsection

@section('content')
<form action="{{ route('posts.update', $post['id']) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Title</label>
        <input name="title" type="text" class="form-control" id="exampleFormControlInput1" value="{{$post['title']}}">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$post['description']}}</textarea>
    </div>

    <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Post Creator</label>
            <select name="post_creator" class="form-control">
                @foreach($users as $user)
                    @if($post->User && $user->name == $post->User->name)
                        <option value="{{$user->id}}" selected>{{$user->name ?? "NOT FOUND"}}</option>
                    @else
                        <option value="{{$user->id}}">{{$user->name ?? "NOT FOUND"}}</option>
                    @endif
                @endforeach
            </select>
        </div>
    <button type="submit" class="btn btn-success" value="">Edit</button>
</form>

@endsection
