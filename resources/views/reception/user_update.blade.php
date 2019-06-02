@extends('layouts.reception')
@section('header')
    <link rel="stylesheet" href="{{asset('css/vendor/fullcalendar.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/vendor/dataTables.bootstrap4.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/vendor/datatables.responsive.bootstrap4.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/vendor/select2.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/vendor/owl.carousel.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/vendor/bootstrap-stars.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/vendor/nouislider.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/vendor/bootstrap-datepicker3.min.css')}}"/>

    <style>
        .hidden {
            opacity: 0;
            background-color: white;
            border: 0px;
        }

        .hidden:hover, .hidden:focus {
            opacity: 0.2;
            background-color: #8f8f8f;
        }

    </style>
    {{--End css style gh met link file oruulna--}}
@endsection

@section('content')
    <script>document.getElementById('receptionUser').classList.add('active');</script>
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

                            <p class="text-muted text-small mb-2">Гэрийн хаяг</p>

                            <p class="mb-3">
                                {{$user->location}}
                            </p>

                            <p class="text-muted text-small mb-2">Тайлбар</p>
                            <p class="mb-3">
                                @if($user->description == '')
                                    Тайлбар байхгүй
                                @else
                                    {{$user->description}}
                                @endif
                            </p>
                            <a href="{{url('reception/user_check/'.$user->id.'/update')}}"><button class="btn btn-primary">засах</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>div.ex1 {


                height: 400px;
                overflow: scroll;
            }</style>
       <div class="col-md-8">
           <div class="card mb-4">
               <div class="card-body">
                   <h5 class="mb-4">Шинэ үйлчлүүлэгч нэмэх</h5>
                   @if ($errors->any())
                       <div class="alert alert-danger">
                           <ul>
                               @foreach ($errors->all() as $error)
                                   <li>{{ $error }}</li>
                               @endforeach
                           </ul>
                       </div>
                   @endif

                   <form action="{{url('/reception/user/update')}}" method="post" id="form">
                       @csrf
                       <div class="form-row">
                           <div class="col-md-12">
                               <div class="form-group">
                                   <label for="inputAddress2">Овог</label>
                                   <input name="last_name" type="text" class="form-control" id="lname" placeholder="Овог" value="{{$user->last_name}}">
                                   <span id="lname_msg" style="color:red"></span>
                               </div>
                           </div>
                           <div class="col-md-12">
                               <div class="form-group">
                                   <label for="inputAddress2">Нэр</label>
                                   <input name="name" type="text" class="form-control" id="fname" placeholder="Нэр" value="{{$user->name}}">
                                   <span id="fname_msg" style="color:red"></span>
                               </div>
                           </div>
                       </div>

                       <div class="form-row">
                           <div class="col-md-6">
                               <label>Хүйс сонгох</label>
                               <select name="sex" id="inputState" class="form-control">
                                   @if(!empty($user->sex))
                                       @if($user->sex==0)
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
                               <input name="birth_date" autocomplete="off" class="form-control datepicker"
                                      id = "birth" placeholder="Төрсөн он сар" value="{{date( 'm/d/Y',strtotime($user->birth_date))}}">
                               <span id="date_msg" style="color:red"></span>
                           </div>
                       </div>

                       <br>

                       <div class="form-row">
                           <div class="form-group col-md-6">
                               <label for="inputEmail4">Цахим хаяг</label>
                               <input name="email" type="email" class="form-control" id="email"
                                      placeholder="Цахим хаягаа оруулна уу" value="{{$user->email}}">
                               <span id="email_msg" style="color:red"></span>
                           </div>
                           <div class="form-group col-md-6">
                               <label for="inputPassword4">Регистрийн дугаар</label>
                               <input name="register" type="text" class="form-control" id="registernum"
                                      placeholder="Регистрийн дугаараа оруулна уу" value="{{$user->register}}">
                               <span id="registernum_msg" style="color:red"></span>
                           </div>
                       </div>
                       <div class="form-group">
                           <label for="inputAddress">Утасны дугаар</label>
                           <input name="phone_number" type="text" class="form-control" id="phone" placeholder="Утасны дугаараа оруулна уу"
                                   value="{{$user->phone_number}}">
                           <span id="phone_msg" style="color:red"></span>
                       </div>
                       <div class="form-group">
                           <label for="inputAddress2">Гэрийн хаяг</label>
                           <input name="location" type="text" class="form-control" id="Address" placeholder="Гэрийн хаягаа оруулна уу" value="{{$user->location}}">
                           <span id="address_msg" style="color:red"></span>
                       </div>

                       <label for="inputState">Тайлбар</label>

                       <textarea class="form-control" data-val="true" data-val-length="Maximum = 1000000 characters" data-val-length-max="100000" id="info" name="info"  placeholder="Тайлбар">{{$user->desciption}}</textarea>


                       <div class="form-group row mb-0">
                           <div class="col-sm-10">
                               <br>
                               <button onclick="validate()" type="button" class="btn btn-primary mb-0">Засах</button>
                           </div>
                       </div>
                       <input type="hidden" name="user_id" value="{{$user->id}}">
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