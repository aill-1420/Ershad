<?php
ob_start();
session_start();
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include '../confi/app.php';



if($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST['report']) && $_POST['report'] == 1) {
        $id = $_SESSION['userid'];
        $title = $_POST['title'];
        $body = $_POST['content'];
        $user = $_POST['user'];
        $query = "INSERT INTO `report` (`title` , `body` , `acadimic_advising_id` , `student_id`)
          VALUES ('$title', '$body', '$id', '$user')";
        $mysql->query($query);
        redirect('student_list.php');
        die();
    } else {
        $user = $_GET['user'];
        $gpa = $_POST['gpa'];
        $level = $_POST['level'];
        $plan = $_POST['paln_hours'];
        $remain_hours = $_POST['remain_hours'];
        $pass_hours = $_POST['pass_hours'];
        $register_hours = $_POST['register_hours'];
        $query = "UPDATE students SET gpa='$gpa' , level='$level' , plan_hours='$plan' , reamin_hours='$remain_hours' , pass_hours='$pass_hours' , register_hours='$register_hours' WHERE id = '$user'";
        $mysql->query($query);
    }
}


$id = $_GET['user'];
$query = "SELECT * FROM students WHERE id = '$id'";
$data = $mysql->query($query)->fetch_array();
$query = "SELECT * FROM complaint INNER JOIN students ON students.id = complaint.student_id";

#$queryMetting = "SELECT * FROM reservation INNER JOIN students ON students.id = reservation.student_id INNER JOIN meeting ON reservation.metting_id = meeting.id ";
$queryMetting = "SELECT * FROM meeting INNER JOIN reservation ON meeting.id = reservation.metting_id WHERE reservation.student_id = ".$id;
$metting = $mysql->query($queryMetting)->fetch_all(MYSQLI_ASSOC);

$queryRe = "SELECT * FROM report WHERE student_id=".$_GET['user'];
$re = $mysql->query($queryRe)->fetch_all(MYSQLI_ASSOC);


// reprot
/*if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['report'] == 1) {
    $title = $_POST['title'];
    $body = $_POST['body'];
    $user_id  = $_SESSION['userid'];
    $time = date("Y-m-d H:i:s");
    $query = "INSERT INTO `report` (`profileTitle`, `profileContent`)
                VALUES ('$title', '$body')";

    $mysql->query($query);
$success = true;

}*/

