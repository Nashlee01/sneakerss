<?php

namespace Database\Seeders;

use App\Models\Stand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stands = [
            [
                'naam' => 'Hoek Stand',
                'locatie' => 'Hoek van de hal',
                'beschrijving' => 'Grote hoekstand met veel ruimte en zichtbaarheid van meerdere kanten.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'naam' => 'Midden Stand',
                'locatie' => 'Midden van de hal',
                'beschrijving' => 'Centrale stand met veel loopverkeer en zichtbaarheid van alle kanten.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'naam' => 'Ingang Stand',
                'locatie' => 'Naast de hoofdingang',
                'beschrijving' => 'Zeer zichtbare stand direct bij de ingang van de beurs.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'naam' => 'VIP Lounge',
                'locatie' => 'Achterin de hal',
                'beschrijving' => 'Exclusieve stand met zitgelegenheid en privacy.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'naam' => 'Eetgelegenheid',
                'locatie' => 'Naast de koffiehoek',
                'beschrijving' => 'Ideale plek voor food-gerelateerde producten, dichtbij de eetgelegenheid.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($stands as $stand) {
            Stand::create($stand);
        }
    }
}
