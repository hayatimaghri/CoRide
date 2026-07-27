<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-bold text-gray-800">
                🚘 Mes trajets proposés
            </h2>

            <a href="{{ route('trajets.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow font-medium transition">
                + Proposer un trajet
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-6">

            <div class="bg-white rounded-xl shadow-lg overflow-hidden">

                <table class="w-full">

                    <thead class="bg-gray-50">
                        <tr>
                            <th class="p-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wide">Départ</th>
                            <th class="p-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wide">Arrivée</th>
                            <th class="p-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wide">Horaire</th>
                            <th class="p-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wide">Places</th>
                            <th class="p-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wide">Réservations</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($trajets as $trajet)
                            <tr class="border-t hover:bg-gray-50 transition">
                                <td class="p-4 text-gray-700">{{ $trajet->ville_depart }}</td>
                                <td class="p-4 text-gray-700">{{ $trajet->ville_arrivee }}</td>
                                <td class="p-4 text-gray-600">{{ $trajet->horaire }}</td>
                                <td class="p-4">
                                    <span class="bg-blue-50 text-blue-700 px-2.5 py-1 rounded-full text-sm font-medium">
                                        {{ $trajet->places_disponibles }}
                                    </span>
                                </td>
                                <td class="p-4">
                                    <span class="bg-gray-100 text-gray-700 px-2.5 py-1 rounded-full text-sm font-medium">
                                        {{ $trajet->reservations_count }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center p-8 text-gray-500">
                                    Vous n'avez proposé aucun trajet pour le moment.
                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>
    </div>

</x-app-layout>
