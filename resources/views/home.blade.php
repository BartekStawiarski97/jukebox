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

          <a class="btn" style="margin-left:280px" href="/queue/add/{{$data->id}}" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
          </svg></a>
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

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

@stop
