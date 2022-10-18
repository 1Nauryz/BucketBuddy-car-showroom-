@extends('layouts.app')
@section('content')
<main>
    <div class="px-4 py-5 my-5 text-center">
        <img class="d-block mx-auto mb-4" src="/img/bb_logo.jpg" alt="" width="120" height="75">
        <h1 class="display-5 fw-bold">Bucket Buddy</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">A car dealership is a shop that sells new or used cars. Here you can choose and buy a car yourself or with the help of the salon staff. If the car is available, you can immediately purchase it and pick it up from the salon.</p>
        </div>
    </div>

    <div class="b-example-divider"></div>
@foreach($cars as $car)
    <div class="container col-xxl-8 px-4 py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="{{$car->image}}" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
            </div>
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold lh-1 mb-3">{{$car->model}}</h1>
                <p class="lead">City: {{$car->city}} <br>
                    Engine volume: {{$car->volume}} <br>
                    Mileage: {{$car->mileage}} <br>
                    Transmission: {{$car->transmission}} <br>
                </p>
                <div>Author: {{$car->user->name}}</div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <button type="button" class="btn btn-outline-primary btn-lg px-4 me-md-2"><a href="{{route('cars.show', $car->id)}}">View</a></button>
                    <button type="button" class="btn btn-outline-secondary btn-lg px-4"><a href="{{route('cars.edit', $car->id)}}">Edit</a></button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="container marketing">
        <div class="row">
            <div class="col-lg-4">
                <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="/img/bill.webp" alt="" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
                <h2>Bill Gates</h2>
                <p>He is one of the many investors <br> who believed in our success and,<br> oddly enough, did not lose</p>
                <p><a class="btn btn-secondary" href="https://www.theguardian.com/us-news/2022/apr/15/send-us-your-questions-for-bill-gates">View details &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="/img/xzibit.jpg" alt="" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
                <h2>Xzibit</h2>
                <p>I knew him very well, and he gave <br> me the idea to create such a car <br> dealership. He helped me  in every way. <br> I was in difficult times.<br> RESPECT</p>
                <p><a class="btn btn-secondary" href="https://www.discogs.com/ru/artist/14753-Xzibit">View details &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="/img/me2.jpeg" alt="" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
                <h2>Nauryz</h2>
                <p>The owner of the project and generally a very strong programmer. Comes up with ideas for a project in 5 minutes</p>
                <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
            </div>
        </div>
    </div>
</main>
@endsection

