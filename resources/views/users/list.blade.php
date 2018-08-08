@extends('layouts.app')
<head>
    <title>List of Following</title>
</head>
@section('content')
<h1>List of Following</h1>
<hr>

@if(count($list))
    @foreach($list as $user)
        <div>
            <img src="https://cdn.onlinewebfonts.com/svg/img_191958.png" width="50px">
            <h3 style="display:inline; vertical-align: middle; margin-left:10px"><a href="/profile/{{$user->user_following->id}}">{{$user->user_following->name}}</a></h3>
            <hr>
        </div>
    @endforeach
    <div>{{$list->links()}}</div>
@else
    <h3><div class="title">You do not follow anyone.</div></h3>
@endif
@endsection
