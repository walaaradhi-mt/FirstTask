@extends('layouts.app')
@section('title', 'My Profile')

@section('content')
<div style="text-align:center">
        <img src="https://cdn.onlinewebfonts.com/svg/img_191958.png" width="100px">
    <h3><b>{{$userDetails->name}}</b></h3>
    <h6>{{$userDetails->email}}</h6>
    <small>Joined date: {{date('M Y', strtotime($userDetails->created_at))}}</small>
    @if(isset($id))
        @if($id != Auth::id())
            @if($isFollowing)
                <form method="POST" action="{{ route('follow.destroy', $id) }}">
                    {!! method_field('delete') !!}
            @else
                <form method="POST" action="{{ route('follow.store') }}">
            @endif
            @csrf()
            <div class="form-group">
                <div class="col-md">
                    <input type="hidden" value="{{$id}}" id="following_id" name="following_id">
                    @if($isFollowing)
                        <input type="submit" class="btn btn-info" value="Unfollow">
                    @else
                        <input type="submit" class="btn btn-light" value="Follow">
                    @endif
                </div>
            </div>
        </form>
            
        @endif
    @endif
    <hr>
    <h1>Posts</h1>
    <br><br>
</div>


@if(count($posts))
    @foreach($posts as $post)
        <div class="well">
            <h3>{{$post->title}}</h3>
            <small>Written on: {{$post->created_at}}</small>
            <h5>{{str_limit(strip_tags($post->body), 150) }}</h5>
            @if (strlen(strip_tags($post->body)) > 150)
              <a href="/posts/{{$post->id}}">Read More</a>
            @endif
            @if(count($post->tags()))
                <br>
                <small>
                @foreach($post->tags as $tag)
                    <a href ="/tag/{{$tag->id}}">{{'#'.$tag->name.' '}}</a>
                @endforeach
                </small>
            @endif
                
            <hr>
        </div>
    @endforeach
    <div>{{$posts->links()}}</div>
@else
    <h3><div class="title">No Posts Found.</div></h3>
@endif
@endsection
