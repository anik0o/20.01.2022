@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-dark text-light">
                    <div class="card-header" style="text-align: center">{{ __('WYBIERZ GRĘ') }}</div>

                    <table class="table table-bordered">

                        <tbody>
                        <tr>
                            <td class="table-light" style="text-align:center">
                                <a href="/profile" title="Profile" style="color: black; text-decoration: none">
                                    <img src="{{url('gra.png')}}" class="img-fluid" alt="Rzut kostą" width="300">
                                    <br>
                                    RZUT KOSTKĄ
                                    <br><br>
                                </a>
                            </td>

                            <td class="table-light" style="text-align:center">
                                <a href="/groups/list" title="Shoppinglist" style="color: black; text-decoration: none">
                                    <img src="{{url('lista.png')}}" class="img-fluid" alt="Lista grup" width="300" >
                                    <br>
                                    RZUT MONETĄ
                                    <br><br>
                                </a>
                            </td>


                        </tr>

                        </tbody>
                    </table>



                </div>
            </div>
        </div>
    </div>
@endsection
