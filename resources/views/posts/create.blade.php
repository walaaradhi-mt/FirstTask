@extends('layouts.app')
<head>
    <title>Create Post</title>
</head>
@section('content')
<h1>Create Post</h1>
<hr>

    <form action="{{ route('posts.store') }}" method="POST" >
        @csrf()
        {{--  <form action="" method="POST" >  --}}
        <div class="form-group">
            <div class="col-md">
                <label for="Title">Title</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md">
                <label for="Body">Body</label>
                <textarea class="form-control" id="body" name="body" rows="5"></textarea>
            </div>
        </div>
        <div class="col-md-7">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
