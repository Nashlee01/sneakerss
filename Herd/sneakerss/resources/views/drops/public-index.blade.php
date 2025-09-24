@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold mb-8">Aankomende Drops</h1>
        
        @if($drops->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($drops as $drop)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        @if($drop->afbeelding)
                            <img src="{{ $drop->afbeelding }}" alt="{{ $drop->naam }}" class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                <span class="text-gray-400">Geen afbeelding beschikbaar</span>
                            </div>
                        @endif
                        
                        <div class="p-6">
                            <h2 class="text-xl font-semibold mb-2">{{ $drop->naam }}</h2>
                            <p class="text-gray-600 mb-4">{{ $drop->beschrijving }}</p>
                            
                            <div class="flex justify-between items-center text-sm text-gray-500 mb-4">
                                <div>
                                    <span class="font-medium">Start:</span> 
                                    {{ \Carbon\Carbon::parse($drop->start_datum)->format('d-m-Y H:i') }}
                                </div>
                                <div>
                                    <span class="font-medium">Eindigt:</span> 
                                    {{ \Carbon\Carbon::parse($drop->eind_datum)->format('d-m-Y H:i') }}
                                </div>
                            </div>
                            
                            <a href="{{ route('drops.show', $drop) }}" class="block w-full text-center bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded transition duration-200">
                                Bekijk details
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-center">
                <p class="text-gray-600">Er zijn momenteel geen actieve drops beschikbaar. Kom later nog eens terug!</p>
            </div>
        @endif
    </div>
</div>
@endsection
