<?php

namespace App\Http\Controllers;

use App\Models\Drop;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\TicketBevestiging;

class TicketController extends Controller
{
    public function index()
    {
        $huidigeDrops = Drop::where('actief', true)
            ->where('start_datum', '<=', now())
            ->where('eind_datum', '>=', now())
            ->orderBy('start_datum')
            ->get();

        $toekomstigeDrops = Drop::where('actief', true)
            ->where('start_datum', '>', now())
            ->orderBy('start_datum')
            ->get();

        return view('tickets.index', [
            'huidigeDrops' => $huidigeDrops,
            'toekomstigeDrops' => $toekomstigeDrops,
        ]);
    }

    public function create(Drop $drop)
    {
        if (!$drop->isActief()) {
            return redirect()->route('tickets.index')
                ->with('error', 'Deze drop is momenteel niet beschikbaar voor ticketverkoop.');
        }

        return view('tickets.create', compact('drop'));
    }

    public function store(Request $request, Drop $drop)
    {
        if (!$drop->isActief()) {
            return redirect()->route('tickets.index')
                ->with('error', 'Deze drop is momenteel niet beschikbaar voor ticketverkoop.');
        }

        $validated = $request->validate([
            'naam' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'schoenmaat' => 'required|string|in:36,37,38,39,40,41,42,43,44,45,46,47,48',
        ]);

        // Maak een nieuw ticket aan met de gevalideerde gegevens
        $ticket = new Ticket([
            'naam' => $validated['naam'],
            'email' => $validated['email'],
            'schoenmaat' => $validated['schoenmaat'],
            'bevestigd' => false, // Standaard niet bevestigd
        ]);
        
        // Koppel het ticket aan de drop en sla het op
        $ticket->drop()->associate($drop);
        $ticket->save();

        // Verstuur bevestigingsmail
        Mail::to($ticket->email)->send(new TicketBevestiging($ticket));

        return redirect()->route('tickets.bevestiging', $ticket->referentie);
    }

    public function bevestiging($referentie)
    {
        $ticket = Ticket::where('referentie', $referentie)->firstOrFail();
        return view('tickets.bevestiging', compact('ticket'));
    }

    public function bevestigEmail($token)
    {
        $ticket = Ticket::where('bevestigings_token', $token)->firstOrFail();
        
        if (!$ticket->bevestigd) {
            $ticket->bevestigd = true;
            $ticket->bevestigd_op = now();
            $ticket->save();
            
            // Stuur een bevestiging dat de e-mail is bevestigd
            return redirect()->route('tickets.bevestiging', $ticket->referentie)
                ->with('status', 'success')
                ->with('message', 'Je e-mailadres is bevestigd. Bedankt!');
        }

        // Als de e-mail al bevestigd was, stuur een bericht
        return redirect()->route('tickets.bevestiging', $ticket->referentie)
            ->with('status', 'info')
            ->with('message', 'Je e-mailadres was al bevestigd.');
    }
}
