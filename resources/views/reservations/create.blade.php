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
<button
    type="submit"
    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg">
    Réserver
</button>

<a href="{{ route('reservations.index') }}"
   class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg ml-2">
    Retour
</a>

    </form>

</div>

@endsection