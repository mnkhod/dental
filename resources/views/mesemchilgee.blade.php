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
    <section id="faq">
        <div class="container">
            <header class="section-header">
                <h3>Мэс заслын эмчилгээ</h3>

            </header>

            <ul id="faq-list" class="wow fadeInUp">
                <li>
                    <a data-toggle="collapse" class="collapsed" href="#faq1">Буглаа нээж эмчлэх

                        <i class="ion-android-remove"></i></a>
                    <div id="faq1" class="collapse" data-parent="#faq-list">
                        <p>
                            Шүдэнд буглаа үүснэ гэдэг нь шүдний халдвар шүднээсээ гадагшилж орчны эд ба
                            эрүүний яс руу тархаж байгаа хэрэг юм. Энэ үед эрүү орчмоор хавдах боловч
                            хамгийн гол шинж тэмдэг нь хүчтэй өвдөлт.
                            <br>Үүний зэрэгцээгээр:
                            <br>1.Буйл улайх
                            <br>2.Амнаас эвгүй үнэр гарах, гашуун амт амтагдах
                             <br>3.Халуурах
                            <br>4.Тунгалгийн булчирхайнууд цочих
                            <br>5.Залгиур орчмоор хөндүүрлэх.
                            <b><br>Шүдний буглаа үүсэх шалтгаан нь:</b>
                            <br>1. Цоорсон шүд
                             <br>2.Буйлны үрэвсэл буюу шүдний тулгуур эдийн өвчин
                             <br>3.Шүдний хугарал гэмтэл
                            <br>4.Шүдний буглаа үүссэн үед хийгдэх эмчилгээний үндсэн зорилго нь
                            халдварын голомтыг таслан зогсоох юм.
                            <br><b>Энэ зорилгоор:</b>
                            <br>1.Антибиотик эмчилгээ
                             <br>2.Шүдний сувгийн эмчилгээ
                             <br>3.Шалтгаан болж байгаа шүдийг авах
                            <br>4.Мэс заслын аргаар буглааг нээж халдварыг цэвэрлэх аргуудыг ашиглана.


                        </p>
                    </div>
                </li>

                <li>
                    <a data-toggle="collapse" href="#faq2" class="collapsed">Түүшин яс тэгшлэх <i class="ion-android-remove"></i></a>
                    <div id="faq2" class="collapse" data-parent="#faq-list">
                        <p>
                            Шүдгүй удаан явсанаар гарах олон өөрчлөлтүүдийн нэг нь тухайн хэсгийн
                            түүшин яс нь шимэгдэж /намсаж/ эхэлдэг ба хиймэл шүд хийхэд хүндүүр зовиур
                            үүсдэг учир мэдээ алдуулалтын дор түүшин ясыг тэгшилдэг.


                        </p>
                    </div>
                </li>

                <li>
                    <a data-toggle="collapse" href="#faq3" class="collapsed">Буйл тайрах

                        <i class="ion-android-remove"></i></a>
                    <div id="faq3" class="collapse" data-parent="#faq-list">
                        <p>
                            Буй тайрах эмчилгээ гэж юу вэ?
                            Зарим хүмүүсийн буйл шүдний
                            пааланг давж байрласнаар
                            имээмсгэлэх үед буйл хэт их гарч,
                            шүднүүд жижиг харагддаг. Энэ нь
                            олон хүнд гоо сайхны хувьд зовиур
                            болдог байна. Орчин үед энэ
                            асуудлыг өвдөлтгүйгээр богино
                            хугацаанд шийдэж болдог болсныг та
                            мэдэх үү? Манай эмнэлгийн Нүүр
                            Амны мэс заслын эмч нар таны буйл
                            тайрах ажилбарыг мэргэжлийн өндөр
                            төвшинд хийж байна. Буйл буцаж
                            ургах, өвдөлт зовиур өгөх гэх мэт
                            асуудал үүсэхгүй учраас та
                            эмчилгээндээ 100% сэтгэл
                            ханамжтай байх болно. Эдгэрэлтийн
                            хугацаа 14 хоног.



                        </p>
                    </div>
                </li>

                <li>
                    <a data-toggle="collapse" href="#faq4" class="collapsed">Агт араа шүд гэж юу вэ? <i class="ion-android-remove"></i></a>
                    <div id="faq4" class="collapse" data-parent="#faq-list">
                        <p>
                            Шүдний мэргэжлийн салбарынхан түүнийг
                            ихэнхдээ гуравдугаар их араа шүд гэж томьёолдог
                            бөгөөд эрүү ба хоншоорын шүдний эгнээний
                            хамгийн арын зайд ургадаг шүд юм. Зарим нэг
                            хүний хувьд агт араа шүд нь огт анзаарагдалгүй
                            ургадаг бол ихэнх хүмүүст энэ шүд нь ургах үедээ
                            өвдөлт, халдвар үүссэний улмаас хавдах, буглах
                            зэрэг таагүй байдал үүсгэх нь олонтаа.
                             <br><b>АГТ АРАА ШҮД ХЭЗЭЭ ХААНА ШҮДЭЛЖ ГАРЧ ИРДЭГ ВЭ?</b>
                            <br>Хүн ихэвчлэн дөрвөн ширхэг агт араа шүд байх бөгөөд хоншоор ба эрүүний шүдний
                            эгнээний хамгийн арын зайд шүдэлдэг. Ихэнхдээ 17-21 насанд шүдэлдэг. Агт
                             араа шүд нь цөөн тохиолдолд зөвхөн аль нэг шүдний хэсэг цухуйсан байдалтай
                            тохиолддог бол ихэнхдээ шүдэлж гарч ирэлгүйгээр буйлан дотор үлддэг. Ийнхүү
                            буйлнаас цухуйлгүй яс болон бусад буйлны эдээр хучигдан үлдсэн агт араа шүдийг
                            “саатсан агт араа” гэж нэрлэдэг.
                            <br><b>АГТ АРАА ШҮД ЗААВАЛ ШҮДЛЭХ ШААРДЛАГАТАЙ ЮУ?</b>
                            <br>Агт араа шүд нь хамгийн ард байрлаж хазалт болон зажлалтанд оролцдоггүй
                            учраас мэс заслын заалтаар авах шүдэнд ордог.
                            <br>Хүний түүхийн эрт үед хоол хүнс илүү хатуулаг байсан бөгөөд хатуу хоол хүнсийг
                            байнга хэрэглэсний улмаас их араа шүднүүд эрт элэгдэж эхлэхэд агт араа шүд
                            шүдэлж орлох үүрэг гүйцэтгэдэг байсан. Гэтэл өнөө үед хоол хүнс зөөлөн
                            болсноор араа шүдний элэгдэл багасаж мөн эрүүний хөгжил багасаж, агт араа
                            шүд ургах зай хязгаарлагдмал болсон байна
                            <br><b>АГТ АРАА ШҮД УРГАХ ҮЕД ЮУ БОЛОХ ВЭ?</b>
                            <br>Агт араа шүд ургах нь ихэнхдээ өвдөлт, шүд буйл орчмын халдварын голомт,
                            буйлны үрэвсэл ба шүдний цооролттой хавсран явагддаг.
                            <br>Агт араа шүдтэй холбоотой асуудал нь зөвхөн агт арааг авсан тохиолдолд л
                            намжина. Иймд шүдний эмч нар шилжилтийн насны төгсгөлөөр буюу 20 наснаас
                            өмнө, агт араа шүдийг асуудал үүсгэхээс нь өмнө авахуулахыг зөвлөдөг. Яг энэ
                            насан дээр агт араа шүдний ёзоор эрүүний ясанд гүн сууж ургаагүй байх тул хожуу
                            үеийг бодвол илүү хялбар байдлаар авах боломжтой.
                            <br>Хэрэв өсвөр насны хүүхдүүд шүдний гажиг заслын эмчилгээ хийлгэж зэмсэг зүүж
                            байгаа бол агт араа шүдийг эмчилгээний төгсгөлд авахуулах нь зүйтэй. Учир нь агт
                            араа шүдийг авахуулах нь гажиг заслын эмчилгээний үр дүнг өөрчилж тэгширсэн
                            шүдийг буцаан байраа өөрчлөх шалтгаан болж болзошгүй.



                        </p>
                    </div>
                </li>




            </ul>

        </div>
    </section><!-- #faq -->
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
