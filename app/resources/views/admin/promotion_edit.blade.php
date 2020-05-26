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
    <!-- Menu active-->
    <script>
        document.getElementById('adminPromotion').classList.add('active');
    </script>
    <div class="modal fade" id="addPromo" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <form id = "form" method="post" action="{{url('/admin/promotion/add')}}">
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
                            <input id = "codess" type="text" class="form-control" name="promotion_code">
                        </div>
                        <div class="form-group">
                            <label>Урамшууллын нэр</label>
                            <input id = "name" type="text" class="form-control" name="promotion_name">
                        </div>
                        <div class="form-group">
                            <label>Хөнгөлөлтийн хувь</label>
                            <input id="huvi" type="number" class="form-control" name="percentage">
                        </div>
                        <div class="form-group">
                            <label>Дуусах хугацаа</label>
                            <input id="date" name="promotion_end_date" autocomplete="off" class="form-control datepicker"
                                   placeholder="Эхлэл" value="{{date('m/d/Y')}}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Болих</button>
                        <button onclick="code()" type="button" class="btn btn-primary">Нэмэх</button>
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

                    </div>
                    <form id ="form1" action="{{url('/admin/promotion_edit/'.$prom->id)}}">
                        @csrf
                        <input required value="{{$prom->promotion_code}}" type="text" name="promotion_code" class="form-control mb-3" placeholder="Материалын нэр">
                        <input required name="promotion_name" id="too"  class="form-control mb-3"
                               value="{{$prom->promotion_name}}" type="text">
                        <input required value="{{$prom->percentage}}" type="number" name="percentage" class="form-control mb-3">
                        <input required id="date" name="promotion_end_date" autocomplete="off" class="form-control datepicker"
                               placeholder="Эхлэл" value="{{date('m/d/Y', strtotime($prom->promotion_end_date))}}">
                        <br>
                        <button onclick="numa()" class="btn btn-primary btn-block"
                                type="submit">
                            Хадгалах
                        </button>
                    </form>
                </div>
            </div>
        </div>
        {{--<div class="col-md-6">--}}
        {{--<div class="row mb-2">--}}
        {{--<div class="col-md-12">--}}
        {{--<div class="card">--}}
        {{--<div class="card-body">--}}
        {{--<div class="row">--}}
        {{--<div class="col-md-8">--}}
        {{--<h4><b>{{$last_promotion->promotion_name}}</b></h4> /{{$last_promotion->promotion_code}}/--}}
        {{--</div>--}}
        {{--<div class="col-md-4 text-right">--}}
        {{--<h1 style="padding: 0px; margin-bottom: 0px"><b>{{$last_promotion->percentage}}%</b></h1><br>--}}
        {{--{{$last_promotion->promotion_end_date}}--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="row">--}}
        {{--<div class="col-md-6 mb-2">--}}
        {{--<div class="card">--}}
        {{--<div class="card-body">--}}
        {{--<div class="row">--}}
        {{--<div class="col-md-5 text-center"><i class="iconsmind-Business-Man text-primary" style="font-size: 50px;"></i></div>--}}
        {{--<div class="col-md-7 text-right"><h4>Ашигласан</h4>350</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-md-6 mb-2">--}}
        {{--<div class="card">--}}
        {{--<div class="card-body">--}}
        {{--<div class="row">--}}
        {{--<div class="col-md-5 text-center"><i class="iconsmind-Money text-primary" style="font-size: 50px;"></i></div>--}}
        {{--<div class="col-md-7 text-right"><h4>Хөнгөлсөн</h4>444₮</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="row mb-2">--}}
        {{--<div class="col-md-12">--}}
        {{--<div class="card">--}}
        {{--<div class="card-body">--}}
        {{--<table class="table">--}}
        {{--<tr>--}}
        {{--<th>#</th>--}}
        {{--<th>Нэр</th>--}}
        {{--<th>Үнэн дүн</th>--}}
        {{--<th>Төлсөн дүн</th>--}}
        {{--<th>Хугацаа</th>--}}
        {{--<th>Ресепшн</th>--}}
        {{--</tr>--}}
        {{--<tr>--}}
        {{--<td>1</td>--}}
        {{--<td>Цэлмэг</td>--}}
        {{--<td>100000₮</td>--}}
        {{--<td>70000₮</td>--}}
        {{--<td>2019-03-18</td>--}}
        {{--<td>Халиун</td>--}}
        {{--</tr>--}}
        {{--</table>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
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
    <script>
        function code(){
            var check = 1;
            var n = document.getElementById("codess").value;
            var d = document.getElementById("name").value;
            var t = document.getElementById("huvi").value;
            var tr = document.getElementById("date").value;
            var dt = tr.split("/")
            if(n === ""){
                document.getElementById('codess').classList.add('border-danger');
                check = check * 0;
            }else{
                document.getElementById('codess').classList.remove('border-danger');
                check = check * 1;
            }
            if(d === ""){
                document.getElementById('name').classList.add('border-danger');
                check = check * 0;
            }else{
                document.getElementById('name').classList.remove('border-danger');
                check = check * 1;
            }
            if(t === ""){
                document.getElementById('huvi').classList.add('border-danger');
                check = check * 0;
            }else{
                document.getElementById('huvi').classList.remove('border-danger');
                check = check * 1;
            }
            if(isValidDate(tr) === false){
                document.getElementById('date').classList.add('border-danger');
                check = check * 0;
            }else {
                document.getElementById('date').classList.remove('border-danger');
                check = check * 1;
            }
            function isValidDate(dateString)
            {
                // First check for the pattern
                if(!/^\d{1,2}\/\d{1,2}\/\d{4}$/.test(dateString))
                    return false;

                // Parse the date parts to integers
                var parts = dateString.split("/");
                var day = parseInt(parts[1], 10);
                var month = parseInt(parts[0], 10);
                var year = parseInt(parts[2], 10);

                // Check the ranges of month and year
                if(year < 1000 || year > 3000 || month === 0 || month > 12)
                    return false;

                var monthLength = [ 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 ];

                // Adjust for leap years
                if(year % 400 === 0 || (year % 100 !== 0 && year % 4 === 0))
                    monthLength[1] = 29;

                // Check the range of the day
                return day > 0 && day <= monthLength[month - 1];
            }
            if(check === 1){
                document.getElementById("form").submit();
            }
        }
    </script>
@endsection