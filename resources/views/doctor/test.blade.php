<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <title>Dore jQuery</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="font/iconsmind/style.css" />
    <link rel="stylesheet"
          href="font/simple-line-icons/css/simple-line-icons.css" />

    <link rel="stylesheet" href="css/vendor/bootstrap.min.css" />
    <link rel="stylesheet" href="css/vendor/perfect-scrollbar.css" />
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="css/dore.light.blue.min.css" />

</head>

<body id="app-container" class="menu-default show-spinner">
<nav class="navbar fixed-top">
    <div class="d-flex align-items-center navbar-left">
        <a href="#" class="menu-button d-none d-md-block">
            <svg class="main" xmlns="http://www.w3.org/2000/svg"
                 viewBox="0 0 9 17">
                <rect x="0.48" y="0.5" width="7" height="1" />
                <rect x="0.48" y="7.5" width="7" height="1" />
                <rect x="0.48" y="15.5" width="7" height="1" />
            </svg>
            <svg class="sub" xmlns="http://www.w3.org/2000/svg"
                 viewBox="0 0 18 17">
                <rect x="1.56" y="0.5" width="16" height="1" />
                <rect x="1.56" y="7.5" width="16" height="1" />
                <rect x="1.56" y="15.5" width="16" height="1" />
            </svg>
        </a>

        <a href="#" class="menu-button-mobile d-xs-block d-sm-block
d-md-none">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26
17">
                <rect x="0.5" y="0.5" width="25" height="1" />
                <rect x="0.5" y="7.5" width="25" height="1" />
                <rect x="0.5" y="15.5" width="25" height="1" />
            </svg>
        </a>

        <div class="search"
             data-search-path="Layouts.Search.html?q=">
            <input placeholder="Search...">
            <span class="search-icon">
                    <i class="simple-icon-magnifier"></i>
                </span>
        </div>
    </div>


    <a class="navbar-logo" href="Dashboard.Default.html">
        <span class="logo d-none d-xs-block"></span>
        <span class="logo-mobile d-block d-xs-none"></span>
    </a>

    <div class="navbar-right">
        <div class="header-icons d-inline-block align-middle">
            <a class="btn btn-sm btn-outline-primary mr-2 d-none
d-md-inline-block mb-2"
               href="https://1.envato.market/5kAb">&nbsp;BUY&nbsp;</a>

            <div class="position-relative d-none d-sm-inline-block">
                <button class="header-icon btn btn-empty"
                        type="button" id="iconMenuButton" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    <i class="simple-icon-grid"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right mt-3
position-absolute" id="iconMenuDropdown">
                    <a href="#" class="icon-menu-item">
                        <i class="iconsmind-Equalizer d-block"></i>
                        <span>Settings</span>
                    </a>

                    <a href="#" class="icon-menu-item">
                        <i class="iconsmind-MaleFemale d-block"></i>
                        <span>Users</span>
                    </a>

                    <a href="#" class="icon-menu-item">
                        <i class="iconsmind-Puzzle d-block"></i>
                        <span>Components</span>
                    </a>

                    <a href="#" class="icon-menu-item">
                        <i class="iconsmind-Bar-Chart d-block"></i>
                        <span>Profits</span>
                    </a>

                    <a href="#" class="icon-menu-item">
                        <i class="iconsmind-File-Chart d-block"></i>
                        <span>Surveys</span>
                    </a>

                    <a href="#" class="icon-menu-item">
                        <i class="iconsmind-Suitcase d-block"></i>
                        <span>Tasks</span>
                    </a>

                </div>
            </div>

            <div class="position-relative d-inline-block">
                <button class="header-icon btn btn-empty"
                        type="button" id="notificationButton" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    <i class="simple-icon-bell"></i>
                    <span class="count">3</span>
                </button>
                <div class="dropdown-menu dropdown-menu-right mt-3
scroll position-absolute" id="notificationDropdown">

                    <div class="d-flex flex-row mb-3 pb-3
border-bottom">
                        <a href="#">
                            <img src="img/profile-pic-l-2.jpg"
                                 alt="Notification Image" class="img-thumbnail list-thumbnail xsmall
border-0 rounded-circle" />
                        </a>
                        <div class="pl-3 pr-2">
                            <a href="#">
                                <p class="font-weight-medium
mb-1">Joisse Kaycee just sent a new comment!</p>
                                <p class="text-muted mb-0
text-small">09.04.2018 - 12:45</p>
                            </a>
                        </div>
                    </div>

                    <div class="d-flex flex-row mb-3 pb-3
