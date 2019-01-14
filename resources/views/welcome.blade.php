@extends('layouts.app')
@section('header')
    {{--End css style gh met link file oruulna--}}
    @endsection
@section('menu')
    <li  class="active">
        <a href="{{url('/home')}}">
            <i class="iconsmind-Digital-Drawing"></i>
            <span>Самбар</span>
        </a>
    </li>
    <li>
        <a href="{{url('/workers')}}">
            <i class="simple-icon-people"></i> Ажилчид
        </a>
    </li>
    <li>
        <a href="{{url('/time')}}">
            <i class="simple-icon-clock"></i> Цаг
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
        <div class="col-md-9">
            <div class="card"></div>
        </div>
        <div class="col-md-3">
            <div class="card"></div>
        </div>
    </div>
    @endsection
@section('footer')
    {{--Scriptuudiig include hiiideg heseg--}}
    @endsection