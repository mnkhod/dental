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
        document.getElementById('adminStaff').classList.add('active');
    </script>
    <div class="row">
        <div class="col-md-3">
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
                            <a href="{{url('/admin/add_staff/fire/'.$user->id)}}"><button type="button" class="btn btn-sm btn-outline-primary ">Ажлаас гарсан</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-6">

                    <form method="post" action="{{url('/accountant/staff/date')}}">
                        @csrf

                        <div class="input-group">
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            <a href="#" onclick="$(this).closest('form').submit()" style="color: #8f8f8f">Хугацаа
                                өөрчлөн харах</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input id="date" name="start_date" autocomplete="off" class="form-control datepicker"
                                   style="background-color: #f8f8f8; border-color: #f8f8f8; border-bottom-color: #8f8f8f; color: #8f8f8f; padding: 0px"
                                   placeholder="Эхлэл"
                                   value="@if(!empty($start_date)){{date('m/d/Y', $start_date)}}@else{{date('m/d/Y', strtotime('-30 Days'))}}@endif">&nbsp;&nbsp;&nbsp;<span
                                    style="color: #8f8f8f">-&nbsp;&nbsp;&nbsp;</span>
                            <input name="end_date" autocomplete="off" class="form-control datepicker "
                                   style="background-color: #f8f8f8; border-color: #f8f8f8; border-bottom-color: #8f8f8f; color: #8f8f8f; padding: 0px"
                                   placeholder="Төгсгөл"
                                   value="@if(!empty($end_date)){{date('m/d/Y', $end_date)}}@else{{date('m/d/Y')}}@endif">
                            <input type="hidden" name="staff_id" value="{{$user->id}}">
                            <a href="#" onclick="$(this).closest('form').submit()" style="color: #8f8f8f">үзэх</a>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="text-right" style="color: #8f8f8f">
                        <form id="monthSearch" action="{{url('/accountant/staff/by_month')}}" method="post">
                            @csrf
                            Хугацаа өөрчлөн үзэх:
                            <select name="year">
                                @if(!empty($start_date))
                                    <option value="{{date('Y', $start_date)}}">{{date('Y', $start_date)}}</option>
                                    @for($m = 2019; $m<=2027; $m++)
                                        @if($m != date('Y', $start_date))
                                            <option value="{{$m}}">{{$m}}</option>
                                        @endif
                                    @endfor
                                @else
                                    <option value="{{date('Y')}}">{{date('Y')}}</option>
                                    @for($m = 2019; $m<=2027; $m++)
                                        @if($m != date('Y'))
                                            <option value="{{$m}}">{{$m}}</option>
                                        @endif
                                    @endfor
                                @endif
                            </select>
                            <input type="hidden" name="staff_id" value="{{$user->id}}">
                            <select name="month" onchange="document.getElementById('monthSearch').submit()">
                                @if(!empty($start_date))
                                    <option value="{{date('m', $start_date)}}">{{date('m', $start_date)}}</option>
                                    @for($m = 1; $m<=12; $m++)
                                        @if($m != date('m', $start_date))
                                            <option value="{{$m}}">{{$m}}</option>
                                        @endif
                                    @endfor
                                @else
                                    <option value="{{date('m')}}">{{date('m')}}</option>
                                    @for($m = 1; $m<=12; $m++)
                                        @if($m != date('m'))
                                            <option value="{{$m}}">{{$m}}</option>
                                        @endif
                                    @endfor
                                @endif
                            </select>
                        </form>
                        <br>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-5 scroll" style=" height: 600px;">
                    <?php $sum=0;?>
                    <?php $users=0;?>
                    @if($user->role->role_id == 2)
                        @foreach($shifts as $shift)
                            @foreach($shift->checkins->where('state', 3) as $check_in)
                                <?php $users++;?>
                                <div class="col-md-12">

                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <a href="#">
                                                    <div class="d-flex flex-row mb-3 pb-3 border-bottom">
                                                        <div class="pl-3 pr-2">
                                                            {{--<a href="#">--}}
                                                            <p class="font-weight-medium mb-0 ">{{$check_in->user->name}}</p>
                                                            <p class="text-muted mb-0 text-small"> {{$check_in->shift->date}} өдөр хийгдсэн эмчилгээ</p>
                                                            {{--</a>--}}
                                                        </div>
                                                    </div>

                                                </a>
                                            </h5>
                                            <table class="table table-sm table-borderless">
                                                <?php
                                                $treatments = \App\UserTreatments::all()->where('checkin_id',$check_in->id)
                                                ?>
                                                <?php $total = 0;
                                                ?>
                                                <tbody>
                                                @foreach($treatments as $treatment)
                                                    <tr>
                                                        <td>
                                                            <span class="log-indicator border-theme-2 align-middle"></span>
                                                        </td>
                                                        <td>
                                                            <span class="font-weight-medium">{{$treatment->treatment->name}}</span>
                                                        </td>
                                                        <td class="text-right">
                                    <span class="text-muted">
                                            {{$treatment->treatment->price}}₮
                                            <?php /** @var TYPE_NAME $total */
                                            $total = $total + $treatment->price?>
                                       </span>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                            </table>
                                            <?php $transaction = \App\Transaction::where('type', 4)->where('type_id', $check_in->id)->first(); ?>
                                            @if(!empty(\App\UserPromotions::where('transaction_id', $transaction->id)->first()))
                                                <?php $relation = \App\UserPromotions::where('transaction_id', $transaction->id)->first();?>
                                                <?php $promotion = \App\Promotion::where('id', $relation->promotion_id)->first();?>
                                                <span class="badge badge-pill badge-secondary">Хямдарсан {{$promotion->percentage}}% {{$promotion->promotion_name}} </span>
                                                <br>
                                            @endif
                                            <span class="badge badge-pill badge-primary">Нийт зарцуулсан {{\App\Transaction::where('type', 4)->where('type_id', $check_in->id)->first()->price}}₮</span>
                                            <?php $total = \App\Transaction::where('type', 4)->where('type_id', $check_in->id)->first()->price;?>
                                            <?php $sum = $sum + $total ?>
                                        </div>
                                    </div>
                                </div>
                                <br>
                            @endforeach
                        @endforeach

                    @elseif($user->role->role_id == 3)

                        @foreach($checkins->where('state', 3) as $check_in)
                            <?php $users++;?>
                            <div class="col-md-12">

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <a href="#">
                                                <div class="d-flex flex-row mb-3 pb-3 border-bottom">

                                                    <div class="pl-3 pr-2">
                                                        {{--<a href="#">--}}
                                                        <p class="font-weight-medium mb-0 ">{{$check_in->user->name}}</p>
                                                        <p class="text-muted mb-0 text-small"> {{$check_in->shift->date}} өдөр хийгдсэн эмчилгээ</p>
                                                        {{--</a>--}}
                                                    </div>
                                                </div>

                                            </a>
                                        </h5>
                                        <table class="table table-sm table-borderless">
                                            <?php
                                            $treatments = \App\UserTreatments::all()->where('checkin_id',$check_in->id)
                                            ?>
                                            <?php $total = 0;
                                            ?>
                                            <tbody>
                                            @foreach($treatments as $treatment)
                                                <tr>
                                                    <td>
                                                        <span class="log-indicator border-theme-2 align-middle"></span>
                                                    </td>
                                                    <td>
                                                        <span class="font-weight-medium">{{$treatment->treatment->name}}</span>
                                                    </td>
                                                    <td class="text-right">
                                    <span class="text-muted">
                                            {{$treatment->treatment->price}}₮
                                            <?php /** @var TYPE_NAME $total */
                                            $total = $total + $treatment->price?>
                                       </span>
                                                    </td>
                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                        <?php $transaction = \App\Transaction::where('type', 4)->where('type_id', $check_in->id)->first(); ?>
                                        @if(!empty(\App\UserPromotions::where('transaction_id', $transaction->id)->first()))
                                            <?php $relation = \App\UserPromotions::where('transaction_id', $transaction->id)->first();?>
                                            <?php $promotion = \App\Promotion::where('id', $relation->promotion_id)->first();?>
                                            <span class="badge badge-pill badge-secondary">Хямдарсан {{$promotion->percentage}}% {{$promotion->promotion_name}} </span>
                                            <br>
                                        @endif
                                        <span class="badge badge-pill badge-primary">Нийт зарцуулсан {{\App\Transaction::where('type', 4)->where('type_id', $check_in->id)->first()->price}}₮</span>
                                        <?php $total = \App\Transaction::where('type', 4)->where('type_id', $check_in->id)->first()->price;?>
                                        <?php $sum = $sum + $total ?>
                                    </div>
                                </div>
                            </div>
                            <br>
                        @endforeach
                    @else

                    @endif
                </div>
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body text-center">
                                    <h4>
                                        <b>{{$sum}}₮</b>
                                    </h4>
                                    <h5>орлого</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body text-center">
                                    <h4>
                                        <b>{{$users}} хүн</b>
                                    </h4>
                                    <h5>үйлчлүүлсэн</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    @if($user->role->role_id == 2)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>Өдөр</th>
                                                <th>Ээлж</th>
                                                <th>Үүсгэсэн</th>
                                                <th>Үүсгэсэн хугацаа</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($shifts as $shift)
                                                <tr>
                                                    <td>{{$shift->date}}</td>
                                                    <td>
                                                        @if($shift->shift_id == 0)
                                                            Өглөөний ээлж
                                                        @elseif($shift->shift_id == 1)
                                                            Оройн ээлж
                                                        @else
                                                            Бүтэн ээлж
                                                        @endif
                                                    </td>
                                                    <td>{{$shift->createdby->name}}</td>
                                                    <td>{{$shift->created_at}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>


                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endif
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