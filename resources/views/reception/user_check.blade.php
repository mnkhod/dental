@extends('layouts.reception')
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

@section('content')
    <script>document.getElementById('receptionUser').classList.add('active');</script>
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
                        {{--<a href="{{url('/reception/user_check/'.$user->id.'/check_in')}}"><button type="button" class="btn btn-sm btn-outline-primary ">Эмч рүү оруулах</button></a>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>div.ex1 {


            height: 400px;
            overflow: scroll;
        }</style>
    <div class="col-md-4 ex1"><!-- scroll-->
        <?php $sum=0;?>
       @foreach($check_ins as $check_in)
        <div class="col-md-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="#">
                            <div class="d-flex flex-row mb-3 pb-3 border-bottom">

                                <div class="pl-3 pr-2">
                                    <a href="#">
                                        <p class="font-weight-medium mb-0 ">Эмч {{$check_in->shift->doctor->name}}</p>
                                        <p class="text-muted mb-0 text-small"> {{$check_in->shift->date}} өдөр хийгдсэн эмчилгээ</p>
                                    </a>
                                </div>
                            </div>

                        </a>
                    </h5>
                    <table class="table table-sm table-borderless">
                        <?php
                        $treatments = \App\UserTreatments::all()->where('checkin_id',$check_in->id)
                        ?>
                        <?php $total = 0;
                        $sum = 0?>
                        <tbody>
                        @foreach($treatments as $treatment)
                        <tr>
                            <td>
                                <span class="log-indicator border-theme-2 align-middle"></span>
                            </td>
                            <td>
                                <span class="font-weight-medium">{{$treatment->treatment->name}}</span>
                            </td>
                            <td class="text-right">
                                <span class="text-muted">@if($treatment->treatment_selection_id == 0)
                                        {{$treatment->treatment->price}}₮
                                        <?php /** @var TYPE_NAME $total */
                                        $total = $total + $treatment->treatment->price?>
                                    @else
                                        {{\App\TreatmentSelections::find($treatment->treatment_selection_id)->price}}₮
                                        <?php /** @var TYPE_NAME $total */
                                        $total = $total + \App\TreatmentSelections::find($treatment->treatment_selection_id)->price?>
                                    @endif</span>
                            </td>
                        </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <span class="badge badge-pill badge-primary">Нийт зарцуулсан {{$total}}₮</span>
                        <?php $sum = $sum + $total ?>
                </div>
            </div>
        </div>
        <br>
        @endforeach

    </div>    <!-- scroll end-->
    <div class="col-lg-3">

        <br>
        <a href="#" class="card">
            <div class="card-body text-center">
                <i class="iconsmind-Money-2"></i>
                <p class="card-text mb-0">Нийт зарцуулсан</p>
                <p class="lead text-center">{{$sum}}₮</p>
            </div>
        </a>
        <br>
        <a href="#" class="card">
            <div class="card-body text-center">
                <i class="iconsmind-Hospital"></i>
                <p class="card-text mb-0">Нийт үйлчлүүлсэн тоо </p>
                <p class="lead text-center">{{$check_ins->count()}} удаа</p>
            </div>
        </a>
    </div>
</div>

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