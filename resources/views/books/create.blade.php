@extends('layout')
@section('content')
<div class="container mt-4 createform">
<form method="POST" action="/create">
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Könyv címe</label>
      <input type="text" class="form-control" id="title" name="title">
    </div>
    <div class="mb-3">
        <label for="pages" class="form-label">Oldalak száma</label>
        <input type="number" class="form-control" id="pages" name="pages">
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">Leírás</label>
        <textarea rows="10" size="255" type="text" class="form-control" id="description" name="description"></textarea>
        <small id="descriptionhelp" class="form-text text-muted">Max 255 karakter</small>
      </div>
      <div class="mb-3">
        <label for="tags" class="form-label">Címkék</label>
        <input type="text" class="form-control" id="tags" name="tags">
        <small id="tagshelp" class="form-text text-muted">Vesszővel és szóközzel elválasztva(címke1, címke2)</small>
      </div>
    <button type="submit" class="btn btn-primary">Feltöltés</button>
  </form>
</div>
@endsection