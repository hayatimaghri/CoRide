@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Détails du trajet</h1>

    <table class="table table-bordered">

        <tr>
            <th>ID</th>
            <td>{{ $trajet->id }}</td>
        </tr>

        <tr>
            <th>Conducteur</th>
            <td>{{ $trajet->conducteur->name }}</td>
        </tr>

        <tr>
            <th>Ville de départ</th>
            <td>{{ $trajet->ville_depart }}</td>
        </tr>

        <tr>
            <th>Ville d'arrivée</th>
            <td>{{ $trajet->ville_arrivee }}</td>
        </tr>

        <tr>
            <th>Horaire</th>
            <td>{{ $trajet->horaire }}</td>
        </tr>

        <tr>
            <th>Places disponibles</th>
            <td>{{ $trajet->places_disponibles }}</td>
        </tr>

        <tr>
            <th>Jours de récurrence</th>
            <td>{{ $trajet->jours_recurrence }}</td>
        </tr>

    </table>

    <a href="{{ route('trajets.index') }}"
       class="btn btn-primary">
        Retour
    </a>

</div>

@endsection