@extends('layout')
@section('content')
@include('inc.navbar')
<div class="container mt-4 createform">
<form method="POST" action="/create" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Könyv címe</label>
      <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
        @error('title')
          <p class="text-danger">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="pages" class="form-label">Oldalak száma</label>
        <input type="number" class="form-control" id="pages" name="pages" value="{{old('pages')}}">
        @error('pages')
          <p class="text-danger">{{$message}}</p>
        @enderror
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">Leírás</label>
        <textarea rows="10" size="255" type="text" class="form-control" id="description" name="description">{{old('description')}}</textarea>
        <small id="descriptionhelp" class="form-text text-muted">Max 255 karakter</small>
        @error('description')
          <p class="text-danger">{{$message}}</p>
        @enderror
      </div>
      
      <div class="mb-3">
        <label for="tags" class="form-label">Címkék</label>
        <input type="text" class="form-control" id="tags" name="tags" value="{{old('tags')}}">
        <small id="tagshelp" class="form-text text-muted">Vesszővel elválasztva(címke1,címke2)</small>
        @error('tags')
          <p class="text-danger">{{$message}}</p>
        @enderror
      </div>
      <div class="mb-3">
        <label for="image" class="form-label">Borító</label>
        <input type="file" class="form-control" id="image" name="image" value="{{old('image')}}">
        @error('image')
          <p class="text-danger">{{$message}}</p>
        @enderror
      </div>
    <button type="submit" class="btn btn-primary">Feltöltés</button>
  </form>
</div>
@endsection