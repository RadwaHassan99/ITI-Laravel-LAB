@extends('layouts.app')
@extends('components.button')

@section('title') Create @endsection

@section('content')

<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Title</label>
        <input name="title" type="text" class="form-control" id="exampleFormControlInput1">
        @if ($errors->has('title'))
        <div class="alert alert-danger">{{ $errors->first('title') }}</div>
        @endif
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        @if ($errors->has('description'))
        <div class="alert alert-danger">{{ $errors->first('description') }}</div>
        @endif
    </div>

    <div class="mb-3">
        <label for="exampleFormControlInput3" class="form-label">Post Creator</label>
        <select name="post_creator" class="form-control" id="exampleFormControlInput3">
            <option value="" disabled selected hidden></option>
            @foreach($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>
        @if ($errors->has('post_creator'))
        <div class="alert alert-danger">{{ $errors->first('post_creator') }}</div>
        @endif
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput4" class="form-label">Image</label>
        <input type="file" name="image" class="form-control" id="exampleFormControlInput4">
        @if ($errors->has('image'))
        <div class="alert alert-danger">{{ $errors->first('image') }}</div>
        @endif
    </div>

    <div class="mb-3">
        <label for="exampleFormControlInput5" class="form-label">Tags</label>
        <input name="tags" type="text" class="form-control" id="exampleFormControlInput5">
    </div>

    <button type="submit" class="btn btn-success">Create</button>

</form>

@endsection
