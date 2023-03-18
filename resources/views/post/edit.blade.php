@extends('layouts.app')

@section('title') Edit @endsection

@section('content')
<form action="{{ route('posts.store') }}" method="POST">
@csrf
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control" id="title" name="title" value="{{$post['title']}}" >
  </div>
  <div class="mb-3" style="height: 7rem;">
    <label for="description" class="form-label">Description</label>
    <input type="text" class="form-control h-75" id="description" name="description" value="{{$post['description']}}">
</div>

  <div class="mb-3">
    <label for="PostCreator" class="form-label">Post Creator</label>
    <input type="text" class="form-control" id="PostCreator" name="PostCreator" value="{{$post['posted_by']}}">
  </div>
  <button type="submit" class="btn btn-primary" value="">Edit</button>
</form>

@endsection
