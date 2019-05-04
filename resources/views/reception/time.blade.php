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
    <script>
        document.getElementById('receptionTime').classList.add('active');
    </script>
    <div class="modal fade" id="exampleModalRight" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalRight" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Цаг захиалах<br><span id="nameShow">Алимаа</span> <span
                                id="timeShow"></span>:00</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form111" action="{{url('reception/time/add')}}" method="post">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Нэр:</label>
                            <div class="col-sm-8">
                                <input id="ner" name="name" autocomplete="off" type="text" class="form-control"
                                       placeholder=""
                                       @if(!empty($user)) value="{{$user->name}}" readonly @endif>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Утасны дугаар:</label>
                            <div class="col-sm-8">
                                <input id="utas" name="phone" autocomplete="off" type="text" class="form-control"
                                       placeholder=""
                                       @if(!empty($user))value="{{$user->phone_number}}" readonly @endif>
                            </div>
                        </div>
                        <input type="hidden" name="user_id" value="@if(!empty($user)) {{$user->id}} @else 0 @endif">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Хугацаа
                                (цагаар):</label>
                            <div class="col-sm-8">
                                <input id="hugatsaa" name="hours" autocomplete="off" type="number" class="form-control"
                                       placeholder="">
                            </div>
                        </div>


                        <input type="hidden" name="time" id="timeInput">
                        <input type="hidden" name="shift_id" id="shiftInput">

                    </div>
                    <div class="modal-footer">
                        <button onclick="validation(document.getElementById('shiftInput').value)" type="button"
                                class="btn btn-primary">ЦАГ ЗАХИАЛАХ
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- DELETE Modal -->
    <div class="modal fade" id="deleteAppointment" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id = "form11" action="{{url('/reception/time/cancel')}}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Захиалгын мэдээллэл <br>

                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            {{--sdfdsafsa--}}
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5><span id="da_doctor_name"></span></h5>
                        <span id="da_date"></span>, <span id="da_time"></span>

                        <br>
                        <br>

                        <div class="row">
                            <div class="col-md-5" style="color: grey">Үйлчлүүлэгч:</div>
                            <div class="col-md-7"><a id="da_user_link"><span id="da_user_name"></span></a></div>
                        </div>
                        <div class="row">
                            <div class="col-md-5" style="color: grey">Холбогдох утас:</div>
                            <div class="col-md-7"><span id="da_user_phone"></span></div>
                        </div>
                        <input type="hidden" name="appointment_id" id="da_id">
                        <br>

                    </div>
                    <div class="modal-footer">
                        <div class="col-md-8 input-group">
                            <input id="ps" name="code" autocomplete="off" type="password" class="form-control input-sm"
                                   placeholder="Нууц үг">
                            <input id="ds" name="description" autocomplete="off" type="text"
                                   class="form-control input-sm"
                                   placeholder="Тайлбар">
                            <button class="btn btn-light" type="submit" style="border-radius: 0px">
                                Цуцлах
                            </button>
                        </div>
                        <a id="variableLink">
                            <button onclick="gh()" type="button" id="variableButton" class="btn btn-primary"
                                    style="border-radius: 0px">Эмчилгээнд
                                оруулах
                            </button>
                        </a>

                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="row">
        {{--<div class="col-md-12">--}}
        <div class="card">
            <div class="card-body">
                @if(!empty($user))<h4>{{$user->name}} </h4>{{$user->register}}@endif
                <div class="row mb-4">
                    <div class="col-md-3">
                        <select class="form-control" onchange="location = this.value;">
                            <option>Өдрөөр</option>
                            <option value="@if(\App\Role::where('role_id', 2)->first() != null)
                            @if(!empty($user))
                            {{url('reception/time/week/'. \App\Role::where('role_id', 2)->first()->id .'/'. $user->id)}}
                            @else
                            {{url('reception/time/week/'. \App\Role::where('role_id', 2)->first()->id)}}
                            @endif
                            @endif">
                                7 хоногоор
                            </option>

                        </select>
                    </div>
                    <div class="col-md-5">
                        {{--<form id="form11" method="post" action="{{url('/admin/transaction/date')}}">--}}
                            {{--@csrf--}}
                            {{--<div class="input-group">--}}
                                {{--<input id="date" name="start_date" autocomplete="off" class="form-control datepicker"--}}
                                       {{--placeholder="mm/dd/YYYY" value="">--}}
                                {{--<button class="btn btn-primary" style="border-radius: 0px">ҮЗЭХ</button>--}}

                            {{--</div>--}}
                        {{--</form>--}}
                    </div>
                </div>


                <table class="table table-responsive text-center table-bordered">
                    <tr>
                        <th></th>
                        <?php $s = 0?>
                        @foreach($shifts as $shift)
                            <th><img style="border-radius: 100%" src="{{asset('img/profile5.jpg')}}"
                                     width="25px"> {{$shift->doctor->name}}</th>
                            <?php $s++?>
                        @endforeach
                    </tr>
                    @for($i = 0; $i<6; $i++)
                        <tr>
                            <td height="90px">{{9+$i}}:00</td>
                            @foreach($shifts as $shift)
                                @if($shift->shift_id == 0 || $shift->shift_id ==2)
                                    @if($appointment = $shift->appointments->where('start', 9+$i)->first())
                                        <td height="90px" rowspan="{{$appointment->end - $appointment->start}}">
                                            <button class="btn  @if(\App\CheckIn::where('shift_id', $shift->id)->where('user_id', $appointment->user_id)->first())
                                                    btn-success
                                                    @else
                                                    btn-primary
                                                    @endif
                                                    btn-block text-left"
                                                    onclick="deleteAppointment('{{$appointment->name}}', '{{$appointment->phone}}', '{{$appointment->shift->date}}',
                                                            '{{$appointment->start}}:00 - {{$appointment->end}}:00', '{{$appointment->id}}', '{{$shift->doctor->name}}'
                                                            , @if(\App\CheckIn::where('shift_id', $shift->id)->where('user_id', $appointment->user_id)->first()) 'a'
                                                    @elseif($customer = \App\User::find($appointment->user_id))
                                                            '{{$customer->id}}' @else '0' @endif )"
                                                    style="border-radius: 20px; height: 100%;">
                                                {{$appointment->name}}<br><span>{{$appointment->phone}}</span></button>
                                        </td>
                                    @elseif($appointment = $shift->appointments->where('start','<', 9+$i)->where('end', '>', 9+$i)->first())
                                    @else
                                        <td height="90px" rowspan="1">
                                            <button onclick="bookTime('{{9+$i}}', '{{$shift->id}}', '{{$shift->doctor->name}}')"
                                                    class="btn btn-primary btn-block text-left hidden"
                                                    style="border-radius: 20px; height: 100%;">Захиалга
                                                нэмэх<br><span>бол дарна уу</span></button>
                                        </td>
                                    @endif
                                @else
                                    <td height="90px" style="background-color: #bcbcbc"></td>
                                @endif
                            @endforeach
                        </tr>
                    @endfor
                    @for($i = 6; $i<12; $i++)
                        <tr>
                            <td height="90px">{{9+$i}}:00</td>
                            @foreach($shifts as $shift)
                                @if($shift->shift_id == 1 || $shift->shift_id ==2)
                                    @if($appointment = $shift->appointments->where('start', 9+$i)->first())
                                        <td height="90px" rowspan="{{$appointment->end - $appointment->start}}">
                                            <button class="btn  @if(\App\CheckIn::where('shift_id', $shift->id)->where('user_id', $appointment->user_id)->first())
                                                    btn-success
                                                    @else
                                                    btn-primary
                                                    @endif
                                                    btn-block text-left"
                                                    onclick="deleteAppointment('{{$appointment->name}}', '{{$appointment->phone}}', '{{$appointment->shift->date}}',
                                                            '{{$appointment->start}}:00 - {{$appointment->end}}:00', '{{$appointment->id}}', '{{$shift->doctor->name}}'
                                                            , @if(\App\CheckIn::where('shift_id', $shift->id)->where('user_id', $appointment->user_id)->first()) 'a'
                                                    @elseif($customer = \App\User::find($appointment->user_id))
                                                            '{{$customer->id}}' @else '0' @endif )"
                                                    style="border-radius: 20px; height: 100%;">
                                                {{$appointment->name}}<br><span>{{$appointment->phone}}</span></button>
                                        </td>
                                    @elseif($appointment = $shift->appointments->where('start','<', 9+$i)->where('end', '>', 9+$i)->first())
                                    @else
                                        <td height="90px" rowspan="1">
                                            <button onclick="bookTime('{{9+$i}}', '{{$shift->id}}', '{{$shift->doctor->name}}')"
                                                    class="btn btn-primary btn-block text-left hidden"
                                                    style="border-radius: 20px; height: 100%;">Захиалга
                                                нэмэх<br><span>бол дарна уу</span></button>
                                        </td>
                                    @endif
                                @else
                                    <td height="90px" style="background-color: #bcbcbc"></td>
                                @endif
                            @endforeach
                        </tr>
                    @endfor

                </table>
            </div>
            {{--</div>--}}
        </div>

    </div>
