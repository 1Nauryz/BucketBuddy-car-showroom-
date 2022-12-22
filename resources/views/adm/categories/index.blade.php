@extends('layouts.adm')
@section('title', 'Categories Page')
@section('content')
    <h3>CATEGORIES PAGE</h3>
    <h3><a href="{{route('adm.categories.create')}}">Create category</a></h3>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col"></th>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">CODE</th>
            <th scope="col">Image</th>
            <th>Edit Category</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $cat)
            <td>
                <th scope="row">{{$cat->id}}</th>
                <td>{{$cat->name}}</td>
                <td>{{$cat->code}}</td>
                <td><img src="{{asset($cat->image)}}" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="50" height="50" loading="lazy"></td>
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
