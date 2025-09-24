<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\ContactPerson;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Create test user
        User::factory()->create([
            'name' => 'Test Medewerker',
            'email' => 'medewerker@example.com',
            'role' => 'medewerker',
        ]);

        User::factory()->create([
            'name' => 'Gewone User',
            'email' => 'test@example.com',
            'role' => 'user',
        ]);

        // Seed stands
        $this->call([
            StandSeeder::class,
        ]);

        // Demo contactpersonen
        ContactPerson::factory()->count(6)->create();

        // Voeg test drops toe
        \App\Models\Drop::create([
            'naam' => 'Zomer Sale 2025',
            'beschrijving' => 'Grootste sale van het jaar met kortingen tot 70%!',
            'start_datum' => now(),
            'eind_datum' => now()->addDays(7),
            'actief' => true,
            'afbeelding' => null,
        ]);

        \App\Models\Drop::create([
            'naam' => 'Nieuwe Collectie Herfst',
            'beschrijving' => 'Bekijk onze gloednieuwe herfstcollectie',
            'start_datum' => now()->addDays(10),
            'eind_datum' => now()->addDays(30),
            'actief' => true,
            'afbeelding' => null,
        ]);
    }
}
