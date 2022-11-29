@extends('layouts.nav')
@section('content')
<h1 class="text-center m-3"> Postingan</h1>
<div class="row">
    @foreach($data as $view)
    <div class="col">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h3 class="card-title">{{$view->judul}}</h3>
              <p class="card-text">{{$view->isi}}</p>
              <a href="{{url('detail/'.$view->id)}}" class="btn btn-primary">Read more</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection