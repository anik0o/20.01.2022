@extends('layouts.app')

@section('content')


    <div class="container " >
        @if(Auth::user()->group_id)
        <div class="row justify-content-center" style="background: #141619; opacity: 0.9; color: white;">

            @if (session('status'))
                <div class="alert alert-success" role="alert">{{ session('status') }}</div>
            @endif
            @if($message = Session::get('success'))
                <div class="alert alert-success"><p>{{$message}}</p></div>
            @endif
                <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
                <link href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.css' rel='stylesheet' />
                <link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>
                <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
                <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
                <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
                <script src='fullcalendar/lang/pl.js'></script>

                <div class="card-header text-center">
                    <h3>Kalendarz</h3>
                </div>
                <a href="{{ url('/event/create') }}" class="btn btn-success float-end">Dodaj zadanie do terminarza</a><br>
                <div class="form-group mb-3"></div>

                <div id='calendar'></div>
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

        @endif

            <script>

                $(document).ready(function() {
                    function getRandomColor(usePrev) {
                        var color =  "#" + (Math.random() * 0xFFFFFF << 0).toString(16);
                        return color;

                    }

                    // page is now ready, initialize the calendar...
                    $('#calendar').fullCalendar({

                        monthNames: ['Styczeń','Luty','Marzec','Kwiecień','Maj','Czerwiec','Lipiec','Sierpień','Wrzesień','Październik','Listopad','Grudzień'],
                        monthNamesShort: ['Sty','Lu','Mar','Kw','Maj','Czer','Lip','Sie','Wrz','Paź','Lis','Gru'],
                        dayNames: ['Niedziela','Poniedziałek','Wtorek','Środa','Czwartek','Piątek','Sobota'],
                        dayNamesShort: ['Nie','Pon','Wt','Śr','Czw','Pt','Sob'],

                        header: {
                            left: 'title',
                            center: '',
                            right: 'prev,next'
                        },

                        // put your options and callbacks here
                        events : [
                                @foreach($events as $event)
                            {

                                title: '{{ $event->title }}',
                                start: '{{ $event->start_day }}',
                                end: '{{$event->end_day}}',
                                backgroundColor: getRandomColor(),
                                url: '{{('/event/edit/'.$event->id)}}',
                            },
                            @endforeach

                        ],

                    })
                })
                calendar.setOption('locale', 'pl');
            </script>

        </div>
        </div>


@endsection
