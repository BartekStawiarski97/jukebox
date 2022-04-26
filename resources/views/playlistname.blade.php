@extends('master')

@section('title', 'Home')

@section('content')
  
        <form class="col-8 card mt-5" style="margin-left: 300px" method="post" action="{{ url('/playlist/newname') }}">
        {{ csrf_field() }}
            <h1 class="h1style" style="margin-left: 150px" for="playlistname">New playlist name</h1>
            <input class="input form-control" type="text" id="playlistname" name="playlistname" value="{{ $name[0]->name }}" placeholder="New playlist name"><br>
            <input type="hidden" id="playlist_id" name="playlist_id" value="{{ $playlist_id }}"><br>
        <input class="btn btn-secondary mb-3" type="submit" value="Change">
        </form>
@endsection