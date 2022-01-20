@extends('layouts.app')

@section('content')
    <div class="container justify-content-center">
        <div class="row justify-content-center">
    @if(Auth::user()->group_id)
        <div class="row justify-content-center" style="background: #1a1e21">

            <div class="card-header">
                <br><h2 style="color: gray; text-align: center; font-family: sans-serif">Lista zakupów</h2><br>
            </div>
           <table class="table table-hover table-dark " style="background: #6c757d; color: gray; font-family: sans-serif">
                <thead>
                <a href="/add_product" class="btn btn-success btn-sm" >Dodaj produkt</a>
                <tr>
                    <th scope="col">Nazwa produktu</th>
                    <th scope="col">Ilość do kupienia</th>
                    <th scope="col"></th>
                    <th scope="col">
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->amount}}</td>
                        <td><a href="{{ url('edit/'.$item->id) }}" class="btn btn-outline-info btn-sm">Edytuj</a>
                        <td>
                            <form method="POST" action="{{ route('products.destroy', $item->id) }}">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="submit" class="btn btn-outline-success delete" title='Delete'>Kupione</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
                @else
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
        @endif
        </div>
    </div>
@endsection
