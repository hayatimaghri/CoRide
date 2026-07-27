<x-app-layout>

    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800">
            🚗 Détail du trajet
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-xl mx-auto px-6">

            <div class="bg-white rounded-xl shadow-lg overflow-hidden">

                <div class="bg-blue-600 text-white px-6 py-4">
                    <h3 class="text-xl font-bold">
                        {{ $trajet->ville_depart }} → {{ $trajet->ville_arrivee }}
                    </h3>
                </div>

                <div class="p-6 space-y-4">

                    <div class="flex justify-between border-b pb-3">
                        <span class="text-gray-500">ID</span>
                        <span class="font-medium text-gray-800">#{{ $trajet->id }}</span>
                    </div>

                    <div class="flex justify-between border-b pb-3">
                        <span class="text-gray-500">Conducteur</span>
                        <span class="font-medium text-gray-800">{{ $trajet->conducteur->name }}</span>
                    </div>

                    <div class="flex justify-between border-b pb-3">
                        <span class="text-gray-500">Horaire</span>
                        <span class="font-medium text-gray-800">{{ $trajet->horaire }}</span>
                    </div>

                    <div class="flex justify-between border-b pb-3">
                        <span class="text-gray-500">Places disponibles</span>
                        <span class="bg-blue-50 text-blue-700 px-2.5 py-1 rounded-full text-sm font-medium">
                            {{ $trajet->places_disponibles }}
                        </span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-500">Jours de récurrence</span>
                        <span class="font-medium text-gray-800">{{ $trajet->jours_recurrence ?? '—' }}</span>
                    </div>

                </div>

                <div class="bg-gray-50 px-6 py-4">
                    <a href="{{ route('trajets.index') }}"
                       class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium shadow transition">
                        ← Retour à la liste
                    </a>
                </div>

            </div>

        </div>
    </div>

</x-app-layout>
