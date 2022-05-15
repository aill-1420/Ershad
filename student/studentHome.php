<?php
session_start();
ob_start();
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include '../confi/app.php';
$user = $_SESSION['userid'];
// select from student table
$query = "SELECT * FROM students WHERE id = ".$user;
$data = $mysql->query($query)->fetch_array(MYSQLI_ASSOC);

$query = "SELECT * FROM advising_file WHERE student_id =".$user;
$datadb = $mysql->query($query);

$check = $datadb->num_rows;
$file = 0;

// check if advisting file is creat or not
if($check) {
    $file = true;
} else {
    $file = false;
}


// compliant
if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['complain'] == 1) {
    $title = $_POST['title'];
    $message = $_POST['message'];
    $user_id  = $_SESSION['userid'];
    $time = date("Y-m-d H:i:s");
    $query = "INSERT INTO `complaint` (`complaint_subject`, `complaint_text`, `date`, `student_id`) 
                VALUES ('$title', '$message', '$time', '$user_id')";

    $mysql->query($query);
    $success = true;
}
?>
<!DOCTYPE html>
<html len="ar">
<!-- Start Head -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>الصفحة الرئيسية</title>
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
        /* Complaint form */

        /* The popup form - hidden by default */
        #ComplaintPopUp{
            display: none;
        }
        #meetingPopUp{
            display: none;
        }
        .complaint-popup, .meeting-popup {
            display: none;
            position: fixed;
            top: 0vw;
            border-radius: 15px;
            box-shadow: 2px 2px 6px #AEADBF;
            z-index: 20;
            background-color: rgb(91,90,114,0.7);
            height: 100%;
            width: 100%;
            direction: rtl;
            overflow: inherit;
        }

        /* Add styles to the form container */
        .complaint-container, .meeting-container{
            max-width: 40%;
            height: auto;
            padding: 2vw;;
            background-color: white;
            border-radius: 15px;
            margin: 3vw 30vw;
        }
        .complaint-container label, .meeting-container label{
            color: #02457A;
            font-size: 18px;
        }

        /* Full-width input fields */
        .complaint-container input[type=text], #ComplaintContent,  .meeting-container select{
            width: 100%;
            padding: 0.5vw;
            margin: 5px 0 22px 0;
            border: none;
            background: #f1f1f1;
            border-radius: 15px;
        }

        /* When the inputs get focus, do something */
        .complaint-container input[type=text]:focus, #ComplaintContent:focus,  .meeting-container select:focus{
            background-color: #ddd;
            outline: none;
        }

        /* Set a style for the submit/login button */
        .complaint-container .btn,  .meeting-container .btn{
            background-color: #02457A;
            color: white;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.8;
            text-align-last: center;
        }


        /* Add a red background color to the cancel button */
        .complaint-container .cancel{
            background-color: #97CADB;
            text-align-last: center;
        }

        /* Add some hover effects to buttons */
        .complaint-container .btn:hover, .open-button:hover, .meeting-container .btn:hover, .open-button:hover {
            opacity: 1;
        }
    </style>
    <!-- End CSS Style -->

</head>
<!-- End Head -->
<!-- Start Body -->
<body class="u-body" style="font-family: 'Tajawal', sans-serif;">

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
                <li><a class="activeNav" href="studentHome.php">الرئيسية</a></li>
                <li><a class="" href="metting.php">حجز موعد لقاء</a></li>
                <!--  check if advsing file exists-->
                <?php if($file == true) { ?>
                <li><a href="view_advising_file.php">الملف الإرشادي</a></li>
                <?php } else { ?>
                <li><a href="create_advising_file.php">الملف الإرشادي</a></li>
                <?php } ?>
                <li><a href="listComplaint.php">الشكاوى المرسلة</a></li>
            </ul>
            <!-- feedback when user successfuly sent complaint-->
            <?php if(isset($success)){ ?>
                <div class="alert alert-success" role="alert">
                    تم ارسال الشكوى بنجاح!
                </div>
            <?php }?>
        </div>
        <!-- End Navigation Bar -->
        <!-- Start Search -->
        <!--<div class="input-group" style="direction: ltr; width: 20%;  margin-top: -3.4vw; float: left; box-shadow: 0px 0px 2px #AEADBF; z-index: 30;">
            <span class="input-group-text text-body" ><i class="fas fa-search" aria-hidden="true"></i></span>
            <input type="text" class="form-control" placeholder="أكتب هنا..." style="direction: rtl; ">
        </div>-->
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

