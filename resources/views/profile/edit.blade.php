@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card bg-dark text-light">
                    <div class="card-header">
                        <h4>Edytuj profil</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('edit_profile') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="">Nick</label>
                                <input type="text" name="nick" class="form-control" value="{{Auth::user()->nick}}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Zdjęcie</label>
                                <input type="file" name="photo" class="form-control" >
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-outline-success">Zapisz </button>
                                <a href="{{ url('profile') }}" class="btn btn-outline-danger float-end">Wróć do widoku profilu</a>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
