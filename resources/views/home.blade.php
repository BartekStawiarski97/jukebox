@extends('master')

@section('title', 'Home')

@section('navbar')
    @parent

@stop

@section('content')

<div class="float-righ">
 <div class="dropdown mt-5">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Sort by genre
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <a class="dropdown-item" href="#">View all</a>
      <hr class="hrstyle">
      <a class="dropdown-item" href="#">Hip-Hop</a>
      <a class="dropdown-item" href="#">Pop</a>
      <a class="dropdown-item" href="#">Rock</a>
      <a class="dropdown-item" href="#">Jazz</a>
      <a class="dropdown-item" href="#">Dance</a>
    </div>
  </div>
</div>

<div class="col-12">
  <div class="row d-flex justify-content-between">
     @foreach($song as $key => $data)
       <div class="col-5">
        <div class="homestyle">
          <img src={{$data->img}}>
          <h3><th>{{$data->artist}}</th></h3>
          <p><th>{{$data->songname}}</th></p>
          <hr>
          <p><th>{{$data->duration}}</th></p>
          <p><th>{{$data->genre}}</th></p>
       </div>
      </div>
    @endforeach
   </div>
</div>
@stop
