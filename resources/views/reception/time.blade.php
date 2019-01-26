@extends('layouts.app')
@section('header')
    <link rel="stylesheet" href="{{asset('css/vendor/fullcalendar.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/vendor/dataTables.bootstrap4.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/vendor/datatables.responsive.bootstrap4.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/vendor/select2.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/vendor/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/vendor/bootstrap-stars.css')}}" />
    <link rel="stylesheet" href="{{asset('css/vendor/nouislider.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/vendor/bootstrap-datepicker3.min.css')}}" />

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
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-responsive text-center">
                        <tr>
                            <th></th>
                            <?php $s = 0?>
                        @foreach($shifts as $shift)
                                <th><img style="border-radius: 100%" src="{{asset('img/profile5.jpg')}}" width="25px"> {{$shift->doctor->name}}</th>
                            <?php $s++?>
                        @endforeach
                        </tr>
                        @for($i = 0; $i<12; $i++)
                            <tr>
                                <td height="90px">{{9+$i}}:00</td>
                                {{--@for($f=0; $f<3; $f++)--}}
                                   @if($shifts[0]->shift_id == 0)
                                        <td height="90px" style="background-color: #bcbcbc"></td>
                                    @endif
                                {{--@endfor--}}



                            </tr>
                        @endfor
                        <tr>
                            <td height="90px">09:00</td>
                            <td height="90px" rowspan="2" ><button class="btn btn-primary btn-block text-left" style="border-radius: 20px; height: 100%;">Агваажавзандулам<br><span>95520073</span></button></td>
                            <td height="90px" rowspan="1"><button class="btn btn-primary btn-block text-left" style="border-radius: 20px; height: 100%;">Агваажавзандулам<br><span>95520073</span></button></td>
                            <td height="90px" style="background-color: #bcbcbc"></td>

                        </tr>
                        <tr>
                            <td height="90px">10:00</td>
                            <td height="90px" rowspan="1"><button class="btn btn-primary btn-block text-left hidden" style="border-radius: 20px; height: 100%;">Захиалга нэмэх<br><span>бол дарна уу</span></button></td>
                            <td height="90px" style="background-color: #bcbcbc"></td>
                        </tr>
                        <tr>
                            <td height="90px">11:00</td>
                            <td height="90px" rowspan="1"><button class="btn btn-primary btn-block text-left" style="border-radius: 20px; height: 100%;">Агваажавзандулам<br><span>95520073</span></button></td>
                            <td height="90px" rowspan="1"><button class="btn btn-primary btn-block text-left hidden" style="border-radius: 20px; height: 100%;">Захиалга нэмэх<br><span>бол дарна уу</span></button></td>
                            <td height="90px" style="background-color: #bcbcbc"></td>

                        </tr>
                        <tr>
                            <td height="90px">12:00</td>
                            <td height="90px" rowspan="1"><button class="btn btn-primary btn-block text-left hidden" style="border-radius: 20px; height: 100%;">Захиалга нэмэх<br><span>бол дарна уу</span></button></td>
                            <td height="90px" rowspan="2" ><button class="btn btn-primary btn-block text-left" style="border-radius: 20px; height: 100%;">Агваажавзандулам<br><span>95520073</span></button></td>
                            <td height="90px" style="background-color: #bcbcbc"></td>
                        </tr>
                        <tr>
                            <td height="90px">13:00</td>
                            <td height="90px" rowspan="1"><button class="btn btn-primary btn-block text-left hidden" style="border-radius: 20px; height: 100%;">Захиалга нэмэх<br><span>бол дарна уу</span></button></td>
                            <td height="90px" style="background-color: #bcbcbc"></td>
                        </tr>
                        <tr>
                            <td height="90px">14:00</td>
                            <td height="90px" rowspan="1"><button class="btn btn-primary btn-block text-left hidden" style="border-radius: 20px; height: 100%;">Захиалга нэмэх<br><span>бол дарна уу</span></button></td>
                            <td height="90px" rowspan="1"><button class="btn btn-primary btn-block text-left hidden" style="border-radius: 20px; height: 100%;">Захиалга нэмэх<br><span>бол дарна уу</span></button></td>
                            <td height="90px" style="background-color: #bcbcbc"></td>
                        </tr>
                        <tr>
                            <td height="90px">15:00</td>
                        </tr>
                        <tr>
                            <td height="90px">16:00</td>
                        </tr>
                        <tr>
                            <td height="90px">17:00</td>
                        </tr>
                        <tr>
                            <td height="90px">18:00</td>
                        </tr>
                        <tr>
                            <td height="90px">19:00</td>
                        </tr>
                        <tr>
                            <td height="90px">20:00</td>
                        </tr>


                    </table>
                </div>
            </div>
        </div>

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