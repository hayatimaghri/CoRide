@extends('layouts.app')

@section('content')

<div class="container">

    <h2>Ajouter une entreprise</h2>

    <form action="{{ route('entreprises.store') }}" method="POST">

        @csrf

        <div>
            <label>Nom</label><br>
            <input type="text" name="nom" value="{{ old('nom') }}">

            @error('nom')
                <p style="color:red">{{ $message }}</p>
            @enderror
        </div>

        <br>

        <div>
            <label>Ville</label><br>
            <input type="text" name="ville" value="{{ old('ville') }}">

            @error('ville')
                <p style="color:red">{{ $message }}</p>
            @enderror
        </div>

        <br>

        <button type="submit">
            Enregistrer
        </button>

        <a href="{{ route('entreprises.index') }}">
            Annuler
        </a>

    </form>

</div>

@endsection