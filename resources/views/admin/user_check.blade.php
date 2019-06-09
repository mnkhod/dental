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
    <link href="{{asset('plugin/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('plugin/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Responsive datatable examples -->
    <link href="{{asset('plugin/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>

    <link href="{{asset('plugin/switchery/switchery.min.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
@endsection
@section('content')
    <script>
        document.getElementById('adminUsers').classList.add('active');
    </script>
    <div class="row">
        <div class="col-md-4"><!--profile heseg-->
            <div class="card "><!--row -->
                <div class="card-body">
                    <div class="text-center">

                        <p class="list-item-heading mb-1">{{$user->name}} {{$user->last_name}}</p>
                        <div class="text-center">
                            <p class="text-muted text-small mb-2">Хүйс</p>
                            <p class="mb-3">
                                @if($user->sex == 0)
                                    Эр
                                @else
                                    Эм
                                @endif
                            </p>
                            <p class="text-muted text-small mb-2">Утасны дугаар</p>
                            <p class="mb-3">
                                {{$user->phone_number}}
                            </p>
                            <p class="text-muted text-small mb-2">Цахим хаяг</p>
                            <p class="mb-3">
                                {{$user->email}}
                            </p>
                            <p class="text-muted text-small mb-2">Регистрийн дугаар</p>

                            <p class="mb-3">
                                {{$user->register}}
                            </p>
                            <p class="text-muted text-small mb-2">Төрсөн он сар</p>

                            <p class="mb-3">
                                {{$user->birth_date}}
                            </p>
                            <p class="text-muted text-small mb-2">Тайлбар</p>
                            <p class="mb-3">
                                @if($user->description == '')
                                    Тайлбар байхгүй
                                @else
                                    {{$user->description}}
                                @endif
                            </p>
                            {{--<a href="{{url('/reception/user_check/'.$user->id.'/check_in')}}"><button type="button" class="btn btn-sm btn-outline-primary ">Эмч рүү оруулах</button></a>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>div.ex1 {


                height: 400px;
            }</style>
        <div class="col-md-4 ex1 scroll"><!-- scroll-->
            <?php $sum = 0;?>
            @foreach($check_ins as $check_in)
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="#">
                                    <div class="d-flex flex-row mb-3 pb-3 border-bottom">

                                        <div class="pl-3 pr-2">
                                            <a href="#">
                                                <p class="font-weight-medium mb-0 ">Эмч {{$check_in->shift->doctor->name}}</p>
                                                <p class="text-muted mb-0 text-small"> {{$check_in->shift->date}} өдөр хийгдсэн эмчилгээ</p>
                                            </a>
                                        </div>
                                    </div>

                                </a>
                            </h5>
                            <table class="table table-sm table-borderless">
                                <?php
                                $treatments = \App\UserTreatments::all()->where('checkin_id',$check_in->id)
                                ?>
                                <?php $total = 0;?>
                                <tbody>
                                @foreach($treatments as $treatment)
                                    <tr>
                                        <td>
                                            <span class="log-indicator border-theme-2 align-middle"></span>
                                        </td>
                                        <td>
                                            <span class="font-weight-medium">{{$treatment->treatment->name}}</span>
                                        </td>
                                        <td class="text-right">
                                <span class="text-muted">
                                        {{$treatment->price}}₮
                                        <?php /** @var TYPE_NAME $total */
                                        $total = $total + $treatment->price?>
                                 </span>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            @if(!empty($check_in->user_promotion))
                                <?php $promotion = $check_in->user_promotion->promotion;?>
                                <span class="badge badge-pill badge-secondary">Хямдарсан {{$promotion->percentage}}% {{$promotion->promotion_name}} </span>
                                <br>
                                <span class="badge badge-pill badge-primary">Нийт зарцуулсан {{$total = $total*((100-$promotion->percentage)/100)}}₮</span>
                            @else
                                <span class="badge badge-pill badge-primary">Нийт зарцуулсан {{$total}}₮</span>
                            @endif
                            <?php $sum = $sum + $total ?>
                        </div>
                    </div>
                </div>
                <br>
            @endforeach

        </div>    <!-- scroll end-->
        <div class="col-lg-3">

            <br>
            <a href="#" class="card">
                <div class="card-body text-center">
                    <i class="iconsmind-Money-2"></i>
                    <p class="card-text mb-0">Нийт зарцуулсан</p>
                    <p class="lead text-center">{{$sum}}₮</p>
                </div>
            </a>
            <br>
            <a href="#" class="card">
                <div class="card-body text-center">
                    <i class="iconsmind-Hospital"></i>
                    <p class="card-text mb-0">Хэдэн удаа үзүүлсэн эсэх </p>
                    <p class="lead text-center">{{$check_ins->count()}} удаа</p>
                </div>
            </a>
            <br>
            @foreach($check_ins as $check_in)
                <?php
                $lease = \App\Lease::where('checkin_id',$check_in->id)->first();
               ?>
            @if(!empty($lease))
            <a href="#" class="card">
                <div class="card-body text-center">
                    <i class="iconsmind-Hospital"></i>
                    <p class="card-text mb-0">Зээлтэй эсэх </p>
                    <p class="lead text-center">Төлөх ёстой дүн{{$lease->total}}Зээлийн үлдэгдэл {{$lease->price}}</p>
                </div>
            </a>
             @endif
            @endforeach
        </div>
    </div>
@endsection
@section('footer')


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

    <script src="{{asset('js/vendor/select2.full.js')}}"></script>
    <script src="{{asset('js/vendor/nouislider.min.js')}}"></script>
    <script src="{{asset('js/vendor/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('js/vendor/Sortable.js')}}"></script>
@endsection