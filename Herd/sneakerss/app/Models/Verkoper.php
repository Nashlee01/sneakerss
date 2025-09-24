<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Verkoper extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'naam',
        'email',
        'bedrijfsnaam',
        'telefoon',
        'opmerkingen',
        'actief'
    ];

    protected $casts = [
        'actief' => 'boolean',
    ];
}
