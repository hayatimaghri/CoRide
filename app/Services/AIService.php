<?php

namespace App\Services;

use Laravel\Ai\Ai;

class AIService
{
    public function analyseTrajet(array $data)
    {
        return [
            'score' => 95,
            'justification' => 'Le trajet correspond bien au passager.',
            'horaire_suggere' => $data['horaire'],
        ];
    }
}