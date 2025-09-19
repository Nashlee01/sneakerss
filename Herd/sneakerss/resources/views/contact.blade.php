<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contact') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
      @if (session('status'))
        <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded" role="alert">
          {{ session('status') }}
        </div>
      @endif

      <form method="POST" action="{{ route('contact.submit') }}" class="space-y-6">
        @csrf
        
        <div>
          <label for="name" class="block text-sm font-medium text-gray-700">Naam</label>
          <div class="mt-1">
            <input id="name" name="name" type="text" required 
                   class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                   value="{{ old('name') }}" autocomplete="name">
          </div>
          @error('name')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>

        <div>
          <label for="email" class="block text-sm font-medium text-gray-700">E-mailadres</label>
          <div class="mt-1">
            <input id="email" name="email" type="email" required 
                   class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                   value="{{ old('email') }}" autocomplete="email">
          </div>
          @error('email')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>

        <div>
          <label for="message" class="block text-sm font-medium text-gray-700">Bericht</label>
          <div class="mt-1">
            <textarea id="message" name="message" rows="6" required
                      class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">{{ old('message') }}</textarea>
          </div>
          @error('message')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>

        <div class="flex justify-end">
          <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            Verstuur bericht
          </button>
        </div>
      </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
