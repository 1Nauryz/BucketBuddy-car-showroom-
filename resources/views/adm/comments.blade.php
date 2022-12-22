@extends('layouts.adm')
@section('title', 'Users Page')
@section('content')
    <h3>Comments Page</h3>

    <form action="{{route('adm.comments.search')}}" method="GET">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">@</span>
            </div>
            <input type="text" name="search" class="form-control" placeholder="{{__('messages.Search')}}" aria-label="Search" aria-describedby="basic-addon1">
            <button type="submit" class="btn btn-outline-primary">{{__('messages.Search')}}</button>

        </div>

    </form>

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">{{__('messages.Name')}}</th>
            <th scope="col">{{__('messages.User ID')}}</th>
            <th scope="col">{{__('messages.Car ID')}}</th>
            <th scope="col">{{__('messages.Delete')}}</th>
        </tr>
        </thead>
        <tbody>
        @for($i=0; $i<count($comments); $i++)
            <tr>
                <th scope="row">{{$i+1}}</th>
                <td>{{$comments[$i]->content}}</td>
                <td>{{$comments[$i]->user->id}}</td>
                <td>{{$comments[$i]->car->id}}</td>
                <td>
                    <form action="{{route('adm.comments.destroy', $comments[$i]->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-primary btn-lg">{{__('messages.Delete')}}</button>
                    </form>
                </td>
            </tr>
        @endfor
        </tbody>
    </table>
@endsection
