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

    @if (Auth::check())
        <nav class="header__nav">
          <ul class="header__nav-inner">
            <li>
              <form action="{{ route('logout') }}" method="post">
                @csrf
                <button>ログアウト</button>
              </form>
            </li>
          </ul>
        </nav>
    @endif
  </header>

  <main class="main">
    @yield('content')
    @stack('scripts')
  </main>
</body>
</html>