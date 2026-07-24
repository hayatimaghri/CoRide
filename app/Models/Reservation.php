<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Casts\AIResultCast;

class Reservation extends Model
{
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