@endsection
@section('footer')
    <script>
        var mTime;
        var mShift;

        function bookTime(time, shift_id, doctor_name) {
            mTime = time;
            mShift = shift_id;
            document.getElementById("timeShow").innerHTML = time;
            document.getElementById("timeInput").value = time;
            document.getElementById("nameShow").innerHTML = doctor_name;
            document.getElementById('shiftInput').value = shift_id;
            $("#exampleModalRight").modal();
        }

        function deleteAppointment(name, phone, date, time, appointment_id, doctor_name, registered) {
            document.getElementById("da_user_name").innerHTML = name;
            document.getElementById("da_user_phone").innerHTML = phone;
            document.getElementById("da_date").innerHTML = date;
            document.getElementById("da_time").innerHTML = time;
            document.getElementById("da_id").value = appointment_id;
            document.getElementById("da_doctor_name").innerHTML = doctor_name;
            // registered = parseInt(registered);
            if (registered === 'a') {
                document.getElementById("variableButton").innerText = "Эмчилгээнд орсон";
                document.getElementById("variableButton").classList.add('disabled');
            } else if (registered === '0') {
                document.getElementById("variableButton").innerText = "Бүртгэх&Оруулах";
                document.getElementById("variableLink").setAttribute('href', "{{url('/reception/user/register')}}" + "/" + name + "/" + phone + "/" + appointment_id);
            } else {
                document.getElementById("variableButton").innerText = "Эмчилгээнд оруулах";
                document.getElementById("variableLink").setAttribute('href', "{{url('/reception/user_check')}}" + "/" + registered + "/" + appointment_id + "/check_in");
            }
            document.getElementById("da_user_link").setAttribute('href', "https://www.google.com" + "/" + "1");
            $("#deleteAppointment").modal();
        }


        function validation(shift_id) {

            // Backend bolon Frontend hosluultiin gaikhamshig
                    @foreach($shifts as $shift)
                        var shift{{$shift->id}} = @if($shift->shift_id == 0) [1, 2, 3, 4, 5, 6, 7, 8, 15, 16, 17, 18, 19, 20, 21, 22, 23] @elseif($shift->shift_id == 0) [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 21, 22, 23] @else [1, 2, 3, 4, 5, 6, 7, 8, 21, 22, 23] @endif ;
                        @foreach ($shift->appointments as $appointment)
                            @for ($i = $appointment->start; $i< $appointment->end; $i++)
                                shift{{$shift->id}}.push({{$i}});
                            @endfor
                        @endforeach
                        console.log(shift{{$shift->id}});
                    @endforeach
                    var shiftName = "shift" + shift_id;
                    var check = [];
                    var q = [];
                    var d = document.getElementById("ner").value;
                    var ut = document.getElementById("utas").value;
                    var tsag = document.getElementById("hugatsaa").value;
                    for (i = 0; i <= tsag-1; i++) {
                        var int = parseInt(mTime);
                        check.push(int + i);
                        q.push(eval(shiftName).includes(check[i]));
                    }
                    console.log(q);
                    if (d === "") {
                        document.getElementById('ner').classList.add('border-danger');
                    } else if (tsag >= 1 && tsag !== "" && q.includes(true) === true) {
                        document.getElementById('hugatsaa').classList.add('border-danger');
                    } else if (ut.length !== 8) {
                        document.getElementById('utas').classList.add('border-danger');
                    } else {
                        document.getElementById("form111").submit();
                    }

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
    <script>
        function gh() {
            var pass = document.getElementById("ps").value;
            var des = document.getElementById("ds").value;
            if(pass === ""){
                document.getElementById('ps').classList.add('border-danger');
            }
            else if(des === "") {
                document.getElementById('ds').classList.add('border-danger');
                document.getElementById('ps').classList.remove('border-danger');
            }
            else {
                document.getElementById("form11").submit();
            }
        }
    </script>
    {{--Scriptuudiig include hiiideg heseg--}}
@endsection