@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Ajouter un trajet</h1>

    <form action="{{ route('trajets.store') }}" method="POST">

        @csrf

        <div class="mb-3">
            <label>Ville de départ</label>

            <input type="text"
                   name="ville_depart"
                   class="form-control"
                   value="{{ old('ville_depart') }}">

            @error('ville_depart')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label>Ville d'arrivée</label>

            <input type="text"
                   name="ville_arrivee"
                   class="form-control"
                   value="{{ old('ville_arrivee') }}">

            @error('ville_arrivee')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label>Horaire</label>

            <input type="datetime-local"
                   name="horaire"
                   class="form-control"
                   value="{{ old('horaire') }}">

            @error('horaire')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label>Places disponibles</label>

            <input type="number"
                   name="places_disponibles"
                   class="form-control"
                   value="{{ old('places_disponibles') }}">

            @error('places_disponibles')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label>Jours de récurrence</label>

            <input type="text"
                   name="jours_recurrence"
                   class="form-control"
                   value="{{ old('jours_recurrence') }}">

            @error('jours_recurrence')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button class="btn btn-success">
            Enregistrer
        </button>

        <a href="{{ route('trajets.index') }}"
           class="btn btn-secondary">
            Retour
        </a>

    </form>

</div>

@endsection