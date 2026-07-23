@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Liste des réservations</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <a href="{{ route('reservations.create') }}" class="btn btn-primary mb-3">
        Nouvelle réservation
    </a>

    <table class="table table-bordered">

        <thead>
        <tr>
            <th>ID</th>
            <th>Trajet</th>
            <th>Passager</th>
            <th>Statut</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
        </thead>

        <tbody>

        @foreach($reservations as $reservation)

        <tr>

            <td>{{ $reservation->id }}</td>

            <td>
                {{ $reservation->trajet->ville_depart }}
                →
                {{ $reservation->trajet->ville_arrivee }}
            </td>

            <td>{{ $reservation->passager->name }}</td>

            <td>{{ $reservation->statut }}</td>

            <td>{{ $reservation->date_reservation }}</td>

            <td>

                <a href="{{ route('reservations.show',$reservation) }}"
                   class="btn btn-info">
                    Voir
                </a>

                <a href="{{ route('reservations.edit',$reservation) }}"
                   class="btn btn-warning">
                    Modifier
                </a>

                <form action="{{ route('reservations.destroy',$reservation) }}"
                      method="POST"
                      style="display:inline">

                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger"
                        onclick="return confirm('Supprimer ?')">

                        Supprimer

                    </button>

                </form>

            </td>

        </tr>

        @endforeach

        </tbody>

    </table>

</div>

@endsection