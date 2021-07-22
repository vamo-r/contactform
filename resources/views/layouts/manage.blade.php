<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @hasSection('title')
      <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>
    @else
      <title>{{ config('app.name', 'Laravel') }}</title>
    @endif

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
          <h1><a class="navbar-brand" href="{{ route('manage') }}">
            @yield('title')
          </a></h1>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
              <!-- Authentication Links -->
              @guest
                @if (Route::has('login'))
                  <li class="nav-item">
                    <p class="notlogin">{{ __('ログインしていません') }}</p>
                  </li>
                @endif

                @else
                <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                  </a>

                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                        {{ __('ログアウト') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                    </form>
                  </div>
                </li>
              @endguest
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <main>
      @yield('content')
    </main>

  </body>
</html>