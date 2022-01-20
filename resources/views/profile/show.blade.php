@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
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
                <div class="card" style="background: dimgray;">
                    <div class="card-header" style="color: white;">{{Auth::user()->name}}, jeżeli chcesz zaktualizować dane zmień pola poniżej:</div>
                    <div class="card-body" style="background: dimgray;">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">{{ session('status') }}</div>
                        @endif
                        @if($message = Session::get('success'))
                            <div class="alert alert-success"><p>{{$message}}</p></div>
                        @endif
                        <form action="{{route('home')}}" method="POST" style="background: dimgray;">
                            @csrf
                            <div class="form-group ">
                                <label for="name"><strong>Imie:</strong></label>
                                <input type="text" class="form-control" id ="name" name="name" value="{{Auth::user()->name}}">
                            </div>
                            <div class="form-group">
                                <label for="surname"><strong>Nazwisko:</strong></label>
                                <input type="text" class="form-control" id ="surname" name="surname" value="{{Auth::user()->surname}}">
                            </div>
                            <div class="form-group">
                                <label for="email"><strong>E-mail:</strong></label>
                                <input type="text" class="form-control" id ="email" value="{{Auth::user()->email}}" name="email">
                            </div>
                            <div class="form-group">
                                <label for=""><strong>Data urodzenia:</strong></label>
                                <input type="date" class="form-control" id ="date_of_birth" value="{{Auth::user()->date_of_birth}}" name="date_of_birth">
                            </div>
                            <div class="form-group">
                                <label for="password"><strong>Hasło:</strong></label>
                                <input type="password" class="form-control" id ="password" value="{{Auth::user()->password}}" name="password">
                            </div>
<br>
                            <button class="btn btn-dark" type="submit">Zaktualizuj dane</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


