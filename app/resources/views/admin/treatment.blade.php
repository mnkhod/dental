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
                        @foreach($treatments as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td><a href="{{url('admin/treatment/'.$item->id)}}">{{$item->name}}</a></td>
                                <td>@if($item->selection_type == 1) Нэг шүд @else Бүх шүд @endif</td>
                                <td>@if($item->category == 0) Эмчилгээ @elseif($item->category == 1) Гажиг засал @elseif($item->category == 2) Согог засал @else Мэс засал @endif</td>
                                <td>@if(empty($item->price)) Хоосон @else {{$item->price}}₮ @endif</td>
                                <td>@if(empty($item->limit)) Хоосон @else {{$item->limit}}₮ @endif</td>
                                <td>{{$item->treatmentSelection->count()}}</td>
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
                    <h5>{{$treatment->name}}</h5>
                    <form method="post" action="{{url('admin/treatment/update')}}">
                        @csrf
                        <input type="hidden" name="treatment_id" value="{{$treatment->id}}">
                        Нэр:
                        <input class="form-control" type="text" name="name" value="{{$treatment->name}}">
                        <br>
                        Хийгдэх хэлбэр:
                        <select class="form-control" name="selection_type">
                            @if($treatment->selection_type == 0)
                                <option value="0">Бүх шүд</option>
                                <option value="1">Нэг шүд</option>
                            @else
                                <option value="1">Нэг шүд</option>
                                <option value="0">Бүх шүд</option>
                            @endif
                        </select>
                        <br>
                        Төрөл:
                        <select class="form-control" name="category">
                            @if($treatment->category == 0)
                                <option value="0">Эмчилгээ</option>
                                <option value="1">Гажиг засал</option>
                                <option value="2">Согог засал</option>
                                <option value="3">Мэс засал</option>
                            @elseif($treatment->category == 1)
                                <option value="1">Гажиг засал</option>
                                <option value="2">Согог засал</option>
                                <option value="3">Мэс засал</option>
                                <option value="0">Эмчилгээ</option>
                            @elseif($treatment->category == 2)
                                <option value="2">Согог засал</option>
                                <option value="3">Мэс засал</option>
                                <option value="0">Эмчилгээ</option>
                                <option value="1">Гажиг засал</option>

                            @elseif($treatment->category == 3)
                                <option value="3">Мэс засал</option>
                                <option value="0">Эмчилгээ</option>
                                <option value="1">Гажиг засал</option>
                                <option value="2">Согог засал</option>
                            @endif
                        </select>
                        <br>

                        <div class="row">
                            <div class="col-md-6">
                                Үнэ:
                                <input class="form-control" name="price" type="number" value="{{$treatment->price}}">
                            </div>
                            <div class="col-md-6">
                                Үнийн хязгаар:
                                <input class="form-control" name="limit" type="number" value="{{$treatment->limit}}">
                            </div>
                        </div>

                        <br>
                        <button class="btn btn-primary" type="submit">Засах</button>
                    </form>
                </div>
            </div>
            <div class="card m-1">
                <div class="card-body">
                    <h5>Төрлүүд</h5>
                    @if(empty($treatmentSelection))
                        <form method="post" action="{{url('admin/treatment/storeTreatmentSelection')}}">
                            @csrf
                            <input type="hidden" name="s_treatment_id" value="{{$treatment->id}}">
                            <input class="form-control" type="text" placeholder="Нэр" name="s_name">
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="number" class="form-control" placeholder="Үнэ" name="s_price" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" placeholder="Үнийн хязгаар" name="s_limit">
                                </div>
                            </div>
                            <br>
                            <button class="btn btn-primary" type="submit">Нэмэх</button>
                        </form>
                    @else
                        <form method="post" action="{{url('admin/treatment/updateTreatmentSelection')}}">
                            @csrf
                            <input type="hidden" name="treatment_selection_id" value="{{$treatmentSelection->id}}">
                            <input class="form-control" type="text" placeholder="Нэр" name="s_u_name" value="{{$treatmentSelection->name}}">
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="number" class="form-control" placeholder="Үнэ" name="s_u_price" value="{{$treatmentSelection->price}}" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" placeholder="Үнийн хязгаар" value="{{$treatmentSelection->limit}}" name="s_u_limit">
                                </div>
                            </div>
                            <br>
                            <button class="btn btn-primary" type="submit">Засах</button>
                        </form>
                    @endif
                    <br>
                    <table class="table">
                        <thead>
                            <th>Нэр</th>
                            <th>Үнэ</th>
                            <th>Үнийн хязгаар</th>
                        </thead>
                         <tbody>
                         @foreach($treatment->treatmentSelection as $selection)
                         <tr>
                             <td><a href="{{url('admin/treatment/'. $treatment->id .'/' . $selection->id)}}">{{$selection->name}}</a></td>
                             <td>@if($selection->price != null){{$selection->price}}₮@endif</td>
                             <td>@if($selection->limit != null ){{$selection->limit}}₮@endif</td>
                         </tr>
                             @endforeach
                         </tbody>
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