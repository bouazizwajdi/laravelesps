@extends('layouts.backoffice.template')
@section('title',"Liste des categories")

@section("content")
<h1>Liste des categories
    <a href="{{ route('categories.create') }}">
    <button class="btn btn-primary"><i class="bi bi-plus"></i> Ajouter categorie</button>
</a>
</h1>
<div class="row">
@forelse($categories as $category)
<div class="col-3">
    <h5>{{ $category->name }}</h5>
    <img width="100%" src="{{ asset('images/categories/'.$category->photo) }}">
<div class="bg-light">
    <button class="btn btn-success"><i class="bi bi-pencil"></i></button>
    <button class="btn btn-danger"><i class="bi bi-trash"></i></button>
</div>
</div>
@empty
<p>Pas de categories pour le moment!</p>
@endforelse
</div>
@endsection
