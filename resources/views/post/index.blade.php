@extends('layouts.app')


@section('title') Index @endsection

@section('content')
<div class="text-center">
    <x-button type="success">Create Post</x-button>
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
            <td>{{$post->User->name ?? "Not Found"}}</td>
            <td>{{$post['created_at']}}</td>
            <td>
                <x-button type="primary" :route-param="$post['id']">View</x-button>
                <x-button type="secondary" :route-param="$post['id']">Edit</x-button>

                <form method="POST" action="{{route('posts.destroy',$post->id)}}" style="display: inline-block;" onsubmit="return confirm('Are you sure you want to delete this post?')">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger" value="">Delete</button>
                </form>


            </td>
        </tr>
        @endforeach
        {{ $posts->links('pagination::bootstrap-5') }}


    </tbody>
</table>

@endsection
