@extends('layouts.app')

@section('content')

<div class="container">

    <h2>Détails de l'entreprise</h2>

    <p>
        <strong>ID :</strong>
        {{ $entreprise->id }}
    </p>

    <p>
        <strong>Nom :</strong>
        {{ $entreprise->nom }}
    </p>

    <p>
        <strong>Ville :</strong>
        {{ $entreprise->ville }}
    </p>

    <a href="{{ route('entreprises.index') }}">
        Retour à la liste
    </a>

</div>

@endsection