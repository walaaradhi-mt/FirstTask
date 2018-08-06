
@extends('layouts.app')
<head>
    <title>My Posts</title>
</head>
@section('content')
<h1>Posts</h1>
<hr>

@if(count($posts))
    @foreach($posts as $post)
        <div class="well">
            <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
            <small>Written on: {{$post->created_at}}</small>
            <hr>
        </div>
    @endforeach
    <div>{{$posts->links()}}</div>
@else
    <h3><div class="title">No Posts Found.</div></h3>
@endif
@endsection
