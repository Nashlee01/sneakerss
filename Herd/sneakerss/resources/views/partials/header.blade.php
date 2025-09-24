@php
  $isActive = function(string $name): string {
    return request()->routeIs($name) ? 'active' : '';
  };
@endphp
<header class="site-header {{ ($transparent ?? false) ? 'site-header--transparent' : '' }}">
  <div class="container header-inner">
    <a href="{{ route('home') }}" class="brand" aria-label="Ga naar Home">
      <span class="logo-dot" aria-hidden="true"></span>
      <span class="brand-name">{{ config('app.name', 'App') }}</span>
    </a>
    <nav aria-label="Primaire navigatie" class="main-nav">
      <a class="{{ $isActive('tickets.*') }}" href="{{ route('tickets.index') }}">Tickets kopen</a>
      <a class="{{ $isActive('stand_huren') }}" href="{{ route('stand_huren') }}">Stand huren</a>
      <a class="{{ $isActive('events') }}" href="{{ route('events') }}">Event</a>
      <a class="{{ $isActive('shop') }}" href="{{ route('shop') }}">Shoppen</a>
      <a class="{{ $isActive('contact') }}" href="{{ route('contact') }}">Contact</a>
    </nav>
    <div class="auth-nav">
      @auth
        @if(auth()->user()->role === 'medewerker')
          <a href="{{ route('stand_huren') }}" class="btn-outline">Beheer Standen</a>
        @endif
        <form method="POST" action="{{ route('logout') }}" class="d-inline">
          @csrf
          <button type="submit" class="btn-outline">Uitloggen</button>
        </form>
      @else
        <a href="{{ route('login') }}" class="btn-outline">Inloggen</a>
        <a href="{{ route('register') }}" class="btn">Registreren</a>
      @endauth
    </div>
  </div>
</header>
