<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="{{ URL::asset('css/sidebar.css') }}" />


    <style>
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #0e2238;
            color: white;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="lni lni-grid-alt"></i>
                </button>
                <div class="sidebar-logo">
                    <a href="/home">E-KAFA</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="{{ route('profile.edit') }}" class="sidebar-link">
                        <i class="lni lni-user"></i>
                        <span>Profile</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('register.view') }}" class="sidebar-link">
                        <i class="lni lni-users"></i>
                        <span>Students</span>
                    </a>
                <li class="sidebar-item">
                    <a href="/kafa" class="sidebar-link">
                        <i class="lni lni-book"></"></i>
                        <span>KAFA ACTIVITIES</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-agenda"></i>
                        <span>STUDENT RESULTS</span>
                    </a>
                </li>
                <li class="sidebar-item has-dropdown">
                    <a href="#" class="sidebar-link" onclick="toggleDropdown(this)">
                        <i class="bi bi-receipt"></i>
                        <span>FEES</span>
                    </a>
                    <ul class="sidebar-dropdown">
                        <li><a href="/payment-details" class="sidebar-link">Payment Details</a></li>
                        <li><a href="/payment-history" class="sidebar-link">Payment History</a></li>

                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-bell-fill"></i>
                        <span>Notification</span>
                    </a>
                </li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <div class="sidebar-footer">
                        <a href="route('logout')"
                            onclick="event.preventDefault();
                   this.closest('form').submit();"
                            class="sidebar-link"><i class="lni lni-exit"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </form>

        </aside>
        <!-- Page Content -->
        <div class="main p-3">
            <div class="text-center">

                {{ $slot }}

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="{{ URL::asset('js/sidebarscript.js') }}"></script>
    <footer>
        <div class="footer">
            <p>© 2024 E-KAFA. All Rights Reserved</p>

        </div>
    </footer>
</body>


</html>
