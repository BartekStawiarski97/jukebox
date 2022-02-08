@extends('master')

@section('title', 'Home')

@section('content')

    @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block col-7 mx-auto">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong> {{ $message }} </strong>
        </div>
    @endif
    @if(count($errors) > 0)
        <div class="alert alert-danger col-7 mx-auto">
            <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
            </ul>
        </div>
    @endif
  
        <form class="col-8 card mt-5" style="margin-left: 300px" method="post" action="{{ url('/playlist/newname') }}">
        {{ csrf_field() }}
            <h1 class="h1style" style="margin-left: 150px" for="playlistname">New playlist name</h1>
            <input class="input form-control" type="text" id="playlistname" name="playlistname" value="{{ $name[0]->name }}" placeholder="New pglaylist name"><br>
            <input type="hidden" id="playlistid" name="playlistid" value="{{ $playlistid }}"><br>
        <input class="btn btn-secondary mb-3" type="submit" value="Change">
        </form>
@endsection