@extends('layouts.app')
@section('header')
    {{--End css style gh met link file oruulna--}}
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
            <i class="iconsmind-Space-Needle"></i> Тайлан
        </a>
    </li>
@endsection
@section('content')



@endsection
@section('footer')
    {{--Scriptuudiig include hiiideg heseg--}}
@endsection