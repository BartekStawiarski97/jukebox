@extends('navbar')

@section('title', 'Home')

@section('content')
	


    @if(Auth::user())

    
                <section>
                    <div class="col-12">
                        <h2 class="h1style">{{ $playlist->name }}</h2>
                        <hr>
                    </div>
                    <div class="col-12">
                        <h5 class="text-white mt-3">Playlist duration: {{$playlistTime['minute']. ' minutes and ' . $playlistTime['second']. ' seconds'}}</h5>
                    </div>
                   
                    <div class="col-12">
                      <div class="row d-flex justify-content-between">
                        @foreach($playlist->songs as $song)                        
                             <div class="col-5">
                              <div class="homestyle">
                                <img src="{{$song->img}}" class="songimage">
                                <h3>{{ $song->artist }} </h3>
                                <p>{{ $song->songname }}</p>
                                <hr> 
                                <p>{{$song->duration}}</p>
                                <p>{{ $song->genre }}</p>
                                <a class="col-3 btn btn-danger" href="/playlist/deletesong/{{ $playlist->id }}/{{$song->id }}">Remove Song</a>                                                   
                            </div>
                           </div>       
                        @endforeach
                    </div>
                </div>
               <hr style="margin-left: 120px">
              </section>  	
             @endif
    
         <div class="col-12">
            <h2 class="h1style" style="margin-left:200px">Add more songs to your playlist below:</h2>
        </div>
        <div class="col-12">
            <div class="row d-flex justify-content-between">
             @foreach($songs as $song)
                 <div class="col-5">
                     <div class="homestyle">
                      <label class="col-12" for="check{{ $song->id }}">							
                        <img src="{{$song->img}}" class="songimage">
                        <h3>{{ $song->artist }} </h3>
                        <p>{{ $song->songname }}</p>
                        <hr> 
                        <p>{{$song->duration}}</p>
                        <p>{{ $song->genre }}</p>
                        <a class="btn btn-success mt-2" href="/playlist/addsong/{{$playlist->id}}/{{$song->id}} ">Add this song</a>	
                     </label>
                    </div> 
                 </div>               
             @endforeach
            </div>
        </div>
@endsection