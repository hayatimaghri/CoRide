@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Modifier un trajet</h1>

    <form action="{{ route('trajets.update',$trajet) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Ville de départ</label>

            <input type="text"
                   name="ville_depart"
                   class="form-control"
                   value="{{ old('ville_depart',$trajet->ville_depart) }}">

            @error('ville_depart')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label>Ville d'arrivée</label>

            <input type="text"
                   name="ville_arrivee"
                   class="form-control"
                   value="{{ old('ville_arrivee',$trajet->ville_arrivee) }}">

            @error('ville_arrivee')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label>Horaire</label>

            <input type="datetime-local"
                   name="horaire"
                   class="form-control"
                   value="{{ old('horaire', \Carbon\Carbon::parse($trajet->horaire)->format('Y-m-d\TH:i')) }}">

            @error('horaire')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label>Places disponibles</label>

            <input type="number"
                   name="places_disponibles"
                   class="form-control"
                   value="{{ old('places_disponibles',$trajet->places_disponibles) }}">

            @error('places_disponibles')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label>Jours de récurrence</label>

            <input type="text"
                   name="jours_recurrence"
                   class="form-control"
                   value="{{ old('jours_recurrence',$trajet->jours_recurrence) }}">

            @error('jours_recurrence')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button class="btn btn-warning">
            Modifier
        </button>

        <a href="{{ route('trajets.index') }}"
           class="btn btn-secondary">
            Retour
        </a>

    </form>

</div>

@endsection