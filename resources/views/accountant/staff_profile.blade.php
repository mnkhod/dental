@extends('layouts.accountant')
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
        document.getElementById('accountantStaff').classList.add('active');
    </script>
    <div class="row">
        <div class="col-md-4">
            <div class="card ">
                <div class="card-body">
                    <div class="text-center">
                        @if($user->photos->first() == '')
                            Зураггүй
                        @else
                            <img width="200px" style="border-radius: 100%"
                                 src="{{asset('/img/uploads/'.$user->photos->first()->path)}}">
                        @endif
                        <br>
                        <br>
                        <p class="list-item-heading mb-1">
                        <h3>{{$user->name}} {{$user->last_name}}</h3></p>
                        <div class="text-center">
                            <p class="text-muted text-small mb-2">Утасны дугаар</p>
                            <p class="mb-3">
                                {{$user->phone_number}}
                            </p>
                            <p class="text-muted text-small mb-2">Цахим хаяг</p>
                            <p class="mb-3">
                                {{$user->email}}
                            </p>
                            <p class="text-muted text-small mb-2">Мэргэжил</p>
                            <p class="mb-3">
                                @if($user->role->role_id == 0)
                                    Админ
                                @elseif($user->role->role_id == 1)
                                    Ресепшн
                                @elseif($user->role->role_id == 2)
                                    Эмч
                                @elseif($user->role->role_id == 3)
                                    Сувилагч
                                @elseif($user->role->role_id == 4)
                                    Нягтлан
                                @else
                                    Бусад
                                @endif
                            </p>
                            <p class="text-muted text-small mb-2">Тайлбар</p>
                            <p class="mb-3">
                                {{$user->description}}
                            </p>
                            @if($user->role->state == 0)
                                Халагдсан
                            @else
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-8">


            <div class="row">
                <div class="col-md-6 col-lg-6 mb-4">
                    <div class="card dashboard-link-list">
                        <div class="card-body">
                            <h5 class="card-title">Хугацаа сонгох</h5>
                            <div class="d-flex flex-row">
                                <div class="form-group mb-3">

                                    <div class="input-daterange input-group" id="datepicker">
                                        <input type="text" class="input-sm form-control" name="start"
                                               placeholder="Эхлэх"/>
                                        <span class="input-group-addon"></span>
                                        <input type="text" class="input-sm form-control" name="end"
                                               placeholder="Төгсөх"/>
                                    </div>
                                </div>

                            </div>
                            <a href="#" class="card">
                                <div class="card-body text-center">
                                    <i class="iconsmind-Money-2"></i>
                                    <p class="card-text mb-0">Эдгээр саруудын орлого</p>
                                    <p class="lead text-center">16</p>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
                <div class="col-md-6">

                </div>




        </div>

    </div>

    </div>

    </div><!-- row -->
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