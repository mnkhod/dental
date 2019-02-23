@extends('layouts.app')
@section('header')
    {{--End css style gh met link file oruulna--}}
    <link rel="stylesheet" href="{{asset('css/vendor/fullcalendar.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/vendor/dataTables.bootstrap4.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/vendor/datatables.responsive.bootstrap4.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/vendor/select2.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/vendor/owl.carousel.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/vendor/bootstrap-stars.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/vendor/nouislider.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/vendor/bootstrap-datepicker3.min.css')}}"/>
    <style>
        .hidden {
            border-radius: 10px;
            opacity: 0;
            background-color: white;
            border: 0px;
        }

        .hidden:hover, .hidden:focus {
            opacity: 1;
        }

    </style>
@endsection
@section('menu')
    <li>
        <a href="{{url('/accountant/transactions')}}">
            <i class="iconsmind-Calculator-3"></i> Санхүү
        </a>
    </li>
    <li class="active">
        <a href="{{url('/accountant/staffs')}}">
            <i class="iconsmind-Administrator"></i> Ажилчид
        </a>
    </li>
    <li>
        <a href="{{url('/accountant/shifts')}}">
            <i class="iconsmind-Alarm"></i> Ээлж
        </a>
    </li>
    <li>
        <a href="{{url('/accountant/products')}}">
            <i class="iconsmind-Medicine-2"></i> Материал
        </a>
    </li>
    <li>
        <a href="{{url('/accountant/hospital')}}">
            <i class="iconsmind-Betvibes"></i> Эмнэлэг
        </a>
    </li>

@endsection
@section('content')
    <div class="row">
        <div class="col-lg-4">
            <h3>
                <i class="iconsmind-Folder-Search"></i>
                <span class="align-middle d-inline-block pt-1"> Ажилчид</span>
            </h3>
        </div>
    </div>
    <div class="separator mb-5"></div>
    <br>
    <div class="row">
        @foreach($roles->get() as $role)
            <div class="col-md-3">
                <div class="card ">
                    <div class="card-body">
                        <div class="text-center">
                            <p class="list-item-heading mb-1"><a href="{{url('/accountant/staffs/'.$role->id)}}">{{$role->staff->last_name}} {{$role->staff->name}}</a></p>
                            <p class="text-muted">@if($role->role_id == 2) Эмч @elseif($role->role_id == 3) Сувилагч @else Бусад @endif</p>

                            <div class="text-center">
                                <p class="text-muted text-small mb-2">Регистрийн дугаар</p>
                                <p class="mb-3">
                                    {{$role->staff->register}}
                                </p>

                                <p class="text-muted text-small mb-2">Утасны дугаар</p>
                                <p class="mb-3">
                                    {{$role->staff->phone_number}}
                                </p>
                                <p class="text-muted text-small mb-2">Цахим хаяг</p>
                                <p class="mb-3">
                                    {{$role->staff->email}}
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