<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kafa Management</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!--CSS-->
    <link rel="stylesheet" href="{{ URL::asset('css/mainstyle.css')}}"/>
    <!--BootStrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!--FONT AWESOME IMPLEMENTATION-->
    <script src="https://kit.fontawesome.com/a176545576.js" crossorigin="anonymous"></script>
    <!--SwiperJS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- Custom Styles -->
    <style>
        body {
            background: linear-gradient(120deg, #3498db, #8e44ad);
            color: #fff;
            font-family: 'Poppins', sans-serif;
        }
        .navbar {
            background-color: rgba(0, 0, 0, 0.7);
        }
        .navbar-brand {
            font-family: 'Chewy', cursive;
            color: #fff;
        }
        .navbar-brand:hover {
            color: #fff;
        }
        .navbar-nav .nav-link {
            color: #fff;
        }
        .navbar-nav .nav-link:hover {
            color: #ddd;
        }
        .vh-100 {
            min-height: 100vh;
        }
        .centered-text {
            text-align: center;
            animation: fadeIn 2s ease-in-out;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        .gap-50px {
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">E-KAFA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-regular fa-user"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            @if (Route::has('login'))
                                @auth
                                    <li><a class="dropdown-item" href="{{ url('/home') }}">Home</a></li>
                                @else
                                    <li><a class="dropdown-item" href="{{ route('login') }}">Log in</a></li>
                                    @if (Route::has('register'))
                                        <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
                                    @endif
                                @endauth
                            @endif
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!--MAIN BODY START HERE-->
    <div class="container d-flex flex-column justify-content-center align-items-center text-center vh-100">
        <h1 class="centered-text" style="font-family: Chewy; color: #fff;">Welcome to E-KAFA</h1>
        <h2 class="centered-text gap-50px" style="font-family: 'Poppins', sans-serif; color: #fff;"></h2>
    </div>
</body>
</html>
