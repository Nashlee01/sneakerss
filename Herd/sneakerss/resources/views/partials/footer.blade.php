<footer class="site-footer" role="contentinfo">
  <div class="container footer-inner">
    <p class="copyright">&copy; {{ date('Y') }} {{ config('app.name', 'App') }}. Alle rechten voorbehouden.</p>
    <nav aria-label="Footer navigatie" class="footer-nav">
      <a href="{{ route('contactpersonen') }}">Contactpersonen</a>
      <a href="{{ route('taken') }}">Taken</a>
      <a href="{{ route('instellingen') }}">Instellingen</a>
      <a href="{{ route('privacy') }}">Privacy</a>
      <a href="{{ route('terms') }}">Voorwaarden</a>
    </nav>
  </div>
  </footer>
