<?php

namespace App\Http\Controllers;

use App\Models\Drop;
use Illuminate\Http\Request;

class DropController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store', 'edit', 'update', 'destroy']);
        $this->middleware('medewerker')->except(['index', 'show']);
    }
    public function index()
    {
        $drops = Drop::where('actief', true)
            ->where('eind_datum', '>=', now())
            ->orderBy('start_datum')
            ->get();
        
        if (auth()->check() && auth()->user()->role === 'medewerker') {
            // Toon volledige beheerweergave voor medewerkers
            return view('drops.index', compact('drops'));
        } else {
            // Toon eenvoudigere weergave voor gasten
            return view('drops.public-index', compact('drops'));
        }
    }

    public function show(Drop $drop)
    {
        if (!$drop->actief) {
            abort(404);
        }

        return view('drops.show', compact('drop'));
    }

    public function create()
    {
        return view('drops.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'naam' => 'required|string|max:255',
            'beschrijving' => 'required|string',
            'start_datum' => 'required|date',
            'eind_datum' => 'required|date|after:start_datum',
            'afbeelding' => 'nullable|string',
        ]);

        $validated['actief'] = $request->has('actief');

        Drop::create($validated);

        return redirect()->route('drops.index')
            ->with('success', 'Drop succesvol aangemaakt!');
    }
}
