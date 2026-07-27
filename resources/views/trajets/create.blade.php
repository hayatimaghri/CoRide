<x-app-layout>

    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800">
            🚗 Proposer un trajet
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-xl mx-auto px-6">

            <div class="bg-white rounded-xl shadow-lg p-8">

                <form action="{{ route('trajets.store') }}" method="POST" class="space-y-5">

                    @csrf

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Ville de départ</label>
                        <input type="text" name="ville_depart" value="{{ old('ville_depart') }}"
                               class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        @error('ville_depart')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Ville d'arrivée</label>
                        <input type="text" name="ville_arrivee" value="{{ old('ville_arrivee') }}"
                               class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        @error('ville_arrivee')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Horaire</label>
                        <input type="datetime-local" name="horaire" value="{{ old('horaire') }}"
                               class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        @error('horaire')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Places disponibles</label>
                        <input type="number" min="1" name="places_disponibles" value="{{ old('places_disponibles') }}"
                               class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        @error('places_disponibles')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Jours de récurrence</label>
                        <input type="text" name="jours_recurrence" placeholder="Ex: Lun, Mar, Mer, Jeu, Ven" value="{{ old('jours_recurrence') }}"
                               class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        @error('jours_recurrence')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex gap-3 pt-2">
                        <button type="submit"
                                class="bg-green-600 hover:bg-green-700 text-white px-5 py-2.5 rounded-lg font-medium shadow transition">
                            Enregistrer
                        </button>
                        <a href="{{ route('trajets.index') }}"
                           class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-5 py-2.5 rounded-lg font-medium transition">
                            Annuler
                        </a>
                    </div>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>
