@extends('layouts.app')

@section('title') Edit @endsection

@section('content')
<form action="{{ route('posts.store') }}" method="POST">
    @csrf
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
            <option value="1">A</option>
            <option value="2">B</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success" value="">Edit</button>
</form>

@endsection
