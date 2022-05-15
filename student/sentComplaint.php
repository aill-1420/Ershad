<?php
include '../confi/app.php';
ob_start();
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
session_start();
$complaint = $_GET['complaint'];
$user = $_SESSION['userid'];
$query = "SELECT * FROM complaint WHERE id_complaint = " . $complaint;
$data = $mysql->query($query)->fetch_array(MYSQLI_ASSOC);
$query = "SELECT * FROM advising_file WHERE student_id =".$user;
$datadb = $mysql->query($query);
$check = $datadb->num_rows;
$file = 0;

if($check) {
    $file = true;
} else {
    $file = false;
}
?>
<!DOCTYPE html>
<html len="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>الشكاوى المرسلة</title>
    <link rel="icon" href="../template/assets/images/ErshadLogo.svg" type="image/gif" sizes="16x16"> <!-- favicon.-->
    <!-- link css -->
    <link id="pagestyle" href="../template/assets/css/Library_Style.css" rel="stylesheet" />
    <link id="pagestyle" href="../template/assets/css/Student_Style.css" rel="stylesheet" />

    <!-- link Java Script -->
    <script class="u-script" type="text/javascript" src="../template/assets/js/Student_JS.js" defer=""></script>
    <script src="../template/assets/js/jquery.min.js"></script>
    <script src="../template/assets/js/main.js"></script>

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <!-- Start CSS Style -->
    <style>

        /* Style the tab */
        .tab {
            overflow: hidden;
            box-shadow: 1px 1px 3px #E5E5EB;
            background-color: #E7F3F5;
            border-radius: 0px 15px 15px 0px;
            z-index: 3;
            float: right;
            width: 30%;
            height: 32.1vw;
        }

        /* Style the buttons that are used to open the tab content */
        .tab button {
            background-color: inherit;
            border: none;
            outline: none;
            cursor: pointer;
            transition: 0.3s;
            display: block;
            padding: 22px 16px;
            width: 100%;
            text-align: right;
            font-size: 18px;
            font-weight: 500;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #97CADB;
            color: #fff;
        }

        /* Create an active/current tablink class */
        .tab button.active {
            background-color: #97CADB;
            color: #fff;
        }

        /* Style the tab content */
        .tabcontent {
            float: right;
            padding: 0px 12px;
            width: 100%;
            height: 36vw;
            box-shadow: -1px 0px 6px #E5E5EB;
            border-radius: 15px 0px 0px 15px;
            padding: 1vw 4vw;
        }
        .tabcontent h3{
            text-align-last: center;
            padding: 1vw;
        }
        #titleTab{
            font-weight: 600;
            font-size: 20px;
            text-align-last: center;
            padding: 1vw 1vw 0.3vw;
            cursor: default;
        }
        #titleTab:hover {
            background-color: #E7F3F5;;
            color: #001B48;
        }
    </style>
    <!-- End CSS Style -->

</head>

<body class="u-body" style="font-family: 'Tajawal', sans-serif;" dir="rtl">

