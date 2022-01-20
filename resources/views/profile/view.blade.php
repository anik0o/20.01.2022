@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>
                            {{$error}}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session()->get('message'))
            <div class="alert alert-success" role="alert">
                <strong>Sukces: </strong>{{session()->get('message')}}
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">

                    <div class="card bg-dark">
                        <div class="card-header text-light" style="text-align: center">
                            <h4>Twój profil</h4>
                        </div>

                        <div class="card text-center bg-dark">
                            @if(!is_null(Auth::user()->photo))
                                <div class="rounded">
                                    <img class="rounded-circle" alt="Zdjęcie profilowe" src="{{ asset('/storage/'.Auth::user()->photo) }}" style="width: 300px; height: 300px" data-holder-rendered="true">
                                 </div>
                                    @else
                                <div class="rounded text-center">
                            <img class="rounded-circle img-fluid" src="{{url('group.png')}}" style="width: 300px; height: 300px; " alt="Responsive image">
                                </div>
                            @endif
                                <div class="card-header text-light">
                            Twój nick:    {{Auth::user()->nick}}
                            </div>

                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <a href="/edit_profile" class="btn btn-outline-success">Edytuj dane profilu</a>




                            </div>
                            <div class="card-footer text-muted">
                            </div>
                        </div>
                        <br>

                    </div>



        </div>
    </div>
@endsection



