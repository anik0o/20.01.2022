@extends('layouts.app')

@section('content')

    <div class="container justify-content-center">
        <div class="row justify-content-center">
            <div class="col-md-6 bg-dark">
                <div class="card bg-dark text-light">
                    <div class="card-header">
                        <h4>Edytuj produkt
                            <a href="{{ url('list') }}" class="btn btn-outline-danger float-end">Wróć</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ url('update/'.$products->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label for="">Podaj nazwę produktu do kupienia</label>
                                <input type="text" name="name" value="{{$products->name}}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Podaj ilość do kupienia</label>
                                <input type="number" name="amount" value="{{$products->amount}}" min="1" class="form-control">
                            </div>


                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-outline-success">Zapisz zmiany</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
