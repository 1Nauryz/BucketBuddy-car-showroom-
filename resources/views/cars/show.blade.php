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
    <style>
        select {

            /* styling */
            background-color: white;
            border: thin solid blue;
            border-radius: 4px;
            display: inline-block;
            font: inherit;
            line-height: 1.5em;
            padding: 0.5em 3.5em 0.5em 1em;

            /* reset */

            margin: 0;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            -webkit-appearance: none;
            -moz-appearance: none;
        }


        /* arrows */

        select.classic {
            background-image:
                linear-gradient(45deg, transparent 50%, blue 50%),
                linear-gradient(135deg, blue 50%, transparent 50%),
                linear-gradient(to right, skyblue, skyblue);
            background-position:
                calc(100% - 20px) calc(1em + 2px),
                calc(100% - 15px) calc(1em + 2px),
                100% 0;
            background-size:
                5px 5px,
                5px 5px,
                2.5em 2.5em;
            background-repeat: no-repeat;
        }

        select.classic:focus {
            background-image:
                linear-gradient(45deg, white 50%, transparent 50%),
                linear-gradient(135deg, transparent 50%, white 50%),
                linear-gradient(to right, gray, gray);
            background-position:
                calc(100% - 15px) 1em,
                calc(100% - 20px) 1em,
                100% 0;
            background-size:
                5px 5px,
                5px 5px,
                2.5em 2.5em;
            background-repeat: no-repeat;
            border-color: grey;
            outline: 0;
        }
        @import url("https://fonts.googleapis.com/css?family=Pontano+Sans");
        .container {
            margin: auto;
            padding: 0 1rem;
            max-width: 71.25rem;
            width: 100%;
        }

        .grid {
            display: flex;
            flex-direction: column;
            flex-flow: row wrap;
        }
        .grid > [class*=column-] {
            display: block;
        }

        .first {
            order: -1;
        }

        .last {
            order: 12;
        }

        .align-top {
            align-items: start;
        }

        .align-center {
            align-items: center;
        }

        .align-bottom {
            align-items: end;
        }

        .column-xs-1 {
            flex-basis: 8.3333333333%;
            max-width: 8.3333333333%;
        }

        .column-xs-2 {
            flex-basis: 16.6666666667%;
            max-width: 16.6666666667%;
        }

        .column-xs-3 {
            flex-basis: 25%;
            max-width: 25%;
        }

        .column-xs-4 {
            flex-basis: 33.3333333333%;
            max-width: 33.3333333333%;
        }

        .column-xs-5 {
            flex-basis: 41.6666666667%;
            max-width: 41.6666666667%;
        }

        .column-xs-6 {
            flex-basis: 50%;
            max-width: 50%;
        }

        .column-xs-7 {
            flex-basis: 58.3333333333%;
            max-width: 58.3333333333%;
        }

        .column-xs-8 {
            flex-basis: 66.6666666667%;
            max-width: 66.6666666667%;
        }

        .column-xs-9 {
            flex-basis: 75%;
            max-width: 75%;
        }

        .column-xs-10 {
            flex-basis: 83.3333333333%;
            max-width: 83.3333333333%;
        }

        .column-xs-11 {
            flex-basis: 91.6666666667%;
            max-width: 91.6666666667%;
        }

        .column-xs-12 {
            flex-basis: 100%;
            max-width: 100%;
        }

        @media (min-width: 48rem) {
            .column-sm-1 {
                flex-basis: 8.3333333333%;
                max-width: 8.3333333333%;
            }

            .column-sm-2 {
                flex-basis: 16.6666666667%;
                max-width: 16.6666666667%;
            }

            .column-sm-3 {
                flex-basis: 25%;
                max-width: 25%;
            }

            .column-sm-4 {
                flex-basis: 33.3333333333%;
                max-width: 33.3333333333%;
            }

            .column-sm-5 {
                flex-basis: 41.6666666667%;
                max-width: 41.6666666667%;
            }

            .column-sm-6 {
                flex-basis: 50%;
                max-width: 50%;
            }

            .column-sm-7 {
                flex-basis: 58.3333333333%;
                max-width: 58.3333333333%;
            }

            .column-sm-8 {
                flex-basis: 66.6666666667%;
                max-width: 66.6666666667%;
            }

            .column-sm-9 {
                flex-basis: 75%;
                max-width: 75%;
            }

            .column-sm-10 {
                flex-basis: 83.3333333333%;
                max-width: 83.3333333333%;
            }

            .column-sm-11 {
                flex-basis: 91.6666666667%;
                max-width: 91.6666666667%;
            }

            .column-sm-12 {
                flex-basis: 100%;
                max-width: 100%;
            }
        }
        @media (min-width: 62rem) {
            .column-md-1 {
                flex-basis: 8.3333333333%;
                max-width: 8.3333333333%;
            }

            .column-md-2 {
                flex-basis: 16.6666666667%;
                max-width: 16.6666666667%;
            }

            .column-md-3 {
                flex-basis: 25%;
                max-width: 25%;
            }

            .column-md-4 {
                flex-basis: 33.3333333333%;
                max-width: 33.3333333333%;
            }

            .column-md-5 {
                flex-basis: 41.6666666667%;
                max-width: 41.6666666667%;
            }

            .column-md-6 {
                flex-basis: 50%;
                max-width: 50%;
            }

            .column-md-7 {
                flex-basis: 58.3333333333%;
                max-width: 58.3333333333%;
            }

            .column-md-8 {
                flex-basis: 66.6666666667%;
                max-width: 66.6666666667%;
            }

            .column-md-9 {
                flex-basis: 75%;
                max-width: 75%;
            }

            .column-md-10 {
                flex-basis: 83.3333333333%;
                max-width: 83.3333333333%;
            }

            .column-md-11 {
                flex-basis: 91.6666666667%;
                max-width: 91.6666666667%;
            }

            .column-md-12 {
                flex-basis: 100%;
                max-width: 100%;
            }
        }
        @media (min-width: 75rem) {
            .column-lg-1 {
                flex-basis: 8.3333333333%;
                max-width: 8.3333333333%;
            }

            .column-lg-2 {
                flex-basis: 16.6666666667%;
                max-width: 16.6666666667%;
            }

            .column-lg-3 {
                flex-basis: 25%;
                max-width: 25%;
            }

            .column-lg-4 {
                flex-basis: 33.3333333333%;
                max-width: 33.3333333333%;
            }

            .column-lg-5 {
                flex-basis: 41.6666666667%;
                max-width: 41.6666666667%;
            }

            .column-lg-6 {
                flex-basis: 50%;
                max-width: 50%;
            }

            .column-lg-7 {
                flex-basis: 58.3333333333%;
                max-width: 58.3333333333%;
            }

            .column-lg-8 {
                flex-basis: 66.6666666667%;
                max-width: 66.6666666667%;
            }

            .column-lg-9 {
                flex-basis: 75%;
                max-width: 75%;
            }

            .column-lg-10 {
                flex-basis: 83.3333333333%;
                max-width: 83.3333333333%;
            }

            .column-lg-11 {
                flex-basis: 91.6666666667%;
                max-width: 91.6666666667%;
            }

            .column-lg-12 {
                flex-basis: 100%;
                max-width: 100%;
            }
        }
        @supports (display: grid) {
            .grid {
                display: grid;
                grid-template-columns: repeat(12, 1fr);
                grid-template-rows: auto;
            }
            .grid > [class*=column-] {
                margin: 0;
                max-width: 100%;
            }

            .column-xs-1 {
                grid-column-start: span 1;
                grid-column-end: span 1;
            }

            .column-xs-2 {
                grid-column-start: span 2;
                grid-column-end: span 2;
            }

            .column-xs-3 {
                grid-column-start: span 3;
                grid-column-end: span 3;
            }

            .column-xs-4 {
                grid-column-start: span 4;
                grid-column-end: span 4;
            }

            .column-xs-5 {
                grid-column-start: span 5;
                grid-column-end: span 5;
            }

            .column-xs-6 {
                grid-column-start: span 6;
                grid-column-end: span 6;
            }

            .column-xs-7 {
                grid-column-start: span 7;
                grid-column-end: span 7;
            }

            .column-xs-8 {
                grid-column-start: span 8;
                grid-column-end: span 8;
            }

            .column-xs-9 {
                grid-column-start: span 9;
                grid-column-end: span 9;
            }

            .column-xs-10 {
                grid-column-start: span 10;
                grid-column-end: span 10;
            }

            .column-xs-11 {
                grid-column-start: span 11;
                grid-column-end: span 11;
            }

            .column-xs-12 {
                grid-column-start: span 12;
                grid-column-end: span 12;
            }

            @media (min-width: 48rem) {
                .column-sm-1 {
                    grid-column-start: span 1;
                    grid-column-end: span 1;
                }

                .column-sm-2 {
                    grid-column-start: span 2;
                    grid-column-end: span 2;
                }

                .column-sm-3 {
                    grid-column-start: span 3;
                    grid-column-end: span 3;
                }

                .column-sm-4 {
                    grid-column-start: span 4;
                    grid-column-end: span 4;
                }

                .column-sm-5 {
                    grid-column-start: span 5;
                    grid-column-end: span 5;
                }

                .column-sm-6 {
                    grid-column-start: span 6;
                    grid-column-end: span 6;
                }

                .column-sm-7 {
                    grid-column-start: span 7;
                    grid-column-end: span 7;
                }

                .column-sm-8 {
                    grid-column-start: span 8;
                    grid-column-end: span 8;
                }

                .column-sm-9 {
                    grid-column-start: span 9;
                    grid-column-end: span 9;
                }

                .column-sm-10 {
                    grid-column-start: span 10;
                    grid-column-end: span 10;
                }

                .column-sm-11 {
                    grid-column-start: span 11;
                    grid-column-end: span 11;
                }

                .column-sm-12 {
                    grid-column-start: span 12;
                    grid-column-end: span 12;
                }
            }
            @media (min-width: 62rem) {
                .column-md-1 {
                    grid-column-start: span 1;
                    grid-column-end: span 1;
                }

                .column-md-2 {
                    grid-column-start: span 2;
                    grid-column-end: span 2;
                }

                .column-md-3 {
                    grid-column-start: span 3;
                    grid-column-end: span 3;
                }

                .column-md-4 {
                    grid-column-start: span 4;
                    grid-column-end: span 4;
                }

                .column-md-5 {
                    grid-column-start: span 5;
                    grid-column-end: span 5;
                }

                .column-md-6 {
                    grid-column-start: span 6;
                    grid-column-end: span 6;
                }

                .column-md-7 {
                    grid-column-start: span 7;
                    grid-column-end: span 7;
                }

                .column-md-8 {
                    grid-column-start: span 8;
                    grid-column-end: span 8;
                }

                .column-md-9 {
                    grid-column-start: span 9;
                    grid-column-end: span 9;
                }

                .column-md-10 {
                    grid-column-start: span 10;
                    grid-column-end: span 10;
                }

                .column-md-11 {
                    grid-column-start: span 11;
                    grid-column-end: span 11;
                }

                .column-md-12 {
                    grid-column-start: span 12;
                    grid-column-end: span 12;
                }
            }
            @media (min-width: 75rem) {
                .column-lg-1 {
                    grid-column-start: span 1;
                    grid-column-end: span 1;
                }

                .column-lg-2 {
                    grid-column-start: span 2;
                    grid-column-end: span 2;
                }

                .column-lg-3 {
                    grid-column-start: span 3;
                    grid-column-end: span 3;
                }

                .column-lg-4 {
                    grid-column-start: span 4;
                    grid-column-end: span 4;
                }

                .column-lg-5 {
                    grid-column-start: span 5;
                    grid-column-end: span 5;
                }

                .column-lg-6 {
                    grid-column-start: span 6;
                    grid-column-end: span 6;
                }

                .column-lg-7 {
                    grid-column-start: span 7;
                    grid-column-end: span 7;
                }

                .column-lg-8 {
                    grid-column-start: span 8;
                    grid-column-end: span 8;
                }

                .column-lg-9 {
                    grid-column-start: span 9;
                    grid-column-end: span 9;
                }

                .column-lg-10 {
                    grid-column-start: span 10;
                    grid-column-end: span 10;
                }

                .column-lg-11 {
                    grid-column-start: span 11;
                    grid-column-end: span 11;
                }

                .column-lg-12 {
                    grid-column-start: span 12;
                    grid-column-end: span 12;
                }
            }
        }
        * {
            box-sizing: border-box;
        }
        *::before, *::after {
            box-sizing: border-box;
        }

        body {
            font-family: "Pontano Sans", sans-serif;
            font-size: 1.125rem;
            line-height: 1.5;
            margin: 0;
            padding: 0;
            color: #888;
            background: white;
            text-rendering: optimizeLegibility;
        }

        ul {
            padding: 0;
            margin: 0;
            list-style: none;
        }
        ul li {
            margin: 0 1.75rem 0 0;
        }

        a {
            color: #888;
            text-decoration: none;
            transition: all 0.2s ease;
        }
        a:hover {
            color: #333;
        }
        a.active {
            color: #333;
        }

        h1, h2, h3, h4 {
            color: #333;
            font-weight: normal;
            margin: 1.75rem 0 1rem 0;
        }

        h1 {
            font-size: 2.5rem;
        }

        h2 {
            font-size: 2.125rem;
            margin: 0;
        }

        h3 {
            font-size: 2rem;
        }

        h4 {
            font-size: 1.5rem;
            margin: 1rem 0 0.5rem 0;
        }

        section {
            display: block;
        }

        img {
            max-width: 100%;
            height: auto;
            -o-object-fit: cover;
            object-fit: cover;
        }

        nav {
            display: block;
        }
        nav li {
            font-size: 1.125rem;
            margin: 0;
        }

        .flex-nav ul {
            position: absolute;
            z-index: 1;
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
            flex-direction: column;
            display: none;
            width: 100%;
            left: 0;
            padding: 1rem;
            background: white;
            text-align: center;
        }
        .flex-nav ul.active {
            display: flex;
        }
        .flex-nav ul li {
            margin: 0.5rem 0;
        }

        .toggle-nav {
            display: flex;
            justify-content: flex-end;
            font-size: 1.125rem;
            line-height: 1.7;
            margin: 1rem 0;
        }
        .toggle-nav i {
            font-size: 1.5rem;
            line-height: 1.4;
            margin: 0 0 0 0.5rem;
        }

        #highlight {
            color: #333;
            font-size: 1.125rem;
            text-transform: uppercase;
        }

        .price {
            margin: 0;
        }

        .breadcrumb-list {
            display: flex;
            flex-wrap: wrap;
            padding: 0;
            margin: 1rem 0 0 0;
            list-style: none;
        }
        .breadcrumb-list li {
            font-size: 0.85rem;
            letter-spacing: 0.125rem;
            text-transform: uppercase;
        }

        .breadcrumb-item.active {
            color: #333;
        }
        .breadcrumb-item + .breadcrumb-item::before {
            content: "/";
            display: inline-block;
            padding: 0 0.5rem;
            color: white;
        }

        .description {
            border-top: 0.0625rem solid white;
            margin: 2rem 0;
            padding: 1rem 0 0 0;
        }

        .add-to-cart {
            position: relative;
            display: inline-block;
            background: #3e3e3f;
            color: #fff;
            border: none;
            border-radius: 0;
            padding: 1.25rem 2.5rem;
            font-size: 1rem;
            text-transform: uppercase;
            cursor: pointer;
            transform: translateZ(0);
            transition: color 0.3s ease;
            letter-spacing: 0.0625rem;
        }
        .add-to-cart:hover::before {
            transform: scaleX(1);
        }
        .add-to-cart::before {
            position: absolute;
            content: "";
            z-index: -1;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: #565657;
            transform: scaleX(0);
            transform-origin: 0 50%;
            transition: transform 0.3s ease-out;
        }

        .container {
            margin: auto;
            padding: 0 1rem;
            max-width: 75rem;
            width: 100%;
        }

        .grid > [class*=column-] {
            padding: 1rem;
        }
        .grid.menu, .grid.product {
            border-bottom: 0.0625rem solid white;
        }
        .grid.menu > [class*=column-] {
            padding: 0.5rem 1rem 0.5rem 1rem;
        }
        .grid.product {
            padding: 0 0 1.5rem 0;
        }
        .grid.second-nav > [class*=column-] {
            padding: 0.5rem 1rem;

        }

        footer {
            padding: 1rem 0;
            text-align: center;
        }

        .product-image {
            display: none;
        }

        .image-list li {
            margin: 0;
        }

        @media (min-width: 62rem) {
            .product-image img, .image-list img {
                width: 100%;
            }

            .product-image {
                display: block;
            }
            .product-image img {
                height: 52vh;
                width: 400vh;
            }
            .product-image img.active {
                display: block;
                margin: 0 0 0.75rem 0;
            }

            .image-list {
                display: flex;
                overflow: hidden;
            }
            .image-list li {
                margin: 0 0.75rem 0 0;
                flex-basis: 100%;
            }
            .image-list li:nth-child(3) {
                margin: 0;
            }
            .image-list img {
                height: 10rem;
                width: 100%;
                transition: opacity 0.3s ease;
                cursor: pointer;
            }
            .image-list img:hover {
                opacity: 0.7;
            }

            nav ul {
                justify-content: flex-end;
            }

            .toggle-nav {
                display: none;
                background-color: white;
            }

            .flex-nav {
                display: block;
            }
            .flex-nav ul {
                display: flex;
                flex-direction: row;
                position: relative;
                justify-content: flex-end;
            }
            .flex-nav ul li {
                font-size: 1.125rem;
                margin: 0 1.5rem 0 0;
            }
            .flex-nav ul li:nth-child(4) {
                margin: 0;
            }
        }
        @-webkit-keyframes fadeImg {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        @keyframes fadeImg {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }





        select.round {
            background-image:
                linear-gradient(45deg, transparent 50%, gray 50%),
                linear-gradient(135deg, gray 50%, transparent 50%),
                radial-gradient(#ddd 70%, transparent 72%);
            background-position:
                calc(100% - 20px) calc(1em + 2px),
                calc(100% - 15px) calc(1em + 2px),
                calc(100% - .5em) .5em;
            background-size:
                5px 5px,
                5px 5px,
                1.5em 1.5em;
            background-repeat: no-repeat;
        }

        select.round:focus {
            background-image:
                linear-gradient(45deg, white 50%, transparent 50%),
                linear-gradient(135deg, transparent 50%, white 50%),
                radial-gradient(gray 70%, transparent 72%);
            background-position:
                calc(100% - 15px) 1em,
                calc(100% - 20px) 1em,
                calc(100% - .5em) .5em;
            background-size:
                5px 5px,
                5px 5px,
                1.5em 1.5em;
            background-repeat: no-repeat;
            border-color: green;
            outline: 0;
        }





        select.minimal {
            background-image:
                linear-gradient(45deg, transparent 50%, gray 50%),
                linear-gradient(135deg, gray 50%, transparent 50%),
                linear-gradient(to right, #ccc, #ccc);
            background-position:
                calc(100% - 20px) calc(1em + 2px),
                calc(100% - 15px) calc(1em + 2px),
                calc(100% - 2.5em) 0.5em;
            background-size:
                5px 5px,
                5px 5px,
                1px 1.5em;
            background-repeat: no-repeat;
        }

        select.minimal:focus {
            background-image:
                linear-gradient(45deg, green 50%, transparent 50%),
                linear-gradient(135deg, transparent 50%, green 50%),
                linear-gradient(to right, #ccc, #ccc);
            background-position:
                calc(100% - 15px) 1em,
                calc(100% - 20px) 1em,
                calc(100% - 2.5em) 0.5em;
            background-size:
                5px 5px,
                5px 5px,
                1px 1.5em;
            background-repeat: no-repeat;
            border-color: green;
            outline: 0;
        }


        select:-moz-focusring {
            color: transparent;
            text-shadow: 0 0 0 #000;
        }
    </style>
</head>
<body id="page-top">

<div class="grid product">
    <div class="column-xs-12 column-md-7">
        <div class="product-gallery">
            <div class="product-image">
                <img class="active" src="{{asset($car->image)}}">
            </div>
            <ul class="image-list">
                <li class="image-item"><img src="{{asset($car->image)}}"></li>
                <li class="image-item"><img src="{{asset($car->image)}}"></li>
                <li class="image-item"><img src="{{asset($car->image)}}"></li>
            </ul>
            <ul class="image-list">
                <li class="image-item"> </li>
            </ul>
        </div>
        <div class="product-gallery">
            <hr>
            <br>
            <form action="{{route('cars.buy', $car->id)}}" method="post">
                @csrf
                <p class="lead">
                    @if(app()->getLocale() == 'en')
                        <button type="submit" class="add-to-cart">Buy now</button>
                    @elseif(app()->getLocale() == 'kz')
                        <button type="submit" class="add-to-cart">Сатып алу</button>
                    @elseif(app()->getLocale() == 'ru')
                        <button type="submit" class="add-to-cart">Купить</button>
                    @endif
                </p>
            </form>
            <hr>
        </div>
    </div>
    <div class="column-xs-10 column-md-5">
        <h1>{{$car->model}}
            @can('delete', $car)
                <form action="{{route('cars.destroy', $car->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <p class="lead">
                        @if(app()->getLocale() == 'en')
                            <button type="submit" class="btn btn-primary btn-lg">Delete</button>
                        @elseif(app()->getLocale() == 'kz')
                            <button type="submit" class="btn btn-primary btn-lg">Жою</button>
                        @elseif(app()->getLocale() == 'ru')
                            <button type="submit" class="btn btn-primary btn-lg">Удалить</button>
                        @endif
                    </p>
                </form>
            @endcan</h1>
        <div class="description">
            <h1 class="display-4">@if($avgRating != 0)
                    @if(app()->getLocale() == 'en')
                        <h4>Average rating: {{$avgRating}}</h4>
                    @elseif(app()->getLocale() == 'kz')
                        <h4>Орташа рейтинг: {{$avgRating}}</h4>
                    @elseif(app()->getLocale() == 'ru')
                        <h4>Средний рейтинг: {{$avgRating}}</h4>
                    @endif
                @endif</h1>
            @if(app()->getLocale() == 'en')
                <p class="lead">City: {{$car->city}}</p>
                <p class="lead">Engine volume: {{$car->volume}}</p>
                <p class="lead">Mileage: {{$car->mileage}}</p>
                <p class="lead">Transmission: {{$car->transmission}}</p>
                <p class="lead"> Price: {{$car->price}} $</p>
                <p class="lead">Phone number: {{$car->phone}}</p>
            @elseif(app()->getLocale() == 'kz')
                <p class="lead">Қала: {{$car->city}}</p>
                <p class="lead">Қозғалтқыш көлемі: {{$car->volume}}</p>
                <p class="lead">Жүгіріс: {{$car->mileage}}</p>
                <p class="lead">Трансмиссиясы: {{$car->transmission}}</p>
                <p class="lead">Бағасы: {{$car->price}} $</p>
                <p class="lead">Телефон нөмер: {{$car->phone}}</p>
            @elseif(app()->getLocale() == 'ru')
                <p class="lead">Город: {{$car->city}} </p>
                <p class="lead">Обьем двигателя: {{$car->volume}} </p>
                <p class="lead">Пробег: {{$car->mileage}} </p>
                <p class="lead">Трансмиссия: {{$car->transmission}} </p>
                <p class="lead">Цена: {{$car->price}} $</p>
                <p class="lead">Номер телефона: {{$car->phone}} </p>
            @endif

            @if(app()->getLocale() == 'en')
                <a href="{{route('cars.showmessage', $car->id)}}" class="btn btn-outline-secondary text-center">Message</a>
            @elseif(app()->getLocale() == 'kz')
                <a href="{{route('cars.showmessage', $car->id)}}" class="btn btn-outline-secondary text-center">Хабар</a>
            @elseif(app()->getLocale() == 'ru')
                <a href="{{route('cars.showmessage', $car->id)}}" class="btn btn-outline-secondary text-center">Сообщение</a>
            @endif
        </div>

        @auth
            <form action="{{route('cars.rate', $car->id)}}" method="post">
                @csrf
                <select class="classic" name="rating">
                    @for($i=0; $i<=5; $i++)
                        <option {{$myRating == $i ? 'selected' : ''}} value="{{$i}}">
                            {{ $i==0 ? 'Not rated' : $i }}
                        </option>
                    @endfor
                </select>
                @if(app()->getLocale() == 'en')
                    <br><button type="submit" style="border-left: #0A38F5">Rate</button>
                @elseif(app()->getLocale() == 'kz')
                    <br><button type="submit" style="border-left: #0A38F5">Бағалау</button>
                @elseif(app()->getLocale() == 'ru')
                    <br><button type="submit" style="border-left: #0A38F5">Оценить</button>
                @endif
            </form>
            <form action="{{route('cars.unrate', $car->id)}}" method="post">
                @csrf
                @if(app()->getLocale() == 'en')
                    <button type="submit" style="border-left: #0A38F5">Unrate</button>
                @elseif(app()->getLocale() == 'kz')
                    <button type="submit" style="border-left: #0A38F5">Бағалауды жою</button>
                @elseif(app()->getLocale() == 'ru')
                    <button type="submit" style="border-left: #0A38F5">Удалить оценку</button>
                @endif
            </form>
            <hr>
        @endauth
    </div>
</div>
            <div class="card-body">
                @can('create', \App\Models\Comment::class)
                    <form action="{{route('comments.store')}}" method="post">
                        @csrf
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="card">
                                        @if(app()->getLocale() == 'en')
                                            <div class="card-header">Comment</div>
                                        @elseif(app()->getLocale() == 'kz')
                                            <div class="card-header">Пікір қалдыру</div>
                                        @elseif(app()->getLocale() == 'ru')
                                            <div class="card-header">Оставить комментарии</div>
                                        @endif
                                            <div class="row mb-3">
                                                @if(app()->getLocale() == 'en')
                                                    <label for="content" class="col-md-4 col-form-label text-md-end">Write your comment</label>
                                                @elseif(app()->getLocale() == 'kz')
                                                    <label for="content" class="col-md-4 col-form-label text-md-end">Пікіріңізді жазыңыз</label>
                                                @elseif(app()->getLocale() == 'ru')
                                                    <label for="content" class="col-md-4 col-form-label text-md-end">Напишите свой комментарий</label>
                                                @endif
                                                <div class="col-md-6">
                                                    <textarea name="content" rows="3"></textarea>
                                                </div>
                                                <input type="hidden" name="car_id" value="{{$car->id}}"> <br>
                                                <div class="row mb-0">
                                                    <div class="col-md-4 offset-md-5">
                                                        <button type="submit" class="btn btn-primary">
                                                            @if(app()->getLocale() == 'en')
                                                                Save comment
                                                            @elseif(app()->getLocale() == 'kz')
                                                                Пікірді сақтау
                                                            @elseif(app()->getLocale() == 'ru')
                                                                Сохранить комментарий
                                                            @endif
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                @endcan
            </div>
            <div class="container">
                <hr>
                @foreach($car->comments as $com)
                    <h4>{{$com->content}}</h4>
                    <p class="lead">Author: {{$com->user->name}}</p>
                @can('delete', $com)
                        <form action="{{route('comments.destroy', $com->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            @if(app()->getLocale() == 'en')
                                <button type="submit" class="btn btn-outline-danger">Delete comment</button>
                            @elseif(app()->getLocale() == 'kz')
                                <button type="submit" class="btn btn-outline-danger">Пікірді жою</button>
                            @elseif(app()->getLocale() == 'ru')
                                <button type="submit" class="btn btn-outline-danger">Удалить комментарий</button>
                            @endif
                            <hr>
                        </form>
                    @endcan
                @endforeach
            </div>
<section>

</section>
<script src="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js')}}"></script>
<!-- Core theme JS-->
<script src="{{asset('js/scripts.js')}}"></script>
@endsection

