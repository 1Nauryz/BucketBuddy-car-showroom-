@extends('layouts.app')
@section('content')
    <head>
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
    </head>
    <body id="page-top">
    <div class="container">
    @if($car->user_id != \Illuminate\Support\Facades\Auth::user()->id)
        <p>{{__('messages.Write Message')}}</p>
        <form action="{{route('cars.message', $car->id)}}" method="post">
            @csrf
            <input name="message" class="form-control form-control-lg" type="text" placeholder="{{__('messages.Write Message')}}" >
            <hr>
            <button type="submit" class="btn btn-primary">Submit</button>
            <hr>
        </form>
    @endif
        @if($car->user_id != \Illuminate\Support\Facades\Auth::user()->id)
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{__('messages.Name')}}</th>
                <th scope="col">{{__('messages.Message')}}</th>
                <th scope="col">{{__('messages.Delete')}}</th>
            </tr>
            </thead>
            <tbody>
            @for($i=0;$i<count($cars);$i++)
                <tr>
                <th scope="row">{{$i}}</th>
                <td>{{$cars[$i]->name}}</td>
                <td>
                    <form action="{{route('cars.updateMes', $cars[$i]->id)}}" method="post">
                        @csrf
                        <input type="text" value="{{$cars[$i]->pivot->message}}" name="message">
                        <button type="submit" class="btn btn-outline-secondary">Submit</button>
                    </form>
                </td>
                <td>
                    <form action="{{route('cars.dMessage', $cars[$i]->id)}}" method="post">
                        @csrf
                        @if(app()->getLocale() == 'en')
                            <button type="submit" style="border-left: #0A38F5">Delete message</button>
                        @elseif(app()->getLocale() == 'kz')
                            <button type="submit" style="border-left: #0A38F5">Хабарды жою</button>
                        @elseif(app()->getLocale() == 'ru')
                            <button type="submit" style="border-left: #0A38F5">Удалить сообщение</button>
                        @endif
                    </form>
                </td>
            </tr>
            @endfor
            </tbody>
        </table>
        <table>
            @endif

    <script src="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Core theme JS-->
    <script src="{{asset('js/scripts.js')}}"></script>
@endsection

