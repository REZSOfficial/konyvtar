@extends('layout')
@section('content')
<div class="m-4 d-flex flex-column flex-lg-row flex-sm-column flex-md-column">
    <img src="{{ asset('images/'.$book->image) }}" class="img-fluid" alt="Cover">
    <form>
    <div class="book-info d-flex flex-column">
        <input onclick="enableBtn()" name="title" size="64" class="title" id="title" type="text" value="{{$book->title}}">
        <div class="d-flex flex-row"><p class="mt-3">Oldalak: </p><input onclick="enableBtn()" name="pages" class="pages" id="pages" type="number" value="{{$book->pages}}"></div>
        <textarea onclick="enableBtn()" name="description" rows="9" size="255" class="description" id="description" type="text">{{$book->description}}</textarea>
        <input onclick="enableBtn()" name="tags" size="64" class="tags" id="tags" type="text" value="{{$book->tags}}">
      </div>
      <button onclick="submitEditForm({{$book->id}})" type="submit" id="saveBtn" class="disabled btn btn-secondary">Mentés</button>
    </form>
    <p>Létrehozva: {{$book->created_at}}</p>
    <p>Frissítve: {{$book->updated_at}}</p>
</div>
@endsection


  