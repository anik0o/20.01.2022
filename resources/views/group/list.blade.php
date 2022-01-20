@extends('layouts.app')

@section('content')
    <div class="container justify-content-center">
        <div class="row justify-content-center">
                <div class="row justify-content-center" style="background: #1a1e21">

                    <div class="card-header">
                        <br><h2 style="color: gray; text-align: center; font-family: sans-serif">Lista użytkowników</h2><br>
                    </div>
                    <table class="table table-hover table-dark " style="background: #6c757d; color: gray; font-family: sans-serif">
                        <thead>

                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Nick</th>
                            <th scope="col">Mail</th>
                            <th scope="col">Zarządzaj
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>@if(!is_null(Auth::user()->photo))
                                        <div class="rounded">
                                            <img class="rounded-circle" alt="Zdjęcie profilowe" src="{{ asset('/storage/'.$user->photo) }}" style="width: 30px; height: 30px" data-holder-rendered="true">
                                        </div>
                                    @else
                                        <div class="rounded text-center">
                                            <img class="rounded-circle img-fluid" src="{{url('group.png')}}" style="width: 30px; height: 30px; " alt="Responsive image">
                                        </div>
                                    @endif</td>
                                <td>{{$user->nick}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <a href="{{ url('/out/'.$user->id) }}" class="btn btn-outline-danger btn-sm">Usuń użytkownika z grupy</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

        </div>
    </div>
@endsection
