<?php

namespace App\Http\Controllers;

use App\Models\Stand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StandController extends Controller
{
    /**
     * Display a public listing of stands.
     */
    public function publicIndex()
    {
        // For guests, only show available stands
        // For employees, show all stands with management options
        $stands = auth()->check() && auth()->user()->role === 'medewerker'
            ? Stand::latest()->get()
            : Stand::where('beschikbaar', true)->latest()->get();
            
        return view('stands.public-index', compact('stands'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stands = Stand::latest()->get();
        return view('stands.index', compact('stands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('stands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'naam' => 'required|string|max:255',
            'locatie' => 'required|string|max:255',
            'beschrijving' => 'required|string',
            'prijs' => 'required|numeric|min:0',
            'grootte' => 'required|string|max:255',
            'beschikbaar' => 'boolean',
        ]);

        Stand::create($validated);

        return redirect()->route('stand_huren')
            ->with('success', 'Stand succesvol toegevoegd!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Stand $stand)
    {
        return view('stands.show', compact('stand'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stand $stand)
    {
        return view('stands.edit', compact('stand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stand $stand)
    {
        $validated = $request->validate([
            'naam' => 'required|string|max:255',
            'locatie' => 'required|string|max:255',
            'beschrijving' => 'required|string',
            'prijs' => 'required|numeric|min:0',
            'grootte' => 'required|string|max:255',
            'beschikbaar' => 'boolean',
        ]);

        $stand->update($validated);

        return redirect()->route('stand_huren')
            ->with('success', 'Stand succesvol bijgewerkt!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stand $stand)
    {
        $stand->delete();

        return redirect()->route('stand_huren')
            ->with('success', 'Stand succesvol verwijderd!');
    }
}

