@extends('layouts.backoffice.template')
@section('title',"Liste des products")

@section("content")
<h1>Ajouter produit</h1>

<form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
    <div class="form-group col-12">
        <label for="name" class="form-label">Nom</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>

    <div class="form-group col-12">
        <label for="description" class="form-label">description</label>
        <textarea class="form-control" id="description" name="description" required></textarea>
    </div>

    <div class="form-group col-4">
        <label for="price" class="form-label">price</label>
        <input type="number" class="form-control" id="price" name="price" required>
    </div>

    <div class="form-group col-4">
        <label for="vat" class="form-label">vat</label>
        <input type="number" class="form-control" id="vat" name="vat" required>
    </div>

    <div class="form-group col-4">
        <label for="stock_qty" class="form-label">stock quantity</label>
        <input type="number" class="form-control" id="stock_qty" name="stock_qty" required>
    </div>

    <div class="form-group col-6">
        <label for="category_id" class="form-label">category</label>
        <select class="form-control" id="category_id" name="category_id" required>
        <option value="">--- choose ---</option>
        @foreach ($categories as $category)
<option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
        </select>
            </div>

    <div class="form-group col-6">
        <label for="photo" class="form-label">Photo</label>
        <input type="file" class="form-control" id="photo" name="photo">
    </div>
    <div class="form-group mt-3">
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </div>
</div>
</form>
@endsection
