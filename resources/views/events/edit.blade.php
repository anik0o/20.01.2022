@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-6 bg-dark">

                <div class="card bg-dark">
                    <div class="card-header  text-light">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">{{ session('status') }}</div>
                        @endif
                        @if($message = Session::get('success'))
                            <div class="alert alert-success"><p>{{$message}}</p></div>
                        @endif
                        <form action="{{ url('/event/edit/'.$events->id)}}" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <label for=""><h4>Podaj nazwę zadania</h4></label>
                                <input type="text" class="form-control" id ="title" name="title" value="{{$events->title}}">
                            </div>
                            <br>
                            <h4>Kiedy się zaczyna?</h4>

                            <div class="form-group mb-3">
                                <label for="">Podaj dzień rozpoczęcia</label>
                                <input type="date" name="start_day" value="{{$events->start_day}}" class="form-control" required/>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Podaj godzinę rozpoczęcia</label>
                                <input type="time" name="start_time" value="{{$events->start_time}}" class="form-control" required/>
                            </div>
                            <br>
                            <h4>Kiedy się kończy?</h4>
                            <div class="form-group mb-3">
                                <label for="">Podaj dzień zakończenia</label>
                                <input type="date" name="end_day" value="{{$events->end_day}}" class="form-control" required/>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Podaj godzinę zakończenia</label>
                                <input type="time" name="end_time" value="{{$events->end_time}}" class="form-control" required/>
                            </div>
                            <br>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-outline-success">Zapisz zmiany</button>

                                <a href="{{ url('/full') }}" class="btn btn-outline-danger float-end">Wróć do kalendarza</a>
                            </div>
                        </form>
                            <form method="POST" action="{{ route('events.destroy', $events->id) }}">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="submit" class="btn btn-outline-success delete" title='Delete'>Usuń</button>
                            </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
