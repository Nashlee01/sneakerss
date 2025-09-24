@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6 bg-gray-50">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Ticket reserveren voor: {{ $drop->naam }}
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                    Vul onderstaand formulier in om je ticket te reserveren.
                </p>
            </div>
            
            <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
                <form action="{{ route('tickets.store', $drop) }}" method="POST" class="space-y-6 p-6">
                    @csrf
                    
                    <div>
                        <label for="naam" class="block text-sm font-medium text-gray-700">Volledige naam *</label>
                        <div class="mt-1">
                            <input type="text" name="naam" id="naam" required
                                   class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                    
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">E-mailadres *</label>
                        <div class="mt-1">
                            <input type="email" name="email" id="email" required
                                   class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                    
                    <div>
                        <label for="schoenmaat" class="block text-sm font-medium text-gray-700">Schoenmaat *</label>
                        <div class="mt-1">
                            <select id="schoenmaat" name="schoenmaat" required
                                    class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                <option value="">Selecteer je schoenmaat</option>
                                @for($i = 36; $i <= 48; $i++)
                                    <option value="{{ $i }}">Maat {{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    
                    <div class="pt-4">
                        <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Reserveer ticket
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="mt-6 text-center">
            <a href="{{ route('tickets.index') }}" class="text-sm font-medium text-blue-600 hover:text-blue-500">
                &larr; Terug naar alle drops
            </a>
        </div>
    </div>
</div>
@endsection
