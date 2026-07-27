<x-app-layout>

    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800">
            📋 Détail de la réservation
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-xl mx-auto px-6">

            <div class="bg-white rounded-xl shadow-lg overflow-hidden">

                <div class="bg-blue-600 text-white px-6 py-4">
                    <h3 class="text-xl font-bold">
                        {{ $reservation->trajet->ville_depart }} → {{ $reservation->trajet->ville_arrivee }}
                    </h3>
                </div>

                <div class="p-6 space-y-4">

                    <div class="flex justify-between border-b pb-3">
                        <span class="text-gray-500">ID</span>
                        <span class="font-medium text-gray-800">#{{ $reservation->id }}</span>
                    </div>

                    <div class="flex justify-between border-b pb-3">
                        <span class="text-gray-500">Passager</span>
                        <span class="font-medium text-gray-800">{{ $reservation->passager->name }}</span>
                    </div>

                    <div class="flex justify-between border-b pb-3">
                        <span class="text-gray-500">Statut</span>
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
                    </div>

                    <div class="flex justify-between border-b pb-3">
                        <span class="text-gray-500">Date de réservation</span>
                        <span class="font-medium text-gray-800">{{ $reservation->date_reservation }}</span>
                    </div>

                    @if(!is_null($reservation->compatibility_score))
                        <div class="bg-blue-50 rounded-lg p-4 space-y-2">
                            <div class="flex items-center justify-between">
                                <span class="font-semibold text-blue-800">🤖 Score de compatibilité IA</span>
                                <span class="bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-bold">
                                    {{ $reservation->compatibility_score }}/100
                                </span>
                            </div>
                            @if(!empty($reservation->ai_result['justification']))
                                <p class="text-sm text-blue-900">{{ $reservation->ai_result['justification'] }}</p>
                            @endif
                            @if(!empty($reservation->ai_result['horaire_suggere']))
                                <p class="text-xs text-blue-700">Horaire suggéré : {{ $reservation->ai_result['horaire_suggere'] }}</p>
                            @endif
                        </div>
                    @endif

                </div>

                <div class="bg-gray-50 px-6 py-4">
                    <a href="{{ route('reservations.index') }}"
                       class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium shadow transition">
                        ← Retour à la liste
                    </a>
                </div>

            </div>

        </div>
    </div>

</x-app-layout>
