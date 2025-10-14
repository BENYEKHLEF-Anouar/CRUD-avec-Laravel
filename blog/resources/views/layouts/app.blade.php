<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>{{ $title ?? config('app.name') }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body{font-family:system-ui,-apple-system,Segoe UI,Roboto,Ubuntu;max-width:760px;margin:32px auto;padding:0 16px}
    nav a{margin-right:12px;text-decoration:none}
    .active{font-weight:700;text-decoration:underline}
    .card{padding:16px;border:1px solid #eee;border-radius:12px;margin-bottom:16px}
  </style>
</head>
<body>
  <header>
    <h1>{{ config('app.name', 'Blog Solicode') }}</h1>
    @include('partials.nav')
    <hr>
  </header>

  <main>
    @include('partials.flash')
    @yield('content')
  </main>

  <hr>
  <footer>
    Laravel • {{ now()->format('d/m/Y H:i') }} • {{ config('app.timezone') }}
  </footer>
</body>
</html>
