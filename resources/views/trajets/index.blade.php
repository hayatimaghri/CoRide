@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Liste des trajets</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <a href="{{ route('trajets.create') }}" class="btn btn-primary mb-3">
        Ajouter un trajet
    </a>

    <table class="table table-bordered">

        <thead>
        <tr>
            <th>ID</th>
            <th>Conducteur</th>
            <th>Départ</th>
            <th>Arrivée</th>
            <th>Horaire</th>
            <th>Places</th>
            <th>Récurrence</th>
            <th>Actions</th>
        </tr>
        </thead>

        <tbody>

        @foreach($trajets as $trajet)

            <tr>

                <td>{{ $trajet->id }}</td>

                <td>{{ $trajet->conducteur->name }}</td>

                <td>{{ $trajet->ville_depart }}</td>

                <td>{{ $trajet->ville_arrivee }}</td>

                <td>{{ $trajet->horaire }}</td>

                <td>{{ $trajet->places_disponibles }}</td>

                <td>{{ $trajet->jours_recurrence }}</td>

                <td>

                    <a href="{{ route('trajets.show',$trajet) }}" class="btn btn-info">
                        Voir
                    </a>

                    <a href="{{ route('trajets.edit',$trajet) }}" class="btn btn-warning">
                        Modifier
                    </a>

                    <form action="{{ route('trajets.destroy',$trajet) }}"
                          method="POST"
                          style="display:inline">

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger"
                                onclick="return confirm('Supprimer ce trajet ?')">

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