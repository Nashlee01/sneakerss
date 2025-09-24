<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Drop extends Model
{
    protected $fillable = [
        'naam',
        'beschrijving',
        'start_datum',
        'eind_datum',
        'actief',
        'afbeelding'
    ];

    protected $casts = [
        'start_datum' => 'datetime',
        'eind_datum' => 'datetime',
        'actief' => 'boolean',
    ];

    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }

    public function isActief(): bool
    {
        $now = now();
        return $this->actief && 
               $this->start_datum <= $now && 
               $this->eind_datum >= $now;
    }
}
