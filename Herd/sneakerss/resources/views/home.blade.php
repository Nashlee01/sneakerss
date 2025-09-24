@extends('layouts.app')

@section('content')
    <!-- Sneaker Hero Banner with Video Background -->
    <div class="relative bg-gray-900 text-white overflow-hidden h-[70vh] min-h-[500px] max-h-[700px]">
        <!-- Video Background -->
        <div class="absolute inset-0 z-0 overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-r from-black to-transparent opacity-80"></div>
            <div class="absolute inset-0 w-full h-full">
                <iframe 
                    class="w-full h-full object-cover" 
                    src="https://www.youtube.com/embed/VnE7m8JI7MY?autoplay=1&mute=1&controls=0&loop=1&playlist=VnE7m8JI7MY&showinfo=0&rel=0" 
                    frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen>
                </iframe>
            </div>
        </div>
        
        <!-- Content Overlay -->
        <div class="relative z-10 h-full flex items-center py-24 md:py-32">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h1 class="text-4xl md:text-6xl font-bold mb-4 tracking-tight">Ontdek de nieuwste sneakers</h1>
                    <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto">Exclusieve collecties van 's werelds beste merken</p>
                    <div class="flex flex-col sm:flex-row justify-center gap-4">
                        <a href="{{ route('stand_huren') }}" class="bg-white text-gray-900 hover:bg-gray-100 font-bold py-3 px-8 rounded-full text-lg transition duration-300 ease-in-out transform hover:scale-105">
                            Shop nu
                        </a>
                        <a href="{{ route('drops.index') }}" class="bg-transparent border-2 border-white hover:bg-white hover:bg-opacity-10 font-bold py-3 px-8 rounded-full text-lg transition duration-300 ease-in-out transform hover:scale-105">
                            Bekijk drops
                        </a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="absolute bottom-0 left-0 right-0 h-12 bg-gradient-to-t from-white to-transparent"></div>
    </div>

    <div class="py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Quick Actions -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <a href="{{ route('tickets.index') }}" class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border border-gray-200 hover:bg-gray-50 transition duration-150 ease-in-out">
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Tickets kopen</h3>
                    <p class="text-gray-600">Bekijk beschikbare tickets voor evenementen</p>
                </a>
                <a href="{{ route('stand_huren') }}" class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border border-gray-200 hover:bg-gray-50 transition duration-150 ease-in-out">
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Stand huren</h3>
                    <p class="text-gray-600">Huur een stand voor uw bedrijf</p>
                </a>
                <a href="{{ route('events') }}" class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border border-gray-200 hover:bg-gray-50 transition duration-150 ease-in-out">
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Bekijk events</h3>
                    <p class="text-gray-600">Ontdek aankomende evenementen</p>
                </a>
            </div>

            <!-- Notifications -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8">
                <div class="p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Meldingen</h2>
                    @if (!empty($notifications))
                        <div class="space-y-4">
                            @foreach ($notifications as $n)
                                <div class="border-b border-gray-100 pb-4 last:border-0 last:pb-0">
                                    <div class="font-medium text-gray-900">{{ $n['title'] }}</div>
                                    <p class="text-gray-600">{{ $n['body'] }}</p>
                                    <div class="text-sm text-gray-500 mt-1">{{ $n['time'] }}</div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500">Er zijn geen meldingen beschikbaar</p>
                    @endif
                </div>
            </div>

            <!-- Quick Links -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-6">Snel naar</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="border border-gray-200 rounded-lg p-6 hover:bg-gray-50 transition duration-150 ease-in-out">
                            <h3 class="text-lg font-medium text-gray-900 mb-2">Mijn profiel</h3>
                            <p class="text-gray-600 mb-4">Bekijk en bewerk je persoonlijke gegevens</p>
                            <a href="{{ route('profile.edit') }}" class="text-blue-600 hover:text-blue-800 font-medium">Bekijk profiel →</a>
                        </div>
                        <div class="border border-gray-200 rounded-lg p-6 hover:bg-gray-50 transition duration-150 ease-in-out">
                            <h3 class="text-lg font-medium text-gray-900 mb-2">Mijn tickets</h3>
                            <p class="text-gray-600 mb-4">Bekijk je aankoopgeschiedenis</p>
                            <a href="{{ route('tickets.index') }}" class="text-blue-600 hover:text-blue-800 font-medium">Bekijk tickets →</a>
                        </div>
                        <div class="border border-gray-200 rounded-lg p-6 hover:bg-gray-50 transition duration-150 ease-in-out">
                            <h3 class="text-lg font-medium text-gray-900 mb-2">Mijn evenementen</h3>
                            <p class="text-gray-600 mb-4">Bekijk je geplande evenementen</p>
                            <a href="{{ route('events') }}" class="text-blue-600 hover:text-blue-800 font-medium">Bekijk evenementen →</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
