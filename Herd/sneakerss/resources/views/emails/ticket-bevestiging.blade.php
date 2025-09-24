@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => config('app.url')])
{{ config('app.name') }}
@endcomponent
@endslot

{{-- Body --}}
# Bevestiging van je ticket voor {{ $ticket->drop->naam }}

Beste {{ $ticket->naam }},

Bedankt voor je reservering voor de "{{ $ticket->drop->naam }}" drop. Hier zijn je reserveringsgegevens:

@component('mail::panel')
**Referentienummer:** {{ $ticket->referentie }}

**Drop:** {{ $ticket->drop->naam }}

**Datum:** {{ $ticket->drop->start_datum->format('d-m-Y H:i') }} - {{ $ticket->drop->eind_datum->format('H:i') }}

**Schoenmaat:** Maat {{ $ticket->schoenmaat }}
@endcomponent

## Bevestig je e-mailadres

Klik op de onderstaande knop om je e-mailadres te bevestigen en je reservering definitief te maken:

@component('mail::button', ['url' => $bevestigingsUrl])
Bevestig je reservering
@endcomponent

## Wat gebeurt er nu?

1. **Bevestig je e-mailadres** door op de knop hierboven te klikken.
2. Je ontvangt een **toegangsticket** per e-mail na bevestiging.
3. **Bewaar dit ticket goed**, je hebt het nodig voor toegang tot de drop.
4. Kom op tijd op de dag van de drop en neem je ticket mee (digitaal of uitgeprint).

## Vragen?

Heb je vragen over je reservering? Neem dan contact met ons op via [info@sneakerss.test](mailto:info@sneakerss.test).

Veel succes met de drop!

Met vriendelijke groet,  
Het {{ config('app.name') }} team

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
© {{ date('Y') }} {{ config('app.name') }}. Alle rechten voorbehouden.

[Privacyverklaring]({{ url('/privacy') }}) | [Algemene voorwaarden]({{ url('/voorwaarden') }})
@endcomponent
@endslot
@endcomponent
