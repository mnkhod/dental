@extends('layouts.doctor')
@section('header')
    <link rel="stylesheet" href="{{asset('css/vendor/fullcalendar.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/vendor/dataTables.bootstrap4.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/vendor/datatables.responsive.bootstrap4.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/vendor/select2.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/vendor/owl.carousel.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/vendor/bootstrap-stars.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/vendor/nouislider.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/vendor/bootstrap-datepicker3.min.css')}}"/>

    {{--End css style gh met link file oruulna--}}
@endsection
@section('content')
    <script>
        document.getElementById('doctorTreatment').classList.add('active');
    </script>

    <br>
    <div class="row">
        {{--@foreach($results->get() as $result)--}}
        @foreach($checkins as $checkin)
            <div class="col-md-3">
                <div class="card ">
                    <div class="card-body">
                        <div class="text-center">
                            <p class="list-item-heading mb-1">
                                {{--<a href="{{url('/reception/users/'.$result->id)}}">{{$result->last_name}} {{$result->name}}</a>--}}
                                    {{$checkin->user->last_name}} {{$checkin->user->name}}
                            </p>
                            <br>
                            <a href="{{url('/doctor/treatment/'.$checkin->id)}}">
                                <button class="btn btn-outline-primary" style="border-radius: 0px">Эмчилгээнд оруулах</button>
                            </a>
                            <br>
                            <br>
                            <div class="text-center">
                                <p class="text-muted text-small mb-2">Регистрийн дугаар</p>
                                <p class="mb-3">
                                {{$checkin->user->register}}
                                </p>

                                <p class="text-muted text-small mb-2">Утасны дугаар</p>
                                <p class="mb-3">
                                {{$checkin->user->phone_number}}
                                </p>
                                <p class="text-muted text-small mb-2">Цахим хаяг</p>
                                <p class="mb-3">
                                {{$checkin->user->email}}
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach

    </div>

@endsection
@section('footer')


    <script src="{{asset('js/vendor/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('js/vendor/chartjs-plugin-datalabels.js')}}"></script>
    <script src="{{asset('js/vendor/moment.min.js')}}"></script>
    <script src="{{asset('js/vendor/fullcalendar.min.js')}}"></script>
    <script src="{{asset('js/vendor/datatables.min.js')}}"></script>
    <script src="{{asset('js/vendor/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/vendor/progressbar.min.js')}}"></script>
    <script src="{{asset('js/vendor/jquery.barrating.min.js')}}"></script>
    <script src="{{asset('js/vendor/select2.full.js')}}"></script>
    <script src="{{asset('js/vendor/nouislider.min.js')}}"></script>
    <script src="{{asset('js/vendor/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('js/vendor/Sortable.js')}}"></script>
    {{--Scriptuudiig include hiiideg heseg--}}
@endsection