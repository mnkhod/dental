@extends('layouts.app')
@section('header')
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
            opacity: 0;
            background-color: white;
            border: 0px;
        }

        .hidden:hover, .hidden:focus {
            opacity: 0.2;
            background-color: #8f8f8f;
        }

    </style>
    {{--End css style gh met link file oruulna--}}
@endsection
@section('menu')
    <li>
        <a href="{{url('/admin')}}">
            <i class="iconsmind-Digital-Drawing"></i>
            <span>Самбар</span>
        </a>
    </li>
    <li>
        <a href="{{url('/admin/add_staff')}}">
            <i class="iconsmind-Administrator"></i> Үйлчлүүлэгч
        </a>
    </li>
    <li class="active">
        <a href="{{url('/admin/time')}}">
            <i class="iconsmind-Alarm"></i> Цаг
        </a>
    </li>
    <li>
        <a href="{{url('/admin/product')}}">
            <i class="iconsmind-Medicine-2"></i> Төлбөр
        </a>
    </li>
    <li>
        <a href="{{url('/admin/transaction')}}">
            <i class="iconsmind-Space-Needle"></i> Санхүү
        </a>
    </li>
@endsection
@section('content')
<div class="row">
    <div class="col-md-4"><!--profile heseg-->
        <div class="card "><!--row -->
            <div class="card-body">
                <div class="text-center">

                    <p class="list-item-heading mb-1">{{$user->name}} {{$user->last_name}}</p>
                    <div class="text-center">
                        <p class="text-muted text-small mb-2">Хүйс</p>
                        <p class="mb-3">
                            @if($user->sex == 0)
                                Эр
                                @else
                            Эм
                                @endif
                        </p>
                        <p class="text-muted text-small mb-2">Утасны дугаар</p>
                        <p class="mb-3">
                            {{$user->phone_number}}
                        </p>
                        <p class="text-muted text-small mb-2">Цахим хаяг</p>
                        <p class="mb-3">
                            {{$user->email}}
                        </p>
                        <p class="text-muted text-small mb-2">Регистрийн дугаар</p>

                        <p class="mb-3">
                            {{$user->register}}
                        </p>
                        <p class="text-muted text-small mb-2">Төрсөн он сар</p>

                        <p class="mb-3">
                            {{$user->birth_date}}
                        </p>
                        <p class="text-muted text-small mb-2">Тайлбар</p>
                        <p class="mb-3">
                            @if($user->description == '')
                                Тайлбар байхгүй
                            @else
                                {{$user->description}}
                            @endif
                        </p>
                        <a href="{{url('/reception/user_check/'.$user->id.'/check_in')}}"><button type="button" class="btn btn-sm btn-outline-primary ">Эмч рүү оруулах</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>div.ex1 {


            height: 400px;
            overflow: scroll;
        }</style>
    <div class="ex1"><!-- scroll-->
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="#">
                            <div class="d-flex flex-row mb-3 pb-3 border-bottom">
                                <a href="#">
                                    <img src="img/profile-pic-l.jpg" alt="Mayra Sibley" class="img-thumbnail border-0 rounded-circle list-thumbnail align-self-center xsmall" />
                                </a>
                                <div class="pl-3 pr-2">
                                    <a href="#">
                                        <p class="font-weight-medium mb-0 ">Эмч Цэцэг</p>
                                        <p class="text-muted mb-0 text-small">09.08.2018 өдөр хийгдсэн эмчилгээ</p>
                                    </a>
                                </div>
                            </div>

                        </a>
                    </h5>
                    <table class="table table-sm table-borderless">

                        <tbody>
                        <tr>
                            <td>
                                <span class="log-indicator border-theme-2 align-middle"></span>
                            </td>
                            <td>
                                <span class="font-weight-medium">Шүдний ломбо</span>
                            </td>
                            <td class="text-right">
                                <span class="text-muted">500₮</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="log-indicator border-theme-2 align-middle"></span>
                            </td>
                            <td>
                                <span class="font-weight-medium">Чулуу түүх</span>
                            </td>
                            <td class="text-right">
                                <span class="text-muted">2000₮</span>
                            </td>
                        </tr>




                        </tbody>
                    </table>
                    <span class="badge badge-pill badge-primary">Нийт зарцуулсан 5000₮</span>

                </div>
            </div>
        </div>
        <br>
        <div class="col-md-12"><!-- col start-->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="#">
                            <div class="d-flex flex-row mb-3 pb-3 border-bottom">
                                <a href="#">
                                    <img src="img/profile-pic-l.jpg" alt="Mayra Sibley" class="img-thumbnail border-0 rounded-circle list-thumbnail align-self-center xsmall" />
                                </a>
                                <div class="pl-3 pr-2">
                                    <a href="#">
                                        <p class="font-weight-medium mb-0 ">Эмч Цэцэг</p>
                                        <p class="text-muted mb-0 text-small">09.08.2018 өдөр хийгдсэн эмчилгээ</p>
                                    </a>
                                </div>
                            </div>

                        </a>
                    </h5>
                    <table class="table table-sm table-borderless">

                        <tbody>
                        <tr>
                            <td>
                                <span class="log-indicator border-theme-2 align-middle"></span>
                            </td>
                            <td>
                                <span class="font-weight-medium">Ломбо</span>
                            </td>
                            <td class="text-right">
                                <span class="text-muted">400₮</span>
                            </td>
                        </tr>




                        </tbody>
                    </table>
                    <span class="badge badge-pill badge-primary">Нийт зарцуулсан 400₮</span>
                </div>
            </div>
        </div><!-- col end-->
    </div>    <!-- scroll end-->
    <div class="col-lg-3">
        <a href="#" class="card">
            <div class="card-body text-center">
                <i class="iconsmind-Alarm"></i>
                <p class="card-text mb-0">Цаг авсан эсэх</p>
                <p class="lead text-center">Аваагүй</p>
            </div>
        </a>
        <br>
        <a href="#" class="card">
            <div class="card-body text-center">
                <i class="iconsmind-Money-2"></i>
                <p class="card-text mb-0">Нийт зарцуулсан</p>
                <p class="lead text-center">1900₮</p>
            </div>
        </a>
        <br>
        <a href="#" class="card">
            <div class="card-body text-center">
                <i class="iconsmind-Hospital"></i>
                <p class="card-text mb-0">Хэдэн удаа үзүүлсэн эсэх </p>
                <p class="lead text-center">2 удаа</p>
            </div>
        </a>
    </div>
</div>
</div><!--end row-->
@endsection
@section('footer')
    <script>
        function bookTime(time, shift_id, doctor_name) {
            document.getElementById("timeShow").innerHTML = time;
            document.getElementById("timeInput").value = time;
            document.getElementById("nameShow").innerHTML = doctor_name;
            document.getElementById('shiftInput').value = shift_id;
            $("#exampleModalRight").modal();
        }
        function deleteAppointment(name, phone, time, appointment_id, doctor_name) {
            document.getElementById("da_user_name").innerHTML = name;
            document.getElementById("da_user_phone").innerHTML = phone;
            document.getElementById("da_time").innerHTML = time;
            document.getElementById("da_id").value = appointment_id;
            document.getElementById("da_doctor_name").innerHTML = doctor_name;
            $("#deleteAppointment").modal();
        }
    </script>
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