@extends('layouts.backoffice.template')
@section('title',"Liste des categories")

@section("content")
@if($errors->any())
<ul class="alert alert-danger">
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

<h1>Ajouter categorie</h1>
<form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name" class="form-label">Nom</label>
        <input type="text" value="{{ old('name') }}" class="form-control @error('name') border border-danger @enderror" id="name" name="name" required>
    @error("name")
    <div class="text text-danger">{{ $message }}</div>
    @enderror
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
