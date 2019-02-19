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
            <div class="card mb-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <h2>Цэлмэг</h2>
                            18 настай
                        </div>
                        <div class="col-md-7">
                            <b>Анхаарах зүйлс:</b> эгвэл таны эргэлзээг тайлах судалгааг эрдэмтэд хийж, судалгааны үр дүнгээ мэргэжлийн сэтгүүлд нийтэлжээ. Тодруулбал, эрдэмтэд өглөөний цай уух
                        </div>
                        <div class="col-md-2 text-center text-secondary">
                            <a href="#">
                                <b class="text-primary">
                                    <i class="simple-icon-book-open" style="font-size: 30px"></i><br>Эмчилгээний түүх
                                </b>

                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body mb-2">
                    <div class="table-responsive">
                        <table class="table text-center">
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
                                        <img  id='{{$i}}' src="{{url('img/toothImages/'.$i.'.png')}}"
                                              onclick="changeStyle({{$i}})">
                                    </td>
                                @endfor
                            </tr>
                            <tr>
                                @for($i = 32; $i>16; $i--)
                                    <td>
                                        <img  id='{{$i}}' src="{{url('img/toothImages/'.$i.'.png')}}"
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

        </div>
        <div class="col-md-3">

            <div class="card">
                <ul class="nav nav-tabs nav-justified ml-0 mb-2" role="tablist">

                    <li class="nav-item">
                        <a class="nav-link active" id="first-tab" data-toggle="tab" href="#first" role="tab" aria-controls="first" aria-selected="true">Эмчилгээ</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " id="second-tab" data-toggle="tab" href="#second" role="tab" aria-controls="second" aria-selected="false">Түүх</a>
                    </li>

                </ul>
                <div class="tab-content">
                    <div class="tab-pane show active" id="first" role="tabpanel" aria-labelledby="first-tab">
                        <div class="card-body">
                            <button class="btn btn-secondary btn-block single">
                                <div class="row">
                                    {{--<div class="col-md-3 text-center">--}}
                                    {{--<img src="{{url('img/toothImages/svg/teeth.svg')}}" width="30px">--}}
                                    {{--</div>--}}
                                    <div class="col-md-12 text-left">
                                        Ломбо<br> 3 төрөлтэй
                                    </div>
                                </div>
                            </button>

                            <button class="btn btn-secondary btn-block multiple">
                                <div class="row">
                                    {{--<div class="col-md-3 text-center">--}}
                                    {{--<img src="{{url('img/toothImages/svg/device.svg')}}" width="30px">--}}
                                    {{--</div>--}}
                                    <div class="col-md-9 text-left">
                                        Аппарат<br> 3 төрөлтэй
                                    </div>
                                </div>
                            </button>
                            <button class="btn btn-secondary btn-block all">
                                <div class="row">
                                    {{--<div class="col-md-3 text-center">--}}
                                    {{--<img src="{{url('img/toothImages/svg/teeth.svg')}}" width="30px">--}}
                                    {{--</div>--}}
                                    <div class="col-md-12 text-left">
                                        Өнгөлгөө<br> 40000₮
                                    </div>
                                </div>
                            </button>
                            <button class="btn btn-secondary btn-block all">
                                <div class="row">
                                    {{--<div class="col-md-3 text-center">--}}
                                    {{--<img src="{{url('img/toothImages/svg/teeth.svg')}}" width="30px">--}}
                                    {{--</div>--}}
                                    <div class="col-md-12 text-left">
                                        Чулуу цэвэрлэгээ<br> 40000₮
                                    </div>
                                </div>
                            </button>
                            <button class="btn btn-secondary btn-block all">
                                <div class="row">
                                    {{--<div class="col-md-3 text-center">--}}
                                    {{--<img src="{{url('img/toothImages/svg/teeth.svg')}}" width="30px">--}}
                                    {{--</div>--}}
                                    <div class="col-md-12 text-left">
                                        Фторт түрхлэг<br> 40000₮
                                    </div>
                                </div>
                            </button>
                            <button class="btn btn-secondary btn-block single">
                                <div class="row">
                                    {{--<div class="col-md-3 text-center">--}}
                                    {{--<img src="{{url('img/toothImages/svg/teeth.svg')}}" width="30px">--}}
                                    {{--</div>--}}
                                    <div class="col-md-12 text-left">
                                        Хамгаалалт<br> 40000₮
                                    </div>
                                </div>
                            </button>

                        </div>
                    </div>
                    <div class="tab-pane" id="second" role="tabpane2" aria-labelledby="second-tab">

                    </div>
                </div>

            </div>
        </div>
    </div>
    <script>
        var tooths = [];
        var toothClassList = ["single","all","multiple"]

        var single = document.getElementsByClassName(toothClassList[0]);
        var all = document.getElementsByClassName(toothClassList[1]);
        var mult = document.getElementsByClassName(toothClassList[2]);

        for (i=0;i<all.length;i++){
            all[i].style.display = "block";
        }
        for(i=0;i<single.length;i++){
            single[i].style.display = "none";
        }
        for(i=0;i<mult.length;i++){
            mult[i].style.display = "none";
        }

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
                for (var count = 0; count < tooths.length; count++) {
                    if (tooths[count] === i) {
                        document.getElementById(i).classList.remove("tooth");
                    }
                }
            }
            //ENDING
            //change style gesen function dotor bichsen baigaa bolno
            // START
                if (tooths.length === 0){
                    for (i=0;i<all.length;i++){
                        all[i].style.display = "block";
                    }
                    for(i=0;i<single.length;i++){
                        single[i].style.display = "none";
                    }
                    for(i=0;i<mult.length;i++){
                        mult[i].style.display = "none";
                    }
                    for (var i = 1; i <= 32; i++) {
                                document.getElementById(i).classList.remove("tooth");
                    }
                } else if(tooths.length === 1){
                    for (i=0;i<all.length;i++){
                        all[i].style.display = "none";
                    }
                    for(i=0;i<single.length;i++){
                        single[i].style.display = "block";
                    }
                    for(i=0;i<mult.length;i++){
                        mult[i].style.display = "none";
                    }
                } else {
                    for (i=0;i<all.length;i++){
                        all[i].style.display = "single";
                    }
                    for(i=0;i<single.length;i++){
                        single[i].style.display = "none";
                    }
                    for(i=0;i<mult.length;i++){
                        mult[i].style.display = "block";
                    }
                }

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