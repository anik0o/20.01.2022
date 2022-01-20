@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-6">



                <div class="card bg-dark text-light">
                    <div class="card-header">
                        <h4>Stwórz grupę</h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ url('create_group') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="">Nazwa grupy</label>
                                <input type="text" name="name_of_group" class="form-control" required >
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Opis</label>
                                <input type="text" name="about" class="form-control" height="100">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Zdjęcie</label>
                                <input type="file" name="picture" class="form-control" >
                            </div>

                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-outline-success">Utwórz grupę </button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
