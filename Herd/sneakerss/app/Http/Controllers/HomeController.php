<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Toon de Homepagina met navigatie en meldingen.
     */
    public function index(Request $request)
    {
        // Demo toggle: voeg ?demo=happy toe aan de URL om voorbeeldmeldingen te tonen
        $demo = $request->query('demo');

        if ($demo === 'happy') {
            $notifications = [
                [
                    'title' => 'Nieuwe taak toegewezen',
                    'body' => 'Je hebt een nieuwe taak: Voorraadcontrole Q3.',
                    'time' => 'zojuist',
                ],
                [
                    'title' => 'Systeemupdate voltooid',
                    'body' => 'De planningstool is succesvol bijgewerkt.',
                    'time' => '1 uur geleden',
                ],
            ];
        } else {
            // Unhappy scenario: geen meldingen beschikbaar
            $notifications = [];
        }

        return view('home', [
            'notifications' => $notifications,
        ]);
    }
}
