@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 justify-content-center">
                <div class="card bg-dark text-light justify-content-center ">
                    <div class="card-header justify-content-center" style="text-align: center;">

                        <h4>Nie należysz do żadnej grupy</h4><br>
                        <h6>Aby uzyskać dostęp do listy zakupów, musisz przynależeć do grupy. Jeżeli chcesz możesz dołączyć do już istniejącej grupy, lub stworzyć swoją własną. Ty wybierasz :)</h6>
                        <br><br>
                    </div>
                    <a href="{{ url('/create_group') }}" class="btn btn-outline-danger float-end">Stwórz własną grupę</a>
                    <a href="{{ url('/groups/show') }}" class="btn btn-outline-danger float-end">Wybierz grupę z listy dostępnych</a>
                    <div class="form-group mb-3">

                    </div>


                </div>
            </div>

        </div>
        </div>

@endsection
