@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-8">Beschikbare Drops</h1>
        
        @if(session('error'))
            <div class="mb-6 p-4 bg-red-100 border-l-4 border-red-500 text-red-700">
                <p>{{ session('error') }}</p>
            </div>
        @endif

        @if($huidigeDrops->count() > 0)
            <div class="mb-12">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Nu beschikbaar</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($huidigeDrops as $drop)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            @if($drop->afbeelding)
                                <img src="{{ asset('storage/' . $drop->afbeelding) }}" alt="{{ $drop->naam }}" class="w-full h-48 object-cover">
                            @endif
                            <div class="p-6">
                                <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $drop->naam }}</h3>
                                <p class="text-gray-600 mb-4">{{ $drop->beschrijving }}</p>
                                <div class="text-sm text-gray-500 mb-4">
                                    <p>Start: {{ $drop->start_datum->format('d-m-Y H:i') }}</p>
                                    <p>Eindigt: {{ $drop->eind_datum->format('d-m-Y H:i') }}</p>
                                </div>
                                <a href="{{ route('tickets.create', $drop) }}" class="inline-block w-full text-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">
                                    Ticket Reserveren
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        @if($toekomstigeDrops->count() > 0)
            <div>
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Binnenkort beschikbaar</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($toekomstigeDrops as $drop)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden opacity-75">
                            @if($drop->afbeelding)
                                <img src="{{ asset('storage/' . $drop->afbeelding) }}" alt="{{ $drop->naam }}" class="w-full h-48 object-cover opacity-75">
                            @endif
                            <div class="p-6">
                                <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $drop->naam }}</h3>
                                <p class="text-gray-600 mb-4">{{ $drop->beschrijving }}</p>
                                <div class="text-sm text-gray-500 mb-4">
                                    <p>Start: {{ $drop->start_datum->format('d-m-Y H:i') }}</p>
                                    <p>Eindigt: {{ $drop->eind_datum->format('d-m-Y H:i') }}</p>
                                </div>
                                <button disabled class="w-full px-4 py-2 bg-gray-400 text-white rounded-md cursor-not-allowed">
                                    Binnenkort beschikbaar
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        @if($huidigeDrops->count() === 0 && $toekomstigeDrops->count() === 0)
            <div class="text-center py-12">
                <p class="text-gray-500 text-lg">Er zijn momenteel geen beschikbare drops. Kom later terug!</p>
            </div>
        @endif
    </div>
</div>
@endsection
