<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;
class Entreprise extends Model
{
    protected $fillable = [
        'nom',
        'ville'
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}