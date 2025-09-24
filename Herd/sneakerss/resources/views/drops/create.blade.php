@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="text-2xl font-semibold mb-6">Nieuwe Drop Toevoegen</h2>
                
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('drops.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <label for="naam" class="block text-gray-700 text-sm font-bold mb-2">Naam:</label>
                        <input type="text" name="naam" id="naam" value="{{ old('naam') }}" 
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <div class="mb-4">
                        <label for="beschrijving" class="block text-gray-700 text-sm font-bold mb-2">Beschrijving:</label>
                        <textarea name="beschrijving" id="beschrijving" rows="4"
                                  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('beschrijving') }}</textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="start_datum" class="block text-gray-700 text-sm font-bold mb-2">Start Datum:</label>
                            <input type="datetime-local" name="start_datum" id="start_datum" 
                                   value="{{ old('start_datum') }}"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div>
                            <label for="eind_datum" class="block text-gray-700 text-sm font-bold mb-2">Eind Datum:</label>
                            <input type="datetime-local" name="eind_datum" id="eind_datum" 
                                   value="{{ old('eind_datum') }}"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="afbeelding" class="block text-gray-700 text-sm font-bold mb-2">Afbeelding URL (optioneel):</label>
                        <input type="text" name="afbeelding" id="afbeelding" 
                               value="{{ old('afbeelding') }}"
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <div class="mb-6">
                        <label class="flex items-center">
                            <input type="checkbox" name="actief" class="form-checkbox" {{ old('actief') ? 'checked' : 'checked' }}>
                            <span class="ml-2 text-sm text-gray-600">Actief</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Opslaan
                        </button>
                        <a href="{{ route('drops.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                            Annuleren
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
