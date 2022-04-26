@extends('navbar')

@section('title', 'Home')

@section('content')
	


    @if(Auth::user())

    
        <div id="showyourplaylists" style="display: none;">
            @foreach(Auth::user()->playlists as $playlist)
                <section>
                    <div class="col-5" style="margin-left:520px">
                        <h2 class="h1style"><a class="text-white" href="/playlistdetail/{{$playlist->id}}">{{$playlist->name}}</a></h2>
                    </div>
                    <div class="row mt-3" style="margin-left:380px">
                        <a class="col-4 p-1 btn btn-secondary" href="/playlist/playlistname/{{ $playlist->id }}">Change Playlist Name</a>
                        <a class="col-4 p-1 btn btn-danger" href="/playlist/delete/{{ $playlist->id }}">Delete Playlist</a>
                    </div>
               <hr style="margin-left: 120px">
              </section>
            @endforeach
          </div>      	
      <script>
        function myFunction() {
            var x = document.getElementById("showyourplaylists");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        } 
       </script>
    @endif

	<div class="col-7 mt-4" style="margin-left:300px">
		<h2 class="h1style">Create your playlist below:</h2> 
        <!-- Error message -->
        @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block col-12 mx-auto">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong> {{ $message }} </strong>
        </div>
        @endif
        @if(count($errors) > 0)
            <div class="alert alert-danger col-12 mx-auto">
                <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
                </ul>
            </div>
        @endif
	</div>
    <div class="col-3" style="margin-left:500px">
        <form method="post" action="{{ url('/playlist/create') }}">
        {{ csrf_field() }}
            <input class="form-control" type="text" id="playlistname" name="playlistname" value="" placeholder="Playlist name"><br>\
        </div>
            <div class="col-5 mx-auto">
            <section>
                @foreach($songs as $song)           
                    <div class="homestyle">
                        <label class="col-12" for="check{{ $song->id }}">                  
                                <img src="{{$song->img}}" class="songimage">
                                <h3>{{ $song->artist }} </h3>
                                <p>{{ $song->songname }}</p>
                                <hr> 
                                <p>{{$song->duration}}</p>
                                <p>{{ $song->genre }}</p>
                                <input class="mt-2" type="checkbox" name="{{ $song->id }}" value="{{ $song->id }}" id="check{{ $song->id }}">                               
                        </label>
                    </div>          
               @endforeach	
            </section>
        <input class="btn btn-secondary" type="submit" value="Create Playlist">
        </form>
    </div>
    

@endsection