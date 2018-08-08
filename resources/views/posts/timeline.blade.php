@extends('layouts.app')
<head>
    <title>Timeline</title>
</head>
@section('content')
<h1 style="text-align: center">Timeline</h1>
<hr>
<br><br>
@if(count($posts))
    @foreach($posts as $post)
        <div class="well">
            <h3>{{$post->title}}</a></h3>
            <small>Written on: {{$post->created_at}}</small>
            @if($post->user->id == Auth::id())
                <small>Posted by: <a href="posts">{{$post->user->name}}</a></small>
            @else
                <small>Posted by: <a href="profile/{{$post->user->id}}">{{$post->user->name}}</a></small>
            @endif
            <h5>{{ str_limit(strip_tags($post->body), 150) }}</h5>
            @if (strlen(strip_tags($post->body)) > 150)
              <a href="/posts/{{$post->id}}">Read More</a>
            @endif
            <hr>
        </div>
    @endforeach
    <div>{{$posts->links()}}</div>
@else
    <h3><div class="title">No Posts Found.</div></h3>
@endif
@endsection
