<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Casts\AIResultCast;

class Reservation extends Model
{
    /**
     * Transitions de statut autorisées.
     * Clé = statut actuel, valeur = statuts vers lesquels on peut transitionner.
     */
    public const array TRANSITIONS_AUTORISEES = [
        'en_attente' => ['confirmee', 'refusee', 'annulee'],
        'confirmee' => ['annulee'],
        'refusee' => [],
        'annulee' => [],
    ];

    /**
     * Vérifie si la réservation peut passer de son statut actuel
     * vers le statut donné.
     */
    public function peutTransitionerVers(string $nouveauStatut): bool
    {
        if ($this->statut === $nouveauStatut) {
            return true;
        }

        return in_array($nouveauStatut, self::TRANSITIONS_AUTORISEES[$this->statut] ?? [], true);
    }

    protected $fillable = [
        'trajet_id',
        'passager_id',
        'statut',
        'date_reservation',

        // Zid had jouj
        'compatibility_score',
        'ai_result',
    ];

    protected function casts(): array
    {
        return [
            'date_reservation' => 'date',
            'compatibility_score' => 'integer',
            'ai_result' => AIResultCast::class,
        ];
    }

    public function trajet()
    {
        return $this->belongsTo(Trajet::class);
    }

    public function passager()
    {
        return $this->belongsTo(User::class, 'passager_id');
    }
}