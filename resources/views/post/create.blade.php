@extends('layouts.app')

@section('title') Create @endsection

@section('content')
<form action="{{ route('posts.index') }}" method="GET">
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control" id="title">
  </div>
  <div class="mb-3" style="height: 7rem;">
    <label for="discription" class="form-label">Discription</label>
    <input type="text" class="form-control h-75" id="discription">
  </div>
  <div class="mb-3">
    <label for="PostCreator" class="form-label">Post Creator</label>
    <input type="text" class="form-control" id="PostCreator">
  </div>
  <button type="submit" class="btn btn-primary">Create</button>
</form>

@endsection


