<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Deliveboo</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">


        <nav class="navbar navbar-expand-md navbar-light shadow-sm d-flex justify-content-between">
            <div class="container">
                <div class="logo-deliveboo">
                    <a href="{{url('/') }}"><img src="{{asset('logo.png')}}" alt="" class="w-25"></a>
                </div>
                <div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('accedi') }}">{{ __('Accedi') }}</a>
            </li>
            @if (Route::has('registrati'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('registrati') }}">{{ __('Registrati') }}</a>
            </li>
            @endif
            @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ url('dashboard') }}">{{__('Dashboard')}}</a>
                    <a class="dropdown-item" href="{{ url('profile') }}">{{__('Profile')}}</a>
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
</div>
        </nav>

        <main class="main-bg">
            @yield('content')
        </main>
    </div>
</body>

<style>

    .main-bg{
        height: 100vh;
        background-image: url("{{ asset('img/Screenshot 2024-07-01 alle 16.02.09.png') }}");
        background-size: cover;
        background-repeat: no-repeat;
        background-position-x: 180;
        back
        }

    .navbar{
        background-color: rgb(232, 135, 53);
    }

    .navbar a {
        color: white;
        /*-webkit-text-stroke-width: 1px; */
    }

    .logo-deliveboo{
            max-width:300px;
    }

</style>

</html>
