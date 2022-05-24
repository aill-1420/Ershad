<?php
ob_start();
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
session_start();
include '../confi/app.php';


if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $adviser = $_POST['adviser'];
    $student = $_POST['student'];
    $query = "UPDATE students SET adviser_id='$adviser' WHERE id = '$student'";
    $mysql->query($query);
    $success = TRUE;
}

?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>إسناد الطالب إلى مرشد</title>
        <link rel="icon" href="../template/assets/images/ErshadLogo.svg" type="image/gif" sizes="16x16"> <!-- favicon.-->

        <!-- Nucleo Icons -->
        <link href="../template/assets/css/nucleo-icons.css" rel="stylesheet" />
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <!-- CSS Files -->

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link id="pagestyle" href="../template/assets/css/Dashboard_Style.css" rel="stylesheet" />
        <link id="pagestyle" href="../template/assets/css/Library_Style.css" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"/>

        <!-- link Java Script -->
        <script src='../template/assets/js/argon-dashboard.js' type="text/javascript"></script>
        <script src='../template/assets/js/Dashboard.js' type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>

        <!-- font link -->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

        <!-- Start CSS Style -->
        <style>
            .subject-info-box-1, .subject-info-box-2 {
                float: right;
                width: 42%;
                margin: 0vw 1vw;
                font-size: 16px;
            }
            .subject-info-box-1 select, .subject-info-box-2 select {
                height: 200px;
                padding: 0;
            }
            .subject-info-box-1 select option, .subject-info-box-2 select option {
                padding: 4px 10px 4px 10px;
            }
            .subject-info-box-1 select option:hover, .subject-info-box-2 select option:hover {
                background: #eee;
            }
            .subject-info-arrows {
                float: right;
                width: 10%;
                margin-right: 1vw;
                margin-top: 2.5vw;
            }
            .subject-info-arrows input {
                width: 70%;
                margin-bottom: 5px;
            }
            .group-title{
                position: relative;
                top: -1.6vw;
                right: 7vw;
                z-index: 3;
                font-weight: 600;
                font-size: 18px;
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
                font-size: 14px;
                color: #001B48;
                font-style: normal;
                font-weight: 500;
                text-align: right;
                z-index: 1;
                padding: 0.75vw 2vw;
                border: 2px solid #97CADB;
                border-radius: 15px;
                font-family: 'Tajawal', sans-serif;
                width: 30vw;
                overflow-y: scroll;
            }
            /*=================================================*/

            /*  student without adviser form */

            /* Add styles to the form container */
            .form-container {
                height: 85%;
                padding: 0vw;;
                background-color: white;
                border-radius: 15px;
                margin: 0vw 0vw;
            }
            .form-container label{
                color: #5B5A72;
                font-size: 14px;
            }

            /* Full-width input fields */
            .form-container input[type=text], .form-container input[type=password], .form-container input[type=select],  .form-container input[type=number] {
                width: 100%;
                padding: 0.5vw;
                margin: 15px 0 5px 0;
                border: none;
                background: #f1f1f1;
                border-radius: 15px;
            }

            /* When the inputs get focus, do something */
            .form-container input[type=text]:focus, .form-container input[type=password]:focus, .form-container input[type=number]:focus{
                background-color: #ddd;
                outline: none;
            }

            /* Set a style for the submit/login button/ assign */
            .form-container .btn {
                background-color: #02457A;
                color: white;
                border: none;
                cursor: pointer;
                width: 100%;
                opacity: 0.8;
                text-align-last: center;
            }

            .form-container option {
                cursor: pointer;
            }

            /* Add a cyan color background color to the cancel button */
            .form-container .cancel {
                background-color: #97CADB;
                text-align-last: center;
            }

            /
            .input-hidden {
                caret-color: transparent;
            }
        </style>
    </head>
    
    <!--==========================================================================================-->
    
    <!-- Start Body -->
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
                        <a class="nav-link" href="adviser_list.php" style="cursor: pointer;">
                            <div class="icon icon-shape icon-sm border-radius-md text-center ms-2 d-flex align-items-center justify-content-    center">
                                <i class="icm icon-users text-secondary text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text me-1">المرشدين الأكاديميين</span>
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
                        <a class="nav-link" href="complaints_List.php">
                            <div class="icon icon-shape icon-sm border-radius-md text-center ms-2 d-flex align-items-center justify-content-    center">
                                <i class="icm icon-list-alt text-secondary text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text me-1">شكاوي الطلاب</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  active" href="assign_student_ToAdviser.php">
                            <div class="icon icon-shape icon-sm border-radius-md text-center ms-2 d-flex align-items-center justify-content-    center">
                                <i class="icm icon-mode_edit text-primary text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text me-1">اسناد طالب إلى مرشد</span>
                        </a>
                    </li>

                </ul>
            </div>
            <!-- End list -->
        </aside>
        <!-- End Right List-->
       
        <!--==========================================================================================-->

        <!--Start content -->
        <main class="main-content position-relative border-radius-lg overflow-hidden">
            <!-- Start navigation -->
            <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
                <div class="container-fluid py-1 px-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 ">
                            <li class="breadcrumb-item text-sm ps-2"><a class="opacity-5 text-white" href="dshboard_committee.php">نظرة عامة</a></li>
                            <li class="breadcrumb-item text-sm text-white active" aria-current="page">اسناد الطالب الى مرشد</li>
                        </ol>
                    </nav>
                    <div class="collapse navbar-collapse mt-sm-0 mt-2 px-0" id="navbar" style="height: 4vw;">
                        <!-- Start navigation list -->
                        <ul class="navbar-nav me-auto ms-0 justify-content-end">
                            <li class="nav-item px-3 d-flex align-items-center">
                                <a href="edit_profile_committee.php" class="nav-link text-white p-0">
                                    <i class="fa fa-user fixed-plugin-button-nav cursor-pointer"></i>
                                </a>
                            </li>
                            <li class="nav-item dropdown ps-2 d-flex align-items-center">
                                <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-  expanded="false">
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
                                                    <img src="./assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark   ms-3 ">
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
                                                            <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-    rule="nonzero">
                                                                <g transform="translate(1716.000000, 291.000000)">
                                                                    <g transform="translate(453.000000, 454.000000)">
                                                                        <path class="color-background" d="M43,10.7482083 L43,3.58333333         C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0    0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"   opacity="0.593633743"></path>
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
                            <li class="nav-item px-3 d-flex align-items-center">
                                <a href="../student/logout.php" class="nav-link text-white p-0">
                                    <i class="icm icm icon-power-off fixed-plugin-button-nav cursor-pointer"></i>
                                </a>
                            </li>
                        </ul>
                        <!-- End navigation list -->
                    </div>
                </div>
            </nav>
            <!-- End navigation -->
                         
            <!--==========================================================================================-->
            
            <!-- Start body content -->
            <div class="container-fluid py-4" >
                <div class="card"  style="height: 35vw;">
                    <?php
                    if (isset($success) && $success == TRUE) { ?>
                        <div class="alert alert-success" role="alert">
                            تم اسناد الطالب بنجاح
                        </div>
                    <?php }
                    $SUCCESS = FALSE; ?>
                    <div class="card-body p-3">
                        <hr style="width: 100%; color: darkgray; align-content: center;">
                        <div style="height: 1.5vw;"></div>

                        <form  class="form-container" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                            <div class="row">
                                <div class="col-6">
                                    <div class="infromation-group" style="margin: 0vw -5vw 0vw 0vw;">
                                    <label class="group-title" style="font-size: 17px; color: #97CADB; padding: 0vw 1vw;">المرشد</label>
                                    <?php
                                    $query = "SELECT * FROM acadmic_advising";
                                    $t = $mysql->query($query)->fetch_all(MYSQLI_ASSOC);
                                    ?>
                                        <select class="group-content" name="adviser" id="studentWithOutAdviser" style="color: #5B5A72;">
                                            <option>  اختر المرشد</option>
                                            <?php foreach($t as $b) { ?>
                                            <option value="<?php echo $b['id'] ?>"><?php echo $b['full_name'] ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="infromation-group" style="margin: 0vw -9vw 0vw 0vw;">
                                        <label class="group-title" style="font-size: 17px; color: #97CADB; padding: 0vw 1vw; right: 13vw;">الطلاب بدون مرشد</label>
                                        <?php
                                        $query = "SELECT * FROM students WHERE adviser_id IS NULL";
                                        $stu = $mysql->query($query)->fetch_all(MYSQLI_ASSOC);
                                        ?>
                                        <select class="group-content" name="student" id="studentWithOutAdviser" style="color: #5B5A72;">
                                            <option>  اختر الطلاب المراد اسنادهم</option>
                                            <?php foreach($stu as $s) { ?>
                                                <option value="<?php echo $s['id'] ?>"><?php echo $s['full_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-container" style="padding: 20.5vw 0vw 1vw;">
                                <div class="row">
                                    <div class="col-lg-8 mb-lg-0 mb-4">
                                    </div>
                                    <div class="col-lg-3 mb-lg-0 mb-4">
                                        <button class="btn">إسناد</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
                  
            <!--==========================================================================================-->
            
            <!-- Start Footer -->
            
            <footer class="footer pt-3  " style="margin-top: 1vw">
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
        </main>
        <!-- End content -->
    </body>
    <!-- End Body -->
</html>