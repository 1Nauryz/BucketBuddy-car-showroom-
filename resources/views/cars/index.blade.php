@extends('layouts.app')
@section('content')
    @if(app()->getLocale() == 'en')
    @elseif(app()->getLocale() == 'kz')
    @elseif(app()->getLocale() == 'ru')
    @endif
<main>
    <div class="px-4 py-5 my-5 text-center">
        <img class="d-block mx-auto mb-4" src="/img/bb_logo.jpg" alt="" width="120" height="75">
        <h1 class="display-5 fw-bold">Bucket Buddy</h1>
        <div class="col-lg-6 mx-auto">
            @if(app()->getLocale() == 'en')
                <p class="lead mb-4">A car dealership is a shop that sells new or used cars. Here you can choose and buy a car yourself or with the help of the salon staff. If the car is available, you can immediately purchase it and pick it up from the salon.</p>
            @elseif(app()->getLocale() == 'kz')
                <p class="lead mb-4">Автосалон - бұл жаңа немесе ескі көліктерді сататын дүкен. Мұнда сіз өзіңіз немесе салон қызметкерлерінің көмегімен автокөлікті таңдап, сатып ала аласыз. Көлік қолжетімді болса, оны бірден сатып алып, салоннан алуға болады.</p>
            @elseif(app()->getLocale() == 'ru')
                <p class="lead mb-4">Автосалон — это магазин, который продает новые или подержанные автомобили. Здесь вы можете выбрать и купить автомобиль самостоятельно или с помощью сотрудников салона. Если автомобиль есть в наличии, его можно сразу приобрести и забрать из салона.</p>
            @endif
        </div>
    </div>

    <div class="b-example-divider"></div>
