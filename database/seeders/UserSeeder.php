<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Entreprise;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Lire le fichier CSV
        $csv = array_map('str_getcsv', file(database_path('data/users.csv')));

        // Supprimer le header
        $header = array_shift($csv);

        // Parcourir chaque ligne
        foreach ($csv as $row) {

            // Associer les colonnes aux valeurs
            $data = array_combine($header, $row);

            // Rechercher l'entreprise
            $entreprise = Entreprise::where('nom', $data['entreprise'])->first();

            // Créer l'utilisateur
            User::create([
                'name' => $data['nom'],
                'email' => $data['email'],
                'password' => Hash::make('password123'),
                'entreprise_id' => $entreprise->id,
                'ville_residence' => $data['ville_residence'],
                'role' => $data['role'] === 'les deux'
                    ? 'les_deux'
                    : $data['role'],
            ]);
        }
    }
}