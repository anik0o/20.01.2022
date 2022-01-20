@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-6 bg-dark">



                <div class="card bg-dark">
                    <div class="card-header text-light" style="text-align: center">
                        <h4>Twoja grupa</h4>
                    </div>

                        <div class="card text-center">
                            <div class="card text-center">
                                @if($groups->picture == '1')
                                    <div class="thumbnail" style="width: auto; height: 400px">
                                        <img src="{{ url('group.png') }}" class="img-fluid img-thumbnail " style="width: 100%; height: 400px" alt="Responsive image" >
                                    </div>
                                @else
                                    <div class="thumbnail" >
                                        <img class="img-fluid img-thumbnail" alt="Zdjęcie grupy" src="{{ asset('/storage/'.$groups->picture) }}" style="width: 100%; height: 400px"  data-holder-rendered="true">
                                    </div>
                                @endif
                            <div class="card-header">
                                Grupa <b>{{$groups ->name_of_group}}</b>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <p class="card-text">{{$groups ->about}} </p>
                                <a href="{{ url('/groups/edit/'.$groups->id) }}" class="btn btn-dark">Edytuj dane grupy</a>
                                <a href="/full" class="btn btn-dark">Sprawdź kalendarz</a>
                                <a href="/list" class="btn btn-dark">Sprawdź listę zakupów</a><br>

                                @if(Auth::user()->id == $groups->admin_id)
                                    <br><hr>
                                    <h6><b>Jesteś administratorem tej grupy i możesz zarządzać jej uczestnikami</b></h6><br>
                                    <a href="{{ url('/groups/users/list/'.$groups->id) }}" class="btn btn-dark">Zarządzaj grupą</a><br>
                                @endif
                                <hr>
                                <form method="GET" action="{{ route('users.leave') }}">
                                    @csrf
                                    <input name="_method" type="hidden" value="leave">
                                    <button type="submit" class="btn btn-outline-danger delete" title='Leave'>Opuść</button>
                                </form>
                                <br><hr><br>


                            </div>
                            <div class="card-footer text-muted">
                            </div>
                        </div>
                        <br>

                </div>
            </div>
        </div>
    </div>

@endsection
