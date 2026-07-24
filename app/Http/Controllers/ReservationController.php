<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Models\Reservation;
use App\Models\Trajet;
use App\Services\AIService;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::with(['trajet', 'passager'])
            ->latest()
            ->get();

        return view('reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $trajets = Trajet::all();

        return view('reservations.create', compact('trajets'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReservationRequest $request, AIService $ai)
    {

      
        $trajet = Trajet::findOrFail($request->trajet_id);

        // Vérifier les places disponibles
        $placesOccupees = Reservation::where('trajet_id', $trajet->id)
            ->where('statut', 'confirmee')
            ->count();

        if ($placesOccupees >= $trajet->places_disponibles) {
            return back()->with('error', 'Ce trajet est complet.');
        }

        // Vérifier la réservation en doublon
        $existe = Reservation::where('trajet_id', $trajet->id)
            ->where('passager_id', auth()->id())
            ->exists();

        if ($existe) {
            return back()->with('error', 'Vous avez déjà réservé ce trajet.');
        }

        // Création de la réservation
        $reservation = Reservation::create([
            'trajet_id' => $request->trajet_id,
            'passager_id' => auth()->id(),
            'statut' => 'en_attente',
            'date_reservation' => now()->toDateString(),
        ]);

        // Analyse IA (temporaire)
        $result = $ai->analyseTrajet([
            'ville_depart' => $trajet->ville_depart,
            'ville_arrivee' => $trajet->ville_arrivee,
            'horaire' => $trajet->horaire,
        ]);

        // Sauvegarde du résultat IA
       $reservation->update([
    'compatibility_score' => $result['score'],
    'ai_result' => $result,
]);

dd($reservation->fresh()->toArray());

        return redirect()
            ->route('reservations.index')
            ->with('success', 'Réservation créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        return view('reservations.show', compact('reservation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        return view('reservations.edit', compact('reservation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {
        $reservation->update([
            'statut' => $request->statut,
        ]);

        return redirect()
            ->route('reservations.index')
            ->with('success', 'Réservation mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return redirect()
            ->route('reservations.index')
            ->with('success', 'Réservation supprimée avec succès.');
    }
}