<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Rapid Bootstrap Template</title>
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
      Theme Name: Rapid
      Theme URL: https://bootstrapmade.com/rapid-multipurpose-bootstrap-business-template/
      Author: BootstrapMade.com
      License: https://bootstrapmade.com/license/
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
            <a href="index.html" ><img src="img/logo-black.png" width="90px"></a>
            <!-- <a href="#header" class="scrollto"><img src="img/logo.png" alt="" class="img-fluid"></a> -->
        </div>

        <nav class="main-nav float-right d-none d-lg-block">
            <ul>
                <li ><a href="index.html">Нүүр</a></li>
                <li class="drop-down active"><a href="{{url('emchilgeenuud')}}">Эмчилгээ болон зөвөлгөө</a>
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

<!--==========================
  Intro Section
============================-->

<main id="main">
    <br><br><br>
    <section id="about">

        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-1"></div>--}}
                {{--<div class="col-md-10">--}}
                    {{--<h3 class="text-center">Эмчилгээ, Үйлчилгээнүүд</h3>--}}
                    {{--<div class="row  footer">--}}
                        {{--<div class="col-md-3">--}}
                            {{--<a href="{{url('huuhdiinemchilgee')}}">Хүүхдийн үйлчилгээ</a>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-3">--}}
                            {{--<a href="{{url('adulttreatment')}}">Насанд хүрэгсдийн<br> эмчилгээ</a>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-3">--}}
                            {{--<a href="{{url('emchilge')}}" style="color: orange">Согог засал </a>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-3">--}}
                            {{--<a href="{{url('mesemchilgee')}}" style="color: orange">Мэс заслын эмчилгээ</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-md-1"></div>--}}
            {{--</div>--}}
        {{--</div> <br> <br>--}}

        <div class="container">
            <div class="row">

                <div class="col-lg-5 col-md-6">
                    <div class="about-img">
                        <img src="{{asset('img/anhaarald.jpg')}}"  alt="">
                    </div>
                </div>

                <div class="col-lg-7 col-md-6">
                    <div class="about-content">
                        <h2>Таны анхааралд</h2>
                        <!--              <h3>Odio sed id eos et laboriosam consequatur eos earum soluta.</h3>-->
                        <p class="text-justify">
                            Та манай эмнэлэгээр үйлчлүүлэхдээ урьдчилан өдөр цагаа тохирох, захиалгыг <b>биеэр</b> болон <b>утсаар</b> өгч болно. Та тухайн авсан цагтаа ирж эмчилгээндээ хамрагдах бөгөөд, товлосон цагаас <b>хоцрох тохиолдолд</b> таны цаг <b>цуцлагдах</b> болно. Энэ нь эмчилгээг богино хугацаанд яаран хийх үр дүнгүй болгох зэргээс <b>урьдчилан сэргийлж</b> байгаа явдал юм.  </p>
                        <p class="text-right"><b>Захиалгын утас: 77151551</b></p>
                        <b>Цагийн хуваарь:</b>

                        <table class=" table table-responsive" id="tablePreview" class="table-condensed table-bordered table-hover table-striped"  style="overflow-x:auto">
                            <!--Table head-->
                            <thead>
                            <tr>
                                <th>Цаг</th>
                                <th>Даваа</th>
                                <th> Мягмар</th>
                                <th> Лхагва</th>
                                <th> Пүрэв</th>
                                <th> Баасан</th>
                                <th> Бямба </th>
                                <th>Ням </th>
                            </tr>
                            </thead>
                            <!--Table head-->
                            <!--Table body-->
                            <tbody>

                            <tr>
                                <th scope="row">09:00<br>21:00</th>
                                <td align="center"><img src="img/circle-outline.png" width="20px"></td>
                                <td align="center"><img src="img/circle-outline.png" width="20px"></td>
                                <td align="center"><img src="img/circle-outline.png" width="20px"></td>
                                <td align="center"><img src="img/circle-outline.png" width="20px"></td>
                                <td align="center"><img src="img/circle-outline.png" width="20px"></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">10:00<br>19:00</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td align="center"><img src="img/circle-outline.png" width="20px"></td>
                                <td align="center"><img src="img/circle-outline.png" width="20px"></td>
                            </tr>
                            </tbody>
                            <!--Table body-->
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10 about-content">
                    <h2>Шүдний эмчид очихын өмнө анхаарах зүйл:</h2>
                    <ul>
                        <li><i class="ion-android-checkmark-circle"></i> Шүдээ сайтар цэвэрлэсэн байх</li>
                        <li><i class="ion-android-checkmark-circle"></i> Спиртийн төрөл болон сармис, сонгино зэрэг хурц үнэртэй зүйл хэрэглээгүй байх</li>
                        <li><i class="ion-android-checkmark-circle"></i> Заавал хооллож ирэх. Учир нь өлсгөлөн ходоодноос эвгүй үнэр гардаг ба өлссөн үед огиулах нь амархан байдаг.</li>
                        <li><i class="ion-android-checkmark-circle"></i> Бага насны хүүдийн сэтгэл санааг эцэг эхийн зүгээс бэлтгэж айдсыг багасгах</li>
                        <li><i class="ion-android-checkmark-circle"></i> Тамхи татаагүй байх</li>

                    </ul>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-11 about-content">
                    <h2>Эмчилгээнд орохын өмнө:</h2>
                    <ul>
                        <li><i class="ion-android-checkmark-circle"></i> Уруулын будгаа арчина уу </li>
                        <li><i class="ion-android-checkmark-circle"></i> Бохио хогийн саванд хаяна уу </li>
                        <li><i class="ion-android-checkmark-circle"></i> Гар утсаа унтрааж орно уу </li>
                        <li><i class="ion-android-checkmark-circle"></i> Гадуур хувцсаа сагсанд хийж барьк орно уу </li>
                        <li><i class="ion-android-checkmark-circle"></i> Эмчилгээний өрөөнд орохдоо улавч өмсөнө үү</li>

                    </ul>
                </div>

            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-11 about-content">
                    <h2>Эцэг эхийн анхааралд:</h2>
                    <ul>
                        <li><i class="ion-android-checkmark-circle"></i> Бага насны хүүдийг эмчилгээнд орох үед хүүхдийн онцлогт тохируулан сэтгэл санаагаар дэмжиж ойлгуулах  </li>
                        <li><i class="ion-android-checkmark-circle"></i> Эмчилгээ хийгдэх явцад эмчид хэт ойртох, гаранд нь хүрэх гэх мэт эмчилгээнд саад учруулах үг, үйлдэл гаргахгүй байх  </li>
                        <li><i class="ion-android-checkmark-circle"></i> Хэт чанга дуугаар хүүхдээ загнахгүй байх  </li>
                        <li><i class="ion-android-checkmark-circle"></i> Эмчилгээний өрөөнд утсаар ярихгүй байх </li>

                    </ul>
                </div>

            </div>
        </div>


    </section><!-- #about -->
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

<!-- JavaScript Libraries -->
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
