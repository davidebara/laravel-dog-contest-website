<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dog</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-BEBqaT1Mt5MEFWWMz0MW8FGE1MtsKfeqTHW1H+4ZJW3P4FakxgEPhMZuI10Us8ot9Op1tByrd+Bz/FoP4znS9g=="
        crossorigin="anonymous" />


    <link href="{{ asset('icons/bootstrap-icons/font/bootstrap-icons.css') }}" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Add this before </body> tag in your main layout file -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Home
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @if ( Config::get('app.locale') == 'ch')
                        <img src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcSo18f0J5phUG57ldcoZG6eTzl124KaTRK_l2cjoC-K-6kY0F3l" alt="Emoji" style="height: 50px; width: 50px;">
                    @endif

                        @if(Auth::check() && Auth::user()->role == 1)

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('contests') }}">{{ __('Contests')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('dogs') }}">{{ __('Dogs') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('brackets') }}">{{ __('Brackets') }}</a>
                        </li>
                        @elseif(Auth::check() && Auth::user()->role == 0)
                        <li class="nav-item">
                            <a href="{{ route('dogs_user.index') }}" class="nav-link text-info">{{ __('My dogs') }}</a>
                        </li>
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">                        
                        @include('partials/language_switcher')
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        @if(Auth::check() && Auth::user()->role == 0)
                        <li class="nav-item">
                            <a class="nav-link text-primary" href="{{ route('contestant.index') }}">{{ __('Join a contest') }}</a>
                        </li>
                        @endif
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>


                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        @can('access-crud-page')
                        @else
                                <a class="dropdown-item" href="{{ route('owner-profile.index') }}">
                                    Owner Profile
                                </a>
                        @endcan
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>

</body>

</html>