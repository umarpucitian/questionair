<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                @guest
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>

                        <li class="nav-item">
                            @if (Route::has('register'))
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        </li>

                    </ul>
                @else
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item {{ (stripos($_SERVER['REQUEST_URI'], 'home') !== false)? 'active': ''}} ">
                            <a class="nav-link" href="{{action('HomeController@index')}}">Home <span class="sr-only">
                                    (current)</span></a>
                        </li>
                        <li class="nav-item {{ (stripos($_SERVER['REQUEST_URI'], 'questionair') !== false)? 'active': ''}}">
                            <a class="nav-link" href="{{action('QuestionairController@index')}}">Questionairs</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Results</a>
                        </li>

                    </ul>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                @endguest

            </div>
        </nav>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
