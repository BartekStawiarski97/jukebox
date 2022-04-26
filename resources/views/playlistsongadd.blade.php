@extends('master')

@section('title', 'Home')

@section('content')
     <form method="post" action="{{ url('/playlist/addsongtop') }}">
        {{ csrf_field() }}
		<input type="hidden" name="playlist_id" value="{{ $playlist_id }}" id="playlist_id">
            <section>
			    <div class="col-12">
				<div class="row d-flex justify-content-between">
                     @foreach($songs as $song)
				        <div class="col-5">
				        <div class="homestyle">
					      @foreach($pickedsongs as $picked)	
						   @if( $song->id == $picked)
						   <label style="display:none">
						   @endif
					      @endforeach
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
							</div>               
                           @endforeach	
						 </div>
					    </div>
                       </section>		
                      <input class="btn btn-secondary" type="submit" value="Add">
                     </form>		
                    @endsection