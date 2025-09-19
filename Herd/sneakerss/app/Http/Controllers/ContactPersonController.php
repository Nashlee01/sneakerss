<?php

namespace App\Http\Controllers;

use App\Models\ContactPerson;
use Illuminate\Http\Request;

class ContactPersonController extends Controller
{
    /**
     * Toon lijst met contactpersonen + formulier.
     */
    public function index()
    {
        $contacts = ContactPerson::latest()->get();
        return view('contactpeople.index', compact('contacts'));
    }

    /**
     * Sla nieuwe contactpersoon op.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
        ]);

        ContactPerson::create($validated);

        return redirect()->route('contactpersonen')->with('status', 'Contactpersoon is succesvol opgeslagen.');
    }

    /**
     * Toon bewerkformulier.
     */
    public function edit(ContactPerson $contactpersoon)
    {
        return view('contactpeople.edit', ['contact' => $contactpersoon]);
    }

    /**
     * Werk contactpersoon bij.
     */
    public function update(Request $request, ContactPerson $contactpersoon)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
        ]);

        $contactpersoon->update($validated);

        return redirect()->route('contactpersonen')->with('status', 'Contactpersoon is bijgewerkt.');
    }

    /**
     * Verwijder contactpersoon.
     */
    public function destroy(ContactPerson $contactpersoon)
    {
        $contactpersoon->delete();
        return redirect()->route('contactpersonen')->with('status', 'Contactpersoon is verwijderd.');
    }
}
