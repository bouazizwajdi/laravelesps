@extends('layouts.backoffice.template')
@section('title',"Liste des categories")

@section("content")

@if(Session::has("success"))
<div class="alert alert-success">
{{ Session::get('success') }}
</div>
@endif

<h1>Liste des categories</h1>
    <a href="{{ route('categories.create') }}">
    <button class="btn btn-primary"><i class="bi bi-plus"></i> Ajouter categorie</button>
</a>
</h1>
<div class="row">
@forelse($categories as $category)
<div class="modal fade" id="editcategory{{ $category->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <form method="post" action="{{ route('categories.update',$category->id) }}" enctype="multipart/form-data">
        @csrf
        @method("put")
              <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <div class="mb-3">
              <label for="name" class="col-form-label">Name:</label>
              <input type="text" value="{{ $category->name }}" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
              <label for="photo" class="col-form-label">Photo:</label>
              <img src="{{ asset('images/categories/'.$category->photo) }}" width="100">
              <input type="file" class="form-control" id="photo" name="photo">
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Edit</button>
        </div>
        </form>
      </div>
    </div>
  </div>
<div class="col-3">
    <h5>{{ $category->name }}</h5>
    <img width="100%" src="{{ asset('images/categories/'.$category->photo) }}">
<div class="bg-light">
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editcategory{{ $category->id }}" data-bs-whatever="@mdo"><i class="bi bi-pencil"></i></button>
    <form class="d-inline" action="{{ route('categories.destroy',$category->id) }}" method="post">
        @csrf
        @method("delete")
    <button class="btn btn-danger" onclick="return confirm('Etes vous sure de supprimer?')"><i class="bi bi-trash"></i></button>
</form>
</div>
</div>
@empty
<p>Pas de categories pour le moment!</p>
@endforelse
</div>


@endsection
