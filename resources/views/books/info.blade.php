@extends('layout')
@section('content')
<div class="m-4 d-flex flex-lg-row flex-md-column flex-sm-column book-info-container">
    <img src="{{ asset('images/puccs.png') }}" alt="Cover">
    <form action="/edit/{{$book->id}}" method="POST">
      @csrf
      @method('PUT')
    <div class="text-sm-inline book-info">
        <input onclick="enableBtn()" name="title" size="64" class="title" id="title" type="text" value="{{$book->title}}">
        <input onclick="enableBtn()" name="pages" size="64" class="pages" id="pages" type="number" value="{{$book->pages}}">
        <textarea onclick="enableBtn()" name="description" rows="9" size="255" class="description" id="description" type="text">{{$book->description}}</textarea>
        <input onclick="enableBtn()" name="tags" size="64" class="tags" id="tags" type="text" value="{{$book->tags}}">
      </div>
      <button type="submit" id="saveBtn" class="disabled btn btn-secondary">Mentés</button>
    </form>
</div>
@endsection


  