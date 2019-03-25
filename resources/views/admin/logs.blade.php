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
        document.getElementById('adminLog').classList.add('active');
    </script>
    <div class="col-xl-12 col-lg-12 mb-4"><!--table-->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Үйлдлийн түүхүүд</h5>
                <table class="data-table">
                    <thead>
                    <tr>

                        <th>Төрөл</th>
                        <th>Хэн</th>
                        <th>Үйлдэл</th>
                        <th>Тайлбар</th>
                        <th>Хугацаа</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($logs as $log)
                        <tr>
                                <td>
                                <p class="text-muted">@if($log->type ==0)
                                        Орлого зарлагын гүйлгээ
                                    @elseif($log->type ==1)
                                        Бараа материал
                                    @elseif($log->type ==2)
                                        Цаг захиалга
                                    @else
                                        Бусад
                                    @endif</p>
                            </td>
                            <td>
                                <p class="list-item-heading">
                                    {{\App\User::find($log->user_id)->name}}
                                </p>
                            </td>

                            <td>
                                <p class="text-muted">@if($log->action_id == 0)
                                Устгасан
                                @elseif($log->action_id==1)
                                Өөрчилсөн
                                @endif</p>
                            </td>
                            <td>
                                <p class="text-muted">{{$log->description}}</p>
                            </td>
                            <td>
                                <p class="text-muted">{{$log->created_at}}</p>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
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
    <script src="{{asset('js/validation.js')}}"></script>
@endsection
