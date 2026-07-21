<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEntrepriseRequest;
use App\Http\Requests\UpdateEntrepriseRequest;


class EntrepriseController extends Controller
{
    public function index()
    {
        $entreprises = Entreprise::all();
        return view('entreprises.index', compact('entreprises'));
    }

    public function create()
    {
        return view('entreprises.create');
    }

    public function store(StoreEntrepriseRequest $request)
{
    Entreprise::create($request->validated());

    return redirect()->route('entreprises.index')
        ->with('success', 'Entreprise ajoutée avec succès.');
}

      

    public function show(Entreprise $entreprise)
    {
        return view('entreprises.show', compact('entreprise'));
    }

    public function edit(Entreprise $entreprise)
    {
        return view('entreprises.edit', compact('entreprise'));
    }

   public function update(UpdateEntrepriseRequest $request, Entreprise $entreprise)
{
    $entreprise->update($request->validated());

    return redirect()->route('entreprises.index')
        ->with('success', 'Entreprise modifiée avec succès.');
}


    public function destroy(Entreprise $entreprise)
    {
        $entreprise->delete();

        return redirect()->route('entreprises.index')
            ->with('success', 'Entreprise supprimée.');
    }
}
