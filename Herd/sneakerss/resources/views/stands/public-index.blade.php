<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Stands Huren
            </h2>
            @auth
                @if(Auth::user()->role === 'medewerker')
                    <a href="{{ route('stands.create') }}" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 transition-colors duration-200">
                        Nieuwe Stand Toevoegen
                    </a>
                @endif
            @endauth
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @forelse($stands as $stand)
                            <div class="border rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-200">
                                <div class="p-6">
                                    <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $stand->naam }}</h3>
                                    <p class="text-gray-600 mb-4">{{ Str::limit($stand->beschrijving, 150) }}</p>
                                    <div class="flex justify-between items-center">
                                        <span class="text-lg font-bold text-gray-900">€{{ number_format($stand->prijs, 2) }}</span>
                                        <div class="flex space-x-2">
                                            <a href="{{ route('stands.show', $stand) }}" class="px-3 py-1.5 bg-blue-500 text-white text-sm rounded-md hover:bg-blue-600 transition-colors duration-200">
                                                Bekijk
                                            </a>
                                            @auth
                                                @if(Auth::user()->role === 'medewerker')
                                                    <a href="{{ route('stands.edit', $stand) }}" class="px-3 py-1.5 bg-yellow-500 text-white text-sm rounded-md hover:bg-yellow-600 transition-colors duration-200">
                                                        Bewerk
                                                    </a>
                                                    <form action="{{ route('stands.destroy', $stand) }}" method="POST" class="inline" onsubmit="return confirm('Weet je zeker dat je deze stand wilt verwijderen?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="px-3 py-1.5 bg-red-500 text-white text-sm rounded-md hover:bg-red-600 transition-colors duration-200">
                                                            Verwijder
                                                        </button>
                                                    </form>
                                                @endif
                                            @endauth
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full text-center py-12">
                                <p class="text-gray-500">Er zijn momenteel geen stands beschikbaar.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
