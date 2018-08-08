@if(count($errors))
    @if(!$errors->get('email'))
    <div class="alert alert-danger">
        <strong>Whoops! There were some problems with your input:</strong><br>
        @foreach($errors->all() as $error)
            {{$error}}<br>
        
        @endforeach
    </div>
    @endif
@endif

@if(session('error'))
        <div class="alert alert-danger">
            {{session('error')}}
        </div>
@endif

@if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
@endif