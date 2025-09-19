<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Nieuwe Stand Toevoegen
            </h2>
            <div>
                <a href="{{ route('stand_huren') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition-colors duration-200">
                    Terug naar overzicht
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

    <div class="card">
        <div class="card-body">
            <form action="{{ route('stands.store') }}" method="POST">
                @csrf
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="naam" class="form-label">Naam *</label>
                        <input type="text" class="form-control @error('naam') is-invalid @enderror" id="naam" name="naam" value="{{ old('naam') }}" required>
                        @error('naam')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="locatie" class="form-label">Locatie *</label>
                        <input type="text" class="form-control @error('locatie') is-invalid @enderror" id="locatie" name="locatie" value="{{ old('locatie') }}" required>
                        @error('locatie')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="beschrijving" class="form-label">Beschrijving *</label>
                    <textarea class="form-control @error('beschrijving') is-invalid @enderror" id="beschrijving" name="beschrijving" rows="4" required>{{ old('beschrijving') }}</textarea>
                    @error('beschrijving')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="prijs" class="form-label">Prijs (€) *</label>
                        <input type="number" step="0.01" min="0" class="form-control @error('prijs') is-invalid @enderror" id="prijs" name="prijs" value="{{ old('prijs') }}" required>
                        @error('prijs')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="grootte" class="form-label">Grootte *</label>
                        <input type="text" class="form-control @error('grootte') is-invalid @enderror" id="grootte" name="grootte" value="{{ old('grootte') }}" required>
                        @error('grootte')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3 d-flex align-items-end">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="beschikbaar" name="beschikbaar" value="1" {{ old('beschikbaar') ? 'checked' : 'checked' }}>
                            <label class="form-check-label" for="beschikbaar">Beschikbaar</label>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                    <a href="{{ route('stand_huren') }}" class="btn btn-secondary me-md-2">Annuleren</a>
                    <button type="submit" class="btn btn-primary">Opslaan</button>
                </div>
            </form>
        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
