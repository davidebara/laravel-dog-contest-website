<!DOCTYPE html>
<html lang="en">

<head>
    <title>Coșul meu</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('icons/bootstrap-icons/font/bootstrap-icons.css') }}" rel="stylesheet">

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-12">
                <!-- <div class="dropdown">
                    <button type="button" class="btn btn-primary" data-bs-toggle="dropdown">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cos
                        <span class="badge bg-danger">{{ count((array) session('cart')) }}</span>
                    </button>

                    <div class="dropdown-menu" style="width: 170px;">
                        <div class="row total-header-section">
                            <div class="col-lg-6 col-sm-6 col-6">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                <span class="badge bg-danger">{{ count((array)session('cart')) }}</span>
                            </div>

                            <?php $total = 0 ?>

                            @foreach((array) session('cart') as $id => $details)
                            <?php $total += $details['price'] * $details['quantity'] ?>
                            @endforeach
                            <div class="text-center">
                                Total: <h3 class="text-info">{{ $total }} lei</h3>
                            </div>
                        </div>

                        @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                        <hr>
                        <div class="row cart-detail">
                            <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                <img src="{{ asset('images/' . $details['photo']) }}" style="width:50px;" alt="..." />
                            </div>
                            <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                <strong>{{ $details['film_title'] }}</strong>
                                <h6>🗓️ {{ $details['date'] }}</h6>
                                <h6>⏰ {{ $details['time'] }}</h6>
                                <h6>🏷️ {{ $details['price'] }} lei</h6>
                                <h6>🎟️ {{ $details['quantity'] }}</h6>
                                <h6 class="price text-info"> {{ $details['quantity'] * $details['price'] }}
                                    lei</h6>
                            </div>
                        </div>
                        @endforeach
                        @endif

                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                <a href="{{ url('cart') }}" class="btn btn-primary btn-block">Afisare tot</a>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>

    <br/>
    <div class="container">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @yield('content')
    </div>

    @yield('scripts')
</body>

</html>