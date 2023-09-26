<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/wow-animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/templatemo-style.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/vendor/modernizr-2.6.2-respond-1.1.0.min.js') }}"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        #navbar {
            overflow: hidden;
            z-index:11111111111;

        }
        #navbar a {
            display: block;
        }
    </style>

    <script src="{{ asset('js/vendor/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/vendor/wow-animate.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <script>
        window.onscroll = function () { myFunction() };

        var navbar = document.getElementById("navbar");
        var sticky = navbar.offsetTop;

        function myFunction() {
            if (window.pageYOffset >= sticky) {
                navbar.classList.add("sticky")
            } else {
                navbar.classList.remove("sticky");
            }
        }
    </script>

</head>
<body>
<div class="header">
    <nav class="navbar navbar-inverse" id="navbar" role="navigation" style="height:140px;">
        <div class="container">
            <div class="navbar-header">
                <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="" style="margin-left:0 !important" class="navbar-brand scroll-top"><img class="img-responsive" src="/images/rOCP_Group.png" alt="Layer Template"></a>
            </div>
            <!--/.navbar-header-->
            <div id="main-nav" class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right" style="margin-top:60px; text-transform:uppercase">


                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                @if (Auth::user()->role == 'admin')
                                    <a class="dropdown-item" href="{{ route('zones.admin') }}">
                                        {{ __('Admin') }}
                                    </a>
                                @endif
                            </li>
                        <li class="nav-item">
                                <a class="dropdown-item" href="{{ route('logout.perform') }}">
                                    {{ __('Logout') }}
                                </a>
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

