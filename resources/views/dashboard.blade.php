<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-3xl font-bold text-gray-800">
                🚗 Dashboard CoRide
            </h2>

            <span class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow">
                {{ now()->format('d/m/Y') }}
            </span>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-6">

            <!-- Cartes -->
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

                <div class="bg-gradient-to-r from-blue-500 to-blue-700 rounded-xl shadow-lg p-6 text-white">
                    <p class="text-lg">🏢 Entreprises</p>
                    <h2 class="text-5xl font-bold mt-3">{{ $entreprises }}</h2>
                </div>

                <div class="bg-gradient-to-r from-green-500 to-green-700 rounded-xl shadow-lg p-6 text-white">
                    <p class="text-lg">👥 Utilisateurs</p>
                    <h2 class="text-5xl font-bold mt-3">{{ $users }}</h2>
                </div>

                <div class="bg-gradient-to-r from-yellow-400 to-orange-500 rounded-xl shadow-lg p-6 text-white">
                    <p class="text-lg">🚗 Trajets</p>
                    <h2 class="text-5xl font-bold mt-3">{{ $trajets }}</h2>
                </div>

                <div class="bg-gradient-to-r from-red-500 to-pink-600 rounded-xl shadow-lg p-6 text-white">
                    <p class="text-lg">📋 Réservations</p>
                    <h2 class="text-5xl font-bold mt-3">{{ $reservations }}</h2>
                </div>

            </div>

            <!-- Statistiques -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 mt-8">

                <div class="bg-white rounded-xl shadow p-5 border-l-4 border-green-500">
                    <p class="text-gray-500">✅ Confirmées</p>
                    <h2 class="text-4xl font-bold text-green-600">{{ $confirmes }}</h2>
                </div>

                <div class="bg-white rounded-xl shadow p-5 border-l-4 border-yellow-500">
                    <p class="text-gray-500">⏳ En attente</p>
                    <h2 class="text-4xl font-bold text-yellow-600">{{ $attente }}</h2>
                </div>

                <div class="bg-white rounded-xl shadow p-5 border-l-4 border-red-500">
                    <p class="text-gray-500">❌ Refusées</p>
                    <h2 class="text-4xl font-bold text-red-600">{{ $refusees }}</h2>
                </div>

                <div class="bg-white rounded-xl shadow p-5 border-l-4 border-gray-500">
                    <p class="text-gray-500">🚫 Annulées</p>
                    <h2 class="text-4xl font-bold text-gray-700">{{ $annulees }}</h2>
                </div>

            </div>

            <!-- Conducteurs -->
            <div class="grid md:grid-cols-2 gap-6 mt-8">

                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500">🚘 Conducteurs</p>
                            <h2 class="text-5xl font-bold text-blue-600 mt-3">
                                {{ $conducteurs }}
                            </h2>
                        </div>

                        <div class="text-6xl">
                            🚗
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500">🧍 Passagers</p>
                            <h2 class="text-5xl font-bold text-green-600 mt-3">
                                {{ $passagers }}
                            </h2>
                        </div>

                        <div class="text-6xl">
                            👤
                        </div>
                    </div>
                </div>

            </div>

            <!-- Derniers trajets -->
            <div class="bg-white rounded-xl shadow-lg mt-10 overflow-hidden">

                <div class="bg-blue-600 text-white px-6 py-4">
                    <h2 class="text-xl font-bold">
                        🚗 Derniers trajets
                    </h2>
                </div>

                <table class="w-full">

                    <thead class="bg-gray-100">

                        <tr>

                            <th class="p-3 text-left">Conducteur</th>
                            <th class="p-3 text-left">Départ</th>
                            <th class="p-3 text-left">Arrivée</th>
                            <th class="p-3 text-left">Horaire</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($dernierTrajets as $trajet)

                        <tr class="border-b hover:bg-gray-50">

                            <td class="p-3">
                                {{ $trajet->conducteur->name ?? '-' }}
                            </td>

                            <td class="p-3">
                                {{ $trajet->ville_depart }}
                            </td>

                            <td class="p-3">
                                {{ $trajet->ville_arrivee }}
                            </td>

                            <td class="p-3">
                                {{ $trajet->horaire }}
                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="4" class="text-center p-5 text-gray-500">
                                Aucun trajet
                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            <!-- Dernières réservations -->

            <div class="bg-white rounded-xl shadow-lg mt-10 overflow-hidden">

                <div class="bg-green-600 text-white px-6 py-4">

                    <h2 class="text-xl font-bold">
                        📋 Dernières réservations
                    </h2>

                </div>

                <table class="w-full">

                    <thead class="bg-gray-100">

                        <tr>

                            <th class="p-3 text-left">
                                Passager
                            </th>

                            <th class="p-3 text-left">
                                Trajet
                            </th>

                            <th class="p-3 text-left">
                                Statut
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($dernieresReservations as $reservation)

                        <tr class="border-b hover:bg-gray-50">

                            <td class="p-3">
                                {{ $reservation->passager->name ?? '-' }}
                            </td>

                            <td class="p-3">
                                {{ $reservation->trajet->ville_depart ?? '-' }}
                                →
                                {{ $reservation->trajet->ville_arrivee ?? '-' }}
                            </td>

                            <td class="p-3">

                                @if($reservation->statut=="confirmee")
                                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full">
                                        Confirmée
                                    </span>

                                @elseif($reservation->statut=="en_attente")
                                    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full">
                                        En attente
                                    </span>

                                @elseif($reservation->statut=="refusee")
                                    <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full">
                                        Refusée
                                    </span>

                                @else
                                    <span class="bg-gray-200 text-gray-700 px-3 py-1 rounded-full">
                                        Annulée
                                    </span>
                                @endif

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="3" class="text-center p-5 text-gray-500">
                                Aucune réservation
                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>
    </div>
</x-app-layout>