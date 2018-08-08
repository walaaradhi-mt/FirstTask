
@extends('layouts.app')
<head>
    <title>List of Users</title>
</head>
@section('content')
<h1>List of Users</h1>
<hr>

@if(count($users))
    @foreach($users as $user)
        <div>
            <img src="https://cdn.onlinewebfonts.com/svg/img_191958.png" width="50px">
            <h3 style="display:inline; vertical-align: middle; margin-left:10px"><a href="/profile/{{$user->id}}">{{$user->name}}</a></h3>
            <hr>
        </div>
    @endforeach
    <div>{{$users->links()}}</div>
@else
    <h3><div class="title">No Users Found.</div></h3>
@endif
@endsection
