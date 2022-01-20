@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-6 bg-dark">

                <div class="card bg-dark">
                    <div class="card-header  text-light">
                        <h4>Dostępne grupy  </h4>

                    </div>
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
                        <div class="card-header">
                            {{$group->name_of_group}}
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"></h5>
                            <p class="card-text">{{$group->about}}</p>
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
                <nav aria-label="Page navigation example">
                    <div class="pagination justify-content-center">
                {{ $groups->links() }}
                    </div>
                </nav>
            </div>
        </div>
    </div>

@endsection
