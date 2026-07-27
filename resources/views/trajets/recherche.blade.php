<x-app-layout>

    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800">
            🔎 Rechercher un trajet
        </h2>
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

            <div class="bg-white rounded-xl shadow-lg p-6 mb-6">
                <form method="GET" action="{{ route('trajets.recherche') }}" class="flex flex-wrap gap-4 items-end">

                    <div class="flex-1 min-w-[200px]">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Ville de départ</label>
                        <input type="text" name="ville_depart" value="{{ request('ville_depart') }}"
                               placeholder="Ex: Casablanca"
                               class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div class="flex-1 min-w-[200px]">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Ville d'arrivée</label>
                        <input type="text" name="ville_arrivee" value="{{ request('ville_arrivee') }}"
                               placeholder="Ex: Rabat"
                               class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg font-medium shadow transition">
                        Rechercher
                    </button>
                </form>
            </div>

            <div class="space-y-4">

                @forelse($trajets as $trajet)

                    @php
                        $dejaReserve = $trajet->reservations->where('passager_id', auth()->id())->count();
                        $score = $trajet->ai_result['score'] ?? 0;
                        $scoreColor = $score >= 90 ? 'bg-green-600' : ($score >= 60 ? 'bg-amber-500' : 'bg-red-500');
                    @endphp

                    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                        <div class="flex flex-col md:flex-row">

                            <div class="p-6 flex-1">
                                <div class="flex items-center justify-between mb-2">
                                    <h3 class="text-lg font-bold text-gray-800">
                                        {{ $trajet->ville_depart }} → {{ $trajet->ville_arrivee }}
                                    </h3>
                                    <span class="{{ $scoreColor }} text-white px-3 py-1 rounded-full text-sm font-bold">
                                        {{ $score }}/100
                                    </span>
                                </div>

                                <div class="flex flex-wrap gap-x-6 gap-y-1 text-sm text-gray-500 mb-3">
                                    <span>👤 {{ $trajet->conducteur->name }}</span>
                                    <span>🕒 {{ $trajet->horaire }}</span>
                                    <span>🪑 {{ $trajet->places_disponibles }} place(s)</span>
                                </div>

                                <div class="bg-blue-50 rounded-lg p-3 text-sm">
                                    <p class="text-blue-900">
                                        🤖 {{ $trajet->ai_result['justification'] ?? '' }}
                                    </p>
                                    <p class="text-blue-700 text-xs mt-1">
                                        Horaire suggéré : {{ $trajet->ai_result['horaire_suggere'] ?? $trajet->horaire }}
                                    </p>
                                </div>
                            </div>

                            <div class="bg-gray-50 md:w-48 flex items-center justify-center p-6">
                                @if($dejaReserve)
                                    <span class="text-red-600 font-semibold text-sm text-center">
                                        Déjà réservé
                                    </span>
                                @else
                                    <form action="{{ route('reservations.store') }}" method="POST" class="w-full">
                                        @csrf
                                        <input type="hidden" name="trajet_id" value="{{ $trajet->id }}">
                                        <input type="hidden" name="compatibility_score" value="{{ $trajet->ai_result['score'] ?? 0 }}">
                                        <input type="hidden" name="ai_justification" value="{{ $trajet->ai_result['justification'] ?? '' }}">
                                        <input type="hidden" name="ai_horaire_suggere" value="{{ $trajet->ai_result['horaire_suggere'] ?? $trajet->horaire }}">

                                        <button type="submit"
                                                class="w-full bg-green-600 hover:bg-green-700 text-white px-4 py-2.5 rounded-lg font-medium shadow transition">
                                            Réserver
                                        </button>
                                    </form>
                                @endif
                            </div>

                        </div>
                    </div>

                @empty
                    <div class="bg-white rounded-xl shadow-lg p-8 text-center text-gray-500">
                        Aucun trajet ne correspond à votre recherche.
                    </div>
                @endforelse

            </div>

        </div>
    </div>

</x-app-layout>
