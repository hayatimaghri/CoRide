@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Détails de la réservation</h1>

    <table class="table table-bordered">

        <tr>
            <th>ID</th>
            <td>{{ $reservation->id }}</td>
        </tr>

        <tr>
            <th>Trajet</th>
            <td>
                {{ $reservation->trajet->ville_depart }}
                →
                {{ $reservation->trajet->ville_arrivee }}
            </td>
        </tr>

        <tr>
            <th>Passager</th>
            <td>{{ $reservation->passager->name }}</td>
        </tr>

        <tr>
            <th>Statut</th>
            <td>{{ $reservation->statut }}</td>
        </tr>

        <tr>
            <th>Date réservation</th>
            <td>{{ $reservation->date_reservation }}</td>
        </tr>

    </table>

    <a href="{{ route('reservations.index') }}"
       class="btn btn-primary">
        Retour
    </a>

</div>

@endsection