@extends("layouts.template")

@section("title")
Informations de contact
@endsection

@section("titre")
Contact/INFO DE CONTACT
@endsection

@section("content")
<div class="container py-5">
<b>Client :</b> {{ $name }}
<hr><b>Reçu par :</b> {{ $email }}
<hr><b>Sujet :</b> {{ $subject }}
<hr><b>Message :</b> {{ $message }}
</div>
@endsection