<!-- Start Header-->
<header class="u-clearfix u-header u-sticky u-sticky-5894 u-header" id="sec-92d8" style="direction: rtl;background-color: white; box-shadow: 1px 1px 6px #AEADBF; height: 5vw; padding-right: 2vw;">
    <!-- Start Logo -->
    <a href="#" class="u-image u-logo u-image-1" data-image-width="709" data-image-height="512">
        <img src="../template/assets/images/ErshadLogo.svg" class="u-logo-image u-logo-image-1" style="margin-right: 0.5vw; margin-top: -0.5vw;">
    </a>
    <!-- End Logo -->

    <div class="u-clearfix u-sheet u-sheet-1" style="top: -2.5vw; z-index: 30;">
        <!-- Start Navigation Bar -->
        <div class="headerNavbar" style="margin-top: 0.2vw; margin-right: -9vw;">
            <ul>
                <li><a href="HomePage.html">الرئيسية</a></li>
                <li><a href="studyPlan.html">خطة الطالب</a></li>
                <li><a href="advisingFile.html">الملف الإرشادي</a></li>
                <li><a class="activeNav" href="listComplaint.php">الشكاوى المرسلة</a></li>
            </ul>
        </div>
        <!-- End Navigation Bar -->
        <!-- Start Search -->
        <div class="input-group" style="direction: ltr; width: 20%;  margin-top: -3.4vw; float: left; box-shadow: 0px 0px 2px #AEADBF; z-index: 30;">
            <span class="input-group-text text-body" ><i class="fas fa-search" aria-hidden="true"></i></span>
            <input type="text" class="form-control" placeholder="أكتب هنا..." style="direction: rtl; ">
        </div>
    </div>
    <!-- Start navigation -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false" style="top: -8.8vw; z-index: 20;">
        <!-- Start navigation list -->
        <ul class="navbar-nav me-auto ms-0 justify-content-end" style="margin-top: -0.3vw;">
            <li class="nav-item px-0 d-flex align-items-center icon-lg">
                <a href="personalSettings.html" class="nav-link text-success font-weight-bold px-2">
                    <i class="fa fa-user me-sm-1"></i>
                    <span class="d-sm-inline d-none"></span>
                </a>
            </li>
            <li class="nav-item dropdown ps-2 d-flex align-items-center icon-lg">
                <a href="javascript:;" class="nav-link text-success font-weight-bold px-2" id="dropdownMenuButton" data-bs- toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-bell cursor-pointer"></i>
                </a>
                <!-- Start Dropdown Menu -->
                <ul class="dropdown-menu  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                    <li class="mb-2">
                        <a class="dropdown-item border-radius-md" href="javascript:;">
                            <div class="d-flex py-1">
                                <div class="my-auto">
                                    <img src="../assets/images/team-2.jpg" class="avatar avatar-sm  ms-3 ">
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="text-sm font-weight-normal mb-1">
                                        <span class="font-weight-bold">New message</span> from Laur
                                    </h6>
                                    <p class="text-xs text-secondary mb-0">
                                        <i class="fa fa-clock me-1"></i>
                                        13 minutes ago
                                    </p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a class="dropdown-item border-radius-md" href="javascript:;">
                            <div class="d-flex py-1">
                                <div class="my-auto">
                                    <img src="../assets/images/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark  ms-  3 ">
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="text-sm font-weight-normal mb-1">
                                        <span class="font-weight-bold">New album</span> by Travis Scott
                                    </h6>
                                    <p class="text-xs text-secondary mb-0">
                                        <i class="fa fa-clock me-1"></i>
                                        1 day
                                    </p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item border-radius-md" href="javascript:;">
                            <div class="d-flex py-1">
                                <div class="avatar avatar-sm bg-gradient-secondary  ms-3  my-auto">
                                    <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1"       xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <title>credit-card</title>
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                                <g transform="translate(1716.000000, 291.000000)">
                                                    <g transform="translate(453.000000, 454.000000)">
                                                        <path class="color-background" d="M43,10.7482083 L43,3.58333333         C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                                        <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917  1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="text-sm font-weight-normal mb-1">
                                        Payment successfully completed
                                    </h6>
                                    <p class="text-xs text-secondary mb-0">
                                        <i class="fa fa-clock me-1"></i>
                                        2 days
                                    </p>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- End Dropdown Menu -->
            </li>
        </ul>
        <!-- End navigation list -->
    </nav>
    <!-- End navigation -->
</header>
<!-- End Header-->
<!--==========================================================================================-->


<!--Start content -->

<!-- Start body content -->
<div class="container-fluid py-4">

    <!-- Start Second row -->

    <div class="col-12">
        <div class="card" style="width: 80%; margin-right: 10vw;">

            <div id="complaint1" class="tabcontent">
                <h3>
                    <?php echo $data['complaint_subject'] ?>
                </h3>
                <p>
                    <?php echo $data['complaint_text'] ?>
                </p>
            </div>


        </div>
    </div>
</div>

<!-- End body content -->



<!-- Start Footer-->

<section class="u-backlink u-clearfix u-grey-80" dir="rtl">
    <p class="u-text">
        <span>جميع الحقوق محفوظة لدى فريق </span>
    </p>
    <a class="u-link" href="">
        <span>إرشاد</span>
    </a>.
</section>
<!-- End Footer-->


<script>
    'use strict';

    var $window = $(window);

    function run()
    {
        var fName = arguments[0],
            aArgs = Array.prototype.slice.call(arguments, 1);
        try {
            fName.apply(window, aArgs);
        } catch(err) {

        }
    };

    /* chart
    ================================================== */
    function _chart (){
        $('.b-skills').appear(function() {
            setTimeout(function() {
                $('.chart').easyPieChart({
                    easing: 'easeOutElastic',
                    delay: 3000,
                    barColor: '#fff',
                    trackColor: false,
                    scaleColor: false,
                    lineWidth: 28,
                    trackWidth: 28,
                    size: 300,

                    lineCap: 'circle',
                    onStep: function(from, to, percent) {
                        this.el.children[0].innerHTML = Math.round(percent);
                    }
                });
            }, 150);
        });
    };


    $(document).ready(function() {
        run(_chart);
    });

    /* header
================================================== */
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll > 0) {
            $("#sec-92d8").addClass("active");
        }
        else {
            $("#sec-92d8").removeClass("active");
        }
    });



    //tap script

    function openComplaint(evt, complaint) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(complaint).style.display = "block";
        evt.currentTarget.className += " active";
    }
    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
</script>
</body>
</html>