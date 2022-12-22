@extends('layouts.app')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
<form action="{{route('cars.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    @if(app()->getLocale() == 'en')
        <div class="form-group">
            <label for="model">Car model:</label>
            <input type="text" class="form-control @error('model') is-invalid @enderror" name="model">
        </div>
        <div class="form-group">
            <label for="city">City:</label>
            <input type="text" class="form-control @error('city') is-invalid @enderror" name="city">
        </div>
        <div class="form-group">
            <label for="city">Volume:</label>
            <input type="text" class="form-control @error('volume') is-invalid @enderror" name="volume">
        </div>
        <div class="form-group">
            <label for="city">Mileage:</label>
            <input type="text" class="form-control @error('mileage') is-invalid @enderror" name="mileage">
        </div>
        <div class="form-group">
            <label for="city">Transmission:</label>
            <input type="text" class="form-control @error('transmission') is-invalid @enderror" name="transmission">
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="text" class="form-control @error('price') is-invalid @enderror" name="price">
        </div>
        <div class="form-group">
            <label for="text">Phone:</label>
            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone">
        </div>
        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="imageInput" name="image">
            @error('image')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="brand">Brand:</label>
            <select name="category_id" id="">
                @foreach($categories as $cat)
                    <option value="{{$cat->id}}">
                        {{$cat->name}}
                    </option>
                @endforeach
            </select>
        </div>
        <input type="hidden" name="user_id" value="{{ Auth::user()->id}}">
        <button type="submit" class="btn btn-success">Submit</button>
    @elseif(app()->getLocale() == 'kz')
        <div class="form-group">
            <label for="model">Көлік үлгісі:</label>
            <input type="text" class="form-control" name="model">
        </div>
        <div class="form-group">
            <label for="city">Қала:</label>
            <input type="text" class="form-control" name="city">
        </div>
        <div class="form-group">
            <label for="city">Көлемі:</label>
            <input type="text" class="form-control" name="volume">
        </div>
        <div class="form-group">
            <label for="city">Жүгіріс:</label>
            <input type="text" class="form-control" name="mileage">
        </div>
        <div class="form-group">
            <label for="city">Трансмиссиясы:</label>
            <input type="text" class="form-control" name="transmission">
        </div>
        <div class="form-group">
            <label for="price">Бағасы:</label>
            <input type="text" class="form-control" name="price">
        </div>
        <div class="form-group">
            <label for="text">Нөмір:</label>
            <input type="text" class="form-control" name="phone">
        </div>
        <div class="form-group">
            <label for="image">Сурет:</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="imageInput" name="image">
            @error('image')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="brand">Бренд:</label>
            <select name="category_id" id="">
                @foreach($categories as $cat)
                    <option value="{{$cat->id}}">
                        {{$cat->name}}
                    </option>
                @endforeach
            </select>
        </div>
        <input type="hidden" name="user_id" value="{{ Auth::user()->id}}">
        <button type="submit" class="btn btn-success">Жіберу</button>
    @elseif(app()->getLocale() == 'ru')
        <div class="form-group">
            <label for="model">Модель автомобиля:</label>
            <input type="text" class="form-control" name="model">
        </div>
        <div class="form-group">
            <label for="city">Город:</label>
            <input type="text" class="form-control" name="city">
        </div>
        <div class="form-group">
            <label for="city">Обьем:</label>
            <input type="text" class="form-control" name="volume">
        </div>
        <div class="form-group">
            <label for="city">Пробег:</label>
            <input type="text" class="form-control" name="mileage">
        </div>
        <div class="form-group">
            <label for="city">Трансмиссия:</label>
            <input type="text" class="form-control" name="transmission">
        </div>
        <div class="form-group">
            <label for="price">Цена:</label>
            <input type="text" class="form-control" name="price">
        </div>
        <div class="form-group">
            <label for="text">Номер:</label>
            <input type="text" class="form-control" name="phone">
        </div>
        <div class="form-group">
            <label for="image">Фото:</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="imageInput" name="image">
            @error('image')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="brand">Бренд:</label>
            <select name="category_id" id="">
                @foreach($categories as $cat)
                    <option value="{{$cat->id}}">
                        {{$cat->name}}
                    </option>
                @endforeach
            </select>
        </div>
        <input type="hidden" name="user_id" value="{{ Auth::user()->id}}">
        <button type="submit" class="btn btn-success">Разместить</button>
    @endif
</form>
    </div>
@endsection

