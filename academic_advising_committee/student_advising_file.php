<?php
ob_start();
session_start();
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include '../confi/app.php';

$userid = $_GET['user'];
$query = "SELECT * FROM students INNER JOIN advising_file ON students.id = advising_file.student_id WHERE students.id =".$userid;
$data = $mysql->query($query)->fetch_array(MYSQLI_ASSOC);

?>







<!DOCTYPE html>
<html lang="ar" dir="rtl">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>الملف الإرشادي</title>
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
        
        <!-- Start CSS Style -->
        <style>
            /* Style the tab */
            .tab {
                overflow: hidden;
                border-bottom: 2px solid #02457A;
                width: 20%;
                z-index: 3;
                margin: 0vw 0.5vw 0.5vw 0.5vw;
            }
            .tabBtn {
                overflow: hidden;
                box-shadow: 1px 1px 3px #E5E5EB;
                background-color: #97CADB;
                border-radius: 15px;
                width: 60%;
                z-index: 3;
                margin-top: 0vw;
            }
            
            /* Style the buttons that are used to open the tab content */
            .tablinks {
                background-color: inherit;
                text-align-last: center;
                border: none;
                outline: none;
                cursor: pointer;
                color: #fff;
                border-radius: 15px;
                padding: 0.5vw 1vw ;
                width: 100%;
                font-weight: 500;
                font-size: 16px;
            }
            
            /* Change background color of buttons on hover */
            .tablinks:hover {
                background-color: #D5EBEE;
                color: #fff;
            }
            
            /* Create an active/current tablink class */
            .tablinks .active {
                background-color: #D5EBEE;
                color: #fff;
            }
            
            /* Style the tab content */
            .tabcontent {
                border-radius: 15px;
                overflow: hidden;
                padding: 1vw;
                height: 24vw;
                box-shadow: 1px 1px 5px #E5E5EB;
                border-radius: 15px 0px 15px 15px;
                display: block;
                overflow-y: scroll;
            }
            .tabTitle{
                color: #02457A;
                padding: 1vw 0.5vw 0vw 0.5vw;
                font-size: 20px;
                float: right;
                width: 100%;
                text-align-last: center;
            }
            .group-title{
                position: relative;
                top: 0.5rem;
                right: 0.75rem;
                z-index: 3;
                font-weight: 600;
                font-size: 16px;
                text-align: right;
                color: #97CADB;
                background-color: #fff;
                padding-right: 0.75vw!important;
                padding-left: 1vw!important;
                cursor: default;
                box-sizing: border-box;
                font-family: 'Tajawal', sans-serif;
                margin: 0px;
            }
            .group-content{
                font-size: 15px;
                color: #001B48;
                font-style: normal;
                font-weight: 500;
                text-align: right;
                z-index: 1;
                padding: 0.75vw 2vw;
                border: 1px solid #97CADB;
                border-radius: 15px;
                font-family: 'Tajawal', sans-serif;
                margin-bottom: 0.25vw;
                overflow-x: auto;
            }
            .infromation-group{
                margin: 0vw;
                padding-top: 0vw;
            }
            .card{
                margin: 1vw;
                margin-top: 0vw;
            }
            .infromation-groupForm{
                margin: 0vw;
                padding-top: 0vw;
                display: block;
            }
            .infromation-groupForm .group-title{
                position: relative;
                top: 0.5rem;
                right: 1.25rem;
                z-index: 3;
                font-weight: 600;
                font-size: 16px;
                text-align: right;
                color: #97CADB;
                background-color: #fff;
                padding-right: 0.75vw!important;
                padding-left: 1vw!important;
                cursor: default;
                box-sizing: border-box;
                font-family: 'Tajawal', sans-serif;
                margin: 0px;
            }
            .infromation-groupForm .group-content{
                font-size: 1rem;
                color: #001B48;
                font-style: normal;
                font-weight: 500;
                text-align: right;
                z-index: 1;
                padding: 0.75vw 2vw;
                border: 1px solid #97CADB;
                border-radius: 15px;
                font-family: 'Tajawal', sans-serif;
                margin-bottom: 0.25vw;
                display: block;
                width: 100%;
                overflow-x: auto;
            }
            .tabBtnForm {
                overflow: hidden;
                box-shadow: 1px 1px 3px #E5E5EB;
                background-color: #97CADB;
                border-radius: 15px;
                width: 60%;
                z-index: 3;
                margin-top: 0vw;
                display: none;
            }
            .infoCheckLabel{
                color: #001B48;
                font-weight: 400;
                font-size: 14px;
            }
            .control-label{
                color: #001B48;
                font-weight: 500;
                font-size: 16px;
                margin: 0.5vw 0vw 0vw 0vw;
            }
            .card-header{
                position: fixed;
                z-index: 5;
                width: 90%;
                top: 5vw;
                padding-top: 1vw;
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
                        <a class="nav-link " href="dshboard_committee.php">
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
                        <a class="nav-link active" href="students_List.php" style="cursor: pointer;">
                            <div class="icon icon-shape icon-sm border-radius-md text-center ms-2 d-flex align-items-center justify-content-    center">
                                <i class="icm icon-users text-primary text-sm opacity-10"></i>
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
                        <a class="nav-link" href="assign_student_ToAdviser.php">
                            <div class="icon icon-shape icon-sm border-radius-md text-center ms-2 d-flex align-items-center justify-content-center">
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
        
        <!--==========================================================================================-->

        <!--Start content -->
        <main class="main-content position-relative border-radius-lg overflow-hidden">
            <!-- Start navigation -->
            <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
                <div class="container-fluid py-1 px-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 ">
                            <li class="breadcrumb-item text-sm ps-2"><a class="opacity-5 text-white" href="dashboard_adviser.php">لوحة القيادة</a></li>
                            <li class="breadcrumb-item text-sm ps-2"><a class="opacity-5 text-white" href="student_list.php">الطلاب</a></li>
                            <li class="breadcrumb-item text-sm ps-2"><a class="opacity-5 text-white" href="information_student.php">معلومات الطالب</a></li>
                            <li class="breadcrumb-item text-sm text-white active" aria-current="page">الملف الإرشادي</li>
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
                                                    <img src="../template/assets/images/team-2.jpg" class="avatar avatar-sm  ms-3 ">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm font-weight-normal mb-1"><span class="font-weight-bold">New message</span> from Laur</h6>
                                                    <p class="text-xs text-secondary mb-0"><i class="fa fa-clock me-1"></i>13 minutes ago</p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="mb-2">
                                        <a class="dropdown-item border-radius-md" href="javascript:;">
                                            <div class="d-flex py-1">
                                                <div class="my-auto">
                                                    <img src="../template/assets/images/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark   ms-3">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm font-weight-normal mb-1"><span class="font-weight-bold">New album</span> by Travis Scott</h6>
                                                    <p class="text-xs text-secondary mb-0"><i class="fa fa-clock me-1"></i>1 day</p>
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
                                                    <h6 class="text-sm font-weight-normal mb-1">Payment successfully completed</h6>
                                                    <p class="text-xs text-secondary mb-0"><i class="fa fa-clock me-1"></i>2 days</p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item px-3 d-flex align-items-center">
                                <a href="edit_profile_committee.php" class="nav-link text-white p-0">
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
            <div class="container-fluid py-2" style="margin-right: -1vw;">
                <div class="card-body p-1">
                    <div class="col-lg-12">
                        <div class="card-body" style="margin-top: 0.75vw;">
                            <!-- Start first row -->
                            <div class="row">
                                <!-- Start Card 1 -->
                                <div class="card p-2"  id="cardView">
                                    <div class="tab">
                                        <div class="row">
                                            <h5 class="tabTitle">المعلومات الشخصية</h5>
                                        </div>
                                    </div>
                                    <!-- Start Personal Information Card -->
                                    <div class="card-body p-3">
                                        <!-- Start row 1 -->
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="infromation-group">
                                                    <label class="group-title">اسم الطالب</label>
                                                    <p class="group-content"><?php echo $data['full_name'] ?></p>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="infromation-group">
                                                    <label class="group-title">تاريخ الميلاد</label>
                                                    <p class="group-content"><?php echo $data['date_birth'] ?></p>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="infromation-group">
                                                    <label class="group-title">الجنسية</label>
                                                    <p class="group-content"><?php echo $data['nationality'] ?></p>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="infromation-group">
                                                    <label class="group-title">العنوان</label>
                                                    <p class="group-content"><?php echo $data['address'] ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End row 1 -->
                                    </div>
                                    <!-- End Personal Information Card -->
                                </div>
                                <!-- End Card 1 -->
                            </div>
                            <!-- End first row -->
                            <!-- ----------------------------------------------------------------------- -->
                            <!-- Start Second row -->
                            <div class="row">
                                <!-- Start Card 2 -->
                                <div class="card p-0"  id="cardView1">
                                    <div class="tab">
                                        <div class="row">
                                            <h5 class="tabTitle">المعلومات الصحية</h5>
                                        </div>
                                    </div>
                                    <!-- Start Health Information Card -->
                                    <div class="card-body p-3">
                                        <!-- Start row 1 -->
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="infromation-group">
                                                    <label class="group-title">الأمراض</label>
                                                    <p class="group-content"><?php echo $data['psychiatric_disorders__syndromes'] ?></p>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="infromation-group">
                                                    <label class="group-title">الاحتياج لرعاية خاصة</label>
                                                    <p class="group-content"><?php echo $data['special_care'] ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End row 1 -->
                                    </div>
                                    <!-- End Health Information Card -->
                                </div>
                                <!-- End Card 2 -->
                            </div>
                            <!-- End Second row -->
                            <!-- ----------------------------------------------------------------------- -->
                            <!-- Start third row -->
                            <div class="row">
                                <!-- Start Card 3 -->
                                <div class="card p-0"  id="cardView2">
                                    <div class="tab">
                                        <div class="row">
                                            <h5 class="tabTitle">المعلومات الاجتماعية</h5>
                                        </div>
                                    </div>
                                    <!-- Start Social Information Card -->
                                    <div class="card-body p-3">
                                        <!-- Start row 1 -->
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="infromation-group">
                                                    <label class="group-title">الأب على قيد الحياة</label>
                                                    <p class="group-content"><?php echo $data['father_alive'] ?></p>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="infromation-group">
                                                    <label class="group-title">الأم على قيد الحياة</label>
                                                    <p class="group-content"><?php echo $data['mother_alive'] ?></p>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="infromation-group">
                                                    <label class="group-title">ترتيب الطالب بين اخوته</label>
                                                    <p class="group-content"><?php echo $data['order_student_on_family'] ?></p>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="infromation-group">
                                                    <label class="group-title">عدد الاخوة والأخوات</label>
                                                    <p class="group-content"><?php echo $data['number_brother_sister'] ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End row 1 -->
                                        <!-- Start row 2 -->
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="infromation-group">
                                                    <label class="group-title">الوضع الاجتماعي للوالدين</label>
                                                    <p class="group-content"><?php echo $data['Parents_status'] ?></p>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="infromation-group">
                                                    <label class="group-title">المستوى التعليمي للأب</label>
                                                    <p class="group-content"><?php echo $data['Father_educational_level'] ?></p>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="infromation-group">
                                                    <label class="group-title">المستوى التعليمي للأم</label>
                                                    <p class="group-content"><?php echo $data['Mother_educational_level'] ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End row 2 -->
                                    </div>
                                    <!-- End Social Information Card -->
                                </div>
                                <!-- End Card 3 -->
                            </div>
                            <!-- End third row -->
                            <!-- ----------------------------------------------------------------------- -->
                            <!-- Start fourth row -->
                            <div class="row">
                                <!-- Start Card 1 -->
                                <div class="card p-0"  id="cardView3">
                                    <div class="tab">
                                        <div class="row">
                                            <h5 class="tabTitle">المعلومات الاقتصادية</h5>
                                        </div>
                                    </div>
                                    <!-- Start Economic Information Card -->
                                    <div class="card-body p-3">
                                        <!-- Start row 1 -->
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="infromation-group">
                                                    <label class="group-title">مهنة الأب</label>
                                                    <p class="group-content"><?php echo $data['father_profession'] ?></p>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="infromation-group">
                                                    <label class="group-title">مهنة الأم</label>
                                                    <p class="group-content"><?php echo $data['mother_job'] ?></p>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="infromation-group">
                                                    <label class="group-title">دخل الأسرة</label>
                                                    <p class="group-content"><?php echo $data['family_income'] ?></p>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="infromation-group">
                                                    <label class="group-title">يتم صرف ضمان إجتماعي</label>
                                                    <p class="group-content"><?php echo $data['southern_border'] ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End row 1 -->
                                        <!-- Start row 2 -->
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="infromation-group">
                                                    <label class="group-title">نوع السكن</label>
                                                    <p class="group-content"><?php echo $data['type_home'] ?></p>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="infromation-group">
                                                    <label class="group-title">ملكية السكن</label>
                                                    <p class="group-content"><?php echo $data['house_ownership'] ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End row 2 -->
                                    </div>
                                    <!-- End Economic Information Card -->
                                </div>
                                <!-- End Card 4 -->
                            </div>
                            <!-- End fourth row -->
                            <!-- ----------------------------------------------------------------------- -->
                        </div>
                    </div>
                </div>
                
                <!--==========================================================================================-->
                
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
    <!-- End Body -->
</html> 