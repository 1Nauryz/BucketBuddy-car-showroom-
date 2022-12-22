@extends('layouts.adm')
@section('title', 'Users Page')
@section('content')
    <h3>{{__('messages.USERS PAGE')}}</h3>

    <form action="{{route('adm.users.search')}}" method="GET">
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
            <th scope="col">{{__('messages.Email')}}</th>
            <th scope="col">{{__('messages.Role')}}</th>
            <th scope="col">{{__('messages.Balance')}}</th>
            <th>{{__('messages.Status')}}</th>
            <th>{{__('messages.Edit Role')}}</th>
        </tr>
        </thead>
        <tbody>
        @for($i=0; $i<count($users); $i++)
            <tr>
                <th scope="row">{{$i+1}}</th>
                <td>{{$users[$i]->name}}</td>
                <td>{{$users[$i]->email}}</td>
                <td>{{$users[$i]->role->name}}</td>
                <td>{{$users[$i]->balance}} $</td>
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
                                {{__('messages.Ban')}}
                            @else
                                    <button type="submit" class="btn btn-outline-success">
                                Unban
                            @endif
                        </button>
                    </form>
                </td>
                <td><a href="{{route('adm.users.edit', $users[$i]->id)}}">{{__('messages.Edit Role')}}</a></td>
            </tr>
        @endfor
        </tbody>
    </table>
@endsection
