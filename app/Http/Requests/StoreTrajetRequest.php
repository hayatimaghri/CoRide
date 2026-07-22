<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTrajetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'ville_depart' => 'required|string|max:255',
            'ville_arrivee' => 'required|string|max:255',
            'horaire' => 'required|date',
            'places_disponibles' => 'required|integer|min:1|max:8',
            'jours_recurrence' => 'nullable|string|max:255',
        ];
    }

    /**
     * Messages d'erreur personnalisés.
     */
    public function messages(): array
    {
        return [
            'ville_depart.required' => 'La ville de départ est obligatoire.',
            'ville_depart.string' => 'La ville de départ doit être un texte.',

            'ville_arrivee.required' => 'La ville d\'arrivée est obligatoire.',
            'ville_arrivee.string' => 'La ville d\'arrivée doit être un texte.',

            'horaire.required' => 'L\'horaire est obligatoire.',
            'horaire.date' => 'L\'horaire doit être une date valide.',

            'places_disponibles.required' => 'Le nombre de places est obligatoire.',
            'places_disponibles.integer' => 'Le nombre de places doit être un entier.',
            'places_disponibles.min' => 'Il doit y avoir au moins une place.',
            'places_disponibles.max' => 'Le nombre maximum de places est 8.',

            'jours_recurrence.string' => 'Les jours de récurrence doivent être un texte.',
        ];
    }
}
