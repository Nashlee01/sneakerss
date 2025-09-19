<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-semibold text-gray-900 mb-4">Welkom terug</h1>
                    <p class="text-gray-600 mb-6">Krijg snel inzicht met navigatie en meldingen op één plek.</p>
                    <a href="{{ route('contactpersonen') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-md transition duration-150 ease-in-out">
                        Ga naar Contactpersonen
                    </a>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <a href="{{ route('tickets') }}" class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border border-gray-200 hover:bg-gray-50 transition duration-150 ease-in-out">
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
                            <a href="{{ route('tickets') }}" class="text-blue-600 hover:text-blue-800 font-medium">Bekijk tickets →</a>
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
</x-app-layout>
