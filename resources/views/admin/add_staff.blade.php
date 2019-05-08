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
    <!-- Menu active-->
    <script>
        document.getElementById('adminStaff').classList.add('active');
    </script>
    <div class="row"><!-- row-->
        <!-- ajiltan nemeh-->
        <div class="col-xl-6 col-lg-12 mb-4"><!-- col start-->
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="mb-4">Шинэ ажилтан нэмэх</h5>

                    <form id="form" action="{{url('/admin/add_staff')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="inputAddress2">Овог</label>
                                    <input name="last_name" type="text" class="form-control" id="lname"
                                           placeholder="Овог" value="{{old('last_name')}}">
                                    <span id="lname_msg" style="color:red"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="inputAddress2">Нэр</label>
                                    <input name="name" type="text" class="form-control" id="fname" placeholder="Нэр" {{old('name')}}>
                                    <span id="fname_msg" style="color:red"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label>Хүйс сонгох</label>
                                <select name="sex" id="sex" class="form-control">
                                    @if(!empty(old('sex')))
                                        @if(old('sex')==0)
                                            <option value="0">Эр</option>
                                            <option value="1">Эм</option>
                                        @else
                                            <option value="1">Эм</option>
                                            <option value="0">Эр</option>
                                        @endif
                                    @else
                                        <option value="0">Эр</option>
                                        <option value="1">Эм</option>
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Төрсөн он сар</label>
                                <input name="birth_date" class="form-control datepicker" id="birth"
                                       placeholder="Төрсөн он сар" value="{{old('birth_date')}}">
                                <span id="date_msg" style="color:red"></span>
                            </div>
                        </div>

                        <br>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Цахим хаяг</label>
                                <input name="email" type="email" class="form-control" id="email" value="{{old('email')}}"
                                       placeholder="Цахим хаягаа оруулна уу">
                                <span id="email_msg" style="color:red"></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Регистрийн дугаар</label>
                                <input name="register" type="text" class="form-control" id="registernum"
                                       placeholder="Регистрийн дугаараа оруулна уу">
                                <span id="registernum_msg" style="color:red"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Утасны дугаар</label>
                            <input name="phone_number" type="text" class="form-control" id="phone"
                                   placeholder="Утасны дугаараа оруулна уу" value="{{old('phone_number')}}">
                            <span id="phone_msg" style="color:red"></span>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Гэрийн хаяг</label>
                            <input name="location" type="text" class="form-control" id="Address" value="{{old('location')}}"
                                   placeholder="Гэрийн хаягаа оруулна уу">
                            <span id="address_msg" style="color:red"></span>
                        </div>

                        <label for="inputState">Сонгох</label>
                        <select name="role" id="inputState" class="form-control">
                            <option selected>Мэргэжил сонгоно уу ...</option>
                            <option value="1">Ресепшн</option>
                            <option value="2">Эмч</option>
                            <option value="3">Сувилагч</option>
                            <option value="4">Нягтлан бодогч</option>
                            <option value="5">Бусад</option>
                        </select><br>

                        <textarea class="form-control" data-val="true" data-val-length="Maximum = 1000000 characters"
                                  data-val-length-max="100000" id="info" name="info" placeholder="Тайлбар">{{old('info')}}</textarea>
                        <br><br>
                        <h5 class="mb-12">Зураг оруулах</h5>

                        <input type="file" name="photo">


                        <div class="form-group row mb-0">
                            <div class="col-sm-10">
                                <br>
                                <br>
                                <button onclick="validate()" type="button" class="btn btn-primary mb-0">Ажилтан нэмэх
                                </button>
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
                        @foreach($roles as $role)
                            <tr>
                                <td>
                                    <p class="list-item-heading">
                                        <a href="{{url('/admin/add_staff/'.$role->staff->id.'/profile')}}">{{$role->staff->name}}</a>
                                    </p>
                                </td>
                                <td>
                                    <p class="text-muted">{{$role->staff->last_name}}</p>
                                </td>
                                <td>
                                    <p class="text-muted">@if($role->role_id ==1)
                                            Ресепшн
                                        @elseif($role->role_id ==2)
                                            Эмч
                                        @elseif($role->role_id ==3)
                                            Сувилагч
                                        @elseif($role->role_id ==4)
                                            Нягтлан бодогч
                                        @elseif($role->role_id ==0)
                                            Админ
                                        @else
                                            Бусад
                                        @endif</p>
                                </td>
                                <td>
                                    <p class="text-muted">{{$role->staff->phone_number}}</p>
                                </td>
                            </tr>
                        @endforeach

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
    <script src="{{asset('js/validation.js')}}"></script>
    <script>
        var i;
        var has = document.getElementById('registernum').value;
        var reg = "УП0024х1737"
        var reglet = ["А","Б","В","Г","Д","Е","Ё","Ж","З","И","Й","К","Л","М","Н","О","Ө","П","Р","С","Т","У","Ү","Ф","Х","Ц","Ч","Ш","Щ","Ь","Ы","Ъ","Э","Ю","Я"];
        var ssss = reg.split("");
        var hh = reg.slice(2, reg.length)
        var hhgg = parseInt(hh);
        var s = hhgg.toString();
        var phh = s.length;
        var sss = ssss[0].toString();
        var x =2;
        var y = 4;
        hghg = []
        console.log(phh)
        console.log(has.length)


        function helo(a){
            if(a === true){
                return true
            }
            else{
                return false
            }
        }

    </script>
@endsection
