<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Mon Family Dental Clinic</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="{{asset('img/logo-black.png')}}" width="10px" rel="icon">
    <link href="{{asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="{{asset('front/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!--libraries CSS Files -->
    <link href="{{asset('front/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('front/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('front/lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('front/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('front/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="{{asset('front/css/style.css')}}" rel="stylesheet">

    <!-- =======================================================

    ======================================================= -->
</head>

<body>
<!--==========================
Header
============================-->
<header id="header">

    <div id="topbar">
        <div class="container">
            <div class="social-links">
                <!--          <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>-->
                <a href="https://www.facebook.com/MonFamilyDentalClinic/" class="facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                <!--          <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>-->
                <a href="https://www.instagram.com/monfamily.mn/" class="instagram" target="_blank"><i class="fa fa-instagram"></i></a>
            </div>
        </div>
    </div>

    <div class="container">

        <div class=" float-left">
            <!-- Uncomment below if you prefer to use an image logo -->
            <!--        <h1 class="text-light"><a href="#intro" class="scrollto"><span><img src="img/biglogo.png" width="50px"></span></a></h1>-->
            <a href="#about" ><img src="{{url('img/logo-black.png')}}" width="90px"></a>
            <!-- <a href="#header" class="scrollto"><img src="img/logo.png" alt="" class="img-fluid"></a> -->
        </div>

        <nav class="main-nav float-right d-none d-lg-block">
            <ul>
                <li class="active"><a href="#intro">Нүүр</a></li>
                <li><a href="#about">Бидний тухай</a></li>
                <!--            #about #team-->
                <li><a href="#services">Давуу тал</a></li>
                <!--          <li><a href="#portfolio">Portfolio</a></li>-->
                <li><a href="#team">Орчин</a></li>

                <li class="drop-down"><a href="{{url('emchilgeenuud')}}">Эмчилгээ болон зөвөлгөө</a>
                    <ul>

                        <li><a href="{{url('huuhdiinemchilgee')}}">Хүүхдийн эмчилгээ</a></li>
                        <li><a href="{{url('adulttreatment')}}">Насанд хүрэгсдийн эмчилгээ</a></li>
                        <li><a href="{{url('emchilge')}}">Согог засал</a></li>
                        <li><a href="{{url('mesemchilgee')}}">Мэс заслын эмчилгээ</a></li>
                    </ul>
                </li>


                <li><a href="#footer">Холбоо барих</a></li>
            </ul>
        </nav><!-- .main-nav -->

    </div>
</header><!-- #header -->
<script>
    $(function () {
        $(document).scroll(function () {
            var $nav = $(".navbar-fixed-top");
            $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
        });
    });
</script>

<main id="main">
    <style>
        .carousel-item {
            height: 100vh;
            min-height: 350px;
            background: no-repeat center center scroll;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
    </style>
    <div id="carouselExampleIndicators" class="carousel slide intro" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            {{--<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>--}}
        </ol>
        <div class="carousel-inner" role="listbox">
            <!-- Slide One - Set the background image for this slide in the line below -->
            <div class="carousel-item  active" style="background-image: url('{{asset('img/slide.jpg')}}')">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>

            <!-- Slide Two - Set the background image for this slide in the line below -->
            <div class="carousel-item" style="background-image: url('{{url('img/sliderr.png')}}')">
                <div class="carousel-caption d-none d-md-block">
                    <h2 class="display-4" style="font-family: sans-serif"><b>Цав цагаан гэрэлтдэг шүд </b></h2>
                    <!--          <p class="lead">This is a description for the second slide.</p>-->
                </div>
            </div>
            {{--<!-- Slide Three - Set the background image for this slide in the line below -->--}}
            {{--<div class="carousel-item" style="background-image: url('{{url('img/orchin.jpg')}}')">--}}
                {{--<div class="carousel-caption d-none d-md-block">--}}
                    {{--<h1 class="display-4"><b style="font-family:sans-serif">Гэгээлэг, тав тухтай орчин</b></h1>--}}
                    {{--<!--          <p class="lead">This is a description for the first slide.</p>-->--}}
                {{--</div>--}}
            {{--</div>--}}

        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


    <!--==========================
      About Us Section
    ============================-->
    <section id="about">

        <div class="container">
            <div class="row">

                <div class="col-lg-5 col-md-6">
                    <div class="about-img">
                        <img src="{{url('img/smile.jpg')}}"  alt="">
                    </div>
                </div>

                <div class="col-lg-7 col-md-6">
                    <div class="about-content">
                        <h2>Бидний тухай</h2>
                        <!--              <h3>Odio sed id eos et laboriosam consequatur eos earum soluta.</h3>-->
                        <p>
                            MonFamily Dental Clinic шүдний эмнэлэг нь 2014/11/22-нд үйл ажилгаагаа эхэлсэн эмнэлэг юм.</p>
                        <p>Тус эмнэлэг нь МУ-ын эмнэлэгийн стандарт,дэглэмийг бүрэн хангасан.

                            Шүдний эмнэлгийн байр нь эрүүл ахуйн шаардлага, хөдөлмөр хамгаалал, техникийн аюулгүй байдал, халдвар хамгаалаллыг дээд зэргээр сахисан.
                        </p>
                        <p>
                            Xана, тааз нь угааж цэвэрлэх, халдваргүйжүүлэх боломжтой,бүх багаж төхөөрөмжөө стандартын дагуу ариутгаж халдваргүйжүүлдэг.

                            Хүүхдийн үзлэгийн болон эмчилгээний өрөө нь насанд хүрэгчдийнхээс тусдаа, хүүхдэд зориулсан орчинг бүрдүүлсэн.
                        </p>
                        <p>
                            Та бүхэнд чадварлаг эмч мэргэжилтэн соёлтой хамт олон тав тухтай орчинд, хамгийн орчин үеийн тоног төхөөрөмжөөр үйлчлэх болно.</p>
                    </div>
                </div>
            </div>
        </div>

    </section><!-- #about -->


    <!--==========================
      Services Section
    ============================-->
    <section id="services" class="section-bg">
        <div class="container">

            <header class="section-header">
                <h3>Давуу тал</h3>
                <!--          <p>Laudem latine persequeris id sed, ex fabulas delectus quo. No vel partiendo abhorreant vituperatoribus.</p>-->
            </header>

            <div class="row">

                <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-duration="1.4s">
                    <div class="box">
                        <div class="icon" style="background: #fceef3;"><i class="" style="color: #ff689b;"><img src="{{asset('img/chanartai.png')}}" width="50px"></i></div>
                        <h4 class="title"><a href="">Чанартай</a></h4>
                        <p class="description"> Эмчилгээндээ Америк, Герман, Япон улсуудын чанартай, шаардлага хангах материалыг сонгон ашигладаг.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-duration="1.4s">
                    <div class="box">
                        <div class="icon" style="background: #fff0da;"><i class="" style="color: #e98e06;"><img src="{{asset('img/chadvarlag.png')}}" width="50px"></i></div>
                        <h4 class="title"><a href="">Чадварлаг хамт олон</a></h4>
                        <p class="description">Япон улсад мэргэжил дээшлүүлсэн чадварлаг эмч мэргэжилтэн, найрсаг хамт олон.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
                    <div class="box">
                        <div class="icon" style="background: #e6fdfc;"><i class="" style="color: #3fcdc7;"><img src="{{asset('img/tavtuh.png')}}" width="50px"></i></div>
                        <h4 class="title"><a href="">Тав Тухтай Орчин</a></h4>
                        <p class="description">Хүүхэд болон том хүний эмчилгээний тасаг нь тусдаа,  хүүхдэд зориулсан тоглоомын өрөөгөөр тохижуулсан.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
                    <div class="box">
                        <div class="icon" style="background: #eafde7;"><i class="" style="color:#41cf2e;"><img src="{{asset('img/tech.png')}}" width="50px"></i></div>
                        <h4 class="title"><a href="">Техник Технологи</a></h4>
                        <p class="description">Япон болон Америкийн нэгдсэн улсын өвдөлтгүйгээр эмчлэх арга ашигладаг. </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-delay="0.2s" data-wow-duration="1.4s">
                    <div class="box">
                        <div class="icon" style="background: #e1eeff;"><i class="" style="color: #2282ff;"><img src="{{asset('img/shiid.png')}}" width="50px"></i></div>
                        <h4 class="title"><a href="">Зөв Шийдэл</a></h4>
                        <p class="description">Гэр бүлийн бүх гишүүдэд тохирох эмчилгээ үйлчилгээ үзүүлдэг</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-delay="0.2s" data-wow-duration="1.4s">
                    <div class="box">
                        <div class="icon" style="background: #ecebff;"><i class="" style="color: #8660fe;"><img src="{{asset('img/loyal.png')}}" width="50px"></i></div>
                        <h4 class="title"><a href="">Лояалти</a></h4>
                        <p class="description">Байнгын үйлчлүүлэгчиддээ зориулсан хөнгөлөлт урамшуулал үзүүлдэг</p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- #services -->
    <section id="call-to-action" class="wow fadeInUp">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 text-center text-lg-left">
                    <h3 class="cta-title">Цаг захиалах</h3>
                    <p class="cta-text">Mon Family шүдний эмнэлэгт үйлчилгээ, эмчилгээ авахаар бол дараах дугаар луу залгана уу. </p>
                </div>
                <div class="col-lg-3 cta-btn-container text-center">
                    <a class="cta-btn align-middle" href="#table">+976 77151551</a>
                </div>
            </div>

        </div>
    </section><!-- #call-to-action -->


    <!--==========================
      Features Section
    ============================-->
    <section id="features">
        <div class="container">
            <h2 style="font-family:sans-serif">Эмч нарын цагийн хуваарь</h2>
            <label style="background: white"><p><img src="{{asset('img/circle-outline.png')}}" width="15px"> Захиалгатай</p></label>
            <label style="background: white"><p><img src="{{asset('img/shift.png')}}" width="15px"> Ээлж байхгүй</p></label>
            <br>
            <?php $i = 0;?>
            <div class="row">
                <div class="col-md-3">
                    <select id="select-box" class="form-control">
                        @foreach($roles->get() as $role)
                            <option value="{{$i}}">{{$role->staff->name}}</option>
                            <?php  $i++; ?>
                        @endforeach
                    </select>
                </div>
            </div>
            <br>




                    <?php $i = 1;?>
                    @foreach($roles->get() as $role)
                    <div id="tab-{{$i}}" class="tabsdf">
                        <table class=" table table-responsive table-condensed table-bordered table-hover" id="tablePreview"  cellspacing="100" cellpadding="20" style="overflow-x:auto">
                            <thead>
                            <tr>
                                <th>Өдөр</th>
                                <th>09:00 <br> 10:00</th>
                                <th>10:00 <br> 11:00</th>
                                <th>11:00 <br> 12:00</th>
                                <th>12:00 <br> 13:00</th>
                                <th>13:00 <br> 14:00</th>
                                <th>14:00 <br> 15:00</th>
                                <th>15:00 <br> 16:00</th>
                                <th>16:00 <br> 17:00</th>
                                <th>17:00 <br> 18:00</th>
                                <th>18:00 <br> 19:00</th>
                                <th>19:00 <br> 20:00</th>
                                <th>20:00 <br> 21:00</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $last = 0;?>
                            @for($d = 0; $d<7;$d++)
                            <tr>
                                <th scope="row">{{date('Y-m-d', strtotime("+".$d." Days"))}}</th>
                                @for($t=9; $t<15; $t++)
                                    @if($shift = $role->shifts->where('date', date('Y-m-d', strtotime("+".$d." Days")))->first())
                                        @if($shift->shift_id == 0 || $shift->shift_id == 2)
                                            <td align="center">
                                                @if($last>0)
                                                    <img src="img/circle-outline.png" width="20px">
                                                    <?php $last--;?>
                                                @endif
                                                @if($appointment = $shift->appointments->where('start', $t)->first())
                                                    <?php $last = $appointment->end - $appointment->start - 1;?>
                                                   <img src="img/circle-outline.png" width="20px">
                                                @endif
                                            </td>
                                        @else
                                            <td style="background: #8f8f8f"></td>
                                        @endif
                                    @else
                                        <td style="background: #8f8f8f"></td>
                                    @endif
                                @endfor
                                @for($t=15; $t<21; $t++)
                                    @if($shift = $role->shifts->where('date', date('Y-m-d', strtotime("+".$d." Days")))->first())
                                        @if($shift->shift_id == 1 || $shift->shift_id == 2)
                                            <td align="center">
                                            @if($last>0)
                                                <img src="img/circle-outline.png" width="20px">
                                                <?php $last--;?>
                                            @endif
                                            @if($appointment = $shift->appointments->where('start', $t)->first())
                                                <?php $last = $appointment->end - $appointment->start - 1;?>
                                                <img src="img/circle-outline.png" width="20px">
                                            @endif
                                            </td>
                                        @else
                                            <td style="background: #8f8f8f"></td>
                                        @endif
                                    @else
                                        <td style="background: #8f8f8f"></td>
                                    @endif
                                @endfor
                            </tr>
                            @endfor

                            </tbody>
                        </table>


                    </div>
                        <?php  $i++; ?>
                    @endforeach
            <script>
                var tabs = document.getElementsByClassName("tabsdf");
                for (var i = 0; i < tabs.length; i++) {
                    tabs[i].style.display = "none";
                }
                tabs[0].style.display = "block";
                document.getElementById('select-box').addEventListener("change", function () {
                    for (var i = 0; i < tabs.length; i++) {
                        tabs[i].style.display = "none";
                    }
                    tabs[document.getElementById('select-box').value].style.display = "block";
                });
            </script>
                </div>







    </section><!-- #about -->


    <br>

    <br><br>
    <!--==========================
      Team Section
    ============================-->
    <section id="team" class="section-bg">
        <div class="container">
            <div class="section-header">
                <h3 style="font-family: serif">Шүдний эмнэлэгийн орчин</h3> <br>
                <!--          <p>Шүдний эмнэлэгийн дотоод орчин</p>-->
            </div>

            <div class="row">

                <div class="col-lg-3 col-md-6 wow fadeInUp">
                    <div class="member">
                        <img src="{{asset('img/int.jpg')}}" width="400px" class="img-fluid" alt="">
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>Ресепшн</h4>
                                <span>Тав тухтай орчин, найрсаг хамт олон</span>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="member">
                        <img src="{{asset('img/orooo2.jpg')}}" class="img-fluid" alt="">
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>Эмчилгээний тасаг</h4>
                                <span>Том хүний үзлэг, эмчилгээний тасаг</span>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="member">
                        <img src="{{asset('img/orooo1.jpg')}}" class="img-fluid" alt="">
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>Эмчилгээний тасаг</h4>
                                <span>Хүүхдийн үзлэг, эмчилгээний тасаг</span>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="member">
                        <img src="{{asset('img/oroo.jpg')}}" class="img-fluid" alt="">
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>Хүүхдийн хэсэг</h4>
                                <span>Хүүхдийн тоглоомын өрөө</span>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- #team -->


</main>

<!--==========================
  Footer
============================-->
<footer id="footer" class="section-bg">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-md-3"><img src="{{asset('img/logo-black.png')}}" width="200px"></div>
                <div class="col-md-3">
                    <div class="footer-links">
                        <h4>Холбоосууд</h4>
                        <ul>
                            <li><a href="#">Нүүр</a></li>
                            <li><a href="#about">Бидний тухай</a></li>
                            <li><a href="#services">Бидний давуу тал</a></li>
                            <li><a href="#content">Цагийн хуваарь</a></li>
                            <li><a href="emchilgeenuud.html">Эмчилгээнүүд</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-links">
                        <h4>Холбоо барих</h4>
                        <p>
                            Баянзүрх дүүрэг 15-р хороолол 4 хороо Баясгалант өргөө 33 -р байр 1 <br>
                            <strong>Утас:</strong> +976 77151551<br>
                            <!--                      <strong>Email:</strong> info@example.com<br>-->
                        </p>
                    </div>

                    <div class="social-links">
                        <!--                    <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>-->
                        <a href="https://www.facebook.com/MonFamilyDentalClinic/" class="facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="https://www.instagram.com/monfamily.mn/" class="instagram" target="_blank"><i class="fa fa-instagram"></i></a>
                        <!--                    <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>-->
                    </div>
                </div>
                <div class="col-md-3">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d680.669471685845!2d106.9502018265471!3d47.92125706351682!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDfCsDU1JzE2LjgiTiAxMDbCsDU3JzAxLjYiRQ!5e1!3m2!1smn!2smn!4v1555676263264!5m2!1smn!2smn" width="300" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <br>
            <b> <br>©  2019 Mon Family</b> <br>. ВЭБ САЙТЫГ BodyTech XXK ХӨГЖҮҮЛЭВ. (+976-95520073)
        </div>
        <div class="credits">


        </div>
    </div>
</footer><!-- #footer -->

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
<!-- Uncomment below i you want to use a preloader -->
<!-- <div id="preloader"></div> -->

<!-- JavaScript  -->
<script src="{{asset('front/lib/jquery/jquery.min.js')}}"></script>
<script src="{{asset('front/lib/jquery/jquery-migrate.min.js')}}"></script>
<script src="{{asset('front/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('front/lib/easing/easing.min.js')}}"></script>
<script src="{{asset('front/lib/mobile-nav/mobile-nav.js')}}"></script>
<script src="{{asset('front/lib/wow/wow.min.js')}}"></script>
<script src="{{asset('front/lib/waypoints/waypoints.min.js')}}"></script>
<script src="{{asset('front/lib/counterup/counterup.min.js')}}"></script>
<script src="{{asset('front/lib/owlcarousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('front/lib/isotope/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('front/lib/lightbox/js/lightbox.min.js')}}"></script>
{{--<!-- Contact Form JavaScript File -->--}}
{{--<script src="contactform/contactform.js')}}"></script>--}}

<!-- Template Main Javascript File -->
<script src="{{asset('front/js/main.js')}}"></script>

</body>
</html>
