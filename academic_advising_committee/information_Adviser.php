<?php
ob_start();
session_start();
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include '../confi/app.php';

$id = $_GET['user'];
$query = "SELECT * FROM acadmic_advising WHERE id = '$id'";
$data = $mysql->query($query)->fetch_array();


#$queryMetting = "SELECT * FROM reservation INNER JOIN students ON students.id = reservation.student_id INNER JOIN meeting ON reservation.metting_id = meeting.id ";
$queryMetting = "SELECT * FROM meeting INNER JOIN reservation ON meeting.id = reservation.metting_id WHERE reservation.student_id = ".$id;
$metting = $mysql->query($queryMetting)->fetch_all(MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>معلومات المرشد</title>
    <link rel="icon" href="../template/assets/images/ErshadLogo.svg" type="image/gif" sizes="16x16"> <!-- favicon.-->

    <!-- Nucleo Icons -->
    <link href="../template/assets/css/nucleo-icons.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- CSS Files -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link id="pagestyle" href="../template/assets/css/Dashboard_Style.css" rel="stylesheet" />
    <link id="pagestyle" href="../template/assets/css/Library_Style.css" rel="stylesheet" />

    <!-- link Java Script -->
    <script src='../template/assets/js/argon-dashboard.js' type="text/javascript"></script>
    <script src='../template/assets/js/Dashboard.js' type="text/javascript"></script>

    <!-- font link -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">



    <style>


        .group-title{
            position: relative;
            top: 0.5rem;
            right: 2rem;
            z-index: 3;
            font-weight: 600;
            font-size: 17px;
            text-align: right;
            color: #97CADB;
            background-color: #fff;
            padding-right: 1rem!important;
            padding-left: 1rem!important;
            cursor: default;
            box-sizing: border-box;
            font-family: 'Tajawal', sans-serif;
            margin: 0px;
        }
        .group-content{
            font-size: 1rem;
            color: #001B48;
            font-style: normal;
            font-weight: 500;
            text-align: right;
            z-index: 1;
            padding: 0.75vw 2vw;
            border: 2px solid #97CADB;
            border-radius: 30px;
            font-family: 'Tajawal', sans-serif;
        }

        #list {
            border-collapse: collapse;
            width: 100%;
            border-radius: 15px;
            position: relative;
        }
        #titleList {
            width: 76.5%;
            border-radius: 15px;
        }

        #list td, #list th {
            padding: 1vw;
        }

        #list tr:nth-child(even){
            background-color: #E5E5EB;
        }

        #list th {
            padding: 1vw;
            text-align: left;
            background-color: #02457A;
            color: white;
            position: sticky;
            margin-top: 0;

        }
        .tableBtn{
            background-color: #97CADB;
            color: #fff;
            border-radius: 15px;
            border: none;
            padding: 0.2vw 2vw;
            font-size: 20px;
        }

        .tableBtn:hover{
            opacity: 0.4;
        }
        .event-list {
            list-style: none;
            font-family: 'Tajawal', sans-serif;
            margin: 0px;
            padding: 2px 2px 0px 4px;

        }
        .event-list > li {
            background-color: rgb(255, 255, 255);
            box-shadow: 0px 0px 5px rgb(51, 51, 51);
            box-shadow: 0px 0px 5px rgba(51, 51, 51, 0.7);
            padding: 2px;
            margin: 0px 0px 10px;
            border-radius: 15px;
        }
        .event-list > li > time {
            display: inline-block;
            width: 100%;
            color: rgb(255, 255, 255);
            background-color: #02457A;
            padding: 5px;
            text-align: center;
            text-transform: uppercase;
            border-radius:  0 15px 15px 0;
        }
        .event-list > li:nth-child(even) > time {
            background-color: #001B48;
        }
        .event-list > li > time > span {
            display: none;
            text-align-last: center;
        }
        .event-list > li > time > .day {
            display: block;
            font-size: 24px;
            font-weight: 100;
            line-height: 1;
            align-content: center;
        }
        .event-list > li time > .month {
            display: block;
            font-size: 16px;
            font-weight: 500;
            line-height: 1;
            align-content: center;
        }
        .event-list > li > .info {
            padding-top: 5px;
            text-align: center;
        }
        .event-list > li > .info > .title {
            font-size: 18px;
            font-weight: 700;
            margin: 0px;
        }
        .event-list > li > .info > .row > .col-md-4 > .desc {
            font-size: 18px;
            font-weight: 600;
            margin: 0px;
            color: #001B48;
            padding: 0vw 1vw;
        }
        .row > .col-md-4 > .time{
            padding: 0vw 1vw;
            font-size: 14px;
            color: #02457A;
        }
        .row > .col-md-6 > .adviserName{
            padding: 1vw 0vw;
            font-size: 15px;
            color: #AEADBF ;
        }
        .event-list > li > .info > ul {
            display: table;
            list-style: none;
            margin: 10px 0px 0px;
            padding: 0px;
            width: 100%;
            text-align: center;
        }
        .event-list > li > .info > ul > li {
            display: table-cell;
            cursor: pointer;
            color: rgb(30, 30, 30);
            font-size: 11px;
            font-weight: 300;
            padding: 3px 0px;
        }
        .event-list > li > .info > ul > li > a {
            display: block;
            width: 100%;
            color: rgb(30, 30, 30);
            text-decoration: none;
        }

        .event-list > li > .info > ul > li:hover,{
            color: rgb(30, 30, 30);
            background-color: rgb(200, 200, 200);
        }

        @media (min-width: 768px) {
            .event-list > li {
                position: relative;
                display: block;
                width: 100%;
                height: 70px;
                padding: 0px;
            }
            .event-list > li > time {
                display: inline-block;
            }
            .event-list > li > time {
                width: 70px;
                float: right;
            }
            .event-list > li > .info {

                overflow: hidden;
            }
            .event-list > li > time {
                width: 70px;
                height: 70px;
                padding: 10px;
                margin: 0px;
            }
            .event-list > li > .info {
                position: relative;
                height: 80px;
                text-align: center;
                padding-right: 0px;
            }
            .event-list > li > .info > .title,
            .event-list > li > .info > .desc {
                padding: 0px 10px;
            }
            .event-list > li > .info > ul {
                position: absolute;
                left: 0px;
                bottom: 0px;
            }
            .day {
                height: 16px;
                width: 50px;
                padding: 0;
                line-height: 20px;
                border: 2px solid transparent;
                text-transform: uppercase;
                font-size: 10px;
                color: #fff;
                text-align-last: center;
            }
            .month {
                cursor: default;
                height: 26px;
                width: 50px;
                padding: 0 2px;
                padding-top: 10px;
                line-height: 26px;
                text-transform: uppercase;
                font-size: 11px;
                color: #fff;
                -webkit-transition: all 250ms;
                -o-transition: all 250ms;
                transition: all 250ms;
            }
        }
    </style>
