<x-app-layout>

    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800">
            📋 Nouvelle réservation
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-xl mx-auto px-6">

            <div class="bg-white rounded-xl shadow-lg p-8">

                <p class="text-sm text-gray-500 mb-6">
                    Astuce : passez plutôt par la
                    <a href="{{ route('trajets.recherche') }}" class="text-blue-600 font-medium hover:underline">recherche de trajets</a>
                    pour voir le score de compatibilité IA avant de réserver.
                </p>

                <form action="{{ route('reservations.store') }}" method="POST" class="space-y-5">

                    @csrf

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Choisir un trajet</label>
                        <select name="trajet_id" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @foreach($trajets as $trajet)
                                <option value="{{ $trajet->id }}">
                                    {{ $trajet->ville_depart }} → {{ $trajet->ville_arrivee }} ({{ $trajet->horaire }})
                                </option>
                            @endforeach
                        </select>
                        @error('trajet_id')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex gap-3 pt-2">
                        <button type="submit"
                                class="bg-green-600 hover:bg-green-700 text-white px-5 py-2.5 rounded-lg font-medium shadow transition">
                            Réserver
                        </button>
                        <a href="{{ route('reservations.index') }}"
                           class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-5 py-2.5 rounded-lg font-medium transition">
                            Retour
                        </a>
                    </div>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>
