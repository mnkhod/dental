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
        <div class="col-md-3">
            <div class="card mb-4">
                <div class="card-body">
                    <form method="post" action="">
                        <div class="row">
                            <h3 class="mb-3">Цагийн хуваарь</h3>

                            <select class="form-control mb-3">
                                <option>1/14</option>
                                <option>1/15</option>
                                <option>1/16</option>
                                <option>1/17</option>
                                <option>1/18</option>
                                <option>1/19</option>
                                <option>1/20</option>
                            </select>

                            <select class="form-control mb-3">
                                <option>Доржоо</option>
                                <option>Батаа</option>
                            </select>
                            <select class="form-control mb-3">
                                <option>Өдрийн ээлж</option>
                                <option>Оройн ээлж</option>
                                <option>Бүтэн өдөр</option>
                            </select>
                            <button class="btn btn-primary btn-block">Оруулах</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <table class="table text-center">
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
                        <tr>
                            <th rowspan="2">Доржоо</th>
                            <td style="background-color: #8f8f8f"></td>
                            <td style="background-color: #8f8f8f"></td>
                            <td style="background-color: #8f8f8f"></td>
                            <td style="background-color: #8f8f8f"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="background-color: #8f8f8f"></td>
                            <td style="background-color: #8f8f8f"></td>
                            <td style="background-color: #8f8f8f"></td>
                        </tr>
                        <tr>
                            <th rowspan="2">Батаа</th>
                            <td style="background-color: #8f8f8f"></td>
                            <td></td>
                            <td></td>
                            <td style="background-color: #8f8f8f"></td>
                            <td style="background-color: #8f8f8f"></td>
                            <td style="background-color: #8f8f8f"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="background-color: #8f8f8f"></td>
                            <td></td>
                            <td style="background-color: #8f8f8f"></td>
                            <td></td>
                            <td style="background-color: #8f8f8f"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th rowspan="2">Намжаа</th>
                            <td style="background-color: #8f8f8f"></td>
                            <td style="background-color: #8f8f8f"></td>
                            <td></td>
                            <td style="background-color: #8f8f8f"></td>
                            <td></td>
                            <td></td>
                            <td style="background-color: #8f8f8f"></td>
                        </tr>
                        <tr>
                            <td style="background-color: #8f8f8f"></td>
                            <td style="background-color: #8f8f8f"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th rowspan="2">Алимаа</th>
                            <td style="background-color: #8f8f8f"></td>
                            <td></td>
                            <td style="background-color: #8f8f8f"></td>
                            <td></td>
                            <td style="background-color: #8f8f8f"></td>
                            <td></td>
                            <td style="background-color: #8f8f8f"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="background-color: #8f8f8f"></td>
                            <td></td>
                            <td style="background-color: #8f8f8f"></td>
                            <td style="background-color: #8f8f8f"></td>
                            <td></td>
                            <td style="background-color: #8f8f8f"></td>
                        </tr>
                        <tr>
                            <th rowspan="2">Навчаа</th>
                            <td style="background-color: #8f8f8f"></td>
                            <td></td>
                            <td style="background-color: #8f8f8f"></td>
                            <td></td>
                            <td style="background-color: #8f8f8f"></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="background-color: #8f8f8f"></td>
                            <td></td>
                            <td style="background-color: #8f8f8f"></td>
                            <td></td>
                            <td></td>
                            <td style="background-color: #8f8f8f"></td>
                            <td style="background-color: #8f8f8f"></td>
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