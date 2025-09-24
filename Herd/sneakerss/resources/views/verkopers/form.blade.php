@if ($errors->any())
    <div class="mb-4 p-4 bg-red-100 border-l-4 border-red-500 text-red-700">
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="space-y-6">
    <div>
        <label for="naam" class="block text-sm font-medium text-gray-700">Naam *</label>
        <input type="text" name="naam" id="naam" value="{{ old('naam', $verkoper->naam ?? '') }}" required
               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
    </div>

    <div>
        <label for="email" class="block text-sm font-medium text-gray-700">E-mailadres *</label>
        <input type="email" name="email" id="email" value="{{ old('email', $verkoper->email ?? '') }}" required
               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
    </div>

    <div>
        <label for="bedrijfsnaam" class="block text-sm font-medium text-gray-700">Bedrijfsnaam *</label>
        <input type="text" name="bedrijfsnaam" id="bedrijfsnaam" value="{{ old('bedrijfsnaam', $verkoper->bedrijfsnaam ?? '') }}" required
               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
    </div>

    <div>
        <label for="telefoon" class="block text-sm font-medium text-gray-700">Telefoonnummer</label>
        <input type="tel" name="telefoon" id="telefoon" value="{{ old('telefoon', $verkoper->telefoon ?? '') }}"
               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
    </div>

    <div>
        <label for="opmerkingen" class="block text-sm font-medium text-gray-700">Opmerkingen</label>
        <textarea name="opmerkingen" id="opmerkingen" rows="3"
                  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">{{ old('opmerkingen', $verkoper->opmerkingen ?? '') }}</textarea>
    </div>

    <div class="flex items-center">
        <input type="hidden" name="actief" value="0">
        <input type="checkbox" name="actief" id="actief" value="1" 
               {{ old('actief', isset($verkoper) ? $verkoper->actief : true) ? 'checked' : '' }}
               class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
        <label for="actief" class="ml-2 block text-sm text-gray-700">
            Actieve verkoper
        </label>
    </div>
</div>
