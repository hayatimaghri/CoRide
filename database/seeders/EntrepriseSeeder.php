<?php

namespace Database\Seeders;

use App\Models\Entreprise;
use Illuminate\Database\Seeder;

class EntrepriseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // N9raw fichier CSV
        $csv = array_map('str_getcsv', file(database_path('data/entreprises.csv')));

        // N7yed awel ligne (header)
        $header = array_shift($csv);

        // Ndoro 3la kol ligne
        foreach ($csv as $row) {

            // Nrbto smiyat lcolonnes b les valeurs
            $data = array_combine($header, $row);

            // Ncréiw entreprise
            Entreprise::create([
                'nom' => $data['nom'],
                'ville' => $data['ville'],
            ]);
        }
    }
} 

