<?php

namespace App\Mail;

use App\Models\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TicketBevestiging extends Mailable
{
    use Queueable, SerializesModels;

    public $ticket;

    public function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket;
    }

    public function build()
    {
        $bevestigingsUrl = route('tickets.bevestig-email', $this->ticket->bevestigings_token);
        
        return $this->subject('Bevestiging van je ticket voor ' . $this->ticket->drop->naam)
                    ->view('emails.ticket-bevestiging')
                    ->with([
                        'bevestigingsUrl' => $bevestigingsUrl,
                    ]);
    }
}
