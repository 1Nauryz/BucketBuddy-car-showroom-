<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Bucket Buddy</title>

    <!-- Fonts -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Bucket Buddy</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{asset('css/showb.css')}}" rel="stylesheet" />
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        .left{
            background: #f2eee3;
        }
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
</head>
<body>
    <div id="app" class="left">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{route('cars.index')}}">Bucket Buddy</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item active">
                        @if(app()->getLocale() == 'en')
                            <a class="nav-link" href="{{route('cars.index')}}">Home <span class="sr-only"></span></a>
                        @elseif(app()->getLocale() == 'kz')
                            <a class="nav-link" href="{{route('cars.index')}}">Басты бет <span class="sr-only"></span></a>
                        @elseif(app()->getLocale() == 'ru')
                            <a class="nav-link" href="{{route('cars.index')}}">Главная <span class="sr-only"></span></a>
                        @endif
                    </li>
                    <li class="nav-item">
                        @if(app()->getLocale() == 'en')
                            <a class="nav-link" href="{{route('cars.showfav')}}">Favorites <span class="sr-only"></span></a>
                        @elseif(app()->getLocale() == 'kz')
                            <a class="nav-link" href="{{route('cars.showfav')}}">Таңдаулылар <span class="sr-only"></span></a>
                        @elseif(app()->getLocale() == 'ru')
                            <a class="nav-link" href="{{route('cars.showfav')}}">Избранные <span class="sr-only"></span></a>
                        @endif
                    </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    @if(app()->getLocale() == 'en')
                                        Categories
                                    @elseif(app()->getLocale() == 'kz')
                                        Санаттар
                                    @elseif(app()->getLocale() == 'ru')
                                        Категории
                                    @endif
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    @isset($categories)
                                    @foreach($categories as $cat)
                                        <a class="dropdown-item" href="{{route('cars.category', $cat->id)}}">
                                            {{$cat->name}}
                                            <img src="{{asset($cat->image)}}" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="50" height="50" loading="lazy">
                                        </a>
                                    @endforeach
                                    @endisset
                                </div>
                            </li>
                    <li class="nav-item">
                        @can('create', \App\Models\Car::class)
                            @if(app()->getLocale() == 'en')
                                <a class="nav-link" href="{{route('cars.create')}}">Add your car</a>
                            @elseif(app()->getLocale() == 'kz')
                                <a class="nav-link" href="{{route('cars.create')}}">Көлігіңізді қосыңыз</a>
                            @elseif(app()->getLocale() == 'ru')
                                <a class="nav-link" href="{{route('cars.create')}}">Добавить свою машину</a>
                            @endif
                        @endcan
                    </li>
                    <li class="nav-item dropdown">
                        @auth
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre >
                                {{__('messages.Balance:')}} {{\Illuminate\Support\Facades\Auth::user()->balance}} $</a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{route('cars.balance', \Illuminate\Support\Facades\Auth::user()->id)}}">
                                            {{__('messages.Replenish the balance')}}
                                        </a>
                            </div>
                        @endauth
                    </li>
                    <li class="nav-item">
                        @can('viewAny', \App\Models\Role::class)
                        <a class="nav-link" href="{{route('adm.users.index')}}">{{__('messages.Admin Panel')}}</a>
                        @endcan
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login.form'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login.form') }}">{{__('messages.login')}}</a>
                            </li>
                        @endif

                        @if (Route::has('register.form'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register.form') }}">{{ __('messages.register') }}</a>
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
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{config('app.languages')[app()->getLocale()]}}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            @foreach(config('app.languages') as $ln => $lang)
                            <a class="dropdown-item" href="{{route('switch.lang', $ln)}}">
                                {{$lang}}
                            </a>
                            @endforeach
                        </div>
                    </li>

                </ul>
            </div>
        </nav>
    </div>




        @if (session('delete'))
            @if(app()->getLocale() == 'en')
                <div class="alert alert-danger" role="alert">{{session('delete')}}</div>
            @elseif(app()->getLocale() == 'kz')
                <div class="alert alert-danger" role="alert">Жою сәтті аяқталды!!</div>
            @elseif(app()->getLocale() == 'ru')
                <div class="alert alert-danger" role="alert">Удаление прошло успешно!!</div>
            @endif
        @endif
    @if(session('successedit'))
        @if(app()->getLocale() == 'en')
            <div class="alert alert-success" role="alert">{{session('successedit')}}</div>
        @elseif(app()->getLocale() == 'kz')
            <div class="alert alert-success" role="alert">Өзгеріс сәтті болды!!</div>
        @elseif(app()->getLocale() == 'ru')
            <div class="alert alert-success" role="alert">Изменение прошло успешно!!</div>
        @endif
    @endif
    @if(session('fail'))
        @if(app()->getLocale() == 'en')
            <div class="alert alert-warning" role="alert">{{session('fail')}}</div>
        @elseif(app()->getLocale() == 'kz')
            <div class="alert alert-warning" role="alert">Теңгерімізді толтырыңыз!</div>
        @elseif(app()->getLocale() == 'ru')
            <div class="alert alert-warning" role="alert">Пополните баланс!</div>
        @endif
    @endif
        @if (session('success'))
            @if(app()->getLocale() == 'en')
                <div class="alert alert-success" role="alert">{{session('success')}}</div>
            @elseif(app()->getLocale() == 'kz')
                <div class="alert alert-success" role="alert">Сіз көлігіңізді қостыңыз</div>
            @elseif(app()->getLocale() == 'ru')
                <div class="alert alert-success" role="alert">Вы добавили свой автомобиль</div>
            @endif
        @endif
    @if (session('buy'))
        @if(app()->getLocale() == 'en')
            <div class="alert alert-success" role="alert">{{session('buy')}}</div>
        @elseif(app()->getLocale() == 'kz')
            <div class="alert alert-success" role="alert">Көлігіңіз құтты болсын!!</div>
        @elseif(app()->getLocale() == 'ru')
            <div class="alert alert-success" role="alert">Поздравляем с покупкой!!</div>
        @endif
    @endif
    @if (session('balanceup'))
        @if(app()->getLocale() == 'en')
            <div class="alert alert-success" role="alert">{{session('balanceup')}}</div>
        @elseif(app()->getLocale() == 'kz')
            <div class="alert alert-success" role="alert">Теңгерімді сәтті толтырдыңыз!!</div>
        @elseif(app()->getLocale() == 'ru')
            <div class="alert alert-success" role="alert">Вы успешно пополнили баланс!!</div>
        @endif
    @endif
    @if (session('successCom'))
        @if(app()->getLocale() == 'en')
            <div class="alert alert-success" role="alert">{{session('successCom')}}</div>
        @elseif(app()->getLocale() == 'kz')
            <div class="alert alert-success" role="alert">Пікір қосылды!!</div>
        @elseif(app()->getLocale() == 'ru')
            <div class="alert alert-success" role="alert">Комментарий добавлен!!</div>
        @endif
    @endif
    @if (session('favAdd'))
        @if(app()->getLocale() == 'en')
            <div class="alert alert-success" role="alert">{{session('favAdd')}}</div>
        @elseif(app()->getLocale() == 'kz')
            <div class="alert alert-success" role="alert">Сіз көлікті таңдаулыларға қостыңыз!</div>
        @elseif(app()->getLocale() == 'ru')
            <div class="alert alert-success" role="alert">Вы добавили машину в избранное!</div>
        @endif
    @endif
    @if (session('delFavAdd'))
        @if(app()->getLocale() == 'en')
            <div class="alert alert-warning" role="alert">{{session('delFavAdd')}}</div>
        @elseif(app()->getLocale() == 'kz')
            <div class="alert alert-warning" role="alert">Сіз көлікті таңдаулылардан жойдыңыз!</div>
        @elseif(app()->getLocale() == 'ru')
            <div class="alert alert-warning" role="alert">Вы удалили машину из избранного!</div>
        @endif
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
