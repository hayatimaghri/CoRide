<x-app-layout>

    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800">
            🏢 Détail de l'entreprise
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-xl mx-auto px-6">

            <div class="bg-white rounded-xl shadow-lg overflow-hidden">

                <div class="bg-blue-600 text-white px-6 py-4">
                    <h3 class="text-xl font-bold">{{ $entreprise->nom }}</h3>
                </div>

                <div class="p-6 space-y-4">

                    <div class="flex justify-between border-b pb-3">
                        <span class="text-gray-500">ID</span>
                        <span class="font-medium text-gray-800">#{{ $entreprise->id }}</span>
                    </div>

                    <div class="flex justify-between border-b pb-3">
                        <span class="text-gray-500">Nom</span>
                        <span class="font-medium text-gray-800">{{ $entreprise->nom }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-500">Ville</span>
                        <span class="font-medium text-gray-800">{{ $entreprise->ville }}</span>
                    </div>

                </div>

                <div class="bg-gray-50 px-6 py-4">
                    <a href="{{ route('entreprises.index') }}"
                       class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium shadow transition">
                        ← Retour à la liste
                    </a>
                </div>

            </div>

        </div>
    </div>

</x-app-layout>
