@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Nouvelle réservation</h1>

    <form action="{{ route('reservations.store') }}" method="POST">

        @csrf

        <div class="mb-3">

            <label>Choisir un trajet</label>

            <select name="trajet_id" class="form-control">

                @foreach($trajets as $trajet)

                    <option value="{{ $trajet->id }}">

                        {{ $trajet->ville_depart }}
                        →
                        {{ $trajet->ville_arrivee }}
                        ({{ $trajet->horaire }})

                    </option>

                @endforeach

            </select>

            @error('trajet_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror

        </div>

        <button class="btn btn-success">
            Réserver
        </button>

        <a href="{{ route('reservations.index') }}"
           class="btn btn-secondary">
            Retour
        </a>

    </form>

</div>

@endsection