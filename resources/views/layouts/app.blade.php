<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title','Generic Elective')</title>

    <!-- Scripts -->
    @yield('js_script')
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Fonts -->
    @yield('css')
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @livewireStyles
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('ge_registration') }}">Register Your GE Course</a>
                        </li>
                        <!-- Authentication Links -->
                        @guest
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li> --}}
                        <li>
                            <a href="{{ route('news') }}" class="nav-link">News</a>
                        </li>
                        @else
                        <li>
                            <a href="{{ route('home') }}" class="nav-link">Dashboard</a>
                        </li>
                        <li>
                            <a href="{{ route('settings') }}" class="nav-link">Settings</a>
                        </li>
                        <li>
                            <a href="{{ route('generate_excel_form') }}" class="nav-link">Generate Excel</a>
                        </li>
                        <li>
                            <a href="{{ route('institute') }}" class="nav-link">Institute</a>
                        </li>
                        <li>
                            <a href="{{ route('department') }}" class="nav-link">Department</a>
                        </li>
                        <li>
                            <a href="{{ route('program') }}" class="nav-link">Program</a>
                        </li>
                        <li>
                            <a href="{{ route('course') }}" class="nav-link">Course</a>
                        </li>
                        <li>
                            <a href="{{ route('brochure') }}" class="nav-link">Brochure</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register_user') }}">{{ __('Admin level User') }}</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                    {{-- <li class="nav-item">
                        <a href="{{ route('about_us') }}" class="nav-link">About Developer</a>
                    </li> --}}
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4 container-fluid">
        @yield('content')
    </main>
</div>
@include('partials.errors')
@livewireScripts
@yield('javascript')
</body>
</html>
