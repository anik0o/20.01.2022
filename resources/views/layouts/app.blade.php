<!doctype html>
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
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>

        body{
            background-image: url({{asset('team.jpg')}});
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }


    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark bg-opacity-75 shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">

                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Zaloguj się') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Zarejestruj się') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="background: #1a1e21; color: white;">
                                    <a class="dropdown-item" style=" color: gray;"
                                       href="/profile">Profil</a>
                                    <a class="dropdown-item"  style=" color: gray;"
                                       href="/groups/yours/{{ Auth::user()->group_id }}">Grupa</a>
                                    <a class="dropdown-item"  style=" color: gray;"
                                       href="/settings">Ustawienia</a>

                                    <a class="dropdown-item"  style=" color: gray;" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Wyloguj') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none" >
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @guest
            <main class="py-4">
                @yield('content')
            </main>
        @else
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-auto bg-light sticky-top bg-opacity-75">
                    <div class="d-flex flex-sm-column flex-row flex-nowrap bg-none align-items-center sticky-top">
                        <a href="/home" class="d-block p-3 link-dark text-decoration-none" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Icon-only">
                            <i class="bi-bootstrap fs-1 bg-opacity-75" >
                                <img src="{{url('st.png')}}" alt="profil" width="30">
                            </i>
                        </a>
                        <ul class="nav nav-pills nav-flush flex-sm-column flex-row flex-nowrap mb-auto mx-auto text-center justify-content-between w-100 px-3 align-items-center">
                            <li class="nav-item">
                                <a href="/profile" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Home">
                                    <i class="bi-house fs-1">
                                        <img src="{{url('pro.png')}}" alt="profil" width="30">
                                    </i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/groups/menu" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Home">
                                    <i class="bi-house fs-1">
                                        <img src="{{url('gru.png')}}" alt="profil" width="30">
                                    </i>
                                </a>
                            </li>
                            <li>
                                @if(Auth::user()->group_id)
                                <a href="/list" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Dashboard">
                                    <i class="bi-speedometer2 fs-1">
                                        <img src="{{url('list.png')}}" alt="profil" width="30">
                                    </i>
                                </a>
                                @else
                                    <a href="/withoutgroup" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Dashboard">
                                        <i class="bi-speedometer2 fs-1">
                                            <img src="{{url('list.png')}}" alt="profil" width="30">
                                        </i>
                                    </a>
                                    @endif
                            </li>
                            <li>
                                <a href="/full" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Orders">
                                    <i class="bi-table fs-1">
                                        <img src="{{url('cal.png')}}" alt="profil" width="30">
                                    </i>
                                </a>
                            </li>
                            <li>
                                <a href="/search" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Products">
                                    <i class="bi-heart fs-1">
                                        <img src="{{url('lu.png')}}" alt="profil" width="30">
                                    </i>
                                </a>
                            </li>
                            <li>
                                <a href="/play" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Customers">
                                    <i class="bi-people fs-1">
                                        <img src="{{url('gr.png')}}" alt="profil" width="30">
                                    </i>
                                </a>
                            </li>
                        </ul>

                    </div>
                </div>

                <div class="col-sm p-3 min-vh-100">
                    <!-- content -->
                    <main class="py-4">
                        @yield('content')
                    </main>
                </div>
            </div>
        </div>
        @endguest
    </div>
</body>
</html>