</head>

<body class="g-sidenav-show rtl  bg-gray-100" style="font-family: 'Tajawal', sans-serif; text-align-last: right;">

<!-- Top Background Color-->
<div class="min-height-300 bg-primary position-absolute w-100"></div>

<!-- Start Right List-->
<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-end me-4 rotate-caret" id="sidenav-main">
    <!-- Start header list-->
    <div class="sidenav-header" style="text-align-last: right;">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute start-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="" target="_blank">
            <img src="../template/assets/images/ErshadLogo.svg" class="navbar-brand-img h-100" alt="main_logo">
            <span class="me-1 font-weight-bold">منصة إرشاد</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <!-- End header list-->

    <!-- Start list -->
    <div class="collapse navbar-collapse px-0 w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="dshboard_committee.php">
                    <div class="icon icon-shape icon-sm border-radius-md text-center ms-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-secondary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text me-1">نظرة عامة</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="students_List.php" style="cursor: pointer;">
                    <div class="icon icon-shape icon-sm border-radius-md text-center ms-2 d-flex align-items-center justify-content-    center">
                        <i class="icm icon-users text-secondary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text me-1">الطلاب</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="adviser_list.php" style="cursor: pointer;">
                    <div class="icon icon-shape icon-sm border-radius-md text-center ms-2 d-flex align-items-center justify-content-    center">
                        <i class="icm icon-users text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text me-1">المرشدين الأكاديميين</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="complaints_List.php">
                    <div class="icon icon-shape icon-sm border-radius-md text-center ms-2 d-flex align-items-center justify-content-    center">
                        <i class="icm icon-list-alt text-secondary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text me-1">شكاوي الطلاب</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="assign_student_ToAdviser.php">
                    <div class="icon icon-shape icon-sm border-radius-md text-center ms-2 d-flex align-items-center justify-content-    center">
                        <i class="icm icon-mode_edit text-secondary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text me-1">اسناد طالب إلى مرشد</span>
                </a>
            </li>

        </ul>
    </div>
    <!-- End list -->

