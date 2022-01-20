@extends('layouts.app')

@section('content')

        <div class="container ">
            <div class="row justify-content-center">
                <div class="col-md-6 bg-dark">

                    <div class="card bg-dark">
                        <div class="card-header  text-light">

            <form action="{{ url('/event/create')}}" method="post">
                @csrf

                <div class="form-group mb-3">
                    <label for=""><h4>Podaj nazwę zadania</h4></label>
                    <input type="text" name="title" class="form-control" required/>
                </div>
                <br>
                <h4>Kiedy się zaczyna?</h4>

                <div class="form-group mb-3">
                    <label for="">Podaj dzień rozpoczęcia</label>
                    <input type="date" name="start_day" class="form-control" required/>
                </div>
                <div class="form-group mb-3">
                    <label for="">Podaj godzinę rozpoczęcia</label>
                    <input type="time" name="start_time" class="form-control" required/>
                </div>
                <br>
                <h4>Kiedy się kończy?</h4>
                <div class="form-group mb-3">
                    <label for="">Podaj dzień zakończenia</label>
                    <input type="date" name="end_day" class="form-control" required/>
                </div>
                <div class="form-group mb-3">
                    <label for="">Podaj godzinę zakończenia</label>
                    <input type="time" name="end_time" class="form-control" required/>
                </div>
                <br>
                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-outline-success">Dodaj </button>
                    <a href="{{ url('/full') }}" class="btn btn-outline-danger float-end">Wróć do kalendarza</a>
                </div>
            </form>
        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