@foreach($cars as $car)
    <div class="container col-xxl-8 px-4 py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="{{asset($car->image)}}" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
            </div>
            <div class="col-lg-6">
                @if(app()->getLocale() == 'en')
                    <h1 class="display-5 fw-bold lh-1 mb-3">{{$car->model}}</h1>
                    <p class="lead">City: {{$car->city}} <br>
                        Engine volume: {{$car->volume}} <br>
                        Mileage: {{$car->mileage}} <br>
                        Transmission: {{$car->transmission}} <br>
                        Price: {{$car->price}}  $<br>
                        Phone number: {{$car->phone}} <br>
                    </p>
                    <div>Author: {{$car->user->name}}</div>
                @elseif(app()->getLocale() == 'kz')
                    <h1 class="display-5 fw-bold lh-1 mb-3">{{$car->model}}</h1>
                    <p class="lead">Қала: {{$car->city}} <br>
                        Қозғалтқыш көлемі: {{$car->volume}} <br>
                        Жүгіріс: {{$car->mileage}} <br>
                        Трансмиссиясы: {{$car->transmission}} <br>
                        Бағасы: {{$car->price}} $<br>
                        Телефон нөмер: {{$car->phone}} <br>
                    </p>
                    <div>Автор: {{$car->user->name}}</div>
                @elseif(app()->getLocale() == 'ru')
                    <h1 class="display-5 fw-bold lh-1 mb-3">{{$car->model}}</h1>
                    <p class="lead">Город: {{$car->city}} <br>
                        Обьем двигателя: {{$car->volume}} <br>
                        Пробег: {{$car->mileage}} <br>
                        Трансмиссия: {{$car->transmission}} <br>
                        Цена: {{$car->price}} $<br>
                        Номер телефона: {{$car->phone}} <br>
                    </p>
                    <div>Автор: {{$car->user->name}}</div>
                @endif

                @auth
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    @if(app()->getLocale() == 'en')
                        <button type="button" class="btn btn-outline-primary btn-lg px-4 me-md-2"><a href="{{route('cars.show', $car->id)}}">View</a></button>
                        <button type="button" class="btn btn-outline-secondary btn-lg px-4"><a href="{{route('cars.edit', $car->id)}}">Edit</a></button>
                    @elseif(app()->getLocale() == 'kz')
                        <button type="button" class="btn btn-outline-primary btn-lg px-4 me-md-2"><a href="{{route('cars.show', $car->id)}}">Көрініс</a></button>
                        <button type="button" class="btn btn-outline-secondary btn-lg px-4"><a href="{{route('cars.edit', $car->id)}}">Өңдеу</a></button>
                    @elseif(app()->getLocale() == 'ru')
                        <button type="button" class="btn btn-outline-primary btn-lg px-4 me-md-2"><a href="{{route('cars.show', $car->id)}}">Посмотреть</a></button>
                        <button type="button" class="btn btn-outline-secondary btn-lg px-4"><a href="{{route('cars.edit', $car->id)}}">Редактировать</a></button>

                    @endif
                    <form action="{{route('cars.favorites', $car->id)}}" method="post">
                            @csrf
                        @isset($fav)
                        @if($fav != $car->id)
                            <button type="submit" class="btn btn-outline-light btn-lg px-4">
                            <img src="img/fav_icon.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" loading="lazy">
                            </button>
                        @else
                            <button type="submit" class="btn btn-outline-light btn-lg px-4">
                                <img src="img/fav_icon2.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" loading="lazy">
                            </button>
                        @endif
                        @endisset
                        </form>
                </div>
                @endauth
            </div>
        </div>
    </div>
    @endforeach
    <div class="container marketing">
        <div class="row">
            <div class="col-lg-4">
                <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="/img/bill.webp" alt="" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
                <h2>Bill Gates</h2>
                @if(app()->getLocale() == 'en')
                    <p>He is one of the many investors <br> who believed in our success and,<br> oddly enough, did not lose</p>
                    <p><a class="btn btn-secondary" href="https://www.theguardian.com/us-news/2022/apr/15/send-us-your-questions-for-bill-gates">View details &raquo;</a></p>
                @elseif(app()->getLocale() == 'kz')
                    <p>Ол біздің жетістігімізге сенген және<br> таң қаларлықтай, жоғалтпаған <br> көптеген инвесторлардың бірі</p>
                    <p><a class="btn btn-secondary" href="https://www.theguardian.com/us-news/2022/apr/15/send-us-your-questions-for-bill-gates">Мәліметтерді көру &raquo;</a></p>
                @elseif(app()->getLocale() == 'ru')
                    <p>Он один из многих инвесторов, <br>которые поверили в наш успех и,<br>как ни странно, не прогадали</p>
                    <p><a class="btn btn-secondary" href="https://www.theguardian.com/us-news/2022/apr/15/send-us-your-questions-for-bill-gates">Посмотреть детали &raquo;</a></p>
                @endif
               </div>
            <div class="col-lg-4">
                <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="/img/xzibit.jpg" alt="" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
                <h2>Xzibit</h2>
                @if(app()->getLocale() == 'en')
                    <p>I knew him very well, and he gave <br> me the idea to create such a car <br> dealership. He helped me  in every way. <br> I was in difficult times.<br> RESPECT</p>
                    <p><a class="btn btn-secondary" href="https://www.discogs.com/ru/artist/14753-Xzibit">View details &raquo;</a></p>
                @elseif(app()->getLocale() == 'kz')
                    <p>Мен оны өте жақсы білетінмін және ол маған осындай автосалон құру идеясын берді. Ол маған барлық жағынан көмектесті. <br> Қиын кездерде болдым.<br> ҚҰРМЕТ</p>
                    <p><a class="btn btn-secondary" href="https://www.discogs.com/ru/artist/14753-Xzibit">Мәліметті көру &raquo;</a></p>
                @elseif(app()->getLocale() == 'ru')
                    <p>Я очень хорошо его знал, и он <br>подал мне идею создать такой <br>автосалон. Он помогал мне во всем. <br> У меня были трудные времена.<br> УВАЖЕНИЕ</p>
                    <p><a class="btn btn-secondary" href="https://www.discogs.com/ru/artist/14753-Xzibit">Посмотреть детали &raquo;</a></p>
                @endif
                </div>
            <div class="col-lg-4">
                <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="/img/eminem.jpeg" alt="" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
                <h2>Nauryz</h2>
                @if(app()->getLocale() == 'en')
                    <p>The owner of the project and generally a very strong programmer. Comes up with ideas for a project in 5 minutes</p>
                    <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
                @elseif(app()->getLocale() == 'kz')
                    <p>Жобаның иесі және негізінен өте күшті бағдарламашы. 5 минут ішінде жобаның идеяларын ұсынады</p>                    <p><a class="btn btn-secondary" href="#">Мәліметті көру &raquo;</a></p>
                @elseif(app()->getLocale() == 'ru')
                    <p>Владелец проекта и вообще очень сильный программист. Придумывает идеи для проекта за 5 минут</p>
                    <p><a class="btn btn-secondary" href="#">Посмотреть детали &raquo;</a></p>
                @endif
            </div>
        </div>
    </div>
</main>
@endsection

