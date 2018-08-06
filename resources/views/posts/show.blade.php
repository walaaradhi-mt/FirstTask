
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

{{--  @if(count($posts) > 1)
    @foreach($posts as $post)
        <div class="well">
            <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
            <small>Written on: {{$post->created_at}}</small>
            <hr>
        </div>
    @endforeach
@else
    <h3><div class="title">No Posts Found.</div></h3>
@endif  --}}
@endsection