?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>?????????????? ????????????</title>
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
        <script src='../template/assets/js/jquery.min.js' type="text/javascript"></script>
        <script src='../template/assets/js/Student_JS.js' type="text/javascript"></script>
        <script src="../template/assets/js/main.js"></script>

        <!-- font link -->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

        <!-- Start CSS Style -->
        <style>
            .btn:hover {
                background-color: RoyalBlue;
            }
            .b-skills{
                padding-top: 1vw;
                text-align: center;
                display: block;
                padding-right: 11vw;
                margin-left: 5vw;
            }
            .b-skills:last-child {
                margin-bottom: -30px;
            }
            .skill-item{
                position: relative;
                max-width: 100%;
                width: 100%;
                color: #555;
            }
            .chart-containerr{
                position: relative;
                width: 100%;
                height: 0;
                padding-top: 100%;
                margin-bottom: 27px;
            }
            .skill-item .chart,.skill-item .chart canvas{
                position: absolute;
                top: 0;
                left: 0;
                width: 100% !important;
                height: 100% !important;
            }
            .skill-item .chart:before{
                content: "";
                width: 0;
                height: 100%;
            }
            .skill-item .chart:before,.skill-item .percent{
                display: inline-block;
                vertical-align: middle;
            }
            .skill-item .percent{
                position: relative;
                line-height: 1;
                font-size: 34px;
                font-weight: 800;
                z-index: 2;
                right:3.5vw;
                font-family: 'Tajawal', sans-serif;
            }
            .skill-item  .percent:after{
                content: attr(data-after);
                font-size: 32px;
                font-family: 'Tajawal', sans-serif;
            }
            .u-section-1 .u-shape-1 {
                width: 1169px;
                height: 709px;
                margin: -373px auto 0 -342px;
            }
            /* --- list style  ---*/
            
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
                padding: 0vw 1vw;
                height: 3.5vw;;
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
            /*       ----------------------     */
            /* Student Plant form */

            /* The popup form - hidden by default */
            #StudentPlanPopUp{
                display: block;
            }

            .studentPlan-popup {
                display: block;
                margin-right: -2vw;
                top: 0vw;
                border-radius: 15px;
                box-shadow: 2px 2px 6px #AEADBF;
                z-index: 20;
                background-color: rgb(91,90,114,0.7);
                direction: rtl;
                overflow: inherit;
            }

            /* Add styles to the form container */
            .studentPlan-container {
                max-width: 100%;
                height: auto;
                padding: 2vw;
                background-color: white;
                border-radius: 15px;
            }
            .studentPlan-container label {
                position: relative;
                top: 0.5rem;
                right: 1rem;
                z-index: 3;
                font-weight: 500;
                font-size: 16px;
                text-align: right;
                color: #018ABE;
                background-color: #fff;
                padding-right: 1rem!important;
                padding-left: 1rem!important;
                cursor: default;
                box-sizing: border-box;
                font-family: 'Tajawal', sans-serif;
                margin: 0px;
            }

            /* Full-width input fields */
            .studentPlan-container input[type=number], #StudentPlanContent {
                font-size: 14px;
                color: #001B48;
                font-style: normal;
                font-weight: 400;
                text-align: right;
                z-index: 1;
                padding: 0.8vw 2vw;
                border: 1px solid #018ABE;
                border-radius: 30px;
                font-family: 'Tajawal', sans-serif;
                width: 100%;
            }

            /* When the inputs get focus, do something */
            .studentPlan-container input[type=number]:focus, #StudentPlanContent:focus {
                background-color: #ddd;
                outline: none;
            }

            /* Set a style for the submit/login button */
            .studentPlan-container .btn {
                background-color: #02457A;
                color: white;
                border: none;
                cursor: pointer;
                width: 100%;
                opacity: 0.8;
                text-align-last: center;
            }


            /* Add a red background color to the cancel button */
            .studentPlan-container .cancel{
                background-color: #97CADB;
                text-align-last: center;
            }

            /* Add some hover effects to buttons */
            .studentPlan-container .btn:hover, .open-button:hover , .open-button:hover {
                opacity: 1;
            }
            /*       ----------------------    */

            .group-title{
                position: relative;
                top: 0.5rem;
                right: 1rem;
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
                font-size: 15px;
                color: #001B48;
                font-style: normal;
                font-weight: 500;
                text-align: right;
                z-index: 1;
                padding: 0.75vw 2vw;
                border: 2px solid #97CADB;
                border-radius: 15px;
                font-family: 'Tajawal', sans-serif;
            }


            /* The popup form - hidden by default */
            .form-popup {
                display: none;
                position: fixed;
                top: 0vw;
                right: 0vw;
                border-radius: 15px;
                box-shadow: 2px 2px 6px #AEADBF;
                z-index: 20;
                background-color: rgb(91,90,114,0.7);
                height: 48.5vw;
                width: 80%;
                right: 20%;
            }

            /* Add styles to the form container */
            .form-container {
                max-width: 60vw;
                height: 40vw;
                padding: 2vw;;
                background-color: white;
                border-radius: 15px;
                margin: 3vw 20vw;
            }
            .form-container label{
                color: #5B5A72;
                font-size: 14px;
            }

            /* Full-width input fields */
            .form-container input[type=text], .form-container textarea{
                width: 100%;
                padding: 0.5vw;
                margin: 5px 0 5px 0;
                border: none;
                background: #f1f1f1;
                border-radius: 15px;
            }

            /* When the inputs get focus, do something */
            .form-container input[type=text]:focus, .form-container textarea:focus{
                background-color: #ddd;
                outline: none;
            }

            /* Set a style for the submit/login button */
            .form-container .btn {
                background-color: #02457A;
                color: white;
                border: none;
                cursor: pointer;
                width: 100%;
                opacity: 0.8;
                text-align-last: center;
            }

            /* Add a red background color to the cancel button */
            .form-container .cancel {
                background-color: #97CADB;
                text-align-last: center;
            }

            /* Add some hover effects to buttons */
            .form-container .btn:hover, .open-button:hover {
                opacity: 1;
            }

            ::placeholder {
                color: #d6dbe3;
                opacity: 1; 
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
                    <span class="me-1 font-weight-bold">???????? ??????????</span>
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
                            <span class="nav-link-text me-1">???????? ????????</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="student_list.php">
                            <div class="icon icon-shape icon-sm border-radius-md text-center ms-2 d-flex align-items-center justify-content-    center">
                                <i class="icm icon-users text-secondary text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text me-1">????????????</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="Schedule_meeting_adviser .php">
                            <div class="icon icon-shape icon-sm border-radius-md text-center ms-2 d-flex align-items-center justify-content-    center">
                                <i class="ni ni-calendar-grid-58 text-secondary text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text me-1">???????????? ????????????</span>
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
                            <li class="breadcrumb-item text-sm ps-2"><a class="opacity-5 text-white" href="dashboard_adviser.php">???????? ??????????????</a></li>
                            <li class="breadcrumb-item text-sm ps-2"><a class="opacity-5 text-white" href="student_list.php">????????????</a></li>
                            <li class="breadcrumb-item text-sm text-white active" aria-current="page">?????????????? ????????????</li>
                        </ol>
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
                                                    <img src="../template/assets/images/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark  ms-3 ">
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
            <div class="container-fluid py-4">
                <!-- Start Second row -->
                <div class="row mt-4">
                    <div class="col-lg-12 my-1">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-10">
                                        <label style="font-weight: 800;font-size: 22px; text-align: right; color: #001B48; font-family: 'Tajawal',  sans-serif; padding-bottom: 3px;">?????????????? ????????????</label>
                                    </div>
                                    <div class="col-2" style="margin-top: 0.8vw;">
                                        <div class="d-flex flex-column h-100" style=" cursor: pointer;">
                                            <a class="btn" href="student_advising_file.php?user=<?php echo $data['id'] ?>" style="background-color: #97CADB; color: white;      font-size: 15px;font-weight: 500; cursor: pointer; text-align-last: center; border-radius: 15px; padding: 0.5vw 0.2vw;"><i class="icm icon-folder_shared"></i> ?????????? ????????????????</a>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="infromation-group">
                                            <label class="group-title">?????? ????????????</label>
                                            <div>
                                                <p class="group-content"><?php echo $data['full_name']?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="infromation-group">
                                            <label class="group-title">?????? ????????????</label>
                                            <div>
                                                <p class="group-content"><?php echo $data['studentid']?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="infromation-group">
                                            <label class="group-title">????????????</label>
                                            <div>
                                                <p class="group-content"><?php echo $data['collage']?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="infromation-group">
                                            <label class="group-title">????????????</label>
                                            <div>
                                                <p class="group-content"><?php echo $data['major']?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="infromation-group">
                                            <label class="group-title">???????????? ????????????????</label>
                                            <div>
                                                <p class="group-content"><?php echo $data['gpa'] ?><a style="color:white;">'</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card" style="margin-top: 1.3vw;">
                            <div class="card-body p-3">
                                <div class="col-8">
                                    <label style="font-weight: 800;font-size: 22px; text-align: right; color: #001B48; font-family: 'Tajawal',  sans-serif; padding-bottom: 3px;">?????????? ????????????</label>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 me-auto ms-0"  style="margin-left: -2vw;">
                                        <div>
                                            <section id="s-team" class="section" style="z-index: 2; margin-top: 2vw;">
                                                <div class="b-skills">
                                                    <div class="containerr">
                                                        <div class="row">
                                                            <div class="skill-item center-block" style="padding-bottom: 2vw;">
                                                                <div class="chart-containerr">
                                                                    <div class="chart" data-percent="100" data-line-width="150" style="width:   100%; height: 100%; background-color: #fff; border-radius:50%; box-shadow: 0px 0px 5px #2F3535;">
                                                                    </div>
                                                                    <div class="chart" data-percent="<?php echo (($data['reamin_hours'] / $data['plan_hours']) * 100)+((($data['register_hours'] / $data['plan_hours']) * 100)+(($data['pass_hours'] / $data['plan_hours']) * 100)) ?>" data-bar-color="#b2d7e4"><!-- ????????????????-->
                                                                    </div>
                                                                    <div class="chart" data-percent="<?php echo (($data['register_hours'] / $data['plan_hours']) * 100)+(($data['pass_hours'] / $data['plan_hours']) * 100) ?>" data-bar-color="#018ABE"><!-- ??????????????-->
                                                                    </div>
                                                                    <div class="chart" data-percent="<?php echo ($data['pass_hours'] / $data['plan_hours']) * 100 ?>" data-bar-color="#02457A"><!-- ????????????????-->
                                                                        <span class="percent" data-after="%">"<?php echo ($data['pass_hours'] / $data['plan_hours']) * 100 ?></span>
                                                                        <p style="font-size: 18px; font-weight: 500; text-align-last:   center;">?????????????? <?php echo $data['level'] ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 mb-lg-0 mb-4" style="margin-top: 3vw;">
                                        <div class="d-flex flex-column h-100" style="font-family: 'Tajawal', sans-serif; margin-right: -4vw;">
                                            <section class="u-clearfix u-section-1" id="sec-b4b5" style="z-index: 3; height: 0;">
                                                <div class="u-container-style u-group u-shape-rectangle u-group-1" style="width: 100%;">
                                                    <div class="u-container-layout u-container-layout-1" style="padding-top: 0vw;">
                                                        <div class="u-container-layout">
                                                            <div class="u-grey-25 u-radius-50 u-shape u-shape-round u-shape-3"></div>
                                                            <p class="u-custom-font u-text u-text-default u-text-black u-text-2">
                                                                <?php echo $data['register_hours'] ?>
                                                            </p>
                                                            <p class="u-align-right u-custom-font u-text u-text-black u-text-3">??????????????</p>
                                                        </div>


                                                        <div class="u-container-layout">
                                                            <div class="u-grey-75 u-radius-50 u-shape u-shape-round u-shape-4"></div>
                                                            <p class="u-custom-font u-text u-text-default u-text-black u-text-4">
                                                                <?php echo $data['reamin_hours'] ?>
                                                            </p>
                                                            <p class="u-align-right u-custom-font u-text u-text-default u-text-black u-text-5"  style="margin-right: 3.3vw">????????????????</p>
                                                        </div>


                                                        <div class="u-container-layout">
                                                            <div class="u-grey-60 u-radius-50 u-shape u-shape-round u-shape-5"></div>
                                                            <p class="u-align-center u-custom-font u-text u-text-default u-text-black u-text-6" style="margin-top: -2.15vw;">
                                                                <?php echo $data['pass_hours'] ?>
                                                            </p>
                                                            <p class="u-align-right u-custom-font u-text u-text-default u-text-black u-text-7"  style="margin-right: 3.3vw; margin-top: -0.6vw;">????????????????</p>
                                                        </div>

                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 mb-lg-0 mb-0" style="margin-top: 3vw;">
                                        <div class="card"  style="box-shadow: none;">
                                            <form  class="studentPlan-container" style="box-shadow: inset 0px 0px 5px #AEADBF;" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>?user=<?php echo $data['id'] ?>">
                                                <div class="row" style="margin-bottom: 1vw;">
                                                    <div class="col-4">
                                                        <label for="StudentLevel"><b>?????????? ????????????</b></label>
                                                        <input id="StudentLevel" min="1" type="number" placeholder="9" value="<?php echo $data['level'] ?>" name="level" required>
                                                    </div>
                                                    <div class="col-4">
                                                        <label for="StudentGPA"><b>???????????? ????????????????</b></label>
                                                        <input id="StudentGPA" min="0" step="0.01" type="number" value="<?php echo $data['gpa'] ?>" placeholder="3.81" name="gpa" required>
                                                    </div>
                                                    <div class="col-4">
                                                        <label for="StudentPlanHours"><b>?????? ?????????? ??????????</b></label>
                                                        <input id="StudentPlanHours" min="1" type="number" placeholder="165" value="<?php echo $data['plan_hours'] ?>" name="paln_hours" required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <label for="RemainHours"><b>?????????????? ????????????????</b></label>
                                                        <input id="RemainHours" min="0" type="number" placeholder="12" value="<?php echo $data['reamin_hours'] ?>" name="remain_hours" required>
                                                    </div>
                                                    <div class="col-4">
                                                        <label for="PassedHours"><b>?????????????? ????????????????</b></label>
                                                        <input id="PassedHours" min="0" type="number" placeholder="138" value="<?php echo $data['pass_hours'] ?>" name="pass_hours" required>
                                                    </div>
                                                    <div class="col-4">
                                                        <label for="RegisteredHours"><b>?????????????? ??????????????</b></label>
                                                        <input id="RegisteredHours" min="0" type="number" placeholder="15" value="<?php echo $data['register_hours'] ?>" name="register_hours"   required>
                                                    </div>
                                                </div>
                                                    <button class="btn mt-4 mb-3">??????</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-7">
                                <div class="card" style="padding-bottom: -5vw; margin-top: 1.3vw;">
                                    <div class="card-body p-3">
                                        <div class="row">
                                            <div class="col-lg-12 me-auto ms-0">
                                                <label style="font-weight: 800;font-size: 22px; text-align: right; color: #001B48; font-family: 'Tajawal',  sans-serif; padding-bottom: 1vw;"><b>???????????????? ??????????????</b></label>
                                                <!--Start forth row -->
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
                                                        <div class="card" style="padding: 0vw; height: 14.5vw; overflow-y: scroll;">
                                                            <table id="list">
                                                                <tr>
                                                                    <th>?????? ????????????</th>
                                                                    <th>??????????????</th>
                                                                    <th>??????????</th>
                                                                    <th>?????? ????????????</th>
                                                                    <th>???????? ????????????</th>
                                                                </tr>
                                                                <?php foreach($metting as $q) {
                                                                    ?>
                                                                    <tr>
                                                                        <?php
                                                                        $time = new DateTime($q['date_time']);
                                                                        ?>
                                                                        <td><?php echo $q['id'] ?></td>
                                                                        <td><?php echo $time->format('d-m-Y'); ?></td>
                                                                        <td><?php echo $time->format('h:i:s A'); ?></td>
                                                                        <td><?php echo $q['duration'] ?></td>
                                                                        <td><?php echo $q['place'] ?></td>
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
                            </div>
                            <div class="col-5">
                                <div class="card" style="padding-bottom: -5vw; margin-top: 1.3vw;">
                                    <div class="card-body p-3">
                                        <div class="row">
                                            <div class="col-lg-12 me-auto ms-0">
                                                <div class="row">
                                                    <div class="col-8">
                                                        <label style="font-weight: 800;font-size: 22px; text-align: right; color: #001B48; font-family: 'Tajawal',  sans-serif; padding-bottom: vw;"><b>???????????? ????????????????</b></label>
                                                    </div>
                                                    <div class="col-4" style="margin-top: 0.8vw;">
                                                        <div class="d-flex flex-column h-100" style=" cursor: pointer;">
                                                            <a class="btn" onclick="popUpProfile()" style="background-color: #97CADB; color: white; font-size:    15px;font-weight: 500; text-align-last: center; border-radius: 15px; padding: 0.5vw 0.2vw; margin-top: -0.4vw;;"><i class="icm icon-plus"></i>  ?????????? ???????? </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <!--Start forth row -->
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
                                                        <div class="card" style="padding: 0vw; height: 14vw; overflow-y: scroll;">
                                                            <table id="list">
                                                                <tr>
                                                                    <th>?????????? ??????????????</th>
                                                                    <th>?????? ??????????????</th>
                                                                    <th>?????? ??????????????</th>
                                                                </tr>
                                                                <?php foreach($re as $r) { ?>
                                                                <tr>
                                                                    <td>
                                                                        <?php echo $r['title'] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $r['body'] ?>
                                                                    </td>
                                                                    <td><a class="tableBtn" href="metting_profile.php?id=<?php echo $r['id'] ?>"><i class="icm icon-folder_shared" style="color: #fff;"></i></a></td>
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
                            </div>
                            <!-- Start profile pop up  -->
                            <div class="form-popup" id="profile">
                                <form action="information_student.php" class="form-container" method="POST">
                                    <h3>?????????? ???????? ????????</h3>
                                    <input type="hidden" value="1" name="report">
                                    <input type="hidden" value="<?php echo $_GET['user'] ?>" name="user">
                                    <label for="profileTitle"><b>?????????? ??????????????</b></label>
                                    <input id="profileTitle" type="text" placeholder="?????????? (1) dd-mm-yyyy" name="title" required>

                                    <label for="profileContent"><b>?????????? ??????????????</b></label>
                                    <textarea id="profileContent" name="content" placeholder="???????? ?????????????? ?????? ....." style="height: 50%;" required></textarea>
                                    <div class="row" style="margin-right: 1vw;;">
                                        <div class="col-5 mb-lg-0 mb-4" style="margin: 1vw;">
                                            <button class="btn">??????????</button>
                                        </div>
                                        <div class="col-5 mb-lg-0 mb-4" style="margin: 1vw;">
                                            <button class="btn cancel" onclick="closeProfile()">??????????</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- End profile pop up -->
                        </div>
                    </div>
                    <!-- End second row -->
                    <div class="ps__rail-y" style="top: -2vw; height: 8vw; left: 0px;">
                        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                    </div>
                    <!--End forth row-->
                    
                    <!--==========================================================================================-->
                    
                    <!-- Start Footer -->
                    <footer class="footer pt-3  ">
                        <div class="container-fluid">
                            <div class="row align-items-center justify-content-lg-between">
                                <div class="col-lg-6 mb-lg-0 mb-4">
                                    <div class="copyright text-center text-sm text-muted text-lg-end">
                                        ???????? ???????????? ???????????? ?????? ????????
                                        <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">??????????</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </footer>
                    <!-- End Footer -->
                </div>
            </div>
            <!-- End body content -->
        </main>
        <!-- End content -->
        
        <!--==========================================================================================-->
        
        <!-- Internal Java Script -->
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
            function popUpProfile() {
                document.getElementById("profile").style.display = "block";
            }
            
            function closeProfile() {
                document.getElementById("profile").style.display = "none";
            }
            
        </script>
        <!--End Pichart script-->
    </body>
    <!-- End Body -->
</html> 