@extends('layouts.adm')
@section('title', 'Categories Page')
@section('content')
    <h3>CATEGORIES PAGE</h3>
    <h3><a href="{{route('adm.categories.create')}}">Create category</a></h3>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">CODE</th>
            <th>Edit Category</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $cat)
            <td>
                <th scope="row">{{$cat->id}}</th>
                <td>{{$cat->name}}</td>
                <td>{{$cat->code}}</td>
                <td>
                <form action="{{route('adm.categories.destroy', $cat->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                        <button type="submit" class="btn btn-primary btn-lg">Delete</button>
                </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