<!-- Start Block 1-->
<section class="u-clearfix u-section-1" id="sec-b4b5" style="z-index: 1; margin-top: -3vw;">

    <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-container-style u-group u-shape-rectangle u-group-1">
            <div class="u-container-layout u-container-layout-1">
                <div class="u-shape u-shape-svg u-text-palette-4-light-3 u-shape-1" data-animation-name="fadeIn" data-animation-duration="1000" data-animation-direction="Right">
                    <svg class="u-svg-link" preserveAspectRatio="none" viewBox="0 0 160 150">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-1a24"></use>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 0 160 150" x="0px" y="0px" id="svg-1a24">
                                <path d="M43.2,126.9c14.2,1.3,27.6,7,39.1,15.6c8.3,6.1,19.4,10.3,32.7,5.3c11.7-4.4,18.6-17.4,21-30.2c2.6-13.3,8.1-25.9,15.7-37.1
                                c8.3-12.1,10.8-27.9,5.3-42.7C150.5,20.3,134.6,9,117,7.6C107.9,6.9,98.8,5,90.1,1.9C83-0.6,75-0.7,67.4,2.1
                                c-9.9,3.7-17,11.6-20.1,21c-3.3,10.1-10.9,18-20.6,22.2c-0.1,0-0.1,0.1-0.2,0.1c-20.3,8.9-31,32-24.6,53.2
                                C6.9,115.6,25.2,125.2,43.2,126.9z"></path>
                            </svg>
                </div>

                <div class="u-palette-4-base u-shape u-shape-circle u-shape-2" data-animation-name="slideIn" data-animation-duration="1000" data-animation-direction="Left"></div>
                <h4 class="u-align-right u-custom-font u-text u-text-default u-text-1" data-animation-name="slideIn" data-animation-duration="1000" data-animation-direction="Right" style="color: #3F4747; margin-right: -1vw; font-weight: 500;">
                    <span style="font-weight: 700; color: #2F3535;">اسم الطالب: </span><?php echo $_SESSION['name'] ?><br>
                    <span style="font-weight: 700; color: #2F3535;">رقم الطالب: </span><?php echo $_SESSION['studentid'] ?><br>
                    <span style="font-weight: 700; color: #2F3535;">الكلية: </span> <?php echo  $_SESSION['college'] ?>  <br>
                    <span style="font-weight: 700; color: #2F3535;">التخصص:</span> <?php echo  $_SESSION['major']?>  <br>
                    <span style="font-weight: 700; color: #2F3535;">المعدل التراكمي: </span> <?php echo $data['gpa'] ?><br>
                    <?php
                    if($data['adviser_id']) {
                        $query = "SELECT * FROM acadmic_advising WHERE id =".$data['adviser_id'];
                        $super = $mysql->query($query)->fetch_array(MYSQLI_ASSOC); ?>
                    <span style="font-weight: 700; color: #2F3535;">
                        المرشد الأكاديمي:
                        <?php
                        echo $super['full_name'];
                        ?>
                    </span>
                    <?php } ?>
                </h4>
                <!-- Start level Rectangle -->
                <div class="u-container-style u-group u-group-2">
                    <div class="u-container-layout">
                        <div class="u-grey-25 u-radius-50 u-shape u-shape-round u-shape-3"></div>
                        <p class="u-custom-font u-text u-text-default u-text-white u-text-2">
                            <?php echo $data['register_hours'] ?>
                        </p>
                        <p class="u-align-right u-custom-font u-text u-text-white u-text-3">المسجلة</p>
                    </div>
                </div>
                <div class="u-container-style u-group u-group-3">
                    <div class="u-container-layout">
                        <div class="u-grey-75 u-radius-50 u-shape u-shape-round u-shape-4"></div>
                        <p class="u-custom-font u-text u-text-default u-text-white u-text-4">
                            <?php echo $data['reamin_hours'] ?>

                        </p>
                        <p class="u-align-right u-custom-font u-text u-text-default u-text-white u-text-5">المتبقية</p>
                    </div>
                </div>
                <div class="u-container-style u-group u-group-4">
                    <div class="u-container-layout">
                        <div class="u-grey-60 u-radius-50 u-shape u-shape-round u-shape-5"></div>
                        <p class="u-align-center u-custom-font u-text u-text-default u-text-white u-text-6">
                            <?php echo $data['pass_hours'] ?>
                        </p>
                        <p class="u-align-right u-custom-font u-text u-text-default u-text-white u-text-7">المجتازة</p>
                    </div>
                </div>
                <!-- End level Rectangle -->
                <h2 class="u-custom-font u-text u-text-default u-text-8" data-animation-name="slideIn" data-animation-duration="1000"   data-animation-direction="Right" style="color: #2F3535; margin-right: -1vw;">معلومات الطالب</h2>
                <section id="s-team" class="section" style="z-index: 2">
                    <div class="b-skills">
                        <div class="containerr">
                            <div class="row">
                                <!-- Start Level Circle -->
                                <div class="col-xs-12 col-sm-6 col-md-3">
                                    <div class="skill-item center-block">
                                        <div class="chart-containerr" >
                                            <div class="chart" data-percent="100" data-line-width="150" style="width:   100%; height: 100%; background-color: #fff; border-radius:50%; box-shadow: 0px 0px 12px #2F3535;">
                                            </div>
                                            <div class="chart" data-percent="<?php echo (($data['reamin_hours'] / $data['plan_hours']) * 100)+((($data['register_hours'] / $data['plan_hours']) * 100)+(($data['pass_hours'] / $data['plan_hours']) * 100)) ?>" data-bar-color="#97CADB">
                                            </div>
                                            <div class="chart" data-percent="<?php echo (($data['register_hours'] / $data['plan_hours']) * 100)+(($data['pass_hours'] / $data['plan_hours']) * 100) ?>" data-bar-color="#018ABE"><!-- المسجلة-->
                                            </div>
                                            <div class="chart" data-percent="<?php echo ($data['pass_hours'] / $data['plan_hours']) * 100 ?>" data-bar-color="#02457A"><!-- المجتازة-->
                                                <span class="percent" data-after="%">"<?php echo ($data['pass_hours'] / $data['plan_hours']) * 100 ?></span>
                                                <p style="font-size: 18px; font-weight: 500; text-align-last:   center;">المستوى <?php echo $data['level'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Level Circle -->
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>
<!-- End Block 1-->
<!--==========================================================================================-->

<!-- Start Block 2-->
<section class="u-clearfix u-section-2" id="sec-c928"   style="margin-right: -20vw;">

    <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
            <div class="u-layout">
                <div class="u-layout-row">
                    <!-- Start Button 1 -->
                    <div class="u-align-left u-container-style u-layout-cell u-size-15 u-size-30-md u-layout-cell-1">
                        <a class="hrefButton" onclick="popUpComplaint()" style="cursor: pointer;">
                            <div class="u-container-layout u-container-layout-1">
                                <div class="u-container-style u-group u-hover-feature u-radius-30 u-shape-round u-group-1" data-animation-name="slideIn" data-animation-duration="1000" data-animation-direction="Up">
                                    <div class="u-container-layout u-container-layout-2">
                                        <div class="u-container-style u-group u-group-2">
                                            <div class="u-container-layout">
                                                <div class="u-shape u-shape-svg u-text-palette-4-light-3 u-shape-1" data-animation-name="fadeIn" data-animation-duration="1000" data-animation-direction="Right">
                                                    <svg class="u-svg-link" preserveAspectRatio="none" viewBox="0 0 160 150"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-de55"></use></svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 0 160 150" x="0px" y="0px" id="svg-de55">
                                                            <path d="M43.2,126.9c14.2,1.3,27.6,7,39.1,15.6c8.3,6.1,19.4,10.3,32.7,5.3c11.7-4.4,18.6-17.4,21-30.2c2.6-13.3,8.1-25.9,15.7-37.1
                                                            c8.3-12.1,10.8-27.9,5.3-42.7C150.5,20.3,134.6,9,117,7.6C107.9,6.9,98.8,5,90.1,1.9C83-0.6,75-0.7,67.4,2.1
                                                            c-9.9,3.7-17,11.6-20.1,21c-3.3,10.1-10.9,18-20.6,22.2c-0.1,0-0.1,0.1-0.2,0.1c-20.3,8.9-31,32-24.6,53.2
                                                            C6.9,115.6,25.2,125.2,43.2,126.9z"></path></svg>
                                                </div>
                                                <div class="u-palette-4-base u-shape u-shape-circle u-shape-2" data-animation-name="slideIn" data-animation-duration="1000" data-animation-direction="Left"></div>
                                                <span class="u-file-icon u-icon u-text-white u-icon-1"><img src="../template/assets/images/1.png" alt=""></span>
                                            </div>
                                        </div>
                                        <h4 class="u-custom-font u-text u-text-default u-text-1">رفع شكوى</h4>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- End Button 1 -->
                    <!-- Start Button 2 -->
                    <div class="u-align-left u-container-style u-layout-cell u-size-15 u-size-30-md u-layout-cell-2">
                        <a class="hrefButton" href="metting.php" >
                            <div class="u-container-layout u-container-layout-4">
                                <div class="u-container-style u-expanded-width u-group u-hover-feature u-radius-30 u-shape-round u-group-3"    data-animation-name="slideIn" data-animation-duration="1000" data-animation-direction="Up">
                                    <div class="u-container-layout u-container-layout-5">
                                        <div class="u-container-style u-group u-group-4">
                                            <div class="u-container-layout">
                                                <div class="u-shape u-shape-svg u-text-palette-4-light-3 u-shape-3" data-animation-name="fadeIn" data-animation-duration="1000" data-animation-direction="Right">
                                                    <svg class="u-svg-link" preserveAspectRatio="none" viewBox="0 0 160 150"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-bca5"></use></svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 0 160 150" x="0px" y="0px" id="svg-bca5"><path d="M43.2,126.9c14.2,1.3,27.6,7,39.1,15.6c8.3,6.1,19.4,10.3,32.7,5.3c11.7-4.4,18.6-17.4,21-30.2c2.6-13.3,8.1-25.9,15.7-37.1
                                                            c8.3-12.1,10.8-27.9,5.3-42.7C150.5,20.3,134.6,9,117,7.6C107.9,6.9,98.8,5,90.1,1.9C83-0.6,75-0.7,67.4,2.1
                                                            c-9.9,3.7-17,11.6-20.1,21c-3.3,10.1-10.9,18-20.6,22.2c-0.1,0-0.1,0.1-0.2,0.1c-20.3,8.9-31,32-24.6,53.2
                                                            C6.9,115.6,25.2,125.2,43.2,126.9z"></path></svg>
                                                </div>
                                                <div class="u-palette-4-base u-shape u-shape-circle u-shape-4" data-animation-name="slideIn" data-animation-duration="1000" data-animation-direction="Left"></div>
                                                <span class="u-file-icon u-icon u-text-white u-icon-2"><img src="../template/assets/images/2.png" alt=""></span>
                                            </div>
                                        </div>
                                        <h4 class="u-custom-font u-text u-text-default u-text-2">اختيار موعد لقاء</h4>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- End Button 2 -->
                    <!-- Start Button 3 -->
                    <div class="u-container-style u-layout-cell u-size-15 u-size-30-md u-layout-cell-3">
                        <a class="hrefButton" href="<?php if($check) echo "view_advising_file.php"; else echo "create_advising_file.php"; ?>">
                            <div class="u-container-layout u-container-layout-7">
                                <div class="u-container-style u-expanded-width u-group u-hover-feature u-radius-30 u-shape-round u-group-5" data-animation-name="slideIn" data-animation-duration="1000" data-animation-direction="Up">
                                    <div class="u-container-layout u-container-layout-8">
                                        <div class="u-container-style u-group u-group-6">
                                            <div class="u-container-layout">
                                                <div class="u-shape u-shape-svg u-text-palette-4-light-3 u-shape-5" data-animation-name="fadeIn" data-animation-duration="1000" data-animation-direction="Right">
                                                    <svg class="u-svg-link" preserveAspectRatio="none" viewBox="0 0 160 150"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-4a14"></use></svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 0 160 150" x="0px" y="0px" id="svg-4a14"><path d="M43.2,126.9c14.2,1.3,27.6,7,39.1,15.6c8.3,6.1,19.4,10.3,32.7,5.3c11.7-4.4,18.6-17.4,21-30.2c2.6-13.3,8.1-25.9,15.7-37.1
                                                            c8.3-12.1,10.8-27.9,5.3-42.7C150.5,20.3,134.6,9,117,7.6C107.9,6.9,98.8,5,90.1,1.9C83-0.6,75-0.7,67.4,2.1
                                                            c-9.9,3.7-17,11.6-20.1,21c-3.3,10.1-10.9,18-20.6,22.2c-0.1,0-0.1,0.1-0.2,0.1c-20.3,8.9-31,32-24.6,53.2
                                                            C6.9,115.6,25.2,125.2,43.2,126.9z"></path></svg>
                                                </div>
                                                <div class="u-palette-4-base u-shape u-shape-circle u-shape-6" data-animation-name="slideIn"   data-animation-duration="1000" data-animation-direction="Left"></div>
                                                <span class="u-file-icon u-icon u-text-white u-icon-3"><img src="../template/assets/images/3.png" alt=""></span>
                                            </div>
                                        </div>
                                        <h4 class="u-custom-font u-text u-text-default u-text-3">الملف الإرشادي</h4>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- End Button 3 -->

                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Block 2-->

<!--==========================================================================================-->


<!-- Start complaint pop up -->
<div class="complaint-popup" id="ComplaintPopUp">
    <form  method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" class="complaint-container" style="height: 80%;">
        <h3>رفع شكوى</h3>
        <input type="hidden" name="complain" value="1">
        <label for="ComplaintTitle"><b>عنوان الشكوى</b></label>
        <input id="ComplaintTitle" type="text" placeholder="شكوى بخصوص ....." name="title" required>

        <label for="ComplaintContent"><b>محتوى الشكوى</b></label>
        <textarea id="ComplaintContent"name="message"   placeholder="أكتب المحتوى هنا ....." style="height: 50%;" required></textarea>

        <div class="row">
            <div class="col-lg-6 mb-lg-0 mb-4">
                <button type="submit" class="btn">إرسال</button>
            </div>
            <div class="col-lg-6 mb-lg-0 mb-4">
                <button type="button" class="btn cancel" onclick="closeComplaint()">إلغاء</button>
            </div>
        </div>
    </form>
</div>
<!-- End complaint pop up -->

<!--==========================================================================================-->



<!-- Start Block 3-->
<section class="u-align-center u-clearfix u-palette-4-light-3 u-section-3" id="carousel_987a" style="direction: rtl">
    <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-shape u-shape-svg u-text-palette-4-light-3 u-shape-1" data-animation-name="fadeIn" data-animation-duration="1000"   data-animation-direction="Right">
            <svg class="u-svg-link" preserveAspectRatio="none" viewBox="0 0 160 150"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-b0a0"></use></svg>
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 0 160 150" x="0px" y="0px" id="svg-b0a0"><path d="M43.2,126.9c14.2,1.3,27.6,7,39.1,15.6c8.3,6.1,19.4,10.3,32.7,5.3c11.7-4.4,18.6-17.4,21-30.2c2.6-13.3,8.1-25.9,15.7-37.1
                        c8.3-12.1,10.8-27.9,5.3-42.7C150.5,20.3,134.6,9,117,7.6C107.9,6.9,98.8,5,90.1,1.9C83-0.6,75-0.7,67.4,2.1
                        c-9.9,3.7-17,11.6-20.1,21c-3.3,10.1-10.9,18-20.6,22.2c-0.1,0-0.1,0.1-0.2,0.1c-20.3,8.9-31,32-24.6,53.2
                        C6.9,115.6,25.2,125.2,43.2,126.9z"></path></svg>
        </div>
        <div class="u-palette-4-base u-shape u-shape-circle u-shape-2" data-animation-name="fadeIn" data-animation-duration="1000" data-animation-direction="Right" data-animation-delay="0"></div>
        <div class="u-align-right u-container-style u-grey-15 u-group u-radius-10 u-shape-round u-group-1" data-animation-name="fadeIn" data-animation-duration="1000" data-animation-delay="200" data-animation-direction="Up" style="width: 60vw;">
            <div class="u-container-layout u-valign-top u-container-layout-1" data-animation-name="fadeIn">
                <h2 class="u-custom-font u-text u-text-default u-text-grey-70 u-text-1" style="color: #001B48;">التقويــــم</h2>
                <!-- Start calendar -->
                <section class="ftco-section">
                    <div class="container">
                        <div class="row justify-content-center">
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="content w-100"  style="box-shadow: 2px 2px 6px #AEADBF">
                                    <div class="calendar-container">
                                        <div class="calendar">
                                            <div class="year-header">
                                                <span class="left-button fa fa-chevron-left" id="prev"> </span>
                                                <span class="year" id="label"></span>
                                                <span class="right-button fa fa-chevron-right" id="next"> </span>
                                            </div>
                                            <table class="months-table w-100">
                                                <tbody>
                                                <tr class="months-row">
                                                    <td class="month">Jan</td>
                                                    <td class="month">Feb</td>
                                                    <td class="month">Mar</td>
                                                    <td class="month">Apr</td>
                                                    <td class="month">May</td>
                                                    <td class="month">Jun</td>
                                                    <td class="month">Jul</td>
                                                    <td class="month">Aug</td>
                                                    <td class="month">Sep</td>
                                                    <td class="month">Oct</td>
                                                    <td class="month">Nov</td>
                                                    <td class="month">Dec</td>
                                                </tr>
                                                </tbody>
                                            </table>

                                            <table class="days-table w-100">
                                                <td class="day">Sun</td>
                                                <td class="day">Mon</td>
                                                <td class="day">Tue</td>
                                                <td class="day">Wed</td>
                                                <td class="day">Thu</td>
                                                <td class="day">Fri</td>
                                                <td class="day">Sat</td>
                                            </table>
                                            <div class="frame">
                                                <table class="dates-table w-100">
                                                    <tbody class="tbody">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <button class="button" id="add-button">إضافة موعد</button>
                                        </div>
                                    </div>
                                    <div class="events-container">
                                        <div class="event-card" style="border-left: 10px solid rgb(255, 23, 68);">
                                        </div>
                                    </div>
                                    <div class="dialog" id="dialog">
                                        <h2 class="dialog-header"> إضافة موعد جديد </h2>
                                        <form class="form" id="form">
                                            <div class="form-container" align="center">
                                                <label class="form-label" id="valueFromMyButton" for="name">اسم الموعد</label>
                                                <input class="input" type="text" id="name" maxlength="36">
                                                <label class="form-label" id="valueFromMyButton" for="count">عدد الأشخاص المنظمين</label>
                                                <input class="input" type="number" id="count" min="0" max="1000000" maxlength="7">
                                                <input type="button" value="إلغاء" class="button" id="cancel-button">
                                                <input type="button" value="إضافة" class="button button-white" id="ok-button">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End calendar -->
            </div>
        </div>
    </div>
</section>
<!-- End Block 3-->
<!--==========================================================================================-->


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

    /* Complaint
    ================================================== */
    function popUpComplaint() {
        document.getElementById("ComplaintPopUp").style.display = "block";
    }

    function closeComplaint() {
        document.getElementById("ComplaintPopUp").style.display = "none";
    }
    /* Meeting
================================================== */
    function popUpMeeting() {
        document.getElementById("meetingPopUp").style.display = "block";
    }

    function closeMeeting() {
        document.getElementById("meetingPopUp").style.display = "none";
    }

</script>




</body>
<!-- Start Body -->
</html>
