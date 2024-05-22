@extends('layouts.backoffice.template')
@section('title',"Liste des products")

@section("content")
<h1>Liste des products
    <a href="{{ route('products.create') }}">
    <button class="btn btn-primary"><i class="bi bi-plus"></i> Ajouter produit</button>
</a>
</h1>
<div class="row">
@forelse($products as $product)
<div class="modal fade" id="editproduct{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <form method="post" action="{{ route('products.update',$product->id) }}" enctype="multipart/form-data">
        @csrf
        @method("put")
              <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <div class="mb-3">
              <label for="name" class="col-form-label">Name:</label>
              <input type="text" value="{{ $product->name }}" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
              <label for="photo" class="col-form-label">Photo:</label>
              <img src="{{ asset('images/products/'.$product->photo) }}" width="100">
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
    <h5>{{ $product->name }}</h5>
    <img width="100%" src="{{ asset('images/products/'.$product->photo) }}">
<div class="bg-light">
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editproduct{{ $product->id }}" data-bs-whatever="@mdo"><i class="bi bi-pencil"></i></button>
    <form class="d-inline" action="{{ route('products.destroy',$product->id) }}" method="post">
        @csrf
        @method("delete")
    <button class="btn btn-danger" onclick="return confirm('Etes vous sure de supprimer?')"><i class="bi bi-trash"></i></button>
</form>
</div>
</div>
@empty
<p>Pas de products pour le moment!</p>
@endforelse
</div>


@endsection
