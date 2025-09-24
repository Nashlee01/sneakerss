@extends('layouts.app')

@section('content')
<div class="py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="md:flex md:items-center md:justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Nieuwe verkoper toevoegen</h1>
            <div class="mt-4 flex md:mt-0">
                <a href="{{ route('verkopers.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Terug naar overzicht
                </a>
            </div>
        </div>

        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <form action="{{ route('verkopers.store') }}" method="POST" class="p-6">
                @csrf
                @include('verkopers.form')
                
                <div class="mt-8 flex justify-end space-x-3">
                    <a href="{{ route('verkopers.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Annuleren
                    </a>
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Opslaan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