</aside>
<!-- End Right List-->


<!--Start content -->
<main class="main-content position-relative border-radius-lg overflow-hidden">

    <!-- Start navigation -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 ">
                    <li class="breadcrumb-item text-sm ps-2"><a class="opacity-5 text-white" href="committeeDashboard.html">لوحة القيادة</a></li>
                    <li class="breadcrumb-item text-sm ps-2"><a class="opacity-5 text-white" href="advisersList.html">المرشدين الأكاديميين</a></li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">معلومات المرشد</li>
                </ol>
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 px-0" id="navbar">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    <!-- Start Search -->
                    <div class="input-group">
                        <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" placeholder="أكتب هنا...">
                    </div>
                    <!-- End Search -->
                </div>
                <!-- Start navigation list -->
                <ul class="navbar-nav me-auto ms-0 justify-content-end">
                    <li class="nav-item px-3 d-flex align-items-center">
                        <a href="editProfile.html" class="nav-link text-white p-0">
                            <i class="fa fa-user fixed-plugin-button-nav cursor-pointer"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown ps-2 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-bell cursor-pointer"></i>
                        </a>
                        <ul class="dropdown-menu  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                            <li class="mb-2">
                                <a class="dropdown-item border-radius-md" href="javascript:;">
                                    <div class="d-flex py-1">
                                        <div class="my-auto">
                                            <img src="../assets/img/team-2.jpg" class="avatar avatar-sm  ms-3 ">
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
                                            <img src="../assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark  ms-3 ">
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
                                            <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1"   xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <title>credit-card</title>
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                                        <g transform="translate(1716.000000, 291.000000)">
                                                            <g transform="translate(453.000000, 454.000000)">
                                                                <path class="color-background" d="M43,10.7482083 L43,3.58333333     C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                                                <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
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
                    </li>
                </ul>
                <!-- End navigation list -->
            </div>
        </div>
    </nav>
    <!-- End navigation -->

    <!-- Start body content -->
    <div class="container-fluid py-4">

        <!-- Start Second row -->
        <div class="row mt-4">
            <div class="col-lg-4 mb-lg-0 mb-2">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row mb-3">
                            <div class="col-12">
                                <h3>معلومات المرشد</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="infromation-group">
                                <label class="group-title">اسم المرشد</label>
                                <div>
                                    <p class="group-content">
                                        <?php echo $data['full_name'] ?>
                                    </p>
                                </div>
                            </div>
                            <div class="infromation-group">
                                <label class="group-title">رقم المرشد</label>
                                <div>
                                    <p class="group-content">
                                        <?php echo $data['adviderid'] ?>
                                    </p>
                                </div>
                            </div>
                            <div class="infromation-group">
                                <label class="group-title">الكلية</label>
                                <div>
                                    <p class="group-content">
                                        <?php echo $data['collage'] ?>
                                    </p>
                                </div>
                            </div>
                            <div class="infromation-group">
                                <label class="group-title">التخصص</label>
                                <div>
                                    <p class="group-content">
                                        <?php echo $data['major'] ?>
                                    </p>
                                </div>
                            </div>
                            <div class="infromation-group">
                                <label class="group-title">عدد الطلاب</label>
                                <div>
                                    <p class="group-content">
                                        <?php
                                        $query = "SELECT * FROM students WHERE adviser_id =".$data['id'];
                                        $db = $mysql->query($query)->fetch_all(MYSQLI_ASSOC);
                                        echo count($db);
                                        ?>
                                    </p>
                                </div>
                            </div>
                            <div class="infromation-group">
                                <label class="group-title">عدد اللقاءات</label>
                                <div>
                                    <p class="group-content">
                                        <?php
                                        $query = "SELECT * FROM meeting WHERE acadmic_advising_id = ".$data['id'];
                                        $d = $mysql->query($query)->fetch_all(MYSQLI_ASSOC);
                                        echo count($d);
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card" style="padding-bottom: -5vw;">
                    <div class="card" style="padding-bottom: -5vw; margin-top: 1.3vw;">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-lg-12 me-auto ms-0">
                                    <label style="font-weight: 800;font-size: 22px; text-align: right; color: #001B48; font-family: 'Tajawal',  sans-serif; padding-bottom: 1vw;"><b>المواعيد المسجلة</b></label>
                                    <!--Start forth row -->
                                    <div class="row">
                                        <?php
                                        $query = "SELECT * FROM meeting WHERE acadmic_advising_id=".$data['id'];
                                        $meeting = $mysql->query($query)->fetch_all(MYSQLI_ASSOC);
                                        ?>
                                        <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
                                            <div class="card" style="padding: 0vw; height: 14.5vw; overflow-y: scroll;">
                                                <table id="list">
                                                    <tr>
                                                        <th>رقم اللقاء</th>
                                                        <th>التاريخ</th>
                                                        <th>الوقت</th>
                                                        <th>مدة اللقاء</th>
                                                        <th>مكان اللقاء</th>
                                                    </tr>
                                                    <?php foreach ($meeting as $m) { $time = new DateTime($m['date_time']); ?>
                                                        <tr>
                                                            <td><?php echo $m['id'] ?></td>
                                                            <td><?php echo $time->format('d-m-Y'); ?></td>
                                                            <td><?php echo $time->format('h:i:s A'); ?></td>
                                                            <td><?php echo $m['duration'] ?></td>
                                                            <td><?php echo $m['place'] ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                    <!--End forth row-->

                                </div>



                            </div>
                        </div>
                    </div>
                <div class="card" style="margin-top: 1.3vw;">
                    <div class="card-header pb-0">
                        <div class="row mb-3">
                            <div class="col-12">
                                <h3>الطلاب</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="height: 16.5vw; overflow-y: scroll; padding: 0vw 2vw 2vw">
                        <div class="row">
                            <div class="col-lg-6 me-auto ms-0">
                            </div>
                            <table id="list">
                                <tr>
                                    <th>م</th>
                                    <th>الرقم الجامعي</th>
                                    <th>اسم الطالب</th>
                                    <th>معلومات الطالب</th>
                                </tr>
                                <?php
                                $query = "SELECT * FROM students WHERE adviser_id =".$data['id'];
                                $s = $mysql->query($query)->fetch_all(MYSQLI_ASSOC);

                                ?>
                                <?php foreach($s as $m) { ?>
                                <tr>
                                    <td><?php echo $m['id'] ?></td>
                                    <td><?php echo $m['studentid'] ?></td>
                                    <td><?php echo $m['full_name'] ?></td>

                                    <td><a class="tableBtn" href="information_student.php?user=<?php echo $m['id'] ?>"><i class="icm icon-folder_shared" style="color: #fff;"></i></a></td>
                                </tr>
                                <?php } ?>
                            </table>

                        </div>
                    </div>
                    <div class="card" style="margin-top: 1vw; height: 3vw;">
                        <div class="content_detail__pagination cdp" actpage="1">
                            <a href="#!-1" class="cdp_i">السابق</a>
                            <a href="#!1" class="cdp_i">1</a>
                            <a href="#!2" class="cdp_i">2</a>
                            <a href="#!+1" class="cdp_i">التالي</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- End second row -->

        <div class="ps__rail-y" style="top: -2vw; height: 2vw; left: 0px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
        </div>
        <!--End forth row-->

        <!-- Start Footer -->
            <footer class="footer pt-3  ">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6 mb-lg-0 mb-4">
                            <div class="copyright text-center text-sm text-muted text-lg-end">

                                جميع الحقوق محفوظة لدى فريق
                                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">إرشاد</a>

                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        <!-- End Footer -->
    </div>
    <!-- End body content -->
</main>
<!-- End content -->



<script>


    //count rows

    window.onload = function(){
        var paginationPage = parseInt($('.cdp').attr('actpage'), 10);
        $('.cdp_i').on('click', function(){
            var go = $(this).attr('href').replace('#!', '');
            if (go === '+1') {
                paginationPage++;
            } else if (go === '-1') {
                paginationPage--;
            }else{
                paginationPage = parseInt(go, 10);
            }
            $('.cdp').attr('actpage', paginationPage);
        });
    };

</script>
</body>

</html>
