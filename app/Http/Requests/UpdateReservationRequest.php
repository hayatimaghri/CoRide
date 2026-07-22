<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReservationRequest extends FormRequest
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
            'trajet_id' => 'required|exists:trajets,id',

            'statut' => 'required|in:en_attente,confirmee,refusee,annulee',

            'date_reservation' => 'required|date',
        ];
    }

    /**
     * Get custom error messages.
     */
    public function messages(): array
    {
        return [
            'trajet_id.required' => 'Le trajet est obligatoire.',
            'trajet_id.exists' => 'Le trajet sélectionné est introuvable.',

            'statut.required' => 'Le statut est obligatoire.',
            'statut.in' => 'Le statut doit être : en_attente, confirmee, refusee ou annulee.',

            'date_reservation.required' => 'La date de réservation est obligatoire.',
            'date_reservation.date' => 'La date de réservation doit être valide.',
        ];
    }
}
