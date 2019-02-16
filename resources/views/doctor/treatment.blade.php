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
        .tooth {
            opacity: 0.5;
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
            <i class="iconsmind-Administrator"></i> Оношлогоо
        </a>
    </li>
    <li class="active">
        <a href="{{url('/admin/time')}}">
            <i class="iconsmind-Alarm"></i> Эмчилгээ
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
        <div class="col-md-9">
            <div class="card">
                <div class="card-body mb-2">
                    <table class="table table-borderless table-responsive text-center" style="width: 100%">
                        <tr>
                            @for($i = 1; $i<=16; $i++)
                                <td style="color: grey">
                                    {{$i}}
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            @for($i = 1; $i<=16; $i++)
                                <td>
                                    <img id='{{$i}}' src="{{url('img/toothImages/'.$i.'.png')}}"
                                         onclick="changeStyle({{$i}})">
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            @for($i = 17; $i<=32; $i++)
                                <td>
                                    <img id='{{$i}}' src="{{url('img/toothImages/'.$i.'.png')}}"
                                         onclick="changeStyle({{$i}})">
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            @for($i = 32; $i>=17; $i=$i-1)
                                <td style="color: grey">
                                    {{$i}}
                                </td>
                            @endfor
                        </tr>
                    </table>
                </div>
            </div>

        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <button class="btn btn-secondary btn-block">
                        <div class="row">
                            <div class="col-md-4 text-center">
                                <img src="{{url('img/toothImages/svg/teeth.svg')}}" width="40px">
                            </div>
                            <div class="col-md-8 text-left">
                                Ломбо<br> 3 төрөлтэй
                            </div>
                        </div>
                    </button>

                    <button class="btn btn-secondary btn-block">
                        <div class="row">
                            <div class="col-md-4 text-center">
                                <img src="{{url('img/toothImages/svg/device.svg')}}" width="40px">
                            </div>
                            <div class="col-md-8 text-left">
                                Аппарат<br> 3 төрөлтэй
                            </div>
                        </div>
                    </button>
                    <button class="btn btn-secondary btn-block">
                        <div class="row">
                            <div class="col-md-4 text-center">
                                <img src="{{url('img/toothImages/svg/teeth.svg')}}" width="40px">
                            </div>
                            <div class="col-md-8 text-left">
                                Ломбо<br> 40000₮
                            </div>
                        </div>
                    </button>
                    <button class="btn btn-secondary btn-block">
                        <div class="row">
                            <div class="col-md-4 text-center">
                                <img src="{{url('img/toothImages/svg/teeth.svg')}}" width="40px">
                            </div>
                            <div class="col-md-8 text-left">
                                Ломбо<br> 40000₮
                            </div>
                        </div>
                    </button>
                    <button class="btn btn-secondary btn-block">
                        <div class="row">
                            <div class="col-md-4 text-center">
                                <img src="{{url('img/toothImages/svg/teeth.svg')}}" width="40px">
                            </div>
                            <div class="col-md-8 text-left">
                                Ломбо<br> 40000₮
                            </div>
                        </div>
                    </button>
                    <button class="btn btn-secondary btn-block">
                        <div class="row">
                            <div class="col-md-4 text-center">
                                <img src="{{url('img/toothImages/svg/teeth.svg')}}" width="40px">
                            </div>
                            <div class="col-md-8 text-left">
                                Ломбо<br> 40000₮
                            </div>
                        </div>
                    </button>

                </div>
            </div>
        </div>
    </div>
    <script>
        var tooths = [];
        function changeStyle(ruby) {
            //----VALIDATION-----
            if(tooths.length === 0) {
                tooths.push(ruby);
            } else {
                var check = true;
                for (var count = 0; count<tooths.length; count++) {
                    if (tooths[count] === ruby) {
                        check = false;
                    }
                }
                if (check) {
                    tooths.push(ruby);
                } else {
                    tooths.splice(tooths.indexOf(ruby), 1);
                }
            }
            //----VALIDATION END-----

            //PAINT table using @tooths array
            console.log(tooths);
            for (var i = 1; i <= 32; i++) {
                document.getElementById(i).setAttribute("class", "tooth");
            }
            for (var i = 1; i <= 32; i++) {
                for (var count = 0; count<tooths.length; count++) {
                    if (tooths[count] === i) {
                        document.getElementById(i).classList.remove("tooth");
                    }
                }
            }
            //ENDING
        }
    </script>
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