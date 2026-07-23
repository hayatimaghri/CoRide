<?php

namespace Database\Seeders;

use App\Models\Trajet;
use Illuminate\Database\Seeder;

class TrajetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Lire le fichier CSV
        $csv = array_map('str_getcsv', file(database_path('data/trajets.csv')));

        // Supprimer le header
        $header = array_shift($csv);

        foreach ($csv as $row) {

            $data = array_combine($header, $row);

            Trajet::create([
                'conducteur_id' => $data['conducteur_id'],
                'ville_depart' => $data['ville_depart'],
                'ville_arrivee' => $data['ville_arrivee'],
                'horaire' => $data['horaire'],
                'places_disponibles' => $data['places_disponibles'],
                'jours_recurrence' => $data['jours_recurrence'],
            ]);
        }
    }
}