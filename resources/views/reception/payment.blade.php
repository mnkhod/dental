@extends('layouts.reception')
@section('header')
    <link rel="stylesheet" href="{{asset('css/vendor/fullcalendar.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/vendor/dataTables.bootstrap4.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/vendor/datatables.responsive.bootstrap4.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/vendor/select2.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/vendor/owl.carousel.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/vendor/bootstrap-stars.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/vendor/nouislider.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/vendor/bootstrap-datepicker3.min.css')}}"/>


    {{--End css style gh met link file oruulna--}}
@endsection
@section('content')
    <script>
        document.getElementById('receptionPayment').classList.add('active');
    </script>
        <div class="row">
            <div class="col-md-4"><!--profile heseg-->


                <div class="card "><!--row -->
                    <div class="card-body">
                        <a href="#">
                            <div class="d-flex flex-row mb-3 pb-3 border-bottom">
                                <a href="#">
                                    <img src="img/profile-pic-l.jpg" alt="Mayra Sibley" class="img-thumbnail border-0 rounded-circle list-thumbnail align-self-center xsmall" />
                                </a>
                                <div class="pl-3 pr-2">
                                    <a href="#">
                                        <p class="font-weight-medium mb-0 ">Эмч Цэцэг</p>
                                        <p class="text-muted mb-0 text-small">09.08.2018 өдөр хийгдсэн эмчилгээ</p>
                                    </a>
                                </div>
                            </div>

                        </a>
                        </h5>




                        <h5 class="card-title">Өвчтөний мэдээлэл</h5>
                        <div class="d-flex flex-row">
                            <div class="w-50">
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-1">
                                        <a ><b>Овог</b> </a>
                                    </li>
                                    <li class="mb-1">
                                        <a ><b>Нэр</b> </a>
                                    </li>
                                    <li class="mb-1">
                                        <a ><b>Хүйс</b> </a>
                                    </li>
                                    <li class="mb-1">
                                        <a ><b>Утасны дугаар</b> </a>
                                    </li>
                                    <li class="mb-1">
                                        <a ><b>Цахим хаяг</b> </a>
                                    </li>
                                    <li class="mb-1">
                                        <a ><b>Регистер</b> </a>
                                    </li>
                                    <li class="mb-1">
                                        <a ><b>Төрсөн он сар</b> </a>
                                    </li>

                                </ul>
                            </div>

                            <div class="w-50">
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-1">
                                        <a >Болд</a>
                                    </li>
                                    <li class="mb-1">
                                        <a >Цэцэг</a>
                                    </li>
                                    <li class="mb-1">
                                        <a >Эр</a>
                                    </li>
                                    <li class="mb-1">
                                        <a >89876767</a>
                                    </li>
                                    <li class="mb-1">
                                        <a >dd@gmail.com</a>
                                    </li>
                                    <li class="mb-1">
                                        <a >УП8725379</a>
                                    </li>
                                    <li class="mb-1">
                                        <a >02/04/2019</a>
                                    </li>


                                </ul>
                            </div>
                        </div>
                        <br>
                        <table class="table table-sm table-borderless">

                            <tbody>
                            <tr>
                                <td>
                                    <span class="log-indicator border-theme-2 align-middle"></span>
                                </td>
                                <td>
                                    <span class="font-weight-medium">Шүдний ломбо</span>
                                </td>
                                <td class="text-right">
                                    <span class="text-muted">500₮</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="log-indicator border-theme-2 align-middle"></span>
                                </td>
                                <td>
                                    <span class="font-weight-medium">Чулуу түүх</span>
                                </td>
                                <td class="text-right">
                                    <span class="text-muted">2000₮</span>
                                </td>
                            </tr>
                            </tbody>

                        </table>
                        <span class="badge badge-pill badge-primary">Нийт төлбөр 5000₮</span>
                        <br>
                        <br>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <form class="form-inline">
                                <label class="sr-only" for="inlineFormInputName2">Name</label>
                                <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2"
                                       placeholder="Урамшуулалын код">

                                <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>

                            </form>
                            <form class="form-inline">

                                <button type="submit" class="btn btn-sm btn-outline-primary mb-2">Төлбөр төлөх</button>
                            </form>
                        </div>


                    </div>

                </div>



            </div>
            <div class="col-md-4"><!--profile heseg-->


                <div class="card "><!--row -->
                    <div class="card-body">
                        <a href="#">
                            <div class="d-flex flex-row mb-3 pb-3 border-bottom">
                                <a href="#">
                                    <img src="img/profile-pic-l.jpg" alt="Mayra Sibley" class="img-thumbnail border-0 rounded-circle list-thumbnail align-self-center xsmall" />
                                </a>
                                <div class="pl-3 pr-2">
                                    <a href="#">
                                        <p class="font-weight-medium mb-0 ">Эмч Цэцэг</p>
                                        <p class="text-muted mb-0 text-small">09.08.2018 өдөр хийгдсэн эмчилгээ</p>
                                    </a>
                                </div>
                            </div>

                        </a>
                        </h5>




                        <h5 class="card-title">Өвчтөний мэдээлэл</h5>
                        <div class="d-flex flex-row">
                            <div class="w-50">
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-1">
                                        <a ><b>Овог</b> </a>
                                    </li>
                                    <li class="mb-1">
                                        <a ><b>Нэр</b> </a>
                                    </li>
                                    <li class="mb-1">
                                        <a ><b>Хүйс</b> </a>
                                    </li>
                                    <li class="mb-1">
                                        <a ><b>Утасны дугаар</b> </a>
                                    </li>
                                    <li class="mb-1">
                                        <a ><b>Цахим хаяг</b> </a>
                                    </li>
                                    <li class="mb-1">
                                        <a ><b>Регистер</b> </a>
                                    </li>
                                    <li class="mb-1">
                                        <a ><b>Төрсөн он сар</b> </a>
                                    </li>

                                </ul>
                            </div>

                            <div class="w-50">
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-1">
                                        <a >Болд</a>
                                    </li>
                                    <li class="mb-1">
                                        <a >Цэцэг</a>
                                    </li>
                                    <li class="mb-1">
                                        <a >Эр</a>
                                    </li>
                                    <li class="mb-1">
                                        <a >89876767</a>
                                    </li>
                                    <li class="mb-1">
                                        <a >dd@gmail.com</a>
                                    </li>
                                    <li class="mb-1">
                                        <a >УП8725379</a>
                                    </li>
                                    <li class="mb-1">
                                        <a >02/04/2019</a>
                                    </li>


                                </ul>
                            </div>
                        </div>
                        <br>
                        <table class="table table-sm table-borderless">

                            <tbody>
                            <tr>
                                <td>
                                    <span class="log-indicator border-theme-2 align-middle"></span>
                                </td>
                                <td>
                                    <span class="font-weight-medium">Шүдний ломбо</span>
                                </td>
                                <td class="text-right">
                                    <span class="text-muted">500₮</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="log-indicator border-theme-2 align-middle"></span>
                                </td>
                                <td>
                                    <span class="font-weight-medium">Чулуу түүх</span>
                                </td>
                                <td class="text-right">
                                    <span class="text-muted">2000₮</span>
                                </td>
                            </tr>
                            </tbody>

                        </table>
                        <span class="badge badge-pill badge-primary">Нийт төлбөр 5000₮</span>
                        <br>
                        <br>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <form class="form-inline">
                                <label class="sr-only" for="inlineFormInputName2">Name</label>
                                <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2"
                                       placeholder="Урамшуулалын код">

                                <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>

                            </form>
                            <form class="form-inline">

                                <button type="submit" class="btn btn-sm btn-outline-primary mb-2">Төлбөр төлөх</button>
                            </form>
                        </div>


                    </div>

                </div>



            </div>
            <div class="col-md-4"><!--profile heseg-->


                <div class="card "><!--row -->
                    <div class="card-body">
                        <a href="#">
                            <div class="d-flex flex-row mb-3 pb-3 border-bottom">
                                <a href="#">
                                    <img src="img/profile-pic-l.jpg" alt="Mayra Sibley" class="img-thumbnail border-0 rounded-circle list-thumbnail align-self-center xsmall" />
                                </a>
                                <div class="pl-3 pr-2">
                                    <a href="#">
                                        <p class="font-weight-medium mb-0 ">Эмч Цэцэг</p>
                                        <p class="text-muted mb-0 text-small">09.08.2018 өдөр хийгдсэн эмчилгээ</p>
                                    </a>
                                </div>
                            </div>

                        </a>
                        </h5>




                        <h5 class="card-title">Өвчтөний мэдээлэл</h5>
                        <div class="d-flex flex-row">
                            <div class="w-50">
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-1">
                                        <a ><b>Овог</b> </a>
                                    </li>
                                    <li class="mb-1">
                                        <a ><b>Нэр</b> </a>
                                    </li>
                                    <li class="mb-1">
                                        <a ><b>Хүйс</b> </a>
                                    </li>
                                    <li class="mb-1">
                                        <a ><b>Утасны дугаар</b> </a>
                                    </li>
                                    <li class="mb-1">
                                        <a ><b>Цахим хаяг</b> </a>
                                    </li>
                                    <li class="mb-1">
                                        <a ><b>Регистер</b> </a>
                                    </li>
                                    <li class="mb-1">
                                        <a ><b>Төрсөн он сар</b> </a>
                                    </li>

                                </ul>
                            </div>

                            <div class="w-50">
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-1">
                                        <a >Болд</a>
                                    </li>
                                    <li class="mb-1">
                                        <a >Цэцэг</a>
                                    </li>
                                    <li class="mb-1">
                                        <a >Эр</a>
                                    </li>
                                    <li class="mb-1">
                                        <a >89876767</a>
                                    </li>
                                    <li class="mb-1">
                                        <a >dd@gmail.com</a>
                                    </li>
                                    <li class="mb-1">
                                        <a >УП8725379</a>
                                    </li>
                                    <li class="mb-1">
                                        <a >02/04/2019</a>
                                    </li>


                                </ul>
                            </div>
                        </div>
                        <br>
                        <table class="table table-sm table-borderless">

                            <tbody>
                            <tr>
                                <td>
                                    <span class="log-indicator border-theme-2 align-middle"></span>
                                </td>
                                <td>
                                    <span class="font-weight-medium">Шүдний ломбо</span>
                                </td>
                                <td class="text-right">
                                    <span class="text-muted">500₮</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="log-indicator border-theme-2 align-middle"></span>
                                </td>
                                <td>
                                    <span class="font-weight-medium">Чулуу түүх</span>
                                </td>
                                <td class="text-right">
                                    <span class="text-muted">2000₮</span>
                                </td>
                            </tr>
                            </tbody>

                        </table>
                        <span class="badge badge-pill badge-primary">Нийт төлбөр 5000₮</span>
                        <br>
                        <br>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <form class="form-inline">
                                <label class="sr-only" for="inlineFormInputName2">Name</label>
                                <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2"
                                       placeholder="Урамшуулалын код">

                                <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>

                            </form>
                            <form class="form-inline">

                                <button type="submit" class="btn btn-sm btn-outline-primary mb-2">Төлбөр төлөх</button>
                            </form>
                        </div>


                    </div>

                </div>



            </div>


        </div><!--end row-->
        <br>
        <div class="row">
            <div class="col-md-4"><!--profile heseg-->


                <div class="card "><!--row -->
                    <div class="card-body">
                        <a href="#">
                            <div class="d-flex flex-row mb-3 pb-3 border-bottom">
                                <a href="#">
                                    <img src="img/profile-pic-l.jpg" alt="Mayra Sibley" class="img-thumbnail border-0 rounded-circle list-thumbnail align-self-center xsmall" />
                                </a>
                                <div class="pl-3 pr-2">
                                    <a href="#">
                                        <p class="font-weight-medium mb-0 ">Эмч Цэцэг</p>
                                        <p class="text-muted mb-0 text-small">09.08.2018 өдөр хийгдсэн эмчилгээ</p>
                                    </a>
                                </div>
                            </div>

                        </a>
                        </h5>




                        <h5 class="card-title">Өвчтөний мэдээлэл</h5>
                        <div class="d-flex flex-row">
                            <div class="w-50">
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-1">
                                        <a ><b>Овог</b> </a>
                                    </li>
                                    <li class="mb-1">
                                        <a ><b>Нэр</b> </a>
                                    </li>
                                    <li class="mb-1">
                                        <a ><b>Хүйс</b> </a>
                                    </li>
                                    <li class="mb-1">
                                        <a ><b>Утасны дугаар</b> </a>
                                    </li>
                                    <li class="mb-1">
                                        <a ><b>Цахим хаяг</b> </a>
                                    </li>
                                    <li class="mb-1">
                                        <a ><b>Регистер</b> </a>
                                    </li>
                                    <li class="mb-1">
                                        <a ><b>Төрсөн он сар</b> </a>
                                    </li>

                                </ul>
                            </div>

                            <div class="w-50">
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-1">
                                        <a >Болд</a>
                                    </li>
                                    <li class="mb-1">
                                        <a >Цэцэг</a>
                                    </li>
                                    <li class="mb-1">
                                        <a >Эр</a>
                                    </li>
                                    <li class="mb-1">
                                        <a >89876767</a>
                                    </li>
                                    <li class="mb-1">
                                        <a >dd@gmail.com</a>
                                    </li>
                                    <li class="mb-1">
                                        <a >УП8725379</a>
                                    </li>
                                    <li class="mb-1">
                                        <a >02/04/2019</a>
                                    </li>


                                </ul>
                            </div>
                        </div>
                        <br>
                        <table class="table table-sm table-borderless">

                            <tbody>
                            <tr>
                                <td>
                                    <span class="log-indicator border-theme-2 align-middle"></span>
                                </td>
                                <td>
                                    <span class="font-weight-medium">Шүдний ломбо</span>
                                </td>
                                <td class="text-right">
                                    <span class="text-muted">500₮</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="log-indicator border-theme-2 align-middle"></span>
                                </td>
                                <td>
                                    <span class="font-weight-medium">Чулуу түүх</span>
                                </td>
                                <td class="text-right">
                                    <span class="text-muted">2000₮</span>
                                </td>
                            </tr>
                            </tbody>

                        </table>
                        <span class="badge badge-pill badge-primary">Нийт төлбөр 5000₮</span>
                        <br>
                        <br>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <form class="form-inline">
                                <label class="sr-only" for="inlineFormInputName2">Name</label>
                                <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2"
                                       placeholder="Урамшуулалын код">

                                <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>

                            </form>
                            <form class="form-inline">

                                <button type="submit" class="btn btn-sm btn-outline-primary mb-2">Төлбөр төлөх</button>
                            </form>
                        </div>


                    </div>

                </div>



            </div>
        </div>
    </main><!--profile duusah-->
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
    {{--Scriptuudiig include hiiideg heseg--}}
@endsection
