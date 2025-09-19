<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Stand: {{ $stand->naam }}
            </h2>
            <div class="space-x-2">
                <a href="{{ route('stand_huren') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition-colors duration-200">
                    Terug naar overzicht
                </a>
                @auth
                    @if(Auth::user()->role === 'medewerker')
                        <a href="{{ route('stands.edit', $stand) }}" class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition-colors duration-200">
                            Bewerken
                        </a>
                    @endif
                @endauth
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-3 fw-bold">Naam:</div>
                <div class="col-md-9">{{ $stand->naam }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 fw-bold">Locatie:</div>
                <div class="col-md-9">{{ $stand->locatie }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 fw-bold">Prijs:</div>
                <div class="col-md-9">€{{ number_format($stand->prijs, 2, ',', '.') }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 fw-bold">Grootte:</div>
                <div class="col-md-9">{{ $stand->grootte }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 fw-bold">Status:</div>
                <div class="col-md-9">
                    <span class="badge bg-{{ $stand->beschikbaar ? 'success' : 'danger' }}">
                        {{ $stand->beschikbaar ? 'Beschikbaar' : 'Niet beschikbaar' }}
                    </span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 fw-bold">Beschrijving:</div>
                <div class="col-md-9">{{ $stand->beschrijving }}</div>
            </div>
            
            @auth
                @if(Auth::user()->role !== 'medewerker' && $stand->beschikbaar)
                    <div class="mt-4 pt-3 border-top">
                        <h5 class="mb-3">Deze stand huren?</h5>
                        <a href="#" class="btn btn-primary">Nu huren voor €{{ number_format($stand->prijs, 2, ',', '.') }}</a>
                    </div>
                @endif
            @else
                <div class="mt-4 pt-3 border-top">
                    <p class="text-muted">Log in om deze stand te huren of neem contact op met een medewerker.</p>
                    <a href="{{ route('login') }}" class="btn btn-primary">Inloggen</a>
                </div>
            @endauth
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
