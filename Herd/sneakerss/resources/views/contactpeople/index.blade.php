@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1 class="text-2xl font-semibold text-gray-900 mb-4">Contactpersonen</h1>

      @if (session('status'))
        <div class="status" role="status">{{ session('status') }}</div>
      @endif

      <form method="POST" action="{{ route('contactpersonen.store') }}" novalidate>
        @csrf
        <div class="card">
          <div>
            <label for="name">Naam</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required />
            @error('name')<div class="error">{{ $message }}</div>@enderror
          </div>
          <div>
            <label for="email">E-mailadres</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required />
            @error('email')<div class="error">{{ $message }}</div>@enderror
          </div>
          <div>
            <label for="phone">Telefoonnummer</label>
            <input id="phone" type="text" name="phone" value="{{ old('phone') }}" />
            @error('phone')<div class="error">{{ $message }}</div>@enderror
          </div>
          <div style="margin-top:16px">
            <button type="submit" class="btn">Opslaan</button>
          </div>
        </div>
      </form>

      <section class="section" aria-labelledby="lijst-title">
        <h2 id="lijst-title" class="section-title">Lijst</h2>
        @if($contacts->isEmpty())
          <p class="empty">Nog geen contactpersonen toegevoegd.</p>
        @else
          <table>
            <thead>
              <tr>
                <th style="width:22%">Naam</th>
                <th style="width:26%">E-mail</th>
                <th style="width:18%">Telefoon</th>
                <th style="width:18%">Aangemaakt</th>
                <th style="width:16%">Acties</th>
              </tr>
            </thead>
            <tbody>
              @foreach($contacts as $c)
                <tr>
                  <td>{{ $c->name }}</td>
                  <td>{{ $c->email }}</td>
                  <td>{{ $c->phone ?: '-' }}</td>
                  <td>{{ $c->created_at->format('d-m-Y H:i') }}</td>
                  <td>
                    <a class="btn-outline" href="{{ route('contactpersonen.edit', $c) }}">Bewerken</a>
                    <form method="POST" action="{{ route('contactpersonen.destroy', $c) }}" style="display:inline-block;margin-left:6px" onsubmit="return confirm('Weet je zeker dat je deze contactpersoon wilt verwijderen?');">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn-danger">Verwijderen</button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        @endif
      </section>
            </div>
        </div>
    </div>
</div>
@endsection