border-bottom">
                        <a href="#">
                            <img src="img/notification-thumb.jpg"
                                 alt="Notification Image" class="img-thumbnail list-thumbnail xsmall
border-0 rounded-circle" />
                        </a>
                        <div class="pl-3 pr-2">
                            <a href="#">
                                <p class="font-weight-medium mb-1">1
                                    item is out of stock!</p>
                                <p class="text-muted mb-0
text-small">09.04.2018 - 12:45</p>
                            </a>
                        </div>
                    </div>


                    <div class="d-flex flex-row mb-3 pb-3
border-bottom">
                        <a href="#">
                            <img src="img/notification-thumb-2.jpg"
                                 alt="Notification Image" class="img-thumbnail list-thumbnail xsmall
border-0 rounded-circle" />
                        </a>
                        <div class="pl-3 pr-2">
                            <a href="#">
                                <p class="font-weight-medium
mb-1">New order received! It is total $147,20.</p>
                                <p class="text-muted mb-0
text-small">09.04.2018 - 12:45</p>
                            </a>
                        </div>
                    </div>

                    <div class="d-flex flex-row mb-3 pb-3 ">
                        <a href="#">
                            <img src="img/notification-thumb-3.jpg"
                                 alt="Notification Image" class="img-thumbnail list-thumbnail xsmall
border-0 rounded-circle" />
                        </a>
                        <div class="pl-3 pr-2">
                            <a href="#">
                                <p class="font-weight-medium mb-1">3
                                    items just added to wish list by a user!</p>
                                <p class="text-muted mb-0
text-small">09.04.2018 - 12:45</p>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

            <button class="header-icon btn btn-empty d-none
d-sm-inline-block" type="button" id="fullScreenButton">
                <i class="simple-icon-size-fullscreen"></i>
                <i class="simple-icon-size-actual"></i>
            </button>

        </div>

        <div class="user d-inline-block">
            <button class="btn btn-empty p-0" type="button"
                    data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                <span class="name">Sarah Kortney</span>
                <span>
                        <img alt="Profile Picture"
                             src="img/profile-pic-l.jpg" />
                    </span>
            </button>

            <div class="dropdown-menu dropdown-menu-right mt-3">
                <a class="dropdown-item" href="#">Account</a>
                <a class="dropdown-item" href="#">Features</a>
                <a class="dropdown-item" href="#">History</a>
                <a class="dropdown-item" href="#">Support</a>
                <a class="dropdown-item" href="#">Sign out</a>
            </div>
        </div>
    </div>
