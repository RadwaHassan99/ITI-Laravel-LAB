@extends('layouts.app')

@section('title') Edit @endsection

@section('content')
<form action="{{ route('posts.update', $post['id']) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Title</label>
        <input name="title" type="text" class="form-control" id="exampleFormControlInput1" value="{{$post['title']}}">
        @if ($errors->has('title'))
        <div class="alert alert-danger">{{ $errors->first('title') }}</div>
        @endif
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$post['description']}}</textarea>
        @if ($errors->has('description'))
        <div class="alert alert-danger">{{ $errors->first('description') }}</div>
        @endif
    </div>

    <div class="mb-3">
        <label for="exampleFormControlInput3" class="form-label">Post Creator</label>
        <select name="post_creator" class="form-control" id="exampleFormControlInput3">
            @foreach($users as $user)
            @if($post->User && $user->name == $post->User->name)
            <option value="{{$user->id}}" selected>{{$user->name ?? "NOT FOUND"}}</option>
            @else
            <option value="{{$user->id}}">{{$user->name ?? "NOT FOUND"}}</option>
            @endif
            @endforeach
        </select>
        @if ($errors->has('user_id'))
        <div class="alert alert-danger">{{ $errors->first('user_id') }}</div>
        @endif
    </div>

    <div class="mb-3">
        <label for="exampleFormControlInput4" class="form-label">Image</label>
        <input type="file" name="image" class="form-control" id="exampleFormControlInput4">
        @if ($errors->has('image'))
        <div class="alert alert-danger">{{ $errors->first('image') }}</div>
        @endif
    </div>


    <button type="submit" class="btn btn-success" value="">Edit</button>
</form>

@endsection
