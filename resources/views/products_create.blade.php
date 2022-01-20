@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
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
                <div class="card bg-dark text-light">
                    <div class="card-header">
                        <h4>Dodaj produkt do listy zakupów</h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ url('add_product') }}" method="POST">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="imie">Produkt</label>
                                <input type="text" name="name" value="{{ (old('name')) }}" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="ilosc">Ilość do kupienia</label>
                                <input type="number" name="amount" value="{{ (old('amount')) }}" min="1"  class="form-control" required>
                            </div>

                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-outline-success">Dodaj </button>
                                <a href="{{ url('list') }}" class="btn btn-outline-danger float-end">Wróć do listy</a>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
