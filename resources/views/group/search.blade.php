@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-6 bg-dark">

                <div class="card bg-dark">
                    <div class="card-header  text-light">
                        <br>
                        <h4>Znajdź grupę na podstawie nazwy</h4>

                        <form action="{{url('/search')}}" type="get" role="search">
                            @csrf

                                <input type="text" class="form-control" name="query"
                                       placeholder="Wpisz tutaj nazwę której szukasz"> <span class="input-group-btn">
                                <br>
                                <div class="align-content-md-end" style="text-align: right">
                                <button type="search" class="btn btn-outline-success" >Szukaj grupy</button>
                                </div>
                                </span>
                        </form>
                        <br>
                        @foreach($groups as $group)
                            <div class="card text-center">
                                @if($group->picture == '1')
                                    <div class="thumbnail" >
                                        <img src="{{ url('group.png') }}" class="img-fluid img-thumbnail " style="width: 100%; height: 400px" alt="Responsive image" >
                                    </div>
                                @else
                                    <div class="thumbnail" >
                                        <img class="img-fluid img-thumbnail" alt="Zdjęcie grupy" src="{{ asset('/storage/'.$group->picture) }}" style="width: 100%; height: 400px"  data-holder-rendered="true">
                                    </div>
                                @endif
                                <div class="card-header text-black">
                                    {{$group->name_of_group}}
                                </div>
                                <div class="card-body bg-dark">
                                    <h5 class="card-title"></h5>
                                    <p class="card-text ">{{$group->about}}</p>
                                    <form method="POST" action="{{ route('group.join', $group->id) }}">
                                        @csrf
                                        <input name="_method" type="hidden" value="get">
                                        <button type="submit" class="btn btn-outline-success delete" title='join'>Dołącz do grupy</button>
                                    </form>
                                </div>
                                <div class="card-footer text-muted">
                                </div>
                            </div>
                            <br>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
