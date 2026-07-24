<x-app-layout>

<x-slot name="header">
    <h2 class="text-2xl font-bold">
        Rechercher un trajet
    </h2>
</x-slot>

<div class="p-6">

<form method="GET" action="{{ route('trajets.recherche') }}">

    <input
        type="text"
        name="ville_depart"
        placeholder="Ville départ"
        class="border rounded p-2">

    <input
        type="text"
        name="ville_arrivee"
        placeholder="Ville arrivée"
        class="border rounded p-2">

    <button
        class="bg-blue-600 text-white px-4 py-2 rounded">

        Rechercher

    </button>

</form>

<br>

<table class="table-auto w-full border">

<thead>

<tr>

<th>Conducteur</th>

<th>Départ</th>

<th>Arrivée</th>

<th>Horaire</th>

<th>Places</th>
<th>Action</th>

</tr>

</thead>

<tbody>

@foreach($trajets as $trajet)

<tr>

<td>{{ $trajet->conducteur->name }}</td>

<td>{{ $trajet->ville_depart }}</td>

<td>{{ $trajet->ville_arrivee }}</td>

<td>{{ $trajet->horaire }}</td>

<td>{{ $trajet->places_disponibles }}</td>
@php
    $dejaReserve = $trajet->reservations
        ->where('passager_id', auth()->id())
        ->count();
@endphp

@if($dejaReserve)

<span class="text-red-600 font-bold">
    Déjà réservé
</span>

@else

<form action="{{ route('reservations.store') }}" method="POST">

    @csrf

    <input
        type="hidden"
        name="trajet_id"
        value="{{ $trajet->id }}">

    <button
        class="bg-green-600 text-white px-3 py-2 rounded">

        Réserver

    </button>

</form>

@endif

</tr>

@endforeach

</tbody>

</table>

</div>

</x-app-layout>