@extends('layouts.app')
@section('title', 'Search')

@section('content')

<form action="{{ route('tags.search') }}" method="POST" >
    @csrf()
    <div class="input-group col-md-8" style="margin: auto;">
        <select name="search[]" id="search" class="form-control" multiple="multiple">
            @if($hashtags)
                @foreach($hashtags as $hashtag)
                    @if(isset($selectedTags))
                        @if(in_array($hashtag->id, $selectedTags))
                            <option value="{{$hashtag->id}}" selected>{{$hashtag->name}}</option>
                        @else
                            <option value="{{$hashtag->id}}">{{$hashtag->name}}</option>
                        @endif
                    @else
                        <option value="{{$hashtag->id}}">{{$hashtag->name}}</option>
                    @endif
                @endforeach
            @endif
        </select>
        <span class="input-group-append">
            <button class="btn btn-outline-primary" type="submit" style="border-color: #aaa;">
                <i class="fa fa-search"></i>
            </button>
        </span>
    </div>
</form>

<hr>
@include('posts.displayPosts')

@endsection

@push('javascript')
<script type="text/javascript">
        $(document).ready(function(){
            $('#search').select2({
            });
        });
    </script>
@endpush