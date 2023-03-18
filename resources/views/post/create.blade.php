@extends('layouts.app')
@extends('components.button')

@section('title') Create @endsection

@section('content')

<form action="{{ route('posts.store') }}" method="POST">
  @csrf
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control" id="title" name="title" required>
  </div>
  <div class="mb-3" style="height: 7rem;">
    <label for="discription" class="form-label">Discription</label>
    <input type="text" class="form-control h-75" id="discription"  name="discription" required>
  </div>
  <div class="mb-3">
    <label for="PostCreator" class="form-label">Post Creator</label>
    <input type="text" class="form-control" id="PostCreator"  name="PostCreator" required>
  </div>
  <button type="submit" class="btn btn-primary">Create</button>

</form>

@endsection


