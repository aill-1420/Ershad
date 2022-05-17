<?php
session_start();
ob_start();
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include '../confi/app.php';
define ('SITE_ROOT', realpath(dirname(__FILE__)));

$id = $_SESSION['userid'];
$query = "SELECT * FROM acadmic_advising WHERE id = '$id'";
$info = $mysql->query($query)->fetch_array();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $updated_email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $userId = $_SESSION['userid'];
    $query = "UPDATE acadmic_advising SET full_name='$name' , email='$updated_email' , phone='$phone' , password='$password' WHERE id = '$userId'";
    $mysql->query($query);
    $_SESSION['name'] = $name;
    $_SESSION['email'] = $updated_email;
}


?>
<!DOCTYPE html>
<html len="ar" dir="rtl" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>الملف الشخصي</title>
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
    <script src='../assets/js/argon-dashboard.js' type="text/javascript"></script>
    <script src='../assets/js/Dashboard.js' type="text/javascript"></script>
    <script src="../template/assets/js/main.js"></script>
    <script src="../template/assets/js/jquery.js"></script>
    <script src="../template/assets/js/bootstrap.js"></script>


    <!-- font link -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">


    <style>

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

        .btn {
            cursor: pointer;
            margin-bottom: 1vw
        }

        .text-light {
            color: #babbbc !important;
            margin-right: 1vw;
            text-align-last: right;
        }

        .card {
            background-clip: padding-box;
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
        .list-group-item {
            position: relative;
            display: block;
            padding: 0.5rem 1rem;
            color: inherit;
            background-color: #fff;
            border: 1px solid rgba(0, 0, 0, 0.125);
            padding: 1vw 2vw;
        }
        .account-settings-links .list-group-item.active {
            font-weight: bold !important;

        }
        html:not(.dark-style) .account-settings-links .list-group-item.active {
            background: #97CADB !important;
            color: #fff;
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
        .list-group-item.active {
            z-index: 2;
            border: 1px solid rgba(0, 0, 0, 0.125);

        }
        .tab-content{
            padding: 0vw 1vw;
        }
        .tab-content .form-control {
            display: block;
            width: 100%;
            padding: 0.5rem 0.75rem;
            font-size: 16px;
            font-weight: 400;
            line-height: 1.5vw;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #d2d6da;
            appearance: none;
            border-radius: 15px;
            transition: box-shadow 0.15s ease, border-color 0.15s ease;
        }
        .btn-primary {
            color: #fff;
            background-color: #02457A;
            border-color: #02457A;
        }
    </style>
</head>

<body class="u-body" style="font-family: 'Tajawal', sans-serif;" dir="rtl">

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
                <a class="nav-link active" href="dashboard_adviser.php">
                    <div class="icon icon-shape icon-sm border-radius-md text-center ms-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text me-1">نظرة عامة</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="student_list.php">
                    <div class="icon icon-shape icon-sm border-radius-md text-center ms-2 d-flex align-items-center justify-content-    center">
                        <i class="icm icon-users text-secondary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text me-1">الطلاب</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="Schedule_meeting_adviser.php">
                    <div class="icon icon-shape icon-sm border-radius-md text-center ms-2 d-flex align-items-center justify-content-    center">
                        <i class="ni ni-calendar-grid-58 text-secondary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text me-1">لقاءات الطلاب</span>
                </a>
            </li>


        </ul>
    </div>
    <!--End list -->

</aside>
<!-- End Right List-->
<!--==========================================================================================-->

<!--Start content -->
<main class="main-content position-relative border-radius-lg overflow-hidden">

    <!-- Start navigation -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 ">
                        <li class="breadcrumb-item text-sm text-white active" aria-current="page"> الملف الشخصي</li>
                    </ol>
                </nav>
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 px-0" id="navbar" style="height: 4vw;">

                <!-- Start navigation list -->
                <ul class="navbar-nav me-auto ms-0 justify-content-end">
                    <li class="nav-item px-3 d-flex align-items-center">
                        <a href="edit_profile_adviser.php" class="nav-link text-white p-0">
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
                                            <img src="../template/assets/images/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark  ms-3 ">
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
        <div class="row my-4">
            <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
                <div class="card p-2">

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
                                    <div class="tab-pane fade active show" id="account-general">

                                        <!-- Start change photo -->
                                        <div class="card-body media align-items-center" style="margin-bottom: -2vw; margin-top: -0.5vw;">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <img src="<?php if($info['profile_photo'] != NULL) echo '../template/assets/images/profile-user-grey.svg'; else echo '../template/upload/'.$info['profile_photo']?>" alt="" class="d-block" style="width: 80%">
                                                </div>
                                                <!--<div class="col-lg-8" style="margin-top: 0.5vw;">
                                                    <div class="media-body ml-4">
                                                        <label class="btn btn-default">
                                                            رفع صورة جديدة
                                                            <input type="file" class="account-settings-fileinput">
                                                        </label> &nbsp;
                                                        <button type="button" class="btn btn-default md-btn-flat" style="margin-top: 1vw;">إعادة تعيين</button>
                                                    </div>
                                                    <div class="text-light small mt-1">يسمح بالصيغة JPG أو GIF أو PNG. أعلى حجم للصورة 800K.</div>
                                                </div>
                                            </div>-->
                                        </div>
                                        <!-- End change photo -->
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

                </div>
        <!--End row-->

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













</body>
</html>