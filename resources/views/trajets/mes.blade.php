<x-app-layout>

<x-slot name="header">

<h2 class="text-2xl font-bold">

Mes trajets

</h2>

</x-slot>

<div class="p-8">

<table class="table-auto w-full border">

<thead>

<tr>

<th class="border p-2">Départ</th>

<th class="border p-2">Arrivée</th>

<th class="border p-2">Horaire</th>

<th class="border p-2">Places</th>

<th class="border p-2">Réservations</th>

</tr>

</thead>

<tbody>

@foreach($trajets as $trajet)

<tr>

<td class="border p-2">
{{ $trajet->ville_depart }}
</td>

<td class="border p-2">
{{ $trajet->ville_arrivee }}
</td>

<td class="border p-2">
{{ $trajet->horaire }}
</td>

<td class="border p-2">
{{ $trajet->places_disponibles }}
</td>

<td class="border p-2">
{{ $trajet->reservations_count }}
</td>

</tr>

@endforeach

</tbody>

</table>

</div>

</x-app-layout>