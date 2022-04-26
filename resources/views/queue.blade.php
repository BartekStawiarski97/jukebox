@extends('master')

@section('title', 'Queue')

@section('content')


<div class="col-7 mt-2" style="margin-left:470px">
  <h2 class="h1style">Your queue:</h2> 
</div>

@if($queue != null)
<div class="col-7 mt-1" style="margin-left:350px">
  <h3 class="text-white">Total queue length: {{$queueTime['minute']. ' minutes and ' . $queueTime['second']. ' seconds'}}</h3>
</div>
@endif

<div class="col-12">
    <div class="row d-flex justify-content-between">
      @if($queue != null)
        @foreach($queue as $key => $song)
        <div class="col-5">
            <div class="homestyle">
				<img src="{{$song->img}}" class="songimage">
                <h3>{{ $song->artist }} </h3>
                <p>{{ $song->songname }}</p>
                <hr> 
                <p>{{$song->duration}}</p>
                <p>{{ $song->genre }}</p>
				<a href="/queue/delete/{{$key}}">Remove from queue</a>
			   </div>
			  </div>
		     @endforeach	
		   <div class="col-12">
              <a class="btn btn-success" href="/playlist/save">Save as playlist</a>
			  <a class="btn btn-danger" href="/queue/clear">Clear queue</a>				
			 </div>
		@endif 
        @if($queue == null)
           <div class="alert alert-secondary alert-block col-7 mt-5" style="margin-left: 330px">
              <button type="button" class="close" data-dismiss="alert">x</button>
              <strong>Queue is empty</strong><br>
              <strong>Add songs to your queue page <a href="/">here</a> </strong>
             </div>
        @endif
		
	</div>


@endsection