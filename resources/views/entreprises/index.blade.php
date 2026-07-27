<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-bold text-gray-800">
                🏢 Entreprises partenaires
            </h2>

            <a href="{{ route('entreprises.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow font-medium transition">
                + Ajouter une entreprise
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
                            <th class="p-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wide">ID</th>
                            <th class="p-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wide">Nom</th>
                            <th class="p-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wide">Ville</th>
                            <th class="p-4 text-right text-xs font-semibold text-gray-500 uppercase tracking-wide">Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($entreprises as $entreprise)
                            <tr class="border-t hover:bg-gray-50 transition">
                                <td class="p-4 text-gray-500">#{{ $entreprise->id }}</td>
                                <td class="p-4 font-medium text-gray-800">{{ $entreprise->nom }}</td>
                                <td class="p-4 text-gray-600">{{ $entreprise->ville }}</td>
                                <td class="p-4">
                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('entreprises.show',$entreprise) }}"
                                           class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-3 py-1.5 rounded-lg text-sm font-medium transition">
                                            Voir
                                        </a>
                                        <a href="{{ route('entreprises.edit',$entreprise) }}"
                                           class="bg-amber-100 hover:bg-amber-200 text-amber-800 px-3 py-1.5 rounded-lg text-sm font-medium transition">
                                            Modifier
                                        </a>
                                        <form action="{{ route('entreprises.destroy',$entreprise) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    onclick="return confirm('Supprimer cette entreprise ?')"
                                                    class="bg-red-100 hover:bg-red-200 text-red-700 px-3 py-1.5 rounded-lg text-sm font-medium transition">
                                                Supprimer
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center p-8 text-gray-500">
                                    Aucune entreprise enregistrée pour le moment.
                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>
    </div>

</x-app-layout>
