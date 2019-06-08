@extends('layouts.accountant')
@section('header')



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
        document.getElementById('accountantItem').classList.add('active');
    </script>
    <div class="row">
        <div class="col-lg-5">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="mb-4">Шинэ бараа нэмэх</h5>

                    <form id = "form3" class="form-inline" action="{{url('/accountant/add_item')}}" method="post">
                        @csrf
                        <div class=" mb-2 mr-sm-2">
                            <input id = "br" name="name" type="text" class="form-control" id="inlineFormInputGroupUsername2"
                                   placeholder="Барааны нэр">
                            <input name="price" type="number" class="form-control" id="prodddd"
                                   placeholder="Барааны үнэ" autocomplete="off">
                        </div>
                        <button onclick="baraa()" type="button" class="btn btn-outline-primary mb-2" style="border-radius: 0px">
                            Шинэ бараа нэмэх
                        </button>
                    </form>
                </div>
            </div>

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


                    <table id="myTable" class="data-table responsive nowrap" data-order="[[ 0, &quot;desc&quot; ]]">

                        <thead>
                        <tr>
                            <th>Дугаар</th>
                            <th>Барааны нэр</th>
                            <th>Ширхэг</th>
                            <th>Барааны үнэ</th>

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
                                    <a href="{{url('accountant/items/'.$product->id)}}">
                                        {{$product->name}}
                                    </a>
                                    {{--</button>--}}
                                </td>
                                <td>
                                    <p class="text-muted">{{$product->quantity}}</p></td>
                                <td>{{$product->price}} ₮</td>


                            </tr>
                        @endforeach
                        <script>
                            function onItemClick(id) {
                                document.getElementById('hidden').value = id;
                                return true;
                            }
                        </script>


                        </tbody>
                    </table>

                </div>
            </div>


        </div>
        <div class="col-xl-7 col-lg-12 mb-4">
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-7">
                                    <h5>{{$specific_product->name}}</h5>
                                    <form id ="form1" action="{{url('/accountant/change_item/'.$specific_product->id)}}">
                                        @csrf
                                        <input value="{{$specific_product->name}}" type="text" name="name" class="form-control mb-3" placeholder="Барааны нэр">
                                        <input value="{{$specific_product->quantity}}" name="quantity" id="too"  class="form-control mb-3"
                                               type="number" placeholder="Тоо ширхэг">
                                        <input value="{{$specific_product->price}}" name="price" id="too"  class="form-control mb-3"
                                               type="number" placeholder="Барааны үнэ">
                                        <button onclick="numa()" class="btn btn-primary btn-block"
                                                type="submit">
                                            Хадгалах
                                        </button>
                                    </form>
                                    <span class="text-muted text-small d-block">Нэмэх товч дээр дарна бараа нэмнэ</span>
                                </div>
                                <div class="col-md-5 text-right">
                                    {{--<button class="btn btn-primary" data-toggle="modal"--}}
                                    {{--data-target="#decreaseProduct">---}}
                                    {{--</button>&nbsp;--}}
                                    {{$specific_product->quantity}} ширхэг байна
                                    &nbsp;<button class="btn btn-primary" data-toggle="modal"
                                                  data-target="#increaseProduct">+
                                    </button>
                                    <div id="increaseProduct" class="modal fade show" tabindex="-1" role="dialog"
                                         aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalPopoversLabel">Материал
                                                        нэмэх</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="card mb-4 text-left">
                                                    <div class="card-body">
                                                        <form id ="form1"action="{{url('/accountant/edit_item')}}"
                                                              method="post">
                                                            @csrf
                                                            <span>Тоо ширхэг</span>
                                                            <input name="id" type="hidden" value="{{$specific_product->id}}"
                                                                   id="hidden">
                                                            <input name="quantity" id="too"  class="form-control mb-3"
                                                                   type="number" placeholder="Тоо ширхэг">

                                                            <span>Үнийн дүн</span>
                                                            <input name="price" id="une" class="form-control mb-3"
                                                                   type="number"
                                                                   placeholder="Үнийн дүн">

                                                            <button onclick="numa()" class="btn btn-primary btn-block"
                                                                    type="button">
                                                                Хадгалах
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="decreaseProduct" class="modal fade show" tabindex="-1" role="dialog"
                                         aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">

                                                    <h5 class="modal-title" id="exampleModalPopoversLabel">Материал
                                                        хасах</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>

                                                </div>


                                                <div class="card mb-4 text-left">
                                                    <div class="card-body">
                                                        <form id="form" action="{{url('/accountant/decrease_item')}}"
                                                              method="post">
                                                            @csrf

                                                            <input name="id" type="hidden" value="{{$specific_product->id}}"
                                                                   id="hidden">

                                                            <span>Тоо ширхэг</span>
                                                            <input name="quantity" id="numhas" class="form-control mb-3"
                                                                   type="number" placeholder="Тоо ширхэг">
                                                            <span id="numhas_msg" style="color:red"></span>

                                                            <button onclick="numb()" class="btn btn-primary btn-block"
                                                                    type="button">
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
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="data-table responsive nowrap" data-order="[[ 0, &quot;desc&quot; ]]">
                                        <thead>
                                        <tr>
                                            <th>Дугаар</th>
                                            <th>Ширхэг</th>
                                            <th>Үнийн дүн</th>
                                            <th>Хэн</th>
                                            <th>Хэзээ</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 1;?>
                                        @foreach($histories as $history)
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>{{$history->quantity}} ширхэг</td>
                                                @if($history->quantity<0)
                                                    <td>{{-1*$specific_product->price*$history->quantity}}₮</td>
                                                @else
                                                    <td>{{\App\Transaction::where('type',7)->where('type_id',$history->id)->first()->price}} ₮</td>
                                                    {{--                                                    <td>{{\App\Transaction::where('type',7)->where('type_id',$history->id)->first()}} ₮</td>--}}
                                                @endif
                                                <td>{{\App\User::find($history->created_by)->name}}</td>
                                                <td>{{$history->created_at}}</td>
                                            </tr>
                                            <?php $i++;?>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>





@endsection
@section('footer')
    <script>
        function myFunction() {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
        function numb() {
            var number = document.getElementById("numhas").value;
            if(number < 1) {
                document.getElementById('numhas').classList.add('border-danger');
                document.getElementById('numhas_msg').innerHTML = "Утга буруу оруулсан байна";
            } else {
                document.getElementById("form").submit();
            }
        }
        function numa(){
            var too = document.getElementById("too").value;
            var une = document.getElementById("une").value;
            if(too < 1 ) {
                document.getElementById('too').classList.add('border-danger');
            }
            else if(une < 1){
                document.getElementById('une').classList.add('border-danger');
            }
            else {
                document.getElementById("form1").submit();
            }
        }
        function baraa() {
            var br = document.getElementById("br").value;
            if(br < 1) {
                document.getElementById('br').classList.add('border-danger');
            } else {
                document.getElementById("form3").submit();
            }
        }
    </script>


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