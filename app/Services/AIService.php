<?php

namespace App\Services;

use function Laravel\Ai\agent;

class AIService
{
    /**
     * Analyse la compatibilité entre un passager et un trajet.
     *
     * @param array{
     *     ville_residence_passager: string,
     *     ville_depart: string,
     *     ville_arrivee: string,
     *     horaire: string,
     *     jours_recurrence: string|null,
     * } $data
     *
     * @return array{
     *     score: int,
     *     justification: string,
     *     horaire_suggere: string
     * }
     */
    public function analyseTrajet(array $data): array
    {
        try {

            $response = agent(
                instructions: <<<'TXT'
                    Tu es l'assistant de compatibilité de CoRide, une application de covoiturage
                    pour salariés d'entreprises partenaires.

                    Ton rôle est d'évaluer, pour UN passager qui cherche un trajet,
                    à quel point ce trajet précis lui convient.

                    Critère principal : la proximité géographique entre la ville de résidence
                    du passager et la ville de départ du trajet.

                    - Villes identiques : score élevé (90-100)
                    - Villes proches / même région : score moyen-haut (60-89)
                    - Villes éloignées : score bas (0-59)

                    Tu peux nuancer légèrement en tenant compte de l'horaire et des jours de
                    récurrence du trajet, mais sans jamais inventer de données non fournies.

                    Réponds toujours en français, de façon concise et factuelle.
                TXT,

                schema: fn ($schema) => [

                    'score' => $schema->integer()
                        ->description('Score de compatibilité entre 0 et 100.')
                        ->required(),

                    'justification' => $schema->string()
                        ->description(
                            'Explication courte et claire du score, en français.'
                        )
                        ->required(),

                    'horaire_suggere' => $schema->string()
                        ->description(
                            "Horaire suggéré pour le passager, basé sur l'horaire du trajet."
                        )
                        ->required(),
                ],

            )->prompt(

                prompt: sprintf(
                    "Ville de résidence du passager : %s\n".
                    "Trajet proposé — départ : %s, arrivée : %s, horaire : %s, jours de récurrence : %s.\n\n".
                    "Calcule le score de compatibilité de ce trajet pour ce passager, ".
                    "avec une justification et un horaire suggéré.",

                    $data['ville_residence_passager'],
                    $data['ville_depart'],
                    $data['ville_arrivee'],
                    $data['horaire'],
                    $data['jours_recurrence'] ?? 'non précisés',
                ),

                model: config('ai.scoring_model'),
            );

            $result = $response->toArray();

            return [
                'score' => (int) ($result['score'] ?? 0),

                'justification' => $result['justification'] ?? '',

                'horaire_suggere' =>
                    $result['horaire_suggere'] ?? $data['horaire'],
            ];

        } catch (\Throwable $e) {

            report($e);

            return [
                'score' => 0,

                'justification' => $e->getMessage(),

                'horaire_suggere' => $data['horaire'],
            ];
        }
    }
}