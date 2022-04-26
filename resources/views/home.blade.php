@extends('homepage')

@section('title', 'Home')

@section('navbar')
    @parent

@stop

@section('content')

<div class="col-12">
  <div class="row d-flex justify-content-between">
     @foreach($songs as $key => $data)
       <div class="col-5">
        <div class="homestyle">
          <img src={{$data->img}}>
          <h3><th>{{$data->artist}}</th></h3>
          <p><th>{{$data->songname}}</th></p>
          <hr>
          <p><th>{{$data->duration}}</th></p>
          <p><th>{{$data->genre}}</th></p>
          <a href="/queue/add/{{$data->id}}" role="button">Add to queue</a>
       </div>
      </div>
    @endforeach
   </div>
</div>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

@stop
