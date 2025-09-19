<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Toon het contactformulier.
     */
    public function show()
    {
        return view('contact');
    }

    /**
     * Verwerk het contactformulier.
     */
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        // Hier zou je kunnen e-mailen of opslaan in de database.
        // Voor nu doen we een eenvoudige success flow met een flash bericht.

        return back()->with('status', 'Bedankt! Je bericht is verzonden.');
    }
}
