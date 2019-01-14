<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dore jQuery</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{asset('font/iconsmind/style.css')}}" />
    <link rel="stylesheet" href="{{asset('font/simple-line-icons/css/simple-line-icons.css')}}" />

    <link rel="stylesheet" href="{{asset('css/vendor/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/vendor/bootstrap-float-label.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/main.css')}}" />
</head>

<body class="background show-spinner">
<div class="fixed-background"></div>
<main>
    <div class="container">
        <div class="row h-100">
            <div class="col-12 col-md-10 mx-auto my-auto">
                <div class="card auth-card">
                    <div class="position-relative image-side ">

                        <p class=" text-white h2">MonFamily</p>

                        <p class="white mb-0">
                            Please use your credentials to login.
                            <br>If you are not a member, please
                            <a href="#" class="white">register</a>.
                        </p>
                    </div>
                    <div class="form-side">
                        <a href="Dashboard.Default.html">
                            <span class="logo-single"></span>
                        </a>
                        <h6 class="mb-4">Нэвтрэх</h6>
                        <form method="post" action="{{url('login')}}">
                            @csrf
                            <label class="form-group has-float-label mb-4">
                                <input class="form-control" type="email" name="email"/>
                                <span>Цахим хаяг</span>
                            </label>

                            <label class="form-group has-float-label mb-4">
                                <input class="form-control" type="password" placeholder="" name="password"/>
                                <span>Нууц үг</span>
                            </label>
                            <div class="d-flex justify-content-between align-items-center">
                                <button class="btn btn-primary btn-lg btn-shadow" type="submit">НЭВТРЭХ</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="{{asset('js/vendor/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/vendor/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/dore.script.js')}}"></script>
<script src="{{asset('js/scripts.js')}}"></script>
</body>

</html>