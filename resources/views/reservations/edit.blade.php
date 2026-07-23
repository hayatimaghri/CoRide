@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Modifier la réservation</h1>

    <form action="{{ route('reservations.update',$reservation) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label>Statut</label>

            <select name="statut" class="form-control">

                <option value="en_attente"
                    @selected($reservation->statut=='en_attente')>
                    En attente
                </option>

                <option value="confirmee"
                    @selected($reservation->statut=='confirmee')>
                    Confirmée
                </option>

                <option value="refusee"
                    @selected($reservation->statut=='refusee')>
                    Refusée
                </option>

                <option value="annulee"
                    @selected($reservation->statut=='annulee')>
                    Annulée
                </option>

            </select>

        </div>

        <button class="btn btn-warning">
            Modifier
        </button>

        <a href="{{ route('reservations.index') }}"
           class="btn btn-secondary">
            Retour
        </a>

    </form>

</div>

@endsection