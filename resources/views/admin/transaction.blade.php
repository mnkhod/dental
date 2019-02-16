@extends('layouts.app')
@section('header')

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

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
        <a href="{{url('/admin/product')}}">
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
                                <input name="price" class="form-control mb-3" type="number" placeholder="Үнийн дүн" autocomplete="off">
                                <input name="description" class="form-control mb-3" type="text" placeholder="Тайлбар" autocomplete="off">
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
                                        <option value="{{$role->staff->id}}">{{$role->staff->name}}/@if($role->id == 0)
                                                Менежер@elseif($role->id == 1)Pесепшн@elseif($role->id == 2)
                                                Доктор@elseif($role->id == 3)Сувилагч@else Бусад@endif/
                                        </option>
                                    @endforeach
                                </select>
                                <input class="form-control mb-3" name="price" type="number" placeholder="Үнийн дүн" autocomplete="off">
                                <button class="btn btn-primary btn-block" type="submit">ОРУУЛАХ</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="third" role="tabpane3" aria-labelledby="third-tab">
                    <div class="card mb-4">
                        <div class="card-body">
                            <form action="{{url('admin/transaction/income')}}" method="post">
                                @csrf
                                <input class="form-control mb-3" name="price" type="number" placeholder="Үнийн дүн" autocomplete="off">
                                <input class="form-control mb-3" name="description" type="text" placeholder="Тайлбар" autocomplete="off">
                                <button class="btn btn-primary btn-block">ОРЛОГО ОРУУЛАХ</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Зарлагын бүтэц</h5>
                    <?php $i = 1?>
                    <?php $sum = 0?>
                    <?php $income = 0?>
                    <?php $outcome = 0?>
                    <?php $material = 0?>
                    <?php $salary = 0?>
                    <?php $other = 0?>
                    @foreach($transactions as $transaction)
                            <?php $i++;?>
                            <?php $sum = $sum + $transaction->price;
                            if ($transaction->price > 0) {
                                $income = $income + $transaction->price;
                            } else {
                                $outcome = $outcome + $transaction->price;
                                if ($transaction->type == 2) {
                                    $material = $material + $transaction->price;
                                } elseif($transaction->type == 1) {
                                    $salary = $salary + $transaction->price;
                                } else {
                                    $other = $other + $transaction->price;
                                }
                            }
                            ?>
                    @endforeach

                    <div class="ct-chart ct-golden-section" id="chart1"></div>
                    <b style="color: #f4c63d">O</b> - Бусад<br>
                    <b style="color: #d70206">O</b> - Цалин<br>
                    <b style="color: #f05b4f">O</b> - Материал
                    <script>
                        var data = {
                            series: [{{-1*$salary}}, {{-1*$material}}, {{-1*$other}}]
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
            <div class="row mb-3">
                <div class="col-md-6">
                    <form method="post" action="{{url('/admin/transaction/date')}}">
                        @csrf
                        <div class="input-group">
                            <a href="#" onclick="$(this).closest('form').submit()">Хугацаа өөрчлөн харах</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input id="date" name="start_date" autocomplete="off" class="form-control datepicker" style="background-color: #f8f8f8; border-color: #f8f8f8; border-bottom-color: gray; padding: 0px"
                                   placeholder="Эхлэл" value="@if($start_date){{date('m/d/Y', $start_date)}}@else{{date('m/d/Y', strtotime('-30 Days'))}}@endif">&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;</span>
                            <input name="end_date" autocomplete="off" class="form-control datepicker " style="background-color: #f8f8f8; border-color: #f8f8f8; border-bottom-color: gray; padding: 0px"
                                   placeholder="Төгсгөл" value="@if($end_date){{date('m/d/Y', $end_date)}}@else{{date('m/d/Y')}}@endif">
                            <a href="#" onclick="$(this).closest('form').submit()">үзэх</a>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 text-right">
                    <a href="#" onclick="write_headers_to_excel()"><i class="iconsmind-File-Excel"></i> Excel-ээр татах</a>
                </div>
            </div>

            {{--<div class="separator mb-2"></div>--}}
            <div class="row mb-3">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5 text-center"><i class="iconsmind-Money text-primary" style="font-size: 50px;"></i></div>
                                <div class="col-md-7 text-right"><h4>Зарлага</h4>{{$outcome}}₮</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5 text-center"><i class="iconsmind-Money text-primary" style="font-size: 50px;"></i></div>
                                <div class="col-md-7 text-right"><h4>Орлого</h4>{{$income}}₮</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5 text-center"><i class="iconsmind-Money text-primary" style="font-size: 50px;"></i></div>
                                <div class="col-md-7 text-right"><h4>Ашиг</h4>{{$sum}}₮</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">

                            <table class="data-table" id ="tblData">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Үнийн дүн</th>
                                    <th>Төрөл</th>
                                    <th>Тайлбар</th>
                                    <th>Хугацаа</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1?>
                                @foreach($transactions as $transaction)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$transaction->price}}</td>
                                        <td>@if($transaction->type == 1)Цалин@elseif($transaction->type == 2)
                                                Материал@else Бусад@endif</td>
                                        <td>{{$transaction->description}}</td>
                                        <td>{{$transaction->created_at}}</td>
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
    <script src="https://unpkg.com/tableexport@5.2.0/dist/js/tableexport.min.js"></script>
    <script src="https://fastcdn.org/FileSaver.js/1.1.20151003/FileSaver.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.14.1/xlsx.core.min.js"></script>
    <script charset="UTF-8" type="text/javascript">
        TableExport(document.getElementsByTagName("table"));
    /*
        function Export(tableID, filename = ''){
            var downloadLink;
            var dataType = 'application/vnd.ms-excel';
            var tableSelect = document.getElementById(tableID);
            var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

            // Specify file name
            filename = filename?filename+'.xls':'excel_data.xls';

            // Create download link element
            downloadLink = document.createElement("a");

            document.body.appendChild(downloadLink);

            if(navigator.msSaveOrOpenBlob){
                var blob = new Blob(['\ufeff', tableHTML], {
                    type: dataType
                });
                navigator.msSaveOrOpenBlob( blob, filename);
            }else{
                // Create a link to the file
                downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

                // Setting the file name
                downloadLink.download = filename;

                //triggering the function
                downloadLink.click();
            }
        }
    */
        // var t = document.getElementById('tblData')
        // function downloadCSV(csv, filename) {
        //     var csvFile;
        //     var downloadLink;
        //
        //     // CSV file
        //     csvFile = new Blob([csv], {type: "text/csv"});
        //
        //     // Download link
        //     downloadLink = document.createElement("a");
        //
        //     // File name
        //     downloadLink.download = filename;
        //
        //     // Create a link to the file
        //     downloadLink.href = window.URL.createObjectURL(csvFile);
        //
        //     // Hide download link
        //     downloadLink.style.display = "none";
        //
        //     // Add the link to DOM
        //     document.body.appendChild(downloadLink);
        //
        //     // Click download link
        //     downloadLink.click();
        // }
        //
        // function exportTableToCSV(filename) {
        //     var csv = [];
        //     var rows = document.querySelectorAll("table tr");
        //
        //     for (var i = 0; i < rows.length; i++) {
        //         var row = [], cols = rows[i].querySelectorAll("td, th");
        //
        //         for (var j = 0; j < cols.length; j++)
        //             row.push(cols[j].innerText);
        //
        //         csv.push(row.join(","));
        //     }
        //
        //     // Download CSV file
        //     downloadCSV(csv.join("\n"), filename)}
        function write_headers_to_excel()
        {
            str="";

            var myTableHead = document.getElementById('tblData');
            var rowCount = myTableHead.rows.length;
            var colCount = myTableHead.getElementsByTagName("tr")[0].getElementsByTagName("th").length;

            var ExcelApp = new ActiveXObject("Excel.Application");
            var ExcelSheet = new ActiveXObject("Excel.Sheet");
            ExcelSheet.Application.Visible = true;

            for(var i=0; i<rowCount; i++)
            {
                for(var j=0; j<colCount; j++)
                {
                    str= myTableHead.getElementsByTagName("tr")[i].getElementsByTagName("th")[j].innerHTML;
                    ExcelSheet.ActiveSheet.Cells(i+1,j+1).Value = str;
                }
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
