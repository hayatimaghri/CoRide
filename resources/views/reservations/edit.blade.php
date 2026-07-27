<x-app-layout>

    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800">
            📋 Modifier la réservation
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-xl mx-auto px-6">

            <div class="bg-white rounded-xl shadow-lg p-8">

                <div class="mb-6 text-sm text-gray-600">
                    <span class="font-medium text-gray-800">{{ $reservation->trajet->ville_depart }} → {{ $reservation->trajet->ville_arrivee }}</span>
                    — passager : {{ $reservation->passager->name }}
                </div>

                @if(session('error'))
                    <div class="bg-red-50 border border-red-200 text-red-800 rounded-lg px-4 py-3 mb-6">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('reservations.update',$reservation) }}" method="POST" class="space-y-5">

                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Statut</label>

                        @php
                            $statutsAutorises = array_merge(
                                [$reservation->statut],
                                \App\Models\Reservation::TRANSITIONS_AUTORISEES[$reservation->statut] ?? []
                            );

                            $libelles = [
                                'en_attente' => 'En attente',
                                'confirmee' => 'Confirmée',
                                'refusee' => 'Refusée',
                                'annulee' => 'Annulée',
                            ];
                        @endphp

                        <select name="statut" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @foreach($statutsAutorises as $statut)
                                <option value="{{ $statut }}" @selected($reservation->statut == $statut)>
                                    {{ $libelles[$statut] }}
                                </option>
                            @endforeach
                        </select>

                        @if(empty(\App\Models\Reservation::TRANSITIONS_AUTORISEES[$reservation->statut]))
                            <p class="text-sm text-gray-500 mt-1">
                                Ce statut est final, aucune transition n'est possible.
                            </p>
                        @endif

                        @error('statut')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Date de réservation</label>
                        <input type="date" name="date_reservation"
                               value="{{ old('date_reservation', \Illuminate\Support\Carbon::parse($reservation->date_reservation)->format('Y-m-d')) }}"
                               class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        @error('date_reservation')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <input type="hidden" name="trajet_id" value="{{ $reservation->trajet_id }}">

                    <div class="flex gap-3 pt-2">
                        <button type="submit"
                                class="bg-amber-500 hover:bg-amber-600 text-white px-5 py-2.5 rounded-lg font-medium shadow transition">
                            Modifier
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
