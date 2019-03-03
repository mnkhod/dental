@extends('layouts.admin')
@section('header')
    {{--End css style gh met link file oruulna--}}
    <link rel="stylesheet" href="{{asset('css/vendor/fullcalendar.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/vendor/dataTables.bootstrap4.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/vendor/datatables.responsive.bootstrap4.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/vendor/select2.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/vendor/owl.carousel.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/vendor/bootstrap-stars.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/vendor/nouislider.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/vendor/bootstrap-datepicker3.min.css')}}"/>
@endsection
@section('content')
    <script>
        document.getElementById('adminPromotion').classList.add('active');
    </script>
    <div class="modal fade" id="addPromo" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <form method="post" action="{{url('/admin/promotion/add')}}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Урамшуулал нэмэх</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Урамшууллын код</label>
                            <input type="text" class="form-control" name="promotion_code">
                        </div>
                        <div class="form-group">
                            <label>Урамшууллын нэр</label>
                            <input type="text" class="form-control" name="promotion_name">
                        </div>
                        <div class="form-group">
                            <label>Хөнгөлөлтийн хувь</label>
                            <input type="number" class="form-control" name="percentage">
                        </div>
                        <div class="form-group">
                            <label>Дуусах хугацаа</label>
                            <input id="date" name="start_date" autocomplete="off" class="form-control datepicker"
                                   placeholder="Эхлэл" value="{{date('m/d/Y')}}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Болих</button>
                        <button type="submit" class="btn btn-primary">Нэмэх</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <h3>Урамшууллууд</h3>
                        </div>
                        <div class="col-md-6 text-right">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#addPromo"><i class="simple-icon-plus"></i> Урамшуулал нэмэх</button>
                        </div>
                    </div>
                    <table class="table  text-center" width="100%">
                        <tr>
                            <th>#</th>
                            <th>Код</th>
                            <th>Нэр</th>
                            <th>Хувь</th>
                            <th>Дуусах хугацаа</th>
                        </tr>
                        <?php $id =1?>
                        @foreach($promotions as $promotion)
                            <tr>
                                <td>{{$id}}</td>
                                <td><a href="{{url('/admin/promotion_check/'.$promotion->id)}}">{{$promotion->promotion_code}}</a></td>
                                <td>{{$promotion->promotion_name}}</td>
                                <td>{{$promotion->percentage}}%</td>
                                <td>{{$promotion->promotion_end_date}}</td>
                            </tr>
                            <?php $id = $id +1?>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row mb-2">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <h4><b>{{$prom->promotion_name}}</b></h4> /{{$prom->promotion_code}}/
                                </div>
                                <div class="col-md-4 text-right">
                                    <h1 style="padding: 0px; margin-bottom: 0px"><b>{{$prom->percentage}}%</b></h1><br>
                                    {{$prom->promotion_end_date}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5 text-center"><i class="iconsmind-Business-Man text-primary" style="font-size: 50px;"></i></div>
                                <div class="col-md-7 text-right"><h4>Ашигласан</h4>350</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5 text-center"><i class="iconsmind-Money text-primary" style="font-size: 50px;"></i></div>
                                <div class="col-md-7 text-right"><h4>Хөнгөлсөн</h4>444₮</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <th>#</th>
                                    <th>Нэр</th>
                                    <th>Үнэн дүн</th>
                                    <th>Төлсөн дүн</th>
                                    <th>Хугацаа</th>
                                    <th>Ресепшн</th>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Цэлмэг</td>
                                    <td>100000₮</td>
                                    <td>70000₮</td>
                                    <td>2019-03-18</td>
                                    <td>Халиун</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    {{--Scriptuudiig include hiiideg heseg--}}
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