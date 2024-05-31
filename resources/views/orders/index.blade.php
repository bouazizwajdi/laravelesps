@extends("layouts.template")
@section("title")
Votre panier
@endsection

@section("titre")
PANIER
@endsection

@section("content")

@if(Session::has("success"))
<div class="alert alert-success">
    {{ Session::get("success") }}
</div>
@endif

Liste des commande
....
@endsection
