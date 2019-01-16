@extends('layouts.app')
@section('header')



    <link rel="stylesheet" href="{{asset('css/vendor/fullcalendar.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/vendor/dataTables.bootstrap4.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/vendor/datatables.responsive.bootstrap4.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/vendor/select2.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/vendor/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/vendor/bootstrap-stars.css')}}" />
    <link rel="stylesheet" href="{{asset('css/vendor/nouislider.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/vendor/bootstrap-datepicker3.min.css')}}" />

    @endsection
@section('menu')
    <li  class="active">
        <a href="{{url('/home')}}">
            <i class="iconsmind-Shop-4"></i>
            <span>Самбар</span>
        </a>
    </li>
    <li>
        <a href="{{url('/workers')}}">
            <i class="iconsmind-Digital-Drawing"></i> Ажилчид
        </a>
    </li>
    <li>
        <a href="{{url('/time')}}">
            <i class="iconsmind-Air-Balloon"></i> Цаг
        </a>
    </li>
    <li>
        <a href="{{url('/material')}}">
            <i class="iconsmind-Pantone"></i> Материал
        </a>
    </li>
    <li>
        <a href="{{url('/income')}}">
            <i class="iconsmind-Space-Needle"></i> Санхүү
        </a>
    </li>
@endsection
@section('content')
<div class="row"><!-- row-->
    <!-- ajiltan nemeh-->
    <div class="col-xl-6 col-lg-12 mb-4"><!-- col start-->
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="mb-4">Шинэ ажилтан нэмэх</h5>

                <form>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputAddress2">Овог</label>
                                <input type="text" class="form-control" id="inputAddress2" placeholder="Овог">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputAddress2">Нэр</label>
                                <input type="text" class="form-control" id="inputAddress2" placeholder="Нэр">
                            </div>
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="col-md-6">
                            <label>Хүйс сонгох</label>
                            <select id="inputState" class="form-control">
                                <option>Эр</option>
                                <option>Эм</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Төрсөн он сар</label>
                                <input class="form-control datepicker" placeholder="Төрсөн он сар">
                        </div>
                    </div>

                    <br>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Цахим хаяг</label>
                            <input type="email" class="form-control" id="inputEmail4" placeholder="Цахим хаягаа оруулна уу">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Регисрт</label>
                            <input type="text" class="form-control" id="inputPassword4" placeholder="Регистрийн дугаараа оруулна уу">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Утасны дугаар</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="Утасны дугаараа оруулна уу">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Гэрийн хаяг</label>
                        <input type="text" class="form-control" id="inputAddress2" placeholder="Гэрийн хаягаа оруулна уу">
                    </div>

                    <label for="inputState">Сонгох</label>
                    <select id="inputState" class="form-control">
                        <option selected>Мэргэжилээ сонгоно уу ...</option>
                        <option>Ресепшн</option>
                        <option>Эмч</option>
                        <option>Сувилагч</option>
                        <option>Нягтлан</option>
                    </select><br>


                    <textarea class="form-control" data-val="true" data-val-length="Maximum = 1000000 characters" data-val-length-max="100000" id="info" name="info"  placeholder="Тайлбар"></textarea>
                    <br><br>
                    <h5 class="mb-12">Зураг оруулах</h5>
                    <label class="btn btn-outline-primary btn-upload" for="inputImage" title="Upload image file">
                        <input type="file" class="sr-only" id="inputImage" name="file" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
                        Зургаа сонгох
                    </label>
                    <div class="row">
                        <div class="col-12">
                            <div id="cropperContainer">
                                <img id="cropperImage" alt="Cropper Image" src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="cropper-preview"></div>
                        </div>
                        <div class="col-2">
                            <div class="cropper-preview"></div>
                        </div>
                        <div class="col-1">
                            <div class="cropper-preview"></div>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-sm-10">
                            <br>
                            <button type="submit" class="btn btn-primary mb-0">Ажилтан нэмэх</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div><!--col end -->
    <!-- ajiltan nemeh-->
    <div class="col-xl-6 col-lg-12 mb-4"><!--table-->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Бүх ажилтан</h5>
                <table class="data-table">
                    <thead>
                    <tr>

                        <th>Нэр</th>
                        <th>Овог</th>
                        <th>Мэргэжил</th>
                        <th>Утас</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <p class="list-item-heading">
                                <a href="profile.html">Алцаа</a>
                            </p>
                        </td>
                        <td>
                            <p class="text-muted">Болд</p>
                        </td>
                        <td>
                            <p class="text-muted">Нягтлан</p>
                        </td>
                        <td>
                            <p class="text-muted">97777233</p>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <p class="list-item-heading">
                                <a href="profile.html">Цэцгээ</a>
                            </p>
                        </td>
                        <td>
                            <p class="text-muted">Сайхнаа</p>
                        </td>
                        <td>
                            <p class="text-muted">Эмч</p>
                        </td>
                        <td>
                            <p class="text-muted">98888888</p>
                        </td>
                    </tr>


                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- table end-->
</div><!-- row end-->
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

    @endsection
