<?php
session_start();
ob_start();
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include '../confi/app.php';
define ('SITE_ROOT', realpath(dirname(__FILE__)));

$id = $_SESSION['userid'];
$query = "SELECT * FROM students WHERE id = '$id'";
$info = $mysql->query($query)->fetch_array();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $updated_email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $userId = $_SESSION['userid'];
    $query = "UPDATE students SET full_name='$name' , email='$updated_email' , phone='$phone'  , password='$password' WHERE id = '$userId'";
    $mysql->query($query);
    $_SESSION['name'] = $name;
    $_SESSION['email'] = $updated_email;
}

?>
<!DOCTYPE html>
<html len="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>الإعدادات الشخصية</title>
    <link rel="icon" href="../template/assets/images/ErshadLogo.svg" type="image/gif" sizes="16x16"> <!-- favicon.-->
    <!-- link css -->
    <link id="pagestyle" href="../template/assets/css/Library_Style.css" rel="stylesheet" />
    <link id="pagestyle" href="../template/assets/css/Student_Style.css" rel="stylesheet" />

    <!-- link Java Script -->
    <script class="u-script" type="text/javascript" src="../template/assets/js/Student_JS.js" defer=""></script>
    <script src="../template/assets/js/jquery.min.js"></script>
    <script src="../template/assets/js/main.js"></script>
    <script src="../template/assets/js/jquery.js"></script>
    <script src="../template/assets/js/bootstrap.js"></script>

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <style>
        /* width */
        ::-webkit-scrollbar {
            background-color: #aaa;
            width: 8px;

        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #f1f1f1;

        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 6px;
            transition: background-color .2s linear, width .2s ease-in-out;
            -webkit-transition: background-color .2s linear, width .2s ease-in-out;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
        /*            header */
        .headerNavbar li{
            display: inline;
        }
        .headerNavbar a{
            text-decoration: none;
            padding: 0.2vw 1vw;
            font-size: 17px;
        }
        .headerNavbar a:hover{
            text-decoration: none;
            border-radius: 5px;
            color: #001B48;
            box-shadow: 1px 1px 5px #D5EBEE;
            font-weight: 600;
        }
        .activeNav{
            text-decoration: none;
            padding: 0.3vw 1vw;
            border-radius: 5px;
            color: #001B48;
            box-shadow: 1px 1px 5px #D5EBEE;
            font-weight: 600;
        }


        body{
            background: rgb(213,235,238,0.3);
            text-align-last: right;
        }

        .ui-w-80 {
            width: 80px !important;
            height: auto;
        }

        .btn-default {
            border-color: rgba(24,28,33,0.1);
            background: rgba(0,0,0,0);
            color: #4E5155;
        }

        label.btn {
            margin-bottom: 0;
            margin-right: 1vw;
        }

        .btn-outline-primary {
            border-color: #26B4FF;
            background: transparent;
            color: #26B4FF;
        }

        .btn {
            cursor: pointer;
            margin-bottom: 1vw
        }

        .text-light {
            color: #babbbc !important;
            margin-right: 1vw;
            text-align-last: right;
        }

        .btn-facebook {
            border-color: rgba(0,0,0,0);
            background: #3B5998;
            color: #fff;
        }

        .btn-instagram {
            border-color: rgba(0,0,0,0);
            background: #000;
            color: #fff;
        }

        .card {
            background-clip: padding-box;
            box-shadow: 1px 1px 3px #97CADB;
        }

        .row-bordered {
            overflow: hidden;
        }

        .account-settings-fileinput {
            position: absolute;
            visibility: hidden;
            width: 1px;
            height: 1px;
            opacity: 0;
        }
        .account-settings-links .list-group-item.active {
            font-weight: 800 !important;
            font-size: 17px;

        }
        html:not(.dark-style) .account-settings-links .list-group-item.active {
            background: transparent !important;
        }
        .account-settings-multiselect ~ .select2-container {
            width: 100% !important;
        }
        .light-style .account-settings-links .list-group-item {
            padding: 0.85rem 1.5rem;
            border-color: rgba(24, 28, 33, 0.03) !important;
        }
        .light-style .account-settings-links .list-group-item.active {
            color: #4e5155 !important;
        }
        .material-style .account-settings-links .list-group-item {
            padding: 0.85rem 1.5rem;
            border-color: rgba(24, 28, 33, 0.03) !important;
        }
        .material-style .account-settings-links .list-group-item.active {
            color: #4e5155 !important;
        }
        .dark-style .account-settings-links .list-group-item {
            padding: 0.85rem 1.5rem;
            border-color: rgba(255, 255, 255, 0.03) !important;
        }
        .dark-style .account-settings-links .list-group-item.active {
            color: #fff !important;
        }
        .light-style .account-settings-links .list-group-item.active {
            color: #4E5155 !important;
        }
        .light-style .account-settings-links .list-group-item {
            padding: 0.85rem 1.5rem;
            border-color: rgba(24,28,33,0.03) !important;
        }
        img{
            border-radius: 5px;
        }
        .form-label{
            color: #001B48;
            font-size: 18px;
        }
    </style>
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
                <li><a href="studentHome.php">الرئيسية</a></li>
                <li><a href="metting.php">حجز موعد لقاء</a></li>
                <li><a href=" create_advising_file.php">الملف الإرشادي</a></li>
                <li><a href="sentComplaint.php">الشكاوى المرسلة</a></li>
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
                <a href="edit_profile.php" class="nav-link text-success font-weight-bold px-2">
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
<!--==========================================================================================-->


<!--Start page-->
<div class="container light-style flex-grow-1 container-p-y">

    <!--page title-->
    <h4 class="font-weight-bold py-3 mb-1">
        الإعدادات الشخصية
    </h4>

    <div class="card overflow-hidden">
        <div class="row no-gutters row-bordered row-border-light">
            <!-- Start list -->
            <div class="col-md-3 pt-0">
                <div class="list-group list-group-flush account-settings-links">
                    <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general">إعدادات عامة</a>
                    <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-password">تغيير كلمة المرور</a>
                    <!--<a class="list-group-item list-group-item-action" data-toggle="list" href="#account-info">معلومات شخصية</a>-->
                </div>
            </div>
            <!-- End list -->

            <div class="col-md-9">
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">

                    <div class="tab-content" style="border-right: 2px #001B48;">

                        <!-- Start general setting -->
                        <input type="hidden" name="update_information" value="1">
                        <div class="tab-pane fade active show" id="account-general">

                            <!-- Start change photo -->
                            <!--<div class="card-body media align-items-center" style="margin-bottom: -2vw; margin-top: -0.5vw;">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <img src="<?php if(!empty($info['profile_photo'])) echo $_SERVER['DOCUMENT_ROOT'] . '/Ershad_ProjectNew/template/upload/'.$info['profile_photo'] ; else echo '../template/assets/images/profile-user-grey.svg' ?>" alt="" class="d-block" style="width: 80%">
                                    </div>
                                    <div class="col-lg-7" style="margin-top: 0.5vw;">
                                        <div class="media-body ml-4">
                                            <label class="btn btn-default">
                                                رفع صورة جديدة
                                                <input type="file" name="image" class="account-settings-fileinput">
                                            </label> &nbsp;
                                            <button type="button" class="btn btn-default md-btn-flat" style="margin-top: 1vw;">إعادة تعيين</button>
                                        </div>
                                        <div class="text-light small mt-1">يسمح بالصيغة JPG أو GIF أو PNG. أعلى حجم للصورة 800K.</div>
                                    </div>
                                </div>
                            </div> -->
                            <!-- End change photo -->

                           <!-- <hr class="border-light" style="width: 96%; margin-right: 2%">-->

                            <!-- Start name and email setting -->
                            <div class="card-body" style="margin-top: -1.5vw;">
                                <div class="form-group">
                                    <label class="form-label">الاسم</label>
                                    <input type="text" name="name" class="form-control" value="<?php echo $info['full_name'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">رقم الجوال</label>
                                    <input type="text" name="phone" class="form-control" value="<?php echo $info['phone']?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">البريد الإلكتروني</label>
                                    <input type="text" name="email" class="form-control mb-1" value="<?php echo $info['email'] ?>">
                                </div>
                            </div>
                            <!-- End name and email setting -->
                            <div  style="height: 1.5vw;"></div>
                        </div>
                        <!-- End general setting -->

                        <!-- Start change password -->
                        <div class="tab-pane fade" id="account-change-password">
                            <div class="card-body pb-2">

                                <div class="form-group">
                                    <label class="form-label">كلمة المرور الجديدة</label>
                                    <input type="password" name="new_password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">تأكيد كلمة المرور</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div  style="height: 10.7vw;"></div>
                            </div>
                        </div>

                        <!-- End change password -->
                        <!--Start Info -->
                        <!--                    <div class="tab-pane fade" id="account-info">-->
                        <!--                        <div class="card-body pb-2">-->
                        <!--                            <div class="form-group">-->
                        <!--                                <label class="form-label">تاريخ الميلاد</label>-->
                        <!--                                <input type="text" name="birthdat" class="form-control" value="24-1-2000">-->
                        <!--                            </div>-->
                        <!--                        </div>-->
                        <!--                        <hr class="border-light m-0">-->
                        <!--                        <div class="card-body pb-2">-->
                        <!--                            <h6 class="mb-4">التواصل</h6>-->
                        <!--                            <div class="form-group">-->
                        <!--                                <label class="form-label">رقم الجوال</label>-->
                        <!--                                <input type="text" class="form-control" value="+966500000000">-->
                        <!--                            </div>-->
                        <!--                            <div class="form-group">-->
                        <!--                                <label class="form-label">رقم جوال آخر</label>-->
                        <!--                                <input type="text" class="form-control" value="+966500000000">-->
                        <!--                            </div>-->
                        <!--                        </div>-->
                        <!--                        <div  style="height: 5.3vw;"></div>-->
                        <!--                    </div>-->
                        <!--End Info -->


                    </div>
                    <!--Start button page-->
                    <div class="text-right mt-3">
                        <button class="btn btn-primary">حفظ التغييرات</button>&nbsp;
                        <button type="button" class="btn btn-default">إلغاء</button>
                    </div>
                    <!--End button page-->
                </form>

            </div>

        </div>
    </div>



    <!--==========================================================================================-->


</div>
<!--End page-->


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


<!-- التقويم -->
<script src="asset/js/jquery.min.js"></script>
<script src="asset/js/popper.js"></script>
<script src="asset/js/bootstrap.min.js"></script>
<script src="asset/js/main.js"></script>

<!--Start Pichart script-->
<script src="asset/plugins/jquery-2.2.4.min.js"></script>
<script src="asset/plugins/jquery.appear.min.js"></script>
<script src="asset/plugins/jquery.easypiechart.min.js"></script>



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


</script>
<!--End Pichart script-->



</body>
</html>