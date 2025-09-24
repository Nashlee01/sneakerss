@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            @if($drop->afbeelding)
                <img src="{{ $drop->afbeelding }}" alt="{{ $drop->naam }}" class="w-full h-64 md:h-96 object-cover">
            @else
                <div class="w-full h-64 bg-gray-200 flex items-center justify-center">
                    <span class="text-gray-400">Geen afbeelding beschikbaar</span>
                </div>
            @endif
            
            <div class="p-6">
                <h1 class="text-3xl font-bold mb-4">{{ $drop->naam }}</h1>
                
                <div class="flex flex-col md:flex-row justify-between mb-6">
                    <div class="mb-4 md:mb-0">
                        <p class="text-sm text-gray-500">Starttijd</p>
                        <p class="font-medium">{{ \Carbon\Carbon::parse($drop->start_datum)->format('d-m-Y H:i') }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Eindtijd</p>
                        <p class="font-medium">{{ \Carbon\Carbon::parse($drop->eind_datum)->format('d-m-Y H:i') }}</p>
                    </div>
                </div>
                
                <div class="prose max-w-none mb-8">
                    {!! nl2br(e($drop->beschrijving)) !!}
                </div>
                
                @auth
                    <div class="mt-8">
                        <a href="{{ route('tickets.create', $drop) }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-6 rounded-lg transition duration-200">
                            Koop nu tickets
                        </a>
                    </div>
                @else
                    <div class="mt-6 p-4 bg-blue-50 rounded-lg">
                        <p class="text-blue-800">Log in om tickets te kopen voor deze drop.</p>
                        <div class="mt-2">
                            <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Inloggen</a>
                            @if (Route::has('register'))
                                <span class="mx-2 text-gray-400">of</span>
                                <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Registreren</a>
                            @endif
                        </div>
                    </div>
                @endauth
            </div>
        </div>
        
        @auth
            @if(auth()->user()->role === 'medewerker')
                <div class="mt-6 flex justify-end space-x-4">
                    <a href="{{ route('drops.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded">
                        Terug naar overzicht
                    </a>
                </div>
            @endif
        @endauth
    </div>
</div>
@endsection
