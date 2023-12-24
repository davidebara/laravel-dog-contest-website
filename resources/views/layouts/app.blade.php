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
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('screenings') }}">Contests</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('locations') }}">Dogs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('actors') }}">Prizes</a>
                        </li>

                        @can('access-crud-page')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('users') }}">Utilizatori</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link text-info">Dashboard</a>
                        </li>
                        @endcan
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link text-primary" href="{{ url('actors') }}">Join a contest!</a>
                        </li>
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
                        <!-- Additional Dropdown for Shopping Cart -->
                        <li class="nav-item dropdown">


                            <div class="dropdown">

                                <button type="button" class="btn btn-primary" data-bs-toggle="dropdown">
                                    <i class="bi bi-cart" aria-hidden="true"></i> Cos
                                    <span class="badge badge-pill" @if (count((array) session('cart'))>= 1)
                                        style="background-color: red; border-radius: 50%; padding: 0.35em 0.55em;"
                                        @endif
                                        >
                                        {{ count((array) session('cart')) }}
                                    </span>
                                </button>




                                <div class="dropdown-menu" style="width: 170px;">

                                    <div class="row total-header-section">
                                        <div class="col-lg-6 col-sm-6 col-6">
                                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                            <span class="badge badge-pill badge-danger">{{ count((array)session('cart'))
                                                }}</span>
                                        </div>

                                        <?php $total = 0 ?>

                                        @foreach((array) session('cart') as $id => $details)
                                        <?php $total += $details['price'] * $details['quantity'] ?>
                                        @endforeach
                                        <div class="text-center">
                                            Total: <h3 class="text-primary">{{ $total }} lei</h3>
                                        </div>

                                    </div>
                                    @if(session('cart'))
                                    @foreach(session('cart') as $id => $details)
                                    <hr>
                                    <div class="row cart-detail">
                                        <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                            <img src="{{ asset('images/' . $details['photo']) }}" style="width:50px;"
                                                alt="..." />
                                        </div>
                                        <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                            <strong>{{ $details['film_title'] }}</strong>
                                            <h6>🗓️ {{ $details['date'] }}</h6>
                                            <h6>⏰ {{ $details['time'] }}</h6>
                                            <h6>🏷️ {{ $details['price'] }} lei</h6>
                                            <h6>🎟️ {{ $details['quantity'] }}</h6>
                                            <h6>📍 {{ $details['location_name'] }}</h6>
                                            <h6 class="price text-primary"> {{ $details['quantity'] *
                                                $details['price']}}
                                                lei</h6>

                                        </div>
                                    </div>

                                    @endforeach

                                    @endif
                                    @if($total > 0)
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                            <a href="{{ url('cart') }}" class="btn btn-primary btn-block">Afisare
                                                tot</a>
                                        </div>
                                    </div>
                                    @endif

                                </div>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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