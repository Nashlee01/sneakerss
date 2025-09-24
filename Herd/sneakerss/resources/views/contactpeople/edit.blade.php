@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1 class="text-2xl font-semibold text-gray-900 mb-6">Contactpersoon bewerken</h1>

      <form method="POST" action="{{ route('contactpersonen.update', $contact) }}" novalidate>
        @csrf
        @method('PATCH')
        <div class="card">
          <div>
            <label for="name">Naam</label>
            <input id="name" type="text" name="name" value="{{ old('name', $contact->name) }}" required />
            @error('name')<div class="error">{{ $message }}</div>@enderror
          </div>
          <div>
            <label for="email">E-mailadres</label>
            <input id="email" type="email" name="email" value="{{ old('email', $contact->email) }}" required />
            @error('email')<div class="error">{{ $message }}</div>@enderror
          </div>
          <div>
            <label for="phone">Telefoonnummer</label>
            <input id="phone" type="text" name="phone" value="{{ old('phone', $contact->phone) }}" />
            @error('phone')<div class="error">{{ $message }}</div>@enderror
          </div>
          <div style="margin-top:16px; display:flex; gap:8px;">
            <button type="submit" class="btn">Opslaan</button>
            <a href="{{ route('contactpersonen') }}" class="btn-outline">Annuleren</a>
          </div>
        </div>
      </form>
            </div>
        </div>
    </div>
</div>
@endsection
