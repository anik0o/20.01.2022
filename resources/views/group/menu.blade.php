@extends('layouts.app')
@section('content')
    <div class="container ">
        <div class="row justify-content-center ">
            <div class="col-md-10 bg-dark bg-opacity-75">
                <div class="card bg-dark">
                    <div><br>
                    </div>
                    <table class="table table-bordered">
                    <thead>
                    <a href="/create_group" class="btn btn-success btn-sm" >STWÓRZ NOWĄ GRUPĘ</a>
                    </thead>
                        <tbody>
                        <tr>
                            <td class="table-light bg-opacity-75" style="text-align:center">
                                @if(Auth::user()->group_id)
                                <a href={{ url('/groups/yours/'.Auth::user()->group_id) }} title="grupa" style="color: black; text-decoration: none">
                                    <img src="{{url('profile.png')}}" class="img-fluid" alt="Twoja grupa" width="300">
                                    <br>
                                    TWOJA GRUPA
                                    <br><br>
                                </a>
                                @else
                                    <a href={{ url('/withoutgroup') }} title="grupa" style="color: black; text-decoration: none">
                                        <img src="{{url('profile.png')}}" class="img-fluid" alt="Twoja grupa" width="300">
                                        <br>
                                        TWOJA GRUPA
                                        <br><br>
                                    </a>
                                @endif
                            </td>
                            <td class="table-light bg-opacity-75" style="text-align:center">
                                <a href="/groups/show" title="Wszystkie grupy" style="color: black; text-decoration: none">
                                    <img src="{{url('grupa.png')}}" class="img-fluid" alt="Lista grup" width="300" >
                                    <br>
                                    WYŚWIETL WSZYSTKIE GRUPY
                                    <br>
                                    <br>
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
