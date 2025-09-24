@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6 bg-green-50">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-green-100 rounded-full p-2">
                        <svg class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-lg leading-6 font-medium text-green-800">
                            Bedankt voor je reservering, {{ $ticket->naam }}!
                        </h3>
                        <p class="mt-1 text-sm text-green-700">
                            We hebben je reservering ontvangen en een bevestigingsmail gestuurd naar {{ $ticket->email }}.
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
                <dl class="sm:divide-y sm:divide-gray-200">
                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Referentienummer</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 font-mono">{{ $ticket->referentie }}</dd>
                    </div>
                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Drop</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $ticket->drop->naam }}</dd>
                    </div>
                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Schoenmaat</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">Maat {{ $ticket->schoenmaat }}</dd>
                    </div>
                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Datum</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $ticket->drop->start_datum->format('d-m-Y H:i') }} - {{ $ticket->drop->eind_datum->format('H:i') }}
                        </dd>
                    </div>
                    @if(!$ticket->bevestigd)
                        <div class="py-4 sm:py-5 sm:px-6 bg-yellow-50">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-yellow-700">
                                        Controleer je e-mail en bevestig je reservering door op de link in de bevestigingsmail te klikken.
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif
                </dl>
            </div>
            
            <div class="px-4 py-4 bg-gray-50 text-right sm:px-6">
                <a href="{{ route('tickets.index') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Terug naar alle drops
                </a>
            </div>
        </div>
        
        <div class="mt-6 bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Wat gebeurt er nu?
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                    Hier is wat je kunt verwachten na je reservering.
                </p>
            </div>
            <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
                <dl class="sm:divide-y sm:divide-gray-200">
                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">1. Bevestigingsmail</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            Je ontvangt een e-mail met een bevestigingslink. Klik hierop om je reservering te bevestigen.
                        </dd>
                    </div>
                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">2. Toegangsticket</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            Na bevestiging ontvang je een toegangsticket per e-mail. Bewaar dit goed, je hebt het nodig voor toegang tot de drop.
                        </dd>
                    </div>
                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">3. Op de dag zelf</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            Zorg dat je je ticket bij de hand hebt (digitaal of uitgeprint) en kom op tijd. Houd rekening met eventuele wachttijden.
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</div>
@endsection
