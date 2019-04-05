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
        document.getElementById('accountantHospital').classList.add('active');
    </script>
    <div class="row">
        <div class="col-md-6">

        </div>
        <div class="col-md-6"></div>
    </div>


@endsection
@section('footer')

    <script src="{{asset('js/vendor/select2.full.js')}}"></script>
    <script src="{{asset('js/vendor/nouislider.min.js')}}"></script>
    <script src="{{asset('js/vendor/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('js/vendor/Sortable.js')}}"></script>

@endsection
