<x-app-layout>

    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800">
            🏢 Ajouter une entreprise
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-xl mx-auto px-6">

            <div class="bg-white rounded-xl shadow-lg p-8">

                <form action="{{ route('entreprises.store') }}" method="POST" class="space-y-5">

                    @csrf

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nom de l'entreprise</label>
                        <input type="text" name="nom" value="{{ old('nom') }}"
                               class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        @error('nom')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Ville</label>
                        <input type="text" name="ville" value="{{ old('ville') }}"
                               class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        @error('ville')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex gap-3 pt-2">
                        <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg font-medium shadow transition">
                            Enregistrer
                        </button>
                        <a href="{{ route('entreprises.index') }}"
                           class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-5 py-2.5 rounded-lg font-medium transition">
                            Annuler
                        </a>
                    </div>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>
