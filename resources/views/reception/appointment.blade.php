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
    <div class="row mb-4">
        <div class="col-md-6">
            <form>
                <select class="form-control">
                    @foreach($doctors as $doctor)
                    <option>{{$doctor->staff->name}}</option>
                    @endforeach
                </select>
            </form>
        </div>
            <table class="table table-responsive text-center table-bordered">
                <tr>
                        <th></th>
                    <th>{{date('Y-m-d')}}</th>
                    <th>{{date('Y-m-d', strtotime("+1 Days"))}}</th>
                    <th>{{date('Y-m-d', strtotime("+2 Days"))}}</th>
                    <th>{{date('Y-m-d', strtotime("+3 Days"))}}</th>
                    <th>{{date('Y-m-d', strtotime("+4 Days"))}}</th>
                    <th>{{date('Y-m-d', strtotime("+5 Days"))}}</th>
                    <th>{{date('Y-m-d', strtotime("+6 Days"))}}</th>
                </tr>
                @for($i=0; $i<12; $i++)
                <tr>
                    <td height="90px">{{$i+9}}:00</td>
                    <td height="90px" rowspan="{{$shift->appointments->first()->end - $shift->appointments->first()->start}}">
                    {{--<td height="90px" rowspan="{{$shift1->end - $shift->start}}">--}}
                    {{--<td height="90px" rowspan="{{$shift2->end - $shift->start}}">--}}
                    {{--<td height="90px" rowspan="{{$shift3->end - $shift->start}}">--}}
                    {{--<td height="90px" rowspan="{{$shift4->end - $shift->start}}">--}}
                    {{--<td height="90px" rowspan="{{$shift5->end - $shift->start}}">--}}
                    {{--<td height="90px" rowspan="{{$shift6->end - $shift->start}}">--}}
                        <button class="btn btn-primary btn-block text-left"
                                style="border-radius: 20px; height: 100%;">
                            {{--{{$shift->name}}<br><span>{{$shift->phone}}</span></button>--}}
                    </td>
                    @endfor

                </tr>

            </table>
        </div>
        {{--</div>--}}


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