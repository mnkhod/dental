@extends('layouts.reception')
@section('header')
    <link rel="stylesheet" href="{{asset('css/vendor/fullcalendar.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/vendor/dataTables.bootstrap4.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/vendor/datatables.responsive.bootstrap4.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/vendor/select2.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/vendor/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/vendor/bootstrap-stars.css')}}" />
    <link rel="stylesheet" href="{{asset('css/vendor/nouislider.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/vendor/bootstrap-datepicker3.min.css')}}" />

    {{--End css style gh met link file oruulna--}}
@endsection
@section('content')
    <script>document.getElementById('receptionUser').classList.add('active');</script>
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="mb-4">Шинэ үйлчлүүлэгч нэмэх</h5>

                    <form action="{{url('/admin/add_staff')}}" method="post" enctype="multipart/form-data" id="form">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="inputAddress2">Овог</label>
                                    <input name="last_name" type="text" class="form-control" id="lname" placeholder="Овог">
                                    <span id="lname_msg" style="color:red"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="inputAddress2">Нэр</label>
                                    <input name="name" type="text" class="form-control" id="fname" placeholder="Нэр">
                                    <span id="fname_msg" style="color:red"></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6">
                                <label>Хүйс сонгох</label>
                                <select name="sex" id="inputState" class="form-control">
                                    <option value="0">Эр</option>
                                    <option value="1">Эм</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Төрсөн он сар</label>
                                <input name="birth_date" autocomplete="off" class="form-control datepicker" id = "birth" placeholder="Төрсөн он сар">
                                <span id="date_msg" style="color:red"></span>
                            </div>
                        </div>

                        <br>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Цахим хаяг</label>
                                <input name="email" type="email" class="form-control" id="inputEmail4" placeholder="Цахим хаягаа оруулна уу">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Регистрийн дугаар</label>
                                <input name="register" type="text" class="form-control" id="registernum" placeholder="Регистрийн дугаараа оруулна уу">
                                <span id="registernum_msg" style="color:red"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Утасны дугаар</label>
                            <input name="phone_number" type="text" class="form-control" id="phone" placeholder="Утасны дугаараа оруулна уу">
                            <span id="phone_msg" style="color:red"></span>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Гэрийн хаяг</label>
                            <input name="location" type="text" class="form-control" id="Address" placeholder="Гэрийн хаягаа оруулна уу">
                            <span id="address_msg" style="color:red"></span>
                        </div>

                        <label for="inputState">Тайлбар</label>

                        <textarea class="form-control" data-val="true" data-val-length="Maximum = 1000000 characters" data-val-length-max="100000" id="info" name="info"  placeholder="Тайлбар"></textarea>


                        <div class="form-group row mb-0">
                            <div class="col-sm-10">
                                <br>
                                <button onclick="validate()" type="button" class="btn btn-primary mb-0">Ажилтан нэмэх</button>
                            </div>
                        </div>
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
    <script src="{{asset('js/validation.js')}}"></script>
    {{--Scriptuudiig include hiiideg heseg--}}
@endsection