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
        <a href="{{url('/admin/material')}}">
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

    <div class="row"><!-- row-->

        <div class="col-md-3">
            <ul class="nav nav-tabs separator-tabs ml-0 mb-5" role="tablist">

                <li class="nav-item">
                    <a class="nav-link active" id="first-tab" data-toggle="tab" href="#first" role="tab"
                       aria-controls="first" aria-selected="true">ЗАРЛАГА</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link " id="second-tab" data-toggle="tab" href="#second" role="tab"
                       aria-controls="second" aria-selected="false">ЦАЛИН</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " id="third-tab" data-toggle="tab" href="#third" role="tab"
                       aria-controls="third" aria-selected="false">ОРЛОГО</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane show active" id="first" role="tabpanel" aria-labelledby="first-tab">
                    <div class="card mb-4">
                        <div class="card-body">
                            <form method="post" action="{{url('/admin/transaction/add')}}">
                                @csrf
                                <input name="price" class="form-control mb-3" type="number" placeholder="Үнийн дүн">
                                <input name="description" class="form-control mb-3" type="text" placeholder="Тайлбар">
                                <button class="btn btn-primary btn-block" type="submit">ЗАРЛАГА ОРУУЛАХ</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="second" role="tabpane2" aria-labelledby="second-tab">
                    <div class="card mb-4">
                        <div class="card-body">
                            <form method="post" action="{{url('admin/transaction/salary')}}">
                                @csrf
                                <select class="form-control mb-3" name="staff">
                                    @foreach($roles as $role)
                                        <option value="{{$role->staff->id}}">{{$role->staff->name}}/@if($role->id == 0)Менежер@elseif($role->id == 1)Pесепшн@elseif($role->id == 2)Доктор@elseif($role->id == 3)Сувилагч@else Бусад@endif/</option>
                                    @endforeach
                                </select>
                                <input class="form-control mb-3" name="price" type="number" placeholder="Үнийн дүн">
                                <button class="btn btn-primary btn-block" type="submit">ОРУУЛАХ</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="third" role="tabpane3" aria-labelledby="third-tab">
                    <div class="card mb-4">
                        <div class="card-body">
                            <input class="form-control mb-3" type="number" placeholder="Үнийн дүн">
                            <input class="form-control mb-3" type="text" placeholder="Тайлбар">
                            <button class="btn btn-primary btn-block">ОРЛОГО ОРУУЛАХ</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Зарлагын бүтэц</h5>

                    <div class="ct-chart ct-golden-section" id="chart1"></div>
                    <b style="color: #f4c63d">o</b> - Цалин<br>
                    <b style="color: #d70206">o</b> - Материал<br>
                    <b style="color: #f05b4f">o</b> - Бусад
                    <script>
                        var data = {
                            series: [5, 3, 4]
                        };

                        var sum = function (a, b) {
                            return a + b
                        };

                        new Chartist.Pie('.ct-chart', data, {
                            labelInterpolationFnc: function (value) {
                                return Math.round(value / data.series.reduce(sum) * 100) + '%';
                            }
                        });
                    </script>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <input name="birth_date" autocomplete="off" class="form-control datepicker "
                                               placeholder="Эхлэл">
                                        <input name="birth_date" autocomplete="off" class="form-control datepicker "
                                               placeholder="Төгсгөл">
                                        <button class="btn btn-primary" style="border-radius: 0px">ҮЗЭХ</button>
                                    </div>
                                </div>
                                <div class="col-md-4 text-right">
                                    <button class="btn btn-success"><i class="iconsmind-File-Excel"></i> Excel татах
                                    </button>
                                </div>
                            </div>
                            <br>

                            <table class="data-table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Үнийн дүн</th>
                                    <th>Төрөл</th>
                                    <th>Тайлбар</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1?>
                                @foreach($transactions as $transaction)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$transaction->price}}</td>
                                    <td>@if($transaction->type == 1)Цалин@elseif($transaction->type == 2)Материал@else Бусад@endif</td>
                                    <td>{{$transaction->description}}</td>
                                    <?php $i++;?>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- row end-->
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
