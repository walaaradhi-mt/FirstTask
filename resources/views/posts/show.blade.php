
@extends('layouts.app')
<head>
    <title>{{$post->title}}</title>
</head>
@section('content')
<a href="/posts" class="btn btn-light">View All Posts</a>
<h1>{{$post->title}}</h1>
<small>Written on: {{$post->created_at}}</small>
<hr>

<div >{{$post->body}}</div>
@endsection