@extends('layouts.accountant')
@section('header')

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <link rel="stylesheet" href="{{asset('css/vendor/fullcalendar.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/vendor/dataTables.bootstrap4.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/vendor/datatables.responsive.bootstrap4.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/vendor/select2.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/vendor/owl.carousel.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/vendor/bootstrap-stars.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/vendor/nouislider.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/vendor/bootstrap-datepicker3.min.css')}}"/>
    <link href="{{asset('plugin/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('plugin/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Responsive datatable examples -->
    <link href="{{asset('plugin/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>

    <link href="{{asset('plugin/switchery/switchery.min.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
@endsection
@section('content')
    <!-- Menu active-->
    <script>
        document.getElementById('accountantTransaction').classList.add('active');
    </script>



    <div id="addCategory" class="modal fade show" tabindex="-1" role="dialog"
         aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalPopoversLabel">Зардлын төрөл нэмэх</h5>
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="card mb-4 text-left">
                    <div class="card-body">
                        <form id = "form" action="{{url('/accountant/transactions/outcome/type')}}"
                              method="post">
                            @csrf
                            <span>Төрлийн нэр:</span>
                            <input id = "turul" name="name" class="form-control mb-3" autocomplete="off"
                                   type="text">
                            <button onclick="h()" class="btn btn-primary btn-block"
                                    type="button">
                                Хадгалах
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--USTGAKH MODAL--}}
    <div id="deleteTransaction" class="modal fade show" tabindex="-1" role="dialog"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalPopoversLabel">Утга устгах</h5>
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="card mb-4 text-left">
                    <div class="card-body">
                        <form action="{{url('/accountant/transactions/delete')}}"
                              method="post">
                            @csrf
                            <span>Тайлбар:</span>
                            <input type="hidden" name="transaction_id" id="transactionHidden">
                            <input name="description" class="form-control mb-3" autocomplete="off"
                                   type="text">
                            <button class="btn btn-primary"
                                    type="submit">
                                Устгах
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- yanzlah-->
    <div class="modal fade modal-right" id="editTransaction" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalRight" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Үнийн дүн</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{url('/accountant/transactions/edit')}}" method="post">

                <div class="modal-body">

                        @csrf
                        <div class="form-group">
                            <label>Үнэ</label>
                            <input type="number" class="form-control" id="priceholder" name="price">
                        </div>
                    <div class="form-group">
                        <label>Төрөл</label>
                        <select name="transaction_edit_type" class="form-control" id="mySelect">
                            <option id="variableValue" value="0"></option>

                        @foreach($types as $type)
                                <option value="{{$type->id}}">{{$type->name}}</option>
                            @endforeach

                        </select>
                    </div>
                        <div class="form-group">
                            <label>Тайлбар</label>
                            <textarea name="description" id="descriptionholder" class="form-control" rows="2"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Тайлбар</label>
                            <textarea name="log_description" placeholder="Устгаж буй шалтгаан" class="form-control" rows="2"></textarea>
                        </div>


                        <input type="hidden" name="transaction_id" id="transactionEditHidden" value="0">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Болих</button>
                    <button type="submit" class="btn btn-primary">Хадгалах</button>

                </div>
                </form>
            </div>
        </div>
    </div>
    <!--duusah-->


    <div class="row"><!-- row-->

        <div class="col-md-3">
            <ul class="nav nav-tabs separator-tabs ml-0 mb-5" role="tablist">

                <li class="nav-item">
                    <a class="nav-link active" id="first-tab" data-toggle="tab" href="#first" role="tab"
                       aria-controls="first" aria-selected="true">ЗАРЛАГА</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="first-tab" data-toggle="tab" href="#first" role="tab"
                       aria-controls="first" aria-selected="true">ЦАЛИН</a>
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
                            <div class="text-right">
                                <a href="#" data-toggle="modal"
                                   data-target="#addCategory">+ Зардлын төрөл нэмэх</a>
                                <br>
                                <br>

                            </div>
                            <form method="post" action="{{url('/accountant/transactions/add')}}">
                                @csrf
                                <select class="form-control mb-3" name="type">
                                    @foreach($types as $type)
                                        <option value="{{$type->id}}">{{$type->name}}</option>
                                    @endforeach
                                </select>
                                <input name="price" class="form-control mb-3" type="number" placeholder="Үнийн дүн"
                                       autocomplete="off">
                                <input name="description" class="form-control mb-3" type="text" placeholder="Тайлбар"
                                       autocomplete="off">
                                <button class="btn btn-primary btn-block" type="submit">ЗАРЛАГА ОРУУЛАХ</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="second" role="tabpane2" aria-labelledby="second-tab">
                    <div class="card mb-4">
                        <div class="card-body">
                            <form method="post" action="{{url('/accountant/transactions/salary')}}">
                                @csrf
                                <select class="form-control mb-3" name="staff">
                                    @foreach($roles as $role)
                                        <option value="{{$role->staff->id}}">{{$role->staff->name}}/@if($role->id == 0)
                                                Менежер@elseif($role->id == 1)Pесепшн@elseif($role->id == 2)
                                                Доктор@elseif($role->id == 3)Сувилагч@else Бусад@endif/
                                        </option>
                                    @endforeach
                                </select>
                                <input class="form-control mb-3" name="price" type="number" placeholder="Үнийн дүн"
                                       autocomplete="off">
                                <button class="btn btn-primary btn-block" type="submit">ОРУУЛАХ</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="third" role="tabpane3" aria-labelledby="third-tab">
                    <div class="card mb-4">
                        <div class="card-body">
                            <form action="{{url('accountant/transactions/income')}}" method="post">
                                @csrf
                                <input class="form-control mb-3" name="price" type="number" placeholder="Үнийн дүн"
                                       autocomplete="off">
                                <input class="form-control mb-3" name="description" type="text" placeholder="Тайлбар"
                                       autocomplete="off">
                                <button class="btn btn-primary btn-block">ОРЛОГО ОРУУЛАХ</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Зардлын бүтэц</h5>
                    <?php $sum = 0?>
                    @foreach($transactions as $transaction)
                        @if($transaction->price < 0)
                            <?php $sum = $sum + $transaction->price;?>
                        @endif
                    @endforeach
                    <table border="0" width="100%">
                        @foreach($types as $type)
                            <?php $temp_sum = 0?>
                            <?php $local_transactions = $transactions?>
                            <tr>
                                <td>
                                    <b>{{$type->name}}</b>
                                </td>
                                <td class="text-right">
                                    @foreach($local_transactions->where('type', $type->id) as $transaction)
                                        <?php $temp_sum = $temp_sum + $transaction->price?>
                                    @endforeach
                                    {{number_format($temp_sum)}}₮
                                    / @if($sum != 0){{number_format($temp_sum/$sum*100, 2)}}% @else 0.00% @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <b></b>


                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="row mb-3">
                <div class="col-md-6">
                    <form method="post" action="{{url('/accountant/transactions/date')}}">
                        @csrf
                        <div class="input-group">
                            <a href="#" onclick="$(this).closest('form').submit()" style="color: #8f8f8f">Хугацаа
                                өөрчлөн харах</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input id="date" name="start_date" autocomplete="off" class="form-control datepicker"
                                   style="background-color: #f8f8f8; border-color: #f8f8f8; border-bottom-color: #8f8f8f; color: #8f8f8f; padding: 0px"
                                   placeholder="Эхлэл"
                                   value="@if($start_date){{date('m/d/Y', $start_date)}}@else{{date('m/d/Y', strtotime('-30 Days'))}}@endif">&nbsp;&nbsp;&nbsp;<span
                                    style="color: #8f8f8f">-&nbsp;&nbsp;&nbsp;</span>
                            <input name="end_date" autocomplete="off" class="form-control datepicker "
                                   style="background-color: #f8f8f8; border-color: #f8f8f8; border-bottom-color: #8f8f8f; color: #8f8f8f; padding: 0px"
                                   placeholder="Төгсгөл"
                                   value="@if($end_date){{date('m/d/Y', $end_date)}}@else{{date('m/d/Y')}}@endif">
                            <a href="#" onclick="$(this).closest('form').submit()" style="color: #8f8f8f">үзэх</a>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 text-right">
                    <form id="monthSearch" action="{{url('/accountant/transactions/by_month')}}" method="post">
                    @csrf
                        <select name="year">
                            @if($start_date)
                                <option value="{{date('Y', $start_date)}}">{{date('Y', $start_date)}}</option>
                                @for($m = 2019; $m<=2027; $m++)
                                    @if($m != date('Y', $start_date))
                                        <option value="{{$m}}">{{$m}}</option>
                                    @endif
                                @endfor
                            @else
                                <option value="{{date('Y')}}">{{date('Y')}}</option>
                                @for($m = 2019; $m<=2027; $m++)
                                    @if($m != date('Y'))
                                        <option value="{{$m}}">{{$m}}</option>
                                    @endif
                                @endfor
                            @endif
                    </select>
                    <select name="month" onchange="document.getElementById('monthSearch').submit()">
                        @if($start_date)
                            <option value="{{date('m', $start_date)}}">{{date('m', $start_date)}}</option>
                            @for($m = 1; $m<=12; $m++)
                                @if($m != date('m', $start_date))
                                    <option value="{{$m}}">{{$m}}</option>
                                @endif
                            @endfor
                        @else
                            <option value="{{date('m')}}">{{date('m')}}</option>
                            @for($m = 1; $m<=12; $m++)
                                @if($m != date('m'))
                                    <option value="{{$m}}">{{$m}}</option>
                                @endif
                            @endfor
                        @endif


                    </select>
                    </form>
                </div>

            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">

                            <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0"
                                   width="100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Үнийн дүн</th>
                                    <th>Төрөл</th>
                                    <th>Тайлбар</th>
                                    <th>Хугацаа</th>
                                    <th>Хэн</th>
                                    <th>Үйлдэл</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1?>
                                @foreach($transactions as $transaction)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$transaction->price}}</td>
                                        <td>@if(!empty($transaction)){{$transaction->typeOut->name}} @endif</td>
                                        <td>@if($transaction->description){{$transaction->description}} @else Тайлбар
                                            байхгүй @endif</td>
                                        <td>{{$transaction->created_at}}</td>
                                        <td>{{\App\User::find($transaction->created_by)->name}}</td>
                                        <td class="text-center">
                                            <a onclick="editTransaction('{{$transaction->id}}', '{{$transaction->type}}','{{$transaction->typeOut->name}}',
                                                    '{{$transaction->price}}', '{{$transaction->description}}')">
                                                <i class="iconsmind-Pencil"></i>
                                            </a>
                                            <a onclick="deleteTransaction({{$transaction->id}})">
                                                <i class="simple-icon-trash"></i>
                                            </a>
                                        </td>
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
    <script>
        function editTransaction(id ,type, type_name, price, description) {
            document.getElementById('transactionEditHidden').value = id;
            document.getElementById('priceholder').value = price;
            document.getElementById('descriptionholder').value = description;
            var x = document.getElementById("mySelect").options.namedItem("variableValue");
            x.value = type;
            x.text = type_name;
            $("#editTransaction").modal();
        }

    </script>

    <script>
        function deleteTransaction(id) {
            document.getElementById('transactionHidden').value = id;
            $("#deleteTransaction").modal();
        }
    </script>
    <script src="{{asset('plugin/datatables/jquery.dataTables.min.js')}}   "></script>
    <script src="{{asset('plugin/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <!-- Buttons examples -->
    <script src="{{asset('plugin/datatables/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('plugin/datatables/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugin/datatables/jszip.min.js')}}"></script>
    <script src="{{asset('plugin/datatables/pdfmake.min.js')}}"></script>
    <script src="{{asset('plugin/datatables/vfs_fonts.js')}}"></script>
    <script src="{{asset('plugin/datatables/buttons.html5.min.js')}}"></script>
    <script src="{{asset('plugin/datatables/buttons.print.min.js')}}"></script>

    <!-- Key Tables -->
    <script src="{{asset('plugin/datatables/dataTables.keyTable.min.js')}}"></script>

    <!-- Responsive examples -->
    <script src="{{asset('plugin/datatables/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('plugin/datatables/responsive.bootstrap4.min.js')}}"></script>

    <!-- Selection table -->
    <script src="{{asset('plugin/datatables/dataTables.select.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {

            // Default Datatable
            $('#datatable').DataTable();

            //Buttons examples
            var table = $('#datatable-buttons').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf']
            });

            // Key Tables

            $('#key-table').DataTable({
                keys: true
            });

            // Responsive Datatable
            $('#responsive-datatable').DataTable();

            // Multi Selection Datatable
            $('#selection-datatable').DataTable({
                select: {
                    style: 'multi'
                }
            });

            table.buttons().container()
                .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
        });

    </script>
    <script>
        function h() {
            var ss = document.getElementById("turul").value;
            if(ss === "") {
                document.getElementById('turul').classList.add('border-danger');
            } else {
                document.getElementById("form").submit();

            }
        }

    </script>
    <script src="{{asset('js/vendor/select2.full.js')}}"></script>
    <script src="{{asset('js/vendor/nouislider.min.js')}}"></script>
    <script src="{{asset('js/vendor/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('js/vendor/Sortable.js')}}"></script>



@endsection
