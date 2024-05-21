@extends('layouts.backoffice.template')
@section('title',"Liste des categories")

@section("content")
<form action="{{ route('categories.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="name" class="form-label">Nom</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="form-group">
        <label for="photo" class="form-label">Photo</label>
        <input type="file" class="form-control" id="photo" name="photo">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </div>
</form>
@endsection
