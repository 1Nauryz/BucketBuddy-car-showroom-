@extends('layouts.adm')
@section('title', 'Users Page')
@section('content')
    <h3>USERS PAGE</h3>

    <form action="{{route('adm.users.search')}}" method="GET">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">@</span>
            </div>
            <input type="text" name="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1">
            <button type="submit" class="btn btn-outline-primary">Search</button>

        </div>

    </form>

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th>Status</th>
            <th>Edit Role</th>
        </tr>
        </thead>
        <tbody>
        @for($i=0; $i<count($users); $i++)
            <tr>
                <th scope="row">{{$i+1}}</th>
                <td>{{$users[$i]->name}}</td>
                <td>{{$users[$i]->email}}</td>
                <td>{{$users[$i]->role->name}}</td>
                <td>
                    <form action="
                    @if($users[$i]->is_active)
                          {{route('adm.users.ban', $users[$i]->id)}}
                            @else
                                {{route('adm.users.unban' , $users[$i]->id)}}
                            @endif
                    " method="post">
                        @csrf
                        @method('PUT')

                            @if($users[$i]->is_active)
                            <button type="submit" class="btn btn-outline-danger">
                                Ban
                            @else
                                    <button type="submit" class="btn btn-outline-success">
                                Unban
                            @endif
                        </button>
                    </form>
                </td>
                <td><a href="{{route('adm.users.edit', $users[$i]->id)}}">Edit Role</a></td>
            </tr>
        @endfor
        </tbody>
    </table>
@endsection
