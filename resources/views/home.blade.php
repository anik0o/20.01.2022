@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-dark">

                <div class="card-body">
                    <img src="{{url('photo.jpg')}}" class="img-fluid" alt="Responsive image" >

                    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8" style="background: black; opacity: 0.9; border-radius: 5px; color: #a0aec0;">

                        <div class="row justify-content-center">

                            <div class="jumbotron">
                                <br>
                                <h3 style="text-align: center">Witaj {{Auth::user()->name}}, miło Cię widzieć na stronie Crewmate!</h3>
                                <p class="lead text-center text-gray-200">Zarządzaj czasem, stwórz grupę, lub dołącz do już istniejącej.</p>

                                <p class="text-center text-gray-200">Pokaż aplikację współlokatorom lub znajomym, którzy mają problem z organizacją czasu</p>
                                <br>
                            </div>

                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
