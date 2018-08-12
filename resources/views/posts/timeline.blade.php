@extends('layouts.app')
@section('title', 'Timeline')
@section('content')
<h1 style="text-align: center">Timeline</h1>
<hr>
<br><br>
@include('posts.displayPosts')
@endsection