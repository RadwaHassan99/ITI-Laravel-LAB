@php
use App\View\Components\Button;
@endphp

@extends('layouts.app')


@section('title') Index @endsection

@section('content')
<div class="text-center">
    <a class="mt-4 btn btn-success" href="{{route('posts.create')}}">Create Post</a>
</div>
<table class="table mt-4">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Posted By</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>

        @foreach($posts as $post)
        <tr>
            <td>{{$post['id']}}</td>
            <td>{{$post['title']}}</td>
            <td>{{$post['posted_by']}}</td>
            <td>{{$post['created_at']}}</td>
            <td>
                <x-button type="primary" :route-param="$post['id']">View</x-button>
                <x-button type="secondary">Edit</x-button>
                <x-button type="danger">Delete</x-button>
            </td>
        </tr>
        @endforeach



    </tbody>
</table>

@endsection
