@extends('layouts.app')

@section('content')

<div class="container">

    <h2>Modifier une entreprise</h2>

    <form action="{{ route('entreprises.update',$entreprise) }}" method="POST">

        @csrf
        @method('PUT')

        <div>

            <label>Nom</label><br>

            <input
                type="text"
                name="nom"
                value="{{ old('nom',$entreprise->nom) }}"
            >

            @error('nom')
                <p style="color:red">{{ $message }}</p>
            @enderror

        </div>

        <br>

        <div>

            <label>Ville</label><br>

            <input
                type="text"
                name="ville"
                value="{{ old('ville',$entreprise->ville) }}"
            >

            @error('ville')
                <p style="color:red">{{ $message }}</p>
            @enderror

        </div>

        <br>

        <button type="submit">
            Modifier
        </button>

        <a href="{{ route('entreprises.index') }}">
            Retour
        </a>

    </form>

</div>

@endsection