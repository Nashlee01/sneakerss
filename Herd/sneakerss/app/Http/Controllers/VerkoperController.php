<?php

namespace App\Http\Controllers;

use App\Models\Verkoper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VerkoperController extends Controller
{
    public function index()
    {
        $verkopers = Verkoper::orderBy('naam')->get();
        return view('verkopers.index', compact('verkopers'));
    }

    public function create()
    {
        return view('verkopers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'naam' => 'required|string|max:255',
            'email' => 'required|email|unique:verkopers,email',
            'bedrijfsnaam' => 'required|string|max:255',
            'telefoon' => 'nullable|string|max:20',
            'opmerkingen' => 'nullable|string',
            'actief' => 'boolean'
        ]);

        Verkoper::create($validated);

        return redirect()
            ->route('verkopers.index')
            ->with('success', 'Verkoper succesvol toegevoegd.');
    }

    public function edit(Verkoper $verkoper)
    {
        return view('verkopers.edit', compact('verkoper'));
    }

    public function update(Request $request, Verkoper $verkoper)
    {
        $validated = $request->validate([
            'naam' => 'required|string|max:255',
            'email' => 'required|email|unique:verkopers,email,' . $verkoper->id,
            'bedrijfsnaam' => 'required|string|max:255',
            'telefoon' => 'nullable|string|max:20',
            'opmerkingen' => 'nullable|string',
            'actief' => 'boolean'
        ]);

        $verkoper->update($validated);

        return redirect()
            ->route('verkopers.index')
            ->with('success', 'Verkoper succesvol bijgewerkt.');
    }

    public function destroy(Verkoper $verkoper)
    {
        $verkoper->delete();
        
        return redirect()
            ->route('verkopers.index')
            ->with('success', 'Verkoper succesvol verwijderd.');
    }
}
