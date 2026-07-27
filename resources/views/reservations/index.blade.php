<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-bold text-gray-800">
                📋 Réservations
            </h2>

            <a href="{{ route('reservations.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow font-medium transition">
                + Nouvelle réservation
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-6">

            @if(session('success'))
                <div class="bg-green-50 border border-green-200 text-green-800 rounded-lg px-4 py-3 mb-6">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-50 border border-red-200 text-red-800 rounded-lg px-4 py-3 mb-6">
                    {{ session('error') }}
                </div>
            @endif

            <div class="bg-white rounded-xl shadow-lg overflow-hidden">

                <table class="w-full">

                    <thead class="bg-gray-50">
                        <tr>
                            <th class="p-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wide">Trajet</th>
                            <th class="p-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wide">Passager</th>
                            <th class="p-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wide">Score IA</th>
                            <th class="p-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wide">Statut</th>
                            <th class="p-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wide">Date</th>
                            <th class="p-4 text-right text-xs font-semibold text-gray-500 uppercase tracking-wide">Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($reservations as $reservation)
                            <tr class="border-t hover:bg-gray-50 transition">
                                <td class="p-4 text-gray-700">
                                    {{ $reservation->trajet->ville_depart }} → {{ $reservation->trajet->ville_arrivee }}
                                </td>
                                <td class="p-4 font-medium text-gray-800">{{ $reservation->passager->name }}</td>
                                <td class="p-4">
                                    @if(!is_null($reservation->compatibility_score))
                                        <span class="bg-blue-50 text-blue-700 px-2.5 py-1 rounded-full text-sm font-medium">
                                            {{ $reservation->compatibility_score }}/100
                                        </span>
                                    @else
                                        <span class="text-gray-400 text-sm">—</span>
                                    @endif
                                </td>
                                <td class="p-4">
                                    @switch($reservation->statut)
                                        @case('confirmee')
                                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-medium">Confirmée</span>
                                            @break
                                        @case('en_attente')
                                            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-medium">En attente</span>
                                            @break
                                        @case('refusee')
                                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm font-medium">Refusée</span>
                                            @break
                                        @default
                                            <span class="bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-sm font-medium">Annulée</span>
                                    @endswitch
                                </td>
                                <td class="p-4 text-gray-600">{{ $reservation->date_reservation }}</td>
                                <td class="p-4">
                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('reservations.show',$reservation) }}"
                                           class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-3 py-1.5 rounded-lg text-sm font-medium transition">
                                            Voir
                                        </a>
                                        <a href="{{ route('reservations.edit',$reservation) }}"
                                           class="bg-amber-100 hover:bg-amber-200 text-amber-800 px-3 py-1.5 rounded-lg text-sm font-medium transition">
                                            Modifier
                                        </a>
                                        <form action="{{ route('reservations.destroy',$reservation) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    onclick="return confirm('Supprimer cette réservation ?')"
                                                    class="bg-red-100 hover:bg-red-200 text-red-700 px-3 py-1.5 rounded-lg text-sm font-medium transition">
                                                Supprimer
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center p-8 text-gray-500">
                                    Aucune réservation pour le moment.
                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>
    </div>

</x-app-layout>
