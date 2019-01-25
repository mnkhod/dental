@extends('layouts.app')
@section('header')
    {{--End css style gh met link file oruulna--}}
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
    <li class="active">
        <a href="{{url('/admin/time')}}">
            <i class="iconsmind-Alarm"></i> Цаг
        </a>
    </li>
    <li>
        <a href="{{url('/admin/product')}}">
            <i class="iconsmind-Medicine-2"></i> Материал
        </a>
    </li>
    <li>
        <a href="{{url('/admin/transaction')}}">
            <i class="iconsmind-Space-Needle"></i> Санхүү
        </a>
    </li>
@endsection
@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-responsive text-center">
                        <tr>
                            <th>Эмч</th>
                            <th>{{date('Y-m-d')}}</th>
                            <th>{{date('Y-m-d', strtotime("+1 Days"))}}</th>
                            <th>{{date('Y-m-d', strtotime("+2 Days"))}}</th>
                            <th>{{date('Y-m-d', strtotime("+3 Days"))}}</th>
                            <th>{{date('Y-m-d', strtotime("+4 Days"))}}</th>
                            <th>{{date('Y-m-d', strtotime("+5 Days"))}}</th>
                            <th>{{date('Y-m-d', strtotime("+6 Days"))}}</th>
                        </tr>
                        @foreach($doctors as $doctor)
                            <tr>
                                <th rowspan="2"><br><br><br>
                                    {{$doctor->staff->name}}</th>
                                @for($i = 0; $i < 7; $i++)
                                    <?php $time = $shifts->where('date', date('Y-m-d', strtotime('+' . $i . ' Days')))->where('doctor_id', $doctor->staff->id)->where('shift_id', 0)->first(); ?>
                                    @if($time)
                                        <td>
                                            <button class="btn btn-primary">Өглөөний ээлж<br><span class="text-right" style="font-size: 10px">8 хүн захиалсан</span></button>
                                        </td>
                                        @else
                                        <td>
                                            <a href="{{url('/admin/time/'.$i.'/'.$doctor->staff->id.'/0')}}">
                                                <button class="btn btn-light">Тавигдаагүй<br><span class="text-right" style="font-size: 10px">ээлж тавих</span></button>
                                            </a>
                                        </td>
                                        @endif
                                @endfor
                            </tr>
                            <tr>
                                @for($i = 0; $i < 7; $i++)
                                    <?php $time = $shifts->where('date', date('Y-m-d', strtotime('+' . $i . ' Days')))->where('doctor_id', $doctor->staff->id)->where('shift_id', 1)->first(); ?>
                                    @if($time)
                                        <td>
                                            <button class="btn btn-success">Оройний ээлж<br><span class="text-right" style="font-size: 10px">8 хүн захиалсан</span></button>
                                        </td>
                                    @else
                                        <td>
                                            <a href="{{url('/admin/time/'.$i.'/'.$doctor->staff->id.'/1')}}">
                                                <button class="btn btn-light">Тавигдаагүй<br><span class="text-right" style="font-size: 10px">ээлж тавих</span></button>
                                            </a>
                                        </td>
                                    @endif
                                @endfor

                            </tr>
                        @endforeach


                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('footer')
    {{--Scriptuudiig include hiiideg heseg--}}
@endsection