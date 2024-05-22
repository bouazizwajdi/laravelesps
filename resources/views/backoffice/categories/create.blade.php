@extends('layouts.backoffice.template')
@section('title',"Liste des categories")

@section("content")
<h1>Ajouter categorie</h1>
<form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name" class="form-label">Nom</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="form-group">
        <label for="photo" class="form-label">Photo</label>
        <input type="file" class="form-control" id="photo" name="photo">
    </div>
    <div class="form-group mt-3">
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </div>
</form>
@endsection
