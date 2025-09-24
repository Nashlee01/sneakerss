<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Ticket extends Model
{
    protected $fillable = [
        'naam',
        'email',
        'schoenmaat',
        'referentie',
        'bevestigd',
        'bevestigings_token',
        'drop_id'
    ];

    protected $casts = [
        'bevestigd' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($ticket) {
            $ticket->referentie = 'TICKET-' . strtoupper(Str::random(8));
            $ticket->bevestigings_token = Str::random(32);
            $ticket->bevestigd = false; // Zorg ervoor dat standaard niet bevestigd is
        });
    }

    public function drop()
    {
        return $this->belongsTo(Drop::class);
    }
}
