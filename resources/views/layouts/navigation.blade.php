<nav class="bg-white shadow-md border-b sticky top-0 z-50">

    <div class="max-w-7xl mx-auto px-6">

        <div class="flex justify-between items-center h-16">

            <!-- Logo -->

            <a href="{{ route('dashboard') }}" class="flex items-center gap-3">

                <div class="w-11 h-11 rounded-full bg-blue-600 flex items-center justify-center text-white text-xl shadow-lg">

                    🚗

                </div>

                <div>

                    <h1 class="font-bold text-2xl text-blue-700">
                        CoRide
                    </h1>

                    <p class="text-xs text-gray-500">
                        Plateforme de covoiturage
                    </p>

                </div>

            </a>

            <!-- Menu -->

            <div class="hidden md:flex items-center gap-8">

                <a href="{{ route('dashboard') }}"
                    class="font-semibold text-gray-700 hover:text-blue-600 transition">
                    Dashboard
                </a>

                <a href="{{ route('trajets.index') }}"
                    class="font-semibold text-gray-700 hover:text-blue-600 transition">
                    Trajets
                </a>

                <a href="{{ route('reservations.index') }}"
                    class="font-semibold text-gray-700 hover:text-blue-600 transition">
                    Réservations
                </a>

                <a href="{{ route('entreprises.index') }}"
                    class="font-semibold text-gray-700 hover:text-blue-600 transition">
                    Entreprises
                </a>

            </div>

            <!-- Profil -->

            <div class="flex items-center gap-5">

                <div class="text-right">

                    <h3 class="font-bold text-gray-800">
                        {{ Auth::user()->name }}
                    </h3>

                    <span class="text-sm text-gray-500">
                        {{ Auth::user()->role }}
                    </span>

                </div>

                <div class="w-11 h-11 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold text-lg">

                    {{ strtoupper(substr(Auth::user()->name,0,1)) }}

                </div>

                <form method="POST" action="{{ route('logout') }}">

                    @csrf

                    <button
                        class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg shadow transition">

                        Déconnexion

                    </button>

                </form>

            </div>

        </div>

    </div>

</nav>