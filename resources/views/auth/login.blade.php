@extends('layouts.app')
@section('content')
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/logstyle.css')}}">
</head>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<body>
<section class="login">
    <div class="login_box">
        <div class="left">
            @if(app()->getLocale() == 'en')
                <div class="top_link"><a href="{{route('cars.index')}}"><img src="https://drive.google.com/u/0/uc?id=16U__U5dJdaTfNGobB_OpwAJ73vM50rPV&export=download" alt="">Return home</a></div>
                <div class="contact">

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <h3>SIGN IN</h3>
                        <input type="text" name="email" id="email" placeholder="EMAIL ADDRESS" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <input type="password" id="password" name="password" placeholder="PASSWORD" required autocomplete="password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <button class="submit" type="submit">{{ __('Login') }}</button>
                    </form>
                </div>
        </div>
        <div class="right">
            <div class="right-text">
                <h2>Bucket Buddy</h2>
                <h5>A great company to work with!</h5>
            </div>
            <div class="right-inductor"><img src="" alt=""></div>
        </div>
            @elseif(app()->getLocale() == 'kz')
            <div class="top_link"><a href="{{route('cars.index')}}"><img src="https://drive.google.com/u/0/uc?id=16U__U5dJdaTfNGobB_OpwAJ73vM50rPV&export=download" alt="">Басты бетке оралу</a></div>

            <div class="contact">

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <h3>КІРУ</h3>
                    <input type="text" name="email" id="email" placeholder="ЭЛЕКТРОНДЫҚ ПОШТА" required autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <input type="password" id="password" name="password" placeholder="ҚҰПИЯ СӨЗ" required autocomplete="password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <button class="submit" type="submit">Кіру</button>
                </form>
            </div>
    </div>
    <div class="right">
        <div class="right-text">
            <h2>Bucket Buddy</h2>
            <h5>Жұмыс істеуге тамаша компания!</h5>
        </div>
        <div class="right-inductor"><img src="" alt=""></div>
    </div>
            @elseif(app()->getLocale() == 'ru')
        <div class="top_link"><a href="{{route('cars.index')}}"><img src="https://drive.google.com/u/0/uc?id=16U__U5dJdaTfNGobB_OpwAJ73vM50rPV&export=download" alt="">Вернуться домой</a></div>
        <div class="contact">

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <h3>ВОЙТИ</h3>
                    <input type="text" name="email" id="email" placeholder="АДРЕС ЭЛЕКТРОННОЙ ПОЧТЫ" required autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <input type="password" id="password" name="password" placeholder="ПАРОЛЬ" required autocomplete="password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <button class="submit" type="submit">Авторизоваться</button>
                </form>
            </div>
        </div>
        <div class="right">
            <div class="right-text">
                <h2>Bucket Buddy</h2>
                <h5>Отличная компания для работы!</h5>
            </div>
            <div class="right-inductor"><img src="" alt=""></div>
        </div>
    </div>
    @endif
</section>
</body>
</html>
@endsection
