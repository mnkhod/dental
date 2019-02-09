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



@endsection
@section('footer')
    {{--Scriptuudiig include hiiideg heseg--}}
@endsection