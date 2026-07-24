<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\TrajetController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;
use App\Models\Entreprise;
use App\Models\User;
use App\Models\Trajet;
use App\Models\Reservation;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {

    return view('dashboard', [
        'entreprises' => Entreprise::count(),
        'users' => User::count(),
        'trajets' => Trajet::count(),
        'reservations' => Reservation::count(),

        'confirmes' => Reservation::where('statut','confirmee')->count(),
        'attente' => Reservation::where('statut','en_attente')->count(),
        'refusees' => Reservation::where('statut','refusee')->count(),
        'annulees' => Reservation::where('statut','annulee')->count(),

        'conducteurs' => User::whereIn('role',['conducteur','les deux'])->count(),
        'passagers' => User::whereIn('role',['passager','les deux'])->count(),

        'dernierTrajets' => Trajet::with('conducteur')->latest()->take(5)->get(),

        'dernieresReservations' => Reservation::with(['trajet','passager'])->latest()->take(5)->get(),
    ]);

})->middleware(['auth'])->name('dashboard');


Route::middleware('auth')->group(function () {

    Route::resource('entreprises', EntrepriseController::class);

    Route::resource('trajets', TrajetController::class);

    Route::resource('reservations', ReservationController::class);
    Route::get('/mes-trajets', [TrajetController::class, 'mesTrajets'])
    ->name('trajets.mes');
    Route::get('/recherche-trajets', [TrajetController::class, 'recherche'])
    ->name('trajets.recherche');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';