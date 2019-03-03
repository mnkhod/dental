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

        polygon {
            margin: auto;
            display: block;
            stroke-width: 1;
            stroke: black;
            fill: transparent;
        }
        circle {
            stroke-width: 1;
            stroke: black;
            fill: white;
        }
        /*

                circle:hover {
                    fill : aqua;
                }
        */
        .lombo {
            fill : #138496;
            animation-duration: 0.3s;
        }
        .empty {
            fill : white;
            animation-duration: 0.3s;
        }
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #138496;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
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
    <div class="modal fade text-center" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <br>
                    <br>
                    <h3><b><div id="buriLombo">Шүд #</div></b></h3>
                    <!--                                            content modal-->
                    <input type="hidden" id="hiddenDecayChart" value="">
                    <svg height="200" width="200" >
                        <polygon id="pol1" points="0,0 100,100 200,0" onclick="myFunction('1')" />
                        <polygon id="pol2" points="100,100 200,0 200,200" onclick="myFunction('2')"/>
                        <polygon id="pol4" points="0,200 100,100 200,200" onclick="myFunction('4')"/>
                        <polygon id="pol8" points="0,0 100,100 0,200" onclick="myFunction('8')"/>
                        <circle  id="pol16" cx="100" cy="100" r="50" onclick="myFunction('16')"/>
                    </svg>
                    <div>
                        <br>
                        <h5 style="color: darkgrey"><b>Цоорлын зэрэг</b></h5>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-info active">
                                <input type="radio" name="decayLevel" id="option1"> 1
                            </label>
                            <label class="btn btn-info">
                                <input type="radio" name="decayLevel" id="option2"> 2
                            </label>
                            <label class="btn btn-info">
                                <input type="radio" name="decayLevel" id="option3"> 3
                            </label>
                            <label class="btn btn-info">
                                <input type="radio" name="decayLevel" id="option4"> 4
                            </label>
                        </div>
                    </div>
                    <br>
                    <h5 style="color: darkgrey"><b>Сүүн шүд</b></h5>
                    <label class="switch">
                        <input type="checkbox" id="suunShudToggle">
                        <span class="slider round"></span>
                    </label>
                    <br>
                    <br>
                    <button class="btn btn-info btn-ls">ОРУУЛАХ</button>
                    <!--                                            content modal-->
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-9">
            <div class="card mb-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <h2>{{$user->name}}</h2>
                            {{$age}} настай
                        </div>
                        <div class="col-md-7">
                            <b>Анхаарах зүйлс:</b> {{$user->description}}
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
                            <button class="btn btn-primary btn-block single" data-toggle="modal" data-target="#exampleModal">
                                <div class="row">
                                    <div class="col-md-12 text-left" onclick="reset()">
                                        Ломбо<br> 3 төрөлтэй
                                    </div>
                                </div>
                            </button>

                            <button class="btn btn-primary btn-block multiple">
                                <div class="row">
                                    <div class="col-md-9 text-left">
                                        Аппарат<br> 3 төрөлтэй
                                    </div>
                                </div>
                            </button>
                            <button class="btn btn-primary btn-block all">
                                <div class="row">
                                    <div class="col-md-12 text-left">
                                        Өнгөлгөө<br> 40000₮
                                    </div>
                                </div>
                            </button>
                            <button class="btn btn-primary btn-block all">
                                <div class="row">
                                    <div class="col-md-12 text-left">
                                        Чулуу цэвэрлэгээ<br> 40000₮
                                    </div>
                                </div>
                            </button>
                            <button class="btn btn-primary btn-block all">
                                <div class="row">
                                    <div class="col-md-12 text-left">
                                        Фторт түрхлэг<br> 40000₮
                                    </div>
                                </div>
                            </button>
                            <button class="btn btn-primary btn-block single">
                                <div class="row">
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
        var selectedArea = [];
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
        function reset() {

            document.getElementById('option1').click();

            for(i=0;i<selectedArea.length;i++){
                document.getElementById("pol" + selectedArea[i]).setAttribute('class','empty');
            }
            // document.getElementById('suunShudToggle').setAttribute('class','')
            var x = document.getElementById('suunShudToggle');
            x.checked = false;


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
            document.getElementById('buriLombo').innerText = "Шүд #" + tooths[0];
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


        //LOMBO STARTING


        function sumList(array){
            var sum = 0
            for(i=0;i<array.length;i++){
                var parse = parseInt(array[i]);
                sum += parse;
            }
            return sum
        }
        function myFunction(ruby){
//            Validation start
            if(selectedArea.length === 0) {
                selectedArea.push(ruby);
            } else {
                var check = true;
                for (var count = 0; count < selectedArea.length;
                     count++) {
                    if (selectedArea[count] === ruby) {
                        check = false;
                    }
                }
                if (check) {
                    selectedArea.push(ruby);
                } else {
                    selectedArea.splice(selectedArea.indexOf(ruby), 1);
                }
            }

//            ----Validation End------
//              Change Color on click
            if (selectedArea.includes(ruby) === true) {

                document.getElementById("pol"+ruby).setAttribute('class','lombo');
            } else if (selectedArea.includes(ruby) === false) {

                document.getElementById("pol"+ruby).setAttribute('class','empty');
            }
//            sumList
            var total = sumList(selectedArea);

//            hidden value
            var x = document.getElementById('hiddenDecayChart').value=total;
            console.log(ruby);
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