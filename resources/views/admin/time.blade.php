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
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-responsive text-center">
                        <tr>
                            <th>Эмч</th>
                            <th>1/14</th>
                            <th>1/15</th>
                            <th>1/16</th>
                            <th>1/17</th>
                            <th>1/18</th>
                            <th>1/19</th>
                            <th>1/20</th>
                        </tr>
                        @foreach($doctors as $doctor)
                        <tr style="border-color: black">
                            <th rowspan="2"><br><br>
                                {{$doctor->staff->name}}</th>
                            <td><button class="btn btn-primary">Өглөөний ээлж<br><span class="text-right" style="font-size: 10px">8 хүн захиалсан</span></button></td>
                            <td><button class="btn btn-primary">Өглөөний ээлж<br><span class="text-right" style="font-size: 10px">8 хүн захиалсан</span></button></td>
                            <td><button class="btn btn-primary">Өглөөний ээлж<br><span class="text-right" style="font-size: 10px">8 хүн захиалсан</span></button></td>
                            <td><button class="btn btn-primary">Өглөөний ээлж<br><span class="text-right" style="font-size: 10px">8 хүн захиалсан</span></button></td>
                            <td><button class="btn btn-primary">Өглөөний ээлж<br><span class="text-right" style="font-size: 10px">8 хүн захиалсан</span></button></td>
                            <td><button class="btn btn-primary">Өглөөний ээлж<br><span class="text-right" style="font-size: 10px">8 хүн захиалсан</span></button></td>
                            <td><button class="btn btn-primary">Өглөөний ээлж<br><span class="text-right" style="font-size: 10px">8 хүн захиалсан</span></button></td>
                        </tr>
                        @endforeach
                        <tr>
                            <td><button class="btn btn-success">Оройний ээлж<br><span class="text-right" style="font-size: 10px">8 хүн захиалсан</span></button></td>
                            <td><button class="btn btn-light">Тавигдаагүй<br><span class="text-right" style="font-size: 10px">ээлж тавих</span></button></td>
                            <td><button class="btn btn-light">Тавигдаагүй<br><span class="text-right" style="font-size: 10px">ээлж тавих</span></button></td>
                            <td><button class="btn btn-light">Тавигдаагүй<br><span class="text-right" style="font-size: 10px">ээлж тавих</span></button></td>
                            <td><button class="btn btn-light">Тавигдаагүй<br><span class="text-right" style="font-size: 10px">ээлж тавих</span></button></td>
                            <td><button class="btn btn-light">Тавигдаагүй<br><span class="text-right" style="font-size: 10px">ээлж тавих</span></button></td>
                            <td><button class="btn btn-light">Тавигдаагүй<br><span class="text-right" style="font-size: 10px">ээлж тавих</span></button></td>
                        </tr>
                        <tr>
                            <th rowspan="2"><br><br>Доржнадминжав</th>
                            <td><button class="btn btn-primary">Өглөөний ээлж<br><span class="text-right" style="font-size: 10px">8 хүн захиалсан</span></button></td>
                            <td><button class="btn btn-primary">Өглөөний ээлж<br><span class="text-right" style="font-size: 10px">8 хүн захиалсан</span></button></td>
                            <td><button class="btn btn-primary">Өглөөний ээлж<br><span class="text-right" style="font-size: 10px">8 хүн захиалсан</span></button></td>
                            <td><button class="btn btn-light">Тавигдаагүй<br><span class="text-right" style="font-size: 10px">ээлж тавих</span></button></td>
                            <td><button class="btn btn-light">Тавигдаагүй<br><span class="text-right" style="font-size: 10px">ээлж тавих</span></button></td>
                            <td><button class="btn btn-light">Тавигдаагүй<br><span class="text-right" style="font-size: 10px">ээлж тавих</span></button></td>
                            <td><button class="btn btn-primary">Өглөөний ээлж<br><span class="text-right" style="font-size: 10px">8 хүн захиалсан</span></button></td>
                        </tr>
                        <tr>
                            <td><button class="btn btn-success">Оройний ээлж<br><span class="text-right" style="font-size: 10px">8 хүн захиалсан</span></button></td>
                            <td><button class="btn btn-light">Тавигдаагүй<br><span class="text-right" style="font-size: 10px">ээлж тавих</span></button></td>
                            <td><button class="btn btn-light">Тавигдаагүй<br><span class="text-right" style="font-size: 10px">ээлж тавих</span></button></td>
                            <td><button class="btn btn-light">Тавигдаагүй<br><span class="text-right" style="font-size: 10px">ээлж тавих</span></button></td>
                            <td><button class="btn btn-success">Оройний ээлж<br><span class="text-right" style="font-size: 10px">8 хүн захиалсан</span></button></td>
                            <td><button class="btn btn-success">Оройний ээлж<br><span class="text-right" style="font-size: 10px">8 хүн захиалсан</span></button></td>
                            <td><button class="btn btn-light">Тавигдаагүй<br><span class="text-right" style="font-size: 10px">ээлж тавих</span></button></td>
                        </tr>
                        <tr>
                            <th rowspan="2"><br><br>Доржнадминжав</th>
                            <td><button class="btn btn-light">Тавигдаагүй<br><span class="text-right" style="font-size: 10px">ээлж тавих</span></button></td>
                            <td><button class="btn btn-primary">Өглөөний ээлж<br><span class="text-right" style="font-size: 10px">8 хүн захиалсан</span></button></td>
                            <td><button class="btn btn-light">Тавигдаагүй<br><span class="text-right" style="font-size: 10px">ээлж тавих</span></button></td>
                            <td><button class="btn btn-primary">Өглөөний ээлж<br><span class="text-right" style="font-size: 10px">8 хүн захиалсан</span></button></td>
                            <td><button class="btn btn-light">Тавигдаагүй<br><span class="text-right" style="font-size: 10px">ээлж тавих</span></button></td>
                            <td><button class="btn btn-primary">Өглөөний ээлж<br><span class="text-right" style="font-size: 10px">8 хүн захиалсан</span></button></td>
                            <td><button class="btn btn-primary">Өглөөний ээлж<br><span class="text-right" style="font-size: 10px">8 хүн захиалсан</span></button></td>
                        </tr>
                        <tr>
                            <td><button class="btn btn-success">Оройний ээлж<br><span class="text-right" style="font-size: 10px">8 хүн захиалсан</span></button></td>
                            <td><button class="btn btn-light">Тавигдаагүй<br><span class="text-right" style="font-size: 10px">ээлж тавих</span></button></td>
                            <td><button class="btn btn-light">Тавигдаагүй<br><span class="text-right" style="font-size: 10px">ээлж тавих</span></button></td>
                            <td><button class="btn btn-light">Тавигдаагүй<br><span class="text-right" style="font-size: 10px">ээлж тавих</span></button></td>
                            <td><button class="btn btn-light">Тавигдаагүй<br><span class="text-right" style="font-size: 10px">ээлж тавих</span></button></td>
                            <td><button class="btn btn-light">Тавигдаагүй<br><span class="text-right" style="font-size: 10px">ээлж тавих</span></button></td>
                            <td><button class="btn btn-light">Тавигдаагүй<br><span class="text-right" style="font-size: 10px">ээлж тавих</span></button></td>
                        </tr>
                        <tr>
                            <th rowspan="2"><br><br>Доржнадминжав</th>
                            <td><button class="btn btn-light">Тавигдаагүй<br><span class="text-right" style="font-size: 10px">ээлж тавих</span></button></td>
                            <td><button class="btn btn-primary">Өглөөний ээлж<br><span class="text-right" style="font-size: 10px">8 хүн захиалсан</span></button></td>
                            <td><button class="btn btn-light">Тавигдаагүй<br><span class="text-right" style="font-size: 10px">ээлж тавих</span></button></td>
                            <td><button class="btn btn-primary">Өглөөний ээлж<br><span class="text-right" style="font-size: 10px">8 хүн захиалсан</span></button></td>
                            <td><button class="btn btn-light">Тавигдаагүй<br><span class="text-right" style="font-size: 10px">ээлж тавих</span></button></td>
                            <td><button class="btn btn-primary">Өглөөний ээлж<br><span class="text-right" style="font-size: 10px">8 хүн захиалсан</span></button></td>
                            <td><button class="btn btn-primary">Өглөөний ээлж<br><span class="text-right" style="font-size: 10px">8 хүн захиалсан</span></button></td>
                        </tr>
                        <tr>
                            <td><button class="btn btn-success">Оройний ээлж<br><span class="text-right" style="font-size: 10px">8 хүн захиалсан</span></button></td>
                            <td><button class="btn btn-light">Тавигдаагүй<br><span class="text-right" style="font-size: 10px">ээлж тавих</span></button></td>
                            <td><button class="btn btn-light">Тавигдаагүй<br><span class="text-right" style="font-size: 10px">ээлж тавих</span></button></td>
                            <td><button class="btn btn-light">Тавигдаагүй<br><span class="text-right" style="font-size: 10px">ээлж тавих</span></button></td>
                            <td><button class="btn btn-light">Тавигдаагүй<br><span class="text-right" style="font-size: 10px">ээлж тавих</span></button></td>
                            <td><button class="btn btn-light">Тавигдаагүй<br><span class="text-right" style="font-size: 10px">ээлж тавих</span></button></td>
                            <td><button class="btn btn-light">Тавигдаагүй<br><span class="text-right" style="font-size: 10px">ээлж тавих</span></button></td>
                        </tr>
                        <tr>
                            <th rowspan="2"><br><br>Доржнадминжав</th>
                            <td><button class="btn btn-light">Тавигдаагүй<br><span class="text-right" style="font-size: 10px">ээлж тавих</span></button></td>
                            <td><button class="btn btn-primary">Өглөөний ээлж<br><span class="text-right" style="font-size: 10px">8 хүн захиалсан</span></button></td>
                            <td><button class="btn btn-light">Тавигдаагүй<br><span class="text-right" style="font-size: 10px">ээлж тавих</span></button></td>
                            <td><button class="btn btn-primary">Өглөөний ээлж<br><span class="text-right" style="font-size: 10px">8 хүн захиалсан</span></button></td>
                            <td><button class="btn btn-light">Тавигдаагүй<br><span class="text-right" style="font-size: 10px">ээлж тавих</span></button></td>
                            <td><button class="btn btn-primary">Өглөөний ээлж<br><span class="text-right" style="font-size: 10px">8 хүн захиалсан</span></button></td>
                            <td><button class="btn btn-primary">Өглөөний ээлж<br><span class="text-right" style="font-size: 10px">8 хүн захиалсан</span></button></td>
                        </tr>
                        <tr>
                            <td><button class="btn btn-success">Оройний ээлж<br><span class="text-right" style="font-size: 10px">8 хүн захиалсан</span></button></td>
                            <td><button class="btn btn-light">Тавигдаагүй<br><span class="text-right" style="font-size: 10px">ээлж тавих</span></button></td>
                            <td><button class="btn btn-light">Тавигдаагүй<br><span class="text-right" style="font-size: 10px">ээлж тавих</span></button></td>
                            <td><button class="btn btn-light">Тавигдаагүй<br><span class="text-right" style="font-size: 10px">ээлж тавих</span></button></td>
                            <td><button class="btn btn-light">Тавигдаагүй<br><span class="text-right" style="font-size: 10px">ээлж тавих</span></button></td>
                            <td><button class="btn btn-light">Тавигдаагүй<br><span class="text-right" style="font-size: 10px">ээлж тавих</span></button></td>
                            <td><button class="btn btn-light">Тавигдаагүй<br><span class="text-right" style="font-size: 10px">ээлж тавих</span></button></td>
                        </tr>
                        <tr>
                            <th rowspan="2"><br><br>Доржнадминжав</th>
                            <td><button class="btn btn-light">Тавигдаагүй<br><span class="text-right" style="font-size: 10px">ээлж тавих</span></button></td>
                            <td><button class="btn btn-primary">Өглөөний ээлж<br><span class="text-right" style="font-size: 10px">8 хүн захиалсан</span></button></td>
                            <td><button class="btn btn-light">Тавигдаагүй<br><span class="text-right" style="font-size: 10px">ээлж тавих</span></button></td>
                            <td><button class="btn btn-primary">Өглөөний ээлж<br><span class="text-right" style="font-size: 10px">8 хүн захиалсан</span></button></td>
                            <td><button class="btn btn-light">Тавигдаагүй<br><span class="text-right" style="font-size: 10px">ээлж тавих</span></button></td>
                            <td><button class="btn btn-primary">Өглөөний ээлж<br><span class="text-right" style="font-size: 10px">8 хүн захиалсан</span></button></td>
                            <td><button class="btn btn-primary">Өглөөний ээлж<br><span class="text-right" style="font-size: 10px">8 хүн захиалсан</span></button></td>
                        </tr>
                        <tr>
                            <td><button class="btn btn-success">Оройний ээлж<br><span class="text-right" style="font-size: 10px">8 хүн захиалсан</span></button></td>
                            <td><button class="btn btn-light">Тавигдаагүй<br><span class="text-right" style="font-size: 10px">ээлж тавих</span></button></td>
                            <td><button class="btn btn-light">Тавигдаагүй<br><span class="text-right" style="font-size: 10px">ээлж тавих</span></button></td>
                            <td><button class="btn btn-light">Тавигдаагүй<br><span class="text-right" style="font-size: 10px">ээлж тавих</span></button></td>
                            <td><button class="btn btn-light">Тавигдаагүй<br><span class="text-right" style="font-size: 10px">ээлж тавих</span></button></td>
                            <td><button class="btn btn-light">Тавигдаагүй<br><span class="text-right" style="font-size: 10px">ээлж тавих</span></button></td>
                            <td><button class="btn btn-light">Тавигдаагүй<br><span class="text-right" style="font-size: 10px">ээлж тавих</span></button></td>
                        </tr>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('footer')
    {{--Scriptuudiig include hiiideg heseg--}}
@endsection