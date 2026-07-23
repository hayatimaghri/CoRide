<?php

namespace Database\Seeders;

use App\Models\Reservation;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Lire le fichier CSV
        $csv = array_map('str_getcsv', file(database_path('data/reservations.csv')));

        // Supprimer le header
        $header = array_shift($csv);

        foreach ($csv as $row) {

            $data = array_combine($header, $row);

            Reservation::create([
                'trajet_id' => $data['trajet_id'],
                'passager_id' => $data['passager_id'],
                'statut' => $data['statut'],
                'date_reservation' => $data['date_reservation'],
            ]);
        }
    }
}