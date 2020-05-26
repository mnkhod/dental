@extends('layouts.reception')
@section('header')
    <link rel="stylesheet" href="{{asset('css/vendor/fullcalendar.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/vendor/dataTables.bootstrap4.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/vendor/datatables.responsive.bootstrap4.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/vendor/select2.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/vendor/owl.carousel.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/vendor/bootstrap-stars.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/vendor/nouislider.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/vendor/bootstrap-datepicker3.min.css')}}"/>


    {{--End css style gh met link file oruulna--}}
@endsection
@section('content')
    {{--//Za aliv l dee--}}
    <script>
        document.getElementById('receptionProduct').classList.add('active');
    </script>
    <div class="row">
        {{--<div class="col-lg-6">--}}
            {{--<div class="card mb-4">--}}
                {{--<div class="card-body">--}}
                    {{--<h5 class="mb-4">Шинэ бараа нэмэх</h5>--}}

                    {{--<form class="form-inline" action="{{url('/reception/add_product')}}" method="post">--}}
                        {{--@csrf--}}
                        {{--<div class=" mb-2 mr-sm-2">--}}
                            {{--<input name="name" type="text" class="form-control" id="inlineFormInputGroupUsername2"--}}
                                   {{--placeholder="Барааны нэр" autocomplete="off">--}}
                        {{--</div>--}}
                        {{--<button type="submit" class="btn btn-outline-primary mb-2" style="border-radius: 0px">--}}
                            {{--Шинэ бараа нэмэх--}}
                        {{--</button>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}

            <div class="card">
                <div class="card-body">
                    <div class="btn-group float-right float-none-xs mt-2">
                        <div class="search-sm d-inline-block float-md-left mr-1 mb-1 align-top">
                            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Хайх...">
                        </div>
                    </div>
                    <h5 class="card-title">Барааны жагсаалт
                        <br> <span class="text-muted text-small d-block">Барааны нэрэн дээр даран тоо болон үнийг өөрчилнө үү</span>
                    </h5>


                    <table id="myTable" class="data-table responsive nowrap" data-order="[[ 1, &quot;desc&quot; ]]">

                        <thead>
                        <tr>
                            <th>Дугаар</th>
                            <th>Барааны нэр</th>
                            <th>Ширхэг</th>
                            <th>Үнэ</th>


                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1?>
                        @foreach($products as $product)
                            <tr>
                                <td>{{$i}}</td>
                                <?php $i = $i + 1?>
                                <td>
                                    {{--<button type="button" class="btn btn-primary " data-toggle="modal"--}}
                                    {{--data-target="#exampleModalPopovers" onclick="onItemClick({{$product->id}})">--}}
                                    <a href="{{url('/reception/product/'.$product->id)}}">
                                        {{$product->name}}
                                    </a>
                                    {{--</button>--}}
                                </td>
                                <td>
                                    <p class="text-muted">{{$product->quantity}}</p></td>
                                <td>
                                    {{$product->price}}₮
                                </td>
                            </tr>
                        @endforeach
                        <script>
                            function onItemClick(id) {
                                document.getElementById('hidden').value = id;
                                return true;
                            }
                        </script>

                        <div id="exampleModalPopovers" class="modal fade show" tabindex="-1" role="dialog"
                             aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">

                                        <h5 class="modal-title" id="exampleModalPopoversLabel">Барааг нэмэж хасах</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>

                                    </div>

                                    <div class="col-md-12 ">

                                        <ul class="nav nav-tabs separator-tabs ml-0 mb-6" role="tablist">
                                            <li class="nav-item ">
                                                <a class="nav-link active " id="first-tab" data-toggle="tab"
                                                   href="#first" role="tab"
                                                   aria-controls="first" aria-selected="true">Бүтээгдэхүүн нэмэх</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link " id="second-tab" data-toggle="tab" href="#second"
                                                   role="tab"
                                                   aria-controls="second" aria-selected="false">Бүтээгдэхүүн хасах</a>
                                            </li>
                                        </ul>

                                        <div class="tab-content">

                                            <div class="tab-pane show active" id="first" role="tabpanel"
                                                 aria-labelledby="first-tab">
                                                <div class="card mb-4">
                                                    <div class="card-body">
                                                        <form action="{{url('/reception/edit_product')}}" method="post">
                                                            @csrf
                                                            <input name="id" type="hidden" value="0" id="hidden">

                                                            <input name="price" class="form-control mb-3" type="number"
                                                                   placeholder="Үнийн дүн">
                                                            <input name="quantity" class="form-control mb-3"
                                                                   type="number" placeholder="Тоо ширхэг">
                                                            <button class="btn btn-primary btn-block" type="submit">
                                                                Хадгалах
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="tab-pane" id="second" role="tabpane2"
                                                 aria-labelledby="second-tab">
                                                <div class="card mb-4">
                                                    <div class="card-body">
                                                        <form action="{{url('/reception/add_transaction')}}" method="post">
                                                            <input name="id" type="hidden" value="0" id="hidden">
                                                            @csrf
                                                            <input name="description" class="form-control mb-3"
                                                                   type="text" placeholder="Тайлбар">
                                                            <input class="form-control mb-3" name="price" type="number"
                                                                   placeholder="Тоо ширхэг">
                                                            <button class="btn btn-primary btn-block" type="submit">
                                                                Хадгалах
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
