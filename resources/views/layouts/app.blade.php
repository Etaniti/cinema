<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Кинотеатр</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ url('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('css/styles.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    {{-- <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script> --}}
    @livewireStyles
</head>

<body style="overflow-auto">
    <div id="app" class="content">
        <nav class="navbar fixed-top navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Кинотеатр
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse  d-flex justify-content-between" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="btn btn-outline-light text-dark mx-3"
                                    href="{{ route('login') }}">{{ __('Войти') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="btn btn-outline-light text-dark"
                                        href="{{ route('register') }}">{{ __('Зарегистрироваться') }}</a>
                                </li>
                            @endif
                        @else
                            @role('admin')
                                <li id="profile" class="nav-item d-flex px-3">
                                    <a href="{{ route('admin') }}" class="btn btn-outline-primary">Панель администратора</a>
                                </li>
                                <li id="profile" class="nav-item d-flex">
                                    <a class="btn btn-outline-light text-dark"
                                        href="{{ route('logout') }}">{{ __('Выйти') }}</a>
                                </li>
                            @else
                                <li id="profile" class="nav-item d-flex px-3">
                                    <a href="{{ route('profile.index', ['user' => auth()->user()->id]) }}"
                                        class="btn btn-outline-dark">Личный кабинет</a>
                                </li>
                                <li id="logout" class="nav-item d-flex">
                                    <a class="btn btn-outline-light text-dark"
                                        href="{{ route('logout') }}">{{ __('Выйти') }}</a>
                                </li>
                            @endrole
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="mt-5">
            @yield('sidebar')
            @yield('content')
        </main>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
    @livewireScripts
</body>

</html>
