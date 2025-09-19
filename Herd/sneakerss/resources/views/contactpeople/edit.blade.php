<!DOCTYPE html>
<html lang="nl">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Contactpersoon bewerken | {{ config('app.name', 'App') }}</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
      @vite(['resources/css/app.css', 'resources/css/home.css', 'resources/js/app.js'])
    @else
      <style>
        :root{--bg:#f7f7f8;--fg:#1b1b18;--muted:#6b7280;--card:#ffffff;--border:#e5e7eb;--link:#111827}
        *{box-sizing:border-box}body{margin:0;background:var(--bg);color:var(--fg);font-family:system-ui,-apple-system,Segoe UI,Roboto,Ubuntu,Cantarell,Noto Sans,sans-serif}
        .container{max-width:720px;margin:0 auto;padding:24px}
        .card{background:var(--card);border:1px solid var(--border);border-radius:12px;padding:20px}
        label{display:block;font-weight:600;margin:12px 0 6px}
        input[type="text"], input[type="email"]{width:100%;padding:10px 12px;border:1px solid var(--border);border-radius:8px;background:#fff;color:inherit}
        .btn{display:inline-block;background:#111827;color:#fff;padding:10px 16px;border-radius:8px;text-decoration:none;border:1px solid #111827}
        .btn:hover{opacity:.9}
        .btn-outline{display:inline-block;background:#fff;color:#111827;padding:10px 16px;border-radius:8px;text-decoration:none;border:1px solid #111827}
        .error{color:#b91c1c;font-size:14px;margin-top:6px}
      </style>
    @endif
  </head>
  <body>
    @include('partials.header')
    <div class="container">
      <h1 style="margin:24px 0">Contactpersoon bewerken</h1>

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
    @include('partials.footer')
  </body>
</html>
