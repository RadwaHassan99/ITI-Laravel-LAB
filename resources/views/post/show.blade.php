@extends('layouts.app')

@section('title') Show @endsection

@section('content')
    <div class="card" style="margin-top: 10px;">
        <div class="card-header">
            Post Info
        </div>
        <div class="card-body">
            <h5 class="card-title">Title: {{$post['title']}}</h5>
            <p class="card-text">Description: {{$post['description']}}</p>
            <p class="card-text">Post Creator: {{$post->User->name ?? "Not Found"}}</p>
            <p class="card-text">Created at: {{$post['created_at']}}</p>
        </div>
    </div>
@endsection
