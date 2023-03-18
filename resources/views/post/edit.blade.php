@extends('layouts.app')

@section('title') Edit @endsection

@section('content')
<form action="{{ route('posts.index') }}" method="POST">
@csrf
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control" id="title" value="{{$post['title']}}">
  </div>
  <div class="mb-3" style="height: 7rem;">
    <label for="discription" class="form-label">Discription</label>
    <input type="text" class="form-control h-75" id="discription" value="{{$post['discription']}}">
  </div>
  <div class="mb-3">
    <label for="PostCreator" class="form-label">Post Creator</label>
    <input type="text" class="form-control" id="PostCreator" value="{{$post['posted_by']}}">
  </div>
  <button type="submit" class="btn btn-primary" value="">Edit</button>
</form>

@endsection
