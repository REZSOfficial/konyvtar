@extends('layout')
@section('content')
@include('inc.navbar')

<div id="content">
  <div class="container d-flex flex-row flex-wrap flex-parent">
    @foreach ($books as $book)
    <div class="card m-4 flex-child hover" style="width: 18rem;">
        <img onclick="routeToInfo({{$book->id}})" class="card-img-top" src="{{ asset('images/'.$book->image) }}" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">{{$book->title}}</h5>
          <h6 class="card-title">{{$book->tags}}</h5>
          <div class="d-flex flex-row mt-2 buttons">
            <a onclick="routeToInfo({{$book->id}})" class="btn btn-secondary mx-1">Adatok</a>
            <form method="POST" action="/delete/{{$book->id}}">
              @csrf
              @method('DELETE')
              <button onclick="return confirm('Biztosan törlni szeretnéd?')" class="btn btn-danger mx-1">Törlés</button>
              </form>
          </div>
        </div>
      </div>
    @endforeach
</div>
</div>
<div class="fixedbutton"><a class="addBtn" href="/create">+</a></div>

@endsection