</nav>
<div class="sidebar">
    <div class="main-menu">
        <div class="scroll">
            <ul class="list-unstyled">
                <li class="active">
                    <a href="#start">
                        <i class="iconsmind-Shop-4"></i>
                        <span>Dore</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="sub-menu">
        <div class="scroll">
            <ul class="list-unstyled" data-link="start">
                <li class="active">
                    <a href="Dore.Start.html">
                        <i class="simple-icon-briefcase"></i> Start
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<main>
    <style>

        polygon {
            margin: auto;
            display: block;
            stroke-width: 1;
            stroke: black;
            fill: transparent;
        }
        circle {
            stroke-width: 1;
            stroke: black;
            fill: white;
        }
        /*

                circle:hover {
                    fill : aqua;
                }
        */
        .lombo {
            fill : #00508d;
            animation-duration: 0.3s;
        }
        .empty {
            fill : white;
            animation-duration: 0.3s;
        }
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #00508d;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
    <script>
        var selectedArea = [];
        //        sum function
        function sumList(array){
            var sum = 0
            for(i=0;i<array.length;i++){
                var parse = parseInt(array[i]);
                sum += parse;
            }
            return sum
        }
        var tooths = [];
        function changeStyle(ruby) {
            //----VALIDATION-----
            if(tooths.length === 0) {
                tooths.push(ruby);
            } else {
                var check = true;
                for (var count = 0; count<tooths.length; count++) {
                    if (tooths[count] === ruby) {
                        check = false;
                    }
                }
                if (check) {
                    tooths.push(ruby);
                } else {
                    tooths.splice(tooths.indexOf(ruby), 1);
                }
            }
            //----VALIDATION END-----

            //PAINT table using @tooths array
            console.log(tooths);
            for (var i = 1; i <= 32; i++) {
                document.getElementById(i).setAttribute("class",
                    "tooth");

            }
            for (var i = 1; i <= 32; i++) {
                for (var count = 0; count<tooths.length; count++) {
                    if (tooths[count] === i) {

                        document.getElementById(i).classList.remove("tooth");
                    }
                }
            }

            var toothClassList = ["single","all","multiple"]

            var single = document.getElementsByClassName(toothClassList[0]);
            var all = document.getElementsByClassName(toothClassList[1]);
            var mult = document.getElementsByClassName(toothClassList[2]);

//     console.log(mult.length);

            if (tooths.length === 0){
                for (i=0;i<all.length;i++){
                    all[i].style.display = "block";
                }
                for(i=0;i<single.length;i++){
                    single[i].style.display = "none";
                }
                for(i=0;i<mult.length;i++){
                    mult[i].style.display = "none";
                }
            } else if(tooths.length === 1){
                for (i=0;i<all.length;i++){
                    all[i].style.display = "none";
                }
                for(i=0;i<single.length;i++){
                    single[i].style.display = "block";
                }
                for(i=0;i<mult.length;i++){
                    mult[i].style.display = "none";
                }
            } else {
                for (i=0;i<all.length;i++){
                    all[i].style.display = "single";
                }
                for(i=0;i<single.length;i++){
                    single[i].style.display = "none";
                }
                for(i=0;i<mult.length;i++){
                    mult[i].style.display = "block";
                }
            }
        }
        function myFunction(ruby){
//            Validation start
            if(selectedArea.length === 0) {
                selectedArea.push(ruby);
            } else {
                var check = true;
                for (var count = 0; count < selectedArea.length;
                     count++) {
                    if (selectedArea[count] === ruby) {
                        check = false;
                    }
                }
                if (check) {
                    selectedArea.push(ruby);
                } else {
                    selectedArea.splice(selectedArea.indexOf(ruby), 1);
                }
            }

//            ----Validation End------
//              Change Color on click
            if (selectedArea.includes(ruby) === true) {

                document.getElementById("pol"+ruby).setAttribute('class','lombo');
            } else if (selectedArea.includes(ruby) === false) {

                document.getElementById("pol"+ruby).setAttribute('class','empty');
            }
//            sumList
            var total = sumList(selectedArea);

//            hidden value
            var x = document.getElementById('hidden').value=total;
            console.log(ruby);

        }



        //--------BURI START----------



    </script>

    <div class="container-fluid">
        <div class="row">
            <!--                <div class="col-md-1"></div>-->
            <div class="col-md-9">
                <table class="table table-condensed
