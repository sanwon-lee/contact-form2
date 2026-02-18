<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @stack('robots')
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">
  @stack('css')
</head>
<body>
  <header class="header">
    <a href="{{ route('contacts.index') }}" class="header__logo">Contact Form</a>
  </header>

  <main>
    @yield('content')
    @stack('scripts')
  </main>
</body>
</html>