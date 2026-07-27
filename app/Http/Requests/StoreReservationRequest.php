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
        'compatibility_score' => 'nullable|integer|min:0|max:100',
        'ai_justification' => 'nullable|string',
        'ai_horaire_suggere' => 'nullable|string',
    ];
}

public function messages(): array
{
    return [
        'trajet_id.required' => 'Le trajet est obligatoire.',
        'trajet_id.exists' => 'Le trajet sélectionné est introuvable.',
    ];
}
    
  
}