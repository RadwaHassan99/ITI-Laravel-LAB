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
            <th scope="col">Tags</th>
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
                @foreach ($post->tags as $tag)
                <span style="list-style-type:none">{{ $tag->name }},</span>
                @endforeach
            </td>

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
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{$post->id}}">Delete</button>
                @endif

            </td>
            <div class="modal fade" id="deleteModal{{$post->id}}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Delete Item?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this post?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <form method="POST" action="{{ route('posts.destroy', $post->id) }}" style="display: inline-block;">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $posts->links('pagination::bootstrap-5') }}
@endsection
