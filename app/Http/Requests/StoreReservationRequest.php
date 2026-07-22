<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreReservationRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'trajet_id' => 'required|exists:trajets,id',
            'statut' => 'required|in:en_attente,confirmee,refusee,annulee',
            'date_reservation' => 'required|date',
        ];
    }

    /**
     * Messages d'erreur personnalisés.
     */
    public function messages(): array
    {
        return [
            'trajet_id.required' => 'Le trajet est obligatoire.',
            'trajet_id.exists' => 'Le trajet sélectionné est introuvable.',

            'statut.required' => 'Le statut est obligatoire.',
            'statut.in' => 'Le statut doit être : en_attente, confirmee, refusee ou annulee.',

            'date_reservation.required' => 'La date de réservation est obligatoire.',
            'date_reservation.date' => 'La date de réservation doit être une date valide.',
        ];
    }
}