table-responsive" style="width:">

                    <!--                1st row start-->
                    <thead>
                    <tr>
                        <th class="text-center">16</th>
                        <th class="text-center">15</th>
                        <th class="text-center">14</th>
                        <th class="text-center">13</th>
                        <th class="text-center">12</th>
                        <th class="text-center">11</th>
                        <th class="text-center">10</th>
                        <th class="text-center">9</th>
                        <th class="text-center">8</th>
                        <th class="text-center">7</th>
                        <th class="text-center">6</th>
                        <th class="text-center">5</th>
                        <th class="text-center">4</th>
                        <th class="text-center">3</th>
                        <th class="text-center">2</th>
                        <th class="text-center">1</th>
                    </tr>
                    </thead>
                    <tbody>


                    <tr>
                        <th>
                            <img src="/SHUD/Layer1.png" id="1" onclick="changeStyle('1')" width="100%">
                        </th>
                        <th>
                            <img src="/SHUD/Layer2.png" id="2" onclick="changeStyle('2')" width="100%">
                        </th>
                        <th>
                            <img src="/SHUD/Layer3.png" id="3" onclick="changeStyle('3')" width="100%">
                        </th>
                        <th>
                            <img src="/SHUD/Layer4.png" id="4" onclick="changeStyle('4')" width="100%">
                        </th>
                        <th>
                            <img src="/SHUD/Layer5.png" id="5" onclick="changeStyle('5')" width="100%">
                        </th>
                        <th>
                            <img src="/SHUD/Layer6.png" id="6" onclick="changeStyle('6')" width="100%">
                        </th>
                        <th>
                            <img src="/SHUD/Layer7.png" id="7" onclick="changeStyle('7')" width="100%">
                        </th>
                        <th>
                            <img src="/SHUD/Layer8.png" id="8" onclick="changeStyle('8')" width="100%">
                        </th>
                        <th>
                            <img src="/SHUD/Layer9.png" id="9" onclick="changeStyle('9')" width="100%">
                        </th>
                        <th>
                            <img src="/SHUD/Layer10.png" id="10" onclick="changeStyle('10')" width="100%">
                        </th>
                        <th>
                            <img src="/SHUD/Layer11.png" id="11" onclick="changeStyle('11')" width="100%">
                        </th>
                        <th>
                            <img src="/SHUD/Layer12.png" id="12" onclick="changeStyle('12')" width="100%">
                        </th>
                        <th>
                            <img src="/SHUD/Layer13.png" id="13" onclick="changeStyle('13')" width="100%">
                        </th>
                        <th>
                            <img src="/SHUD/Layer14.png" id="14" onclick="changeStyle('14')" width="100%">
                        </th>
                        <th>
                            <img src="/SHUD/Layer15.png" id="15" onclick="changeStyle('15')" width="100%">
                        </th>
                        <th>
                            <img src="/SHUD/Layer16.png" id="16" onclick="changeStyle('16')" width="100%">
                        </th>
                    </tr>
                    </tbody>
                    <!--                1st row end 2nd row start-->
                    <thead>
                    <tr>
                        <th class="text-center">17</th>
                        <th class="text-center">18</th>
                        <th class="text-center">19</th>
                        <th class="text-center">20</th>
                        <th class="text-center">21</th>
                        <th class="text-center">22</th>
                        <th class="text-center">23</th>
                        <th class="text-center">24</th>
                        <th class="text-center">25</th>
                        <th class="text-center">26</th>
                        <th class="text-center">27</th>
                        <th class="text-center">28</th>
                        <th class="text-center">29</th>
                        <th class="text-center">30</th>
                        <th class="text-center">31</th>
                        <th class="text-center">32</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th>
                            <img src="/SHUD/Layer17.png" id="17" onclick="changeStyle('17')" width="100%">
                        </th>
                        <th>
                            <img src="/SHUD/Layer18.png" id="18" onclick="changeStyle('18')" width="100%">
                        </th>
                        <th>
                            <img src="/SHUD/Layer19.png" id="19" onclick="changeStyle('19')" width="100%">
                        </th>
                        <th>
                            <img src="/SHUD/Layer20.png" id="20" onclick="changeStyle('20')" width="100%">
                        </th>
                        <th>
                            <img src="/SHUD/Layer21.png" id="21" onclick="changeStyle('21')" width="100%">
                        </th>
                        <th>
                            <img src="/SHUD/Layer22.png" id="22" onclick="changeStyle('22')" width="100%">
                        </th>
                        <th>
                            <img src="/SHUD/Layer23.png" id="23" onclick="changeStyle('23')" width="100%">
                        </th>
                        <th>
                            <img src="/SHUD/Layer24.png" id="24" onclick="changeStyle('24')" width="100%">
                        </th>
                        <th>
                            <img src="/SHUD/Layer25.png" id="25" onclick="changeStyle('25')" width="100%">
                        </th>
                        <th>
                            <img src="/SHUD/Layer26.png" id="26" onclick="changeStyle('26')" width="100%">
                        </th>
                        <th>
                            <img src="/SHUD/Layer27.png" id="27" onclick="changeStyle('27')" width="100%">
                        </th>
                        <th>
                            <img src="/SHUD/Layer28.png" id="28" onclick="changeStyle('28')" width="100%">
                        </th>
                        <th>
                            <img src="/SHUD/Layer29.png" id="29" onclick="changeStyle('29')" width="100%">
                        </th>
                        <th>
                            <img src="/SHUD/Layer30.png" id="30" onclick="changeStyle('30')" width="100%">
                        </th>
                        <th>
                            <img src="/SHUD/Layer31.png" id="31" onclick="changeStyle('31')" width="100%">
                        </th>
                        <th>
                            <img src="/SHUD/Layer32.png" id="32" onclick="changeStyle('32')" width="100%">
                        </th>
                    </tr>
                    </tbody>
                    <!--                2nd row end-->
                </table>

                <!--                    col-9 end-->
            </div>

            <div class="col-md-3">


                <div class="card">
                    <div class="card-body">
                        <button class="all btn btn-secondary btn-block" id="lombo" data-toggle="modal" data-target="#exampleModal" data-whatever="buro">
                            <div class="row">
                                <div class="col-md-4 text-center">
                                    <img src="img/toothImages/svg/teeth.svg" width="40px">
                                </div>
                                <div class="col-md-8 text-left">
                                    all
                                </div>
                            </div>
                        </button>

                        <button class="all btn btn-secondary btn-block" id="lombo" data-toggle="modal" data-target="#exampleModal" data-whatever="buro">
                            <div class="row">
                                <div class="col-md-4 text-center">
                                    <img src="img/toothImages/svg/teeth.svg" width="40px">
                                </div>
                                <div class="col-md-8 text-left">
                                    all
                                </div>
                            </div>
                        </button>

                        <button class="multiple btn btn-secondary btn-block" id="lombo" data-toggle="modal" data-target="#exampleModal" data-whatever="buro">
                            <div class="row">
                                <div class="col-md-4 text-center">
                                    <img src="img/toothImages/svg/teeth.svg" width="40px">
                                </div>
                                <div class="col-md-8 text-left">
                                    <!--                                Фтор <br> Бүх шүд-->
                                    multiple
                                </div>
                            </div>
                        </button>

                        <button class="multiple btn btn-secondary btn-block" id="lombo" data-toggle="modal" data-target="#exampleModal" data-whatever="buro">
                            <div class="row">
                                <div class="col-md-4 text-center">
                                    <img src="img/toothImages/svg/teeth.svg" width="40px">
                                </div>
                                <div class="col-md-8 text-left">
                                    multiple
                                </div>
                            </div>
                        </button>

                        <button class="multiple btn btn-secondary btn-block" id="lombo" data-toggle="modal" data-target="#exampleModal" data-whatever="buro">
                            <div class="row">
                                <div class="col-md-4 text-center">
                                    <img src="img/toothImages/svg/teeth.svg" width="40px">
                                </div>
                                <div class="col-md-8 text-left">
                                    single
                                </div>
                            </div>
                        </button>

                        <button class="single btn btn-secondary btn-block" id="lombo" data-toggle="modal" data-target="#exampleModal" data-whatever="buro">
                            <div class="row">
                                <div class="col-md-4 text-center">
                                    <img src="img/toothImages/svg/teeth.svg" width="40px">
                                </div>
                                <div class="col-md-8 text-left">
                                    single
                                </div>
                            </div>
                        </button>

                        <button class="single btn btn-secondary btn-block" id="lombo" data-toggle="modal" data-target="#exampleModal" data-whatever="buro">
                            <div class="row">
                                <div class="col-md-4 text-center">
                                    <img src="img/toothImages/svg/device.svg" width="40px">
                                </div>
                                <div class="col-md-8 text-left">
                                    single
                                </div>
                            </div>
                        </button>

                        <button class="single btn btn-secondary btn-block" id="lombo" data-toggle="modal" data-target="#exampleModal" data-whatever="buro">
                            <div class="row">
                                <div class="col-md-4 text-center">
                                    <img src="img/toothImages/svg/device.svg" width="40px">
                                </div>
                                <div class="col-md-8 text-left">
                                    single
                                </div>
                            </div>
                        </button>

                    </div>
                </div>
            </div>

        </div>

    </div>
    <div class="card mb-4">
        <div class="card-body text-center">

            <h5 class="mb-1">Basic</h5>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!--                                            content modal-->
                            <input type="hidden" id="hidden" value="">
                            <svg height="200" width="200" >
                                <polygon id="pol1" points="0,0 100,100 200,0" onclick="myFunction('1')" />
                                <polygon id="pol2" points="100,100 200,0 200,200" onclick="myFunction('2')"/>
                                <polygon id="pol4" points="0,200 100,100 200,200" onclick="myFunction('4')"/>
                                <polygon id="pol8" points="0,0 100,100 0,200" onclick="myFunction('8')"/>
                                <circle  id="pol16" cx="100" cy="100" r="50" onclick="myFunction('16')"/>
                            </svg>
                            <div class="text-center">
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-primary active">
                                        <input type="radio" name="options" id="option1" checked> 1
                                    </label>
                                    <label class="btn btn-primary">
                                        <input type="radio" name="options" id="option2"> 2
                                    </label>
                                    <label class="btn btn-primary">
                                        <input type="radio" name="options" id="option3"> 3
                                    </label>
                                    <label class="btn btn-primary">
                                        <input type="radio" name="options" id="option3"> 4
                                    </label>
                                </div>
                            </div>
                            <br>
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider round"></span>
                            </label>
                            <!--                                            content modal-->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





</main>
<!--    Ganaa1021-->
<script src="js/vendor/jquery-3.3.1.min.js"></script>
<script src="js/vendor/bootstrap.bundle.min.js"></script>
<script src="js/vendor/perfect-scrollbar.min.js"></script>
<script src="js/vendor/mousetrap.min.js"></script>
<script src="js/dore.script.js"></script>
<script src="js/scripts.single.theme.js"></script>
</body>

</html>



