<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>MonFamily</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{--<link rel="stylesheet" href="{{asset('font/iconsmind/style.css')}}" />--}}
    {{--<link rel="stylesheet" href="{{asset('font/simple-line-icons/css/simple-line-icons.css')}}" />--}}

    {{--<link rel="stylesheet" href="{{asset('css/vendor/bootstrap.min.css')}}" />--}}
    {{--<link rel="stylesheet" href="{{asset('css/vendor/perfect-scrollbar.css')}}" />--}}
    {{--<link rel="stylesheet" href="{{asset('css/main.css')}}" />--}}
    {{--<link rel="stylesheet" href="{{asset('css/dore.light.blue.min.css')}}" />--}}
    <link rel="stylesheet" href="{{asset('font/iconsmind/style.css')}}" />
    <link rel="stylesheet" href="{{asset('font/simple-line-icons/css/simple-line-icons.css')}}" />

    <link rel="stylesheet" href="{{asset('css/vendor/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/vendor/perfect-scrollbar.css')}}" />
    <link rel="stylesheet" href="{{asset('css/main.css')}}" />
    <link rel="stylesheet" href="{{asset('css/dore.light.orange.min.css')}}" />
    @yield('header')
</head>

<body id="app-container" class="menu-hidden show-spinner">
<nav class="navbar fixed-top">
    <div class="d-flex align-items-center navbar-left">
        <a href="#" class="menu-button d-none d-md-block">
            <svg class="main" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 17">
                <rect x="0.48" y="0.5" width="7" height="1" />
                <rect x="0.48" y="7.5" width="7" height="1" />
                <rect x="0.48" y="15.5" width="7" height="1" />
            </svg>
            <svg class="sub" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 17">
                <rect x="1.56" y="0.5" width="16" height="1" />
                <rect x="1.56" y="7.5" width="16" height="1" />
                <rect x="1.56" y="15.5" width="16" height="1" />
            </svg>
        </a>

        <a href="#" class="menu-button-mobile d-xs-block d-sm-block d-md-none">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 17">
                <rect x="0.5" y="0.5" width="25" height="1" />
                <rect x="0.5" y="7.5" width="25" height="1" />
                <rect x="0.5" y="15.5" width="25" height="1" />
            </svg>
        </a>

        {{--Search box--}}


        {{--<div class="search">--}}
            {{--<form action="{{url('/reception/search')}}" method="get" role="search">--}}
                {{--@csrf--}}
                {{--<input placeholder="Хайх..." name="key" autocomplete="off">--}}
                {{--<span class="search-icon">--}}
                    {{--<i class="simple-icon-magnifier"></i>--}}
                {{--</span>--}}
            {{--</form>--}}
        {{--</div>--}}

    </div>


    <a class="navbar-logo">
        <span class="d-none d-xs-block"><img style="width: 100%; height: auto;max-width: 100px;" src="{{asset('img/logo-black.png')}}"></span>
        <span class="logo-mobile d-block d-xs-none"></span>
    </a>

    <div class="navbar-right">
        <div class="header-icons d-inline-block align-middle">
            {{--<a class="btn btn-sm btn-outline-primary mr-2 d-none d-md-inline-block mb-2" href="https://1.envato.market/5kAb">&nbsp;BUY&nbsp;</a>--}}
        </div>

        <div class="user d-inline-block">
            <button class="btn btn-empty p-0" type="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                <span class="name">{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
            </button>

            <div class="dropdown-menu dropdown-menu-right mt-3">
                <a class="dropdown-item" href="{{url('/logout')}}">Гарах</a>
            </div>
        </div>
    </div>
</nav>
<div class="sidebar">
    <div class="main-menu">
        <div class="scroll">
            <ul class="list-unstyled">
                <li id="doctorDashboard">
                    <a href="{{url('/doctor/dashboard')}}">
                        <i class="iconsmind-Digital-Drawing"></i> Самбар
                    </a>
                </li>
                <li id="doctorTreatment">
                    <a href="{{url('/doctor')}}">
                        <i class="iconsmind-Nurse"></i> Эмчилгээ
                    </a>
                </li>
                <li>
                    <a href="{{url('/logout')}}">
                        <i class="iconsmind-Power"></i> Гарах
                    </a>
                </li>

            </ul>
        </div>
    </div>


</div>
<main>
    <div class="container-fluid">
        @yield('content')
    </div>
</main>
{{--<script src="{{asset('js/vendor/jquery-3.3.1.min.js')}}"></script>--}}
{{--<script src="{{asset('js/vendor/bootstrap.bundle.min.js')}}"></script>--}}
{{--<script src="{{asset('js/vendor/perfect-scrollbar.min.js')}}"></script>--}}
{{--<script src="{{asset('js/vendor/mousetrap.min.js')}}"></script>--}}
{{--<script src="{{asset('js/dore.script.js')}}"></script>--}}
{{--<script src="{{asset('js/scripts.single.theme.js')}}"></script>--}}
<script src="{{asset('js/vendor/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/vendor/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/vendor/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('js/vendor/mousetrap.min.js')}}"></script>
@yield('footer')
<script src="{{asset('js/dore.script.js')}}"></script>
<script src="{{asset('js/scripts.single.theme.js')}}"></script>
</body>

</html>