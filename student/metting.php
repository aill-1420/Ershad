<?php
ob_start();
session_start();
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include '../confi/app.php';

$user = $_SESSION['userid'];
$db = "SELECT * FROM students WHERE id =".$user;
$f = $mysql->query($db)->fetch_array(MYSQLI_ASSOC);
$id = $f['adviser_id'];
$query = "SELECT * FROM meeting WHERE acadmic_advising_id =".$id;
$data = $mysql->query($query)->fetch_all(MYSQLI_ASSOC);


if(isset($_GET['reserve'])) {
    $meeting = $_GET['reserve'];
    $id = $_SESSION['userid'];
    $query = "INSERT INTO `reservation` (`student_id`, `metting_id`) 
                    VALUES ('$id', '$meeting')";
    $mysql->query($query);
    $success = TRUE;
}

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
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>اختيار موعد لقاء</title>
    <link rel="icon" href="../template/assets/images/ErshadLogo.svg" type="image/gif" sizes="16x16"> <!-- favicon.-->

    <!-- Nucleo Icons -->
    <link href="../template/assets/css/nucleo-icons.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- link css -->
    <link id="pagestyle" href="../template/assets/css/Library_Style.css" rel="stylesheet" />
    <link id="pagestyle" href="../template/assets/css/Student_Style.css" rel="stylesheet" />


    <!-- link Java Script -->
    <script class="u-script" type="text/javascript" src="../template/assets/js/Student_JS.js" defer=""></script>
    <script src="../template/assets/js/jquery.min.js"></script>
    <script src="../template/assets/js/main.js"></script>

    <!-- font link -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">



    <style>

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
            top: 0;


        }
        #list th:first-child {
            padding: 1vw;
            text-align: left;
            background-color: #02457A;
            color: white;
            position: sticky;
            top: 0;
            border-top-right-radius: 15px;


        }
        #list th:last-child {
            padding: 1vw;
            text-align: left;
            background-color: #02457A;
            color: white;
            position: sticky;
            top: 0;
            border-top-left-radius: 15px;


        }

        .tableBtn{
            background-color: #97CADB;
            color: #fff;
            border-radius: 15px;
            border: none;
            padding: 0.2vw 2vw 0.1vw;
            font-size: 20px;
        }

        .tableBtn:hover{
            opacity: 0.4;
        }

    </style>
</head>

<body style="font-family: 'Tajawal', sans-serif; text-align-last: right;" dir="rtl">


<!--Start content -->
<main class="main-content position-relative border-radius-lg overflow-hidden">

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
                    <li><a  href="studentHome.php">الرئيسية</a></li>
                    <li><a class="activeNav" href="metting.php">حجز موعد لقاء</a></li>
                    <?php if($file == true) { ?>
                        <li><a href="view_advising_file.php">الملف الإرشادي</a></li>
                    <?php } else { ?>
                        <li><a href="create_advising_file.php">الملف الإرشادي</a></li>
                    <?php } ?>
                    <li><a href="listComplaint.php">الشكاوى المرسلة</a></li>
                </ul>
            </div>
            <!-- End Navigation Bar -->

            <!-- Start Search -->
            <!--<div class="input-group" style="direction:ltr; width: 20%;  margin-top: -3.4vw; float: left; box-shadow: 0px 0px 2px #AEADBF; z-index: 30;">
                <span class="input-group-text text-body "><i class="fas fa-search" aria-hidden="true"></i></span>
                <input type="text" class="form-control" dir="rtl" placeholder="أكتب هنا...">
            </div>-->
            <!-- End Search -->

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
                                        <img src="../template/assets/images/team-2.jpg" class="avatar avatar-sm  ms-3 ">
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
                                        <img src="../template/assets/images/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark  ms-  3 ">
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

    <!-- Start body content -->
    <div class="container-fluid py-4">


        <?php if(isset($success)){ ?>
        <div class="alert alert-success" role="alert">
            تم حجز الموعد بنجاح
        </div>
        <?php }?>


        <!--Start forth row -->
        <div class="row my-4">
            <div class="col-lg-12 col-md-6 mb-md-0 mb-4" >
                <div class="card" style="padding: 0vw; " > <!--- overflow-y: scroll; , border-radius: 25px;  , height: 32vw; --->
                    <table id="list" >
                        <tr>
                            <th>رقم اللقاء</th>
                            <th>التاريخ</th>
                            <th>الوقت</th>
                            <th>مدة اللقاء</th>
                            <th>مكان اللقاء</th>
                            <th>اختيار الموعد</th>
                        </tr>
                        <?php foreach ($data as $m) { ?>
                        <tr>
                            <td><?php echo $m['id'] ?></td>
                            <td><?php
                                $time = new DateTime($m['date_time']);
                                echo $time->format('d-m-Y');
                                ?></td>
                            <td><?php
                                $time = new DateTime($m['date_time']);
                                echo $time->format('h:i:s A');
                                ?></td>
                            <td><?php echo $m['duration'] ?>  دقيقة</td>
                            <td><?php echo $m['place'] ?></td>
                            <td><a class="tableBtn" href="?reserve=<?php echo $m['id'] ?>"><i class="icm icon-check" style="color: #fff;">  </i></a></td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
                <div style="height: 1.7vw;"></div>
            </div>
        </div>
        <!--End forth row-->


    </div>
    <!-- End body content -->
</main>
<!-- End content -->
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


    //count rows
    //
    //            window.onload = function(){
    //                var paginationPage = parseInt($('.cdp').attr('actpage'), 10);
    //                $('.cdp_i').on('click', function(){
    //                    var go = $(this).attr('href').replace('#!', '');
    //                    if (go === '+1') {
    //                        paginationPage++;
    //                    } else if (go === '-1') {
    //                        paginationPage--;
    //                    }else{
    //                        paginationPage = parseInt(go, 10);
    //                    }
    //                    $('.cdp').attr('actpage', paginationPage);
    //                });
    //            };

</script>
</body>

</html>