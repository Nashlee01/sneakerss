<!DOCTYPE html>
<html lang="nl">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Contactpersonen | {{ config('app.name', 'App') }}</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
      @vite(['resources/css/app.css', 'resources/css/home.css', 'resources/js/app.js'])
    @else
      <style>
        :root{--bg:#f7f7f8;--fg:#1b1b18;--muted:#6b7280;--card:#ffffff;--border:#e5e7eb;--link:#111827}
        *{box-sizing:border-box}body{margin:0;background:var(--bg);color:var(--fg);font-family:system-ui,-apple-system,Segoe UI,Roboto,Ubuntu,Cantarell,Noto Sans,sans-serif}
        .container{max-width:960px;margin:0 auto;padding:24px}
        .card{background:var(--card);border:1px solid var(--border);border-radius:12px;padding:20px}
        label{display:block;font-weight:600;margin:12px 0 6px}
        input[type="text"], input[type="email"]{width:100%;padding:10px 12px;border:1px solid var(--border);border-radius:8px;background:#fff;color:inherit}
        table{width:100%;border-collapse:separate;border-spacing:0 8px}
        th{text-align:left;color:#374151;font-weight:600}
        td{background:var(--card);border:1px solid var(--border);padding:10px 12px;border-radius:8px}
        .btn{display:inline-block;background:#111827;color:#fff;padding:10px 16px;border-radius:8px;text-decoration:none;border:1px solid #111827}
        .btn:hover{opacity:.9}
        .btn-outline{display:inline-block;background:#fff;color:#111827;padding:8px 12px;border-radius:8px;text-decoration:none;border:1px solid #111827}
        .btn-danger{display:inline-block;background:#b91c1c;color:#fff;padding:8px 12px;border-radius:8px;text-decoration:none;border:1px solid #991b1b}
        .status{background:#ecfdf5;border:1px solid #a7f3d0;color:#065f46;padding:12px 14px;border-radius:8px;margin-bottom:16px}
        .error{color:#b91c1c;font-size:14px;margin-top:6px}
      </style>
    @endif
  </head>
  <body>
    @include('partials.header')
    <div class="container">
      <h1 style="margin:24px 0">Contactpersonen</h1>

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
    @include('partials.footer')
  </body>
</html>
