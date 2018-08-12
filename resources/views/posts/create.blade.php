@extends('layouts.app')
@section('title', 'Create Post')
@section('content')
<h1>Create Post</h1>
<hr>
    <form action="{{ route('posts.store') }}" method="POST" >
        @csrf()
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
        <div class="form-group">
            <div class="col-md">
                <label for="hashtags">Select Hashtag</label>
                <select name="hashtag_id[]" id="hastags" class="form-control" multiple="multiple">
                    @if($hashtags)
                        @foreach($hashtags as $hashtag)
                            <option value="{{$hashtag->id}}">{{$hashtag->name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
        <div class="col-md-7">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection


@push('javascript')
<script type="text/javascript">
        $(document).ready(function(){
            $('#hastags').select2({
                tags: true,
            });
        });
    </script>
@endpush