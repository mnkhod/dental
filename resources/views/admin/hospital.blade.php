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
@endsection
@section('content')
    <script>
        document.getElementById('adminReport').classList.add('active');
    </script>
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    <span>Шүдний өвчний оношилгоо, эмчилгээ</span>
                    <br>
                    <br>
                    <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0"
                           width="100%">

                        <thead>
                        <tr>
                         <th>Нэр</th>
                         <th>Тоо</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                        <td>Үзлэгийн тоо бүгд</td>
                        <td>{{$count}}</td>
                        </tr>
                        <tr>
                            <td>Эрэгтэй</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>Эмэгтэй</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>Амбулаторын үзлэгийн тоо</td>
                            <td>{{$count}}</td>
                        </tr>
                        <tr>
                            <td>Анх</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>Давтан</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>1 хүртэлх эрэгтэй</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>1 хүртэлх эмэгтэй</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>1-4 Эрэгтэй</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>1-4 Эмэгтэй</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>5-9 Эрэгтэй</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>5-9 Эмэгтэй</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>10-14 Эрэгтэй</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>10-14 Эмэгтэй</td>
                            <td>1</td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    <span>Нүүр амны согог засал</span>
                    <br>
                    <br>
                    <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0"
                           width="100%">

                        <thead>
                        <tr>
                            <th>Нэр</th>
                            <th>Тоо</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Үзлэгийн тоо бүгд</td>
                            <td>{{$count2}}</td>
                        </tr>
                        <tr>
                            <td>Эрэгтэй</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>Эмэгтэй</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>Амбулаторын үзлэгийн тоо</td>
                            <td>{{$count2}}</td>
                        </tr>
                        <tr>
                            <td>Анх</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>Давтан</td>
                            <td>1</td>
                        </tr>


                        </tbody>
                    </table>
                </div>
            </div>
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
