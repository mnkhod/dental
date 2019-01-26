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
    <link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
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
            <i class="iconsmind-Administrator"></i> Ажилчид
        </a>
    </li>
    <li>
        <a href="{{url('/admin/time')}}">
            <i class="iconsmind-Alarm"></i> Цаг
        </a>
    </li>
    <li>
        <a href="{{url('/admin/product')}}">
            <i class="iconsmind-Medicine-2"></i> Материал
        </a>
    </li>
    <li class="active">
        <a href="{{url('/admin/transaction')}}">
            <i class="iconsmind-Space-Needle"></i> Санхүү
        </a>
    </li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card ">
                <div class="card-body">
                    <div class="text-center">
                        @if($user->photos->first() == '')
                            Зураггүй
                        @else
                            <img width="200px" style="border-radius: 100%" src="{{asset('/img/uploads/'.$user->photos->first()->path)}}">
                        @endif
                            <br>
                            <br>
                        <p class="list-item-heading mb-1"><h3>{{$user->name}} {{$user->last_name}}</h3></p>
                        <div class="text-center">
                            <p class="text-muted text-small mb-2">Утасны дугаар</p>
                            <p class="mb-3">
                                {{$user->phone_number}}
                            </p>
                            <p class="text-muted text-small mb-2">Цахим хаяг</p>
                            <p class="mb-3">
                                {{$user->email}}
                            </p>
                            <p class="text-muted text-small mb-2">Мэргэжил</p>
                            <p class="mb-3">
                                @if($user->role->role_id == 0)
                                Нягтлан
                                @elseif($user->role->role_id == 1)
                                    Ресепшн
                                @elseif($user->role->role_id == 2)
                                    Эмч
                                @elseif($user->role->role_id == 3)
                                    Сувилагч
                                    @else
                                Бусад
                                    @endif
                            </p>
                            <p class="text-muted text-small mb-2">Тайлбар</p>
                            <p class="mb-3">
                                {{$user->description}}
                            </p>
                            @if($user->role->state == 0)
                                Халагдсан
                            @else
                                <a href="{{url('/admin/add_staff/'.'fire/'.$user->id)}}"><button type="button" class="btn btn-sm btn-outline-primary ">Ажлаас гарсан</button></a>
                            {{--<button type="button" class="btn btn-sm btn-outline-primary "> Устгах</button>--}}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-8">


            <div class="row">
                <div class="col-md-6 col-lg-6 mb-4">
                    <div class="card dashboard-link-list">
                        <div class="card-body">
                            <h5 class="card-title">Хугацаа сонгох</h5>
                            <div class="d-flex flex-row">
                                <div class="form-group mb-3">

                                    <div class="input-daterange input-group" id="datepicker">
                                        <input type="text" class="input-sm form-control" name="start" placeholder="Эхлэх" />
                                        <span class="input-group-addon"></span>
                                        <input type="text" class="input-sm form-control" name="end" placeholder="Төгсөх" />
                                    </div>
                                </div>

                            </div>
                            <a href="#" class="card">
                                <div class="card-body text-center">
                                    <i class="iconsmind-Money-2"></i>
                                    <p class="card-text mb-0">Эдгээр саруудын орлого</p>
                                    <p class="lead text-center">16</p>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
                <div class="col-md-6">

                    <div class="icon-cards-row">

                        <div class="owl-container">
                            <div class="owl-carousel dashboard-numbers">
                                <a href="#" class="card">
                                    <div class="card-body text-center">
                                        <i class="simple-icon-user"></i>
                                        <p class="card-text mb-0">Хүлээгдэж буй хүмүүс</p>
                                        <p class="lead text-center">16</p>
                                    </div>
                                </a>

                                <a href="#" class="card">
                                    <div class="card-body text-center">
                                        <i class="iconsmind-Hospital"></i>
                                        <p class="card-text mb-0">Захиалгын тоо</p>
                                        <p class="lead text-center">32</p>
                                    </div>
                                </a>
                                <a href="#" class="card">
                                    <div class="card-body text-center">
                                        <i class="simple-icon-people"></i>
                                        <p class="card-text mb-0">Нийт үзэх хүмүүс</p>
                                        <p class="lead text-center">32</p>
                                    </div>
                                </a>



                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-12 mb-4">
                            <div class="card dashboard-small-chart">
                                <div class="card-body">
                                    <p class="lead color-theme-1 mb-1 value"></p>
                                    <p class="mb-0 label text-small"></p>
                                    <div class="chart">
                                        <canvas id="smallChart1"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <ul class="nav nav-tabs separator-tabs ml-0 mb-5" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="first-tab" data-toggle="tab" href="#first" role="tab"
                       aria-controls="first" aria-selected="true">DETAILS</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link " id="second-tab" data-toggle="tab" href="#second" role="tab"
                       aria-controls="second" aria-selected="false">ORDERS</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane show active" id="first" role="tabpanel" aria-labelledby="first-tab">
                    <div class="card mb-4">

                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">Эмчийн хуваарь</h5>
                                <div class="calendar"></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="second" role="tabpanel" aria-labelledby="second-tab">
                 </div>

        </div>

    </div><!-- row -->
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

@endsection