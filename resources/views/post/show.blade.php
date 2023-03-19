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
        </div>
    </div>
@endsection
