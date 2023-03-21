@extends('layouts.app')
@section('title') Index @endsection
@section('content')

<div class="mb-3">
    <x-button type="success">Create Post</x-button>
</div>

<table class="table mt-4">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Posted By</th>
            <th scope="col">Created At</th>
            <th scope="col">Image Path</th>
        </tr>
    </thead>
    <tbody>

        @foreach($posts as $post)
        <tr class="post-row">
            <td>{{$post['id']}}</td>
            <td>{{$post['slug']}}</td>
            <td>{{$post->User->name ?? "Not Found"}}</td>
            <td>{{{$post->human_readable_date}}}</td>
            <td>{{$post['image_path']}}</td>
            <td>
                @if($post->deleted_at)
                <form action="{{route('posts.restore', $post->id) }}" method="POST" style="display: inline-block;">
                    @method('PATCH')
                    @csrf
                    <button type="submit" class="btn btn-success">Restore</button>
                </form>

                @else
                <x-button type="primary" :post-id="$post->id">View</x-button>
                <x-button type="secondary" :post-id="$post->id">Edit</x-button>
                <form method="POST" action="{{ route('posts.destroy', $post->id) }}" style="display: inline-block;" onsubmit="return confirm('Are you sure you want to delete this post?')">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger" value="">Delete</button>
                </form>
                @endif

            </td>

        </tr>
        @endforeach
    </tbody>
</table>
{{ $posts->links('pagination::bootstrap-5') }}
@endsection
