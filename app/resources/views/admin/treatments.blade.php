@extends('layouts.admin')
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
        document.getElementById('adminTreatments').classList.add('active');
    </script>
   <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>#</th>
                            <th>Нэр</th>
                            <th>Хийгдэх хэлбэр</th>
                            <th>Төрөл</th>
                            <th>Үнэ</th>
                            <th>Үнийн хязгаар</th>
                            <th>Сонголтын тоо</th>
                        </thead>
                        <tbody>
                        @foreach($treatments as $treatment)
                            <tr>
                                <td>{{$treatment->id}}</td>
                                <td><a href="{{url('admin/treatment/'.$treatment->id)}}">{{$treatment->name}}</a></td>
                                <td>@if($treatment->selection_type == 1) Нэг шүд @else Бүх шүд @endif</td>
                                <td>@if($treatment->category == 0) Эмчилгээ @elseif($treatment->category == 1) Гажиг засал @elseif($treatment->category == 2) Согог засал @else Мэс засал @endif</td>
                                <td>@if(empty($treatment->price)) Хоосон @else {{$treatment->price}}₮ @endif</td>
                                <td>@if(empty($treatment->limit)) Хоосон @else {{$treatment->limit}}₮ @endif</td>
                                <td>{{$treatment->treatmentSelection->count()}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card m-1">
                <div class="card-body">
                    <h5>Шинэ эмчилгээ оруулах</h5>
                    <form method="post" action="{{url('admin/treatment/store')}}">
                        @csrf
                        Нэр:
                        <input class="form-control" type="text" name="name" required>
                        <br>
                        Хийгдэх хэлбэр:
                        <select class="form-control" name="selection_type">
                            <option value="0">Бүх шүд</option>
                            <option value="1">Нэг шүд</option>
                        </select>
                        <br>
                        Төрөл:
                        <select class="form-control" name="category">
                                <option value="0">Эмчилгээ</option>
                                <option value="1">Гажиг засал</option>
                                <option value="2">Согог засал</option>
                                <option value="3">Мэс засал</option>
                        </select>
                        <br>

                        <div class="row">
                            <div class="col-md-6">
                                Үнэ:
                                <input class="form-control" name="price" type="number" >
                            </div>
                            <div class="col-md-6">
                                Үнийн хязгаар:
                                <input class="form-control" name="limit" type="number" >
                            </div>
                        </div>

                        <br>
                        <button class="btn btn-primary" type="submit">Оруулах</button>
                    </form>
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