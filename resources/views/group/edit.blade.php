@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">



                <div class="card bg-dark text-light">
                    <div class="card-header">
                        <h4>Edytuj dane grupy
                            <a href="{{ url('groups/yours/'.Auth::user()->group_id) }}" class="btn btn-outline-danger float-end">Wróć</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ url('groups/update/'.$groups->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label for="">Zmień nazwę grupy</label>
                                <input type="text" name="name_of_group" value="{{$groups->name_of_group}}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Zmień opis grupy</label>
                                <input type="text" name="about" value="{{$groups->about}}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Zmień zdjęcie grupy</label>
                                <input type="file" name="picture" class="form-control" >
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
