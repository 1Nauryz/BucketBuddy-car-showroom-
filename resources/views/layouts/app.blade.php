<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>BucketBuddy</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="website icon" href="/img/bb_logo.jpg " type="jpg">
    <style>
        .fa-1x {
            font-size: 1.5rem;
        }
        .navbar-toggler.toggler-example {
            cursor: pointer;
        }
        .dark-blue-text {
            color: #0A38F5;
        }
        .dark-pink-text {
            color: #AC003A;
        }
        .dark-amber-text {
            color: #ff6f00;
        }
        .dark-teal-text {
            color: #004d40;
        }
        body {
            font-family: 'Nunito', sans-serif;
        }
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Scripts -->
    <script type="module" src="http://localhost:3000/@@vite/client"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{route('cars.index')}}">Bucket Buddy</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('cars.index')}}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    @isset($categories)
                    @foreach($categories as $cat)
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('cars.category',$cat->id)}}">{{$cat->name}} <span class="sr-only">    </span></a>
                        </li>
                    @endforeach
                    @endisset
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login.form'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login.form') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register.form'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register.form') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </ul>
            </div>
            <div><a href="{{route('cars.create')}}">Add your car</a></div>
        </nav>

        @if (session('delete'))
            <div class="alert alert-danger" role="alert">{{session('delete')}}</div>
        @endif
        @if (session('success'))
            <div class="alert alert-success" role="alert">{{session('success')}}</div>
        @endif
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-10">--}}
{{--            <div class="card">--}}
{{--                --}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>    --}}
