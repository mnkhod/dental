@extends('layouts.app')
@section('header')
    {{--End css style gh met link file oruulna--}}
    @endsection
@section('menu')
    <li>
        <a href="{{url('/home')}}">
            <i class="iconsmind-Digital-Drawing"></i>
            <span>Самбар</span>
        </a>
    </li>
    <li>
        <a href="{{url('/workers')}}">
            <i class="iconsmind-Administrator"></i> Ажилчид
        </a>
    </li>
    <li class="active">
        <a href="{{url('/time')}}">
            <i class="iconsmind-Alarm"></i> Цаг
        </a>
    </li>
    <li>
        <a href="{{url('/material')}}">
            <i class="iconsmind-Medicine-2"></i> Материал
        </a>
    </li>
    <li>
        <a href="{{url('/income')}}">
            <i class="iconsmind-Paper"></i> Тайлан
        </a>
    </li>
    @endsection
@section('content')
    <div class="row"><!-- row-->
        <!-- ajiltan nemeh-->
        <div class="col-xl-6 col-lg-12 mb-4"><!-- col start-->
            <div class="card-body">
                <h5 class="mb-4">Шинэ ажилтан нэмэх</h5>

                <form>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Овог</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="Овог">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Нэр</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="Нэр">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Цахим хаяг</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="Цахим хаягаа бичнэ үү">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Утасны дугаар</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="Утасны дугаараа бичнэ үү">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Регистрийн дугаар</label>
                        <div class="col-sm-10">
                            <input  class="form-control" id="inputPassword3" placeholder="Регистрийн дугаараа бичнэ үү">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Гэрийн хаяг</label>
                        <div class="col-sm-10">
                            <input  class="form-control" id="inputPassword3" placeholder="Гэрийн хаягаа бичнэ үү">
                        </div>
                    </div>
                    <label for="inputState">Сонгох</label>
                    <select id="inputState" class="form-control">
                        <option selected>Мэргэжилээ сонгоно уу ...</option>
                        <option>Ресепшн</option>
                        <option>Эмч</option>
                        <option>Сувилагч</option>
                        <option>Нягтлан</option>
                    </select><br>
                    <select id="inputState" class="form-control">
                        <option selected>Хүйс сонгох ...</option>
                        <option>Эр</option>
                        <option>Эм</option>
                    </select>
                    <br>
                    <label class="inputState">
                        <input class="form-control datepicker" placeholder="Төрсөн он сар">
                    </label>
                    <br><br>

                    <textarea class="text-area text-box multi-line" data-val="true" data-val-length="Maximum = 2045 characters" data-val-length-max="2045" id="info" name="info" cols="40" rows="3" placeholder="Тайлбар"></textarea>

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
                            <br><br>
                            <button type="submit" class="btn btn-primary mb-0">Ажилтан нэмэх</button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!--col end -->
        <!-- ajiltan nemeh-->
        <div class="col-xl-6 col-lg-12 mb-4"><!--table-->
            <div class="card h-100">
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
    {{--Scriptuudiig include hiiideg heseg--}}
    <script src="{{asset('js/validation.js')}}"></script>
    @endsection