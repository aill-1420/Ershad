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
        <link id="pagestyle" rel="stylesheet" href="../template/assets/css/mobiscroll.min.css">
        
        <!-- link Java Script -->
        <script class="u-script" type="text/javascript" src="../template/assets/js/Student_JS.js" defer=""></script>
        <script src="../template/assets/js/jquery.min.js"></script>
        <script src="../template/assets/js/main.js"></script>
        <script src="../template/assets/js/mobiscroll.javascript.min.js"></script>
        <script>
            // Ignore this in your implementation
            window.isMbscDemo = true;
        </script>
        
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
            .event-color-c {
                display: flex;
                margin: 16px;
                align-items: center;
                cursor: pointer;
            }
            .event-color-label {
                flex: 1 0 auto;
            }
            .event-color {
                width: 30px;
                height: 30px;
                border-radius: 15px;
                margin-right: 10px;
                margin-left: 240px;
                background: #5ac8fa;
            }
            .crud-color-row {
                display: flex;
                justify-content: center;
                margin: 5px;
            }
            .crud-color-c {
                padding: 3px;
                margin: 2px;
            }
            .crud-color {
                position: relative;
                min-width: 46px;
                min-height: 46px;
                margin: 2px;
                cursor: pointer;
                border-radius: 23px;
                background: #5ac8fa;
            }
            .crud-color-c.selected,
            .crud-color-c:hover {
                box-shadow: inset 0 0 0 3px #007bff;
                border-radius: 48px;
            }
            .crud-color:before {
                position: absolute;
                top: 50%;
                left: 50%;
                margin-top: -10px;
                margin-left: -10px;
                color: #f7f7f7;
                font-size: 20px;
                text-shadow: 0 0 3px #000;
                display: none;
            }
            .crud-color-c.selected .crud-color:before {
                display: block;
            }
        </style>
        <!-- End CSS Style -->
        
    </head>
    <!-- End Head -->
    
    <!--==========================================================================================-->
    
    <!-- Start Body -->
    <body class="u-body" style="font-family: 'Tajawal', sans-serif;">
        <!-- Start Header-->
        <header class="u-clearfix u-header u-sticky u-sticky-5894 u-header" id="sec-92d8" style="direction: rtl;background-color: white; box-   shadow: 1px 1px 6px #AEADBF; height: 5vw; padding-right: 2vw;">
            <!-- Start Logo -->
            <a href="#" class="u-image u-logo u-image-1" data-image-width="709" data-image-height="512">
                <img src="../template/assets/images/ErshadLogo.svg" class="u-logo-image u-logo-image-1" style="margin-right: 0.5vw; margin-top: -0.5vw;">
            </a>
            <!-- End Logo -->
            <div class="u-clearfix u-sheet u-sheet-1" style="top: -2.5vw; z-index: 30; left: 3vw;">
                <!-- Start Navigation Bar -->
                <div class="headerNavbar" style="margin-top: 0.2vw; margin-right: -9vw; width: 80%;">
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
                                            <img src="../template/assets/images/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark  ms-  3 ">
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
                                            <h6 class="text-sm font-weight-normal mb-1">Payment successfully completed</h6>
                                            <p class="text-xs text-secondary mb-0"><i class="fa fa-clock me-1"></i>2 days</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <!-- End Dropdown Menu -->
                    </li>
                    <li class="nav-item px-2 d-flex align-items-center icon-lg">
                        <a href="logout.php" class="nav-link text-success font-weight-bold px-2">
                            <i class="fa fa-power-off me-sm-1"></i>
                            <span class="d-sm-inline d-none"></span>
                        </a>
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
                                <path d="M43.2,126.9c14.2,1.3,27.6,7,39.1,15.6c8.3,6.1,19.4,10.3,32.7,5.3c11.7-4.4,18.6-17.4,21-30.2c2.6-13.3,8.1-25.9,15.7-37.1 c8.3-12.1,10.8-27.9,5.3-42.7C150.5,20.3,134.6,9,117,7.6C107.9,6.9,98.8,5,90.1,1.9C83-0.6,75-0.7,67.4,2.1 c-9.9,3.7-17,11.6-20.1,21c-3.3,10.1-10.9,18-20.6,22.2c-0.1,0-0.1,0.1-0.2,0.1c-20.3,8.9-31,32-24.6,53.2 C6.9,115.6,25.2,125.2,43.2,126.9z"></path>
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
                                                    <div class="chart" data-percent="<?php echo (($data['register_hours'] / $data['plan_hours']) * 100)+(($data['pass_hours'] / $data['plan_hours']) * 100) ?>" data-bar-color="#018ABE">
                                                    </div>
                                                    <div class="chart" data-percent="<?php echo ($data['pass_hours'] / $data['plan_hours']) * 100 ?>" data-bar-color="#02457A">
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
                                                        <div class="u-shape u-shape-svg u-text-palette-4-light-3 u-shape-1" data-animation- name="fadeIn" data-animation-duration="1000" data-animation-direction="Right">
                                                            <svg class="u-svg-link" preserveAspectRatio="none" viewBox="0 0 160 150"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-de55"></use></svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 0 160 150" x="0px" y="0px" id="svg-de55">
                                                                <path d="M43.2,126.9c14.2,1.3,27.6,7,39.1,15.6c8.3,6.1,19.4,10.3,32.7,5.3c11.7-4.4,18.6-17.4,21-30.2c2.6-13.3,8.1-25.9,15.7-37.1 c8.3-12.1,10.8-27.9,5.3-42.7C150.5,20.3,134.6,9,117,7.6C107.9,6.9,98.8,5,90.1,1.9C83-0.6,75-0.7,67.4,2.1 c-9.9,3.7-17,11.6-20.1,21c-3.3,10.1-10.9,18-20.6,22.2c-0.1,0-0.1,0.1-0.2,0.1c-20.3,8.9-31,32-24.6,53.2 C6.9,115.6,25.2,125.2,43.2,126.9z"></path></svg>
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
                                                        <div class="u-shape u-shape-svg u-text-palette-4-light-3 u-shape-3" data-animation- name="fadeIn" data-animation-duration="1000" data-animation-direction="Right">
                                                            <svg class="u-svg-link" preserveAspectRatio="none" viewBox="0 0 160 150"><use   xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-bca5"></use></svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 0 160 150" x="0px" y="0px" id="svg-bca5"><path d="M43.2,126.9c14.2,1.3,27.6,7,39.1,15.6c8.3,6.1,19.4,10.3,32.7,5.3c11.7-4.4,18.6-17.4,21-30.2c2.6-13.3,8.1-25.9,15.7-37.1 c8.3-12.1,10.8-27.9,5.3-42.7C150.5,20.3,134.6,9,117,7.6C107.9,6.9,98.8,5,90.1,1.9C83-0.6,75-0.7,67.4,2.1 c-9.9,3.7-17,11.6-20.1,21c-3.3,10.1-10.9,18-20.6,22.2c-0.1,0-0.1,0.1-0.2,0.1c-20.3,8.9-31,32-24.6,53.2 C6.9,115.6,25.2,125.2,43.2,126.9z"></path></svg>
                                                        </div>
                                                        <div class="u-palette-4-base u-shape u-shape-circle u-shape-4" data-animation-name="slideIn" data-animation-duration="1000" data-animation-direction="Left"></div>
                                                        <span class="u-file-icon u-icon u-text-white u-icon-2"><img src="../template/assets/images/2.png" alt=""></span>
                                                    </div>
                                                </div>
                                                <h4 class="u-custom-font u-text u-text-default u-text-2">حجز موعد لقاء</h4>
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
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 0 160 150" x="0px" y="0px" id="svg-4a14"><path d="M43.2,126.9c14.2,1.3,27.6,7,39.1,15.6c8.3,6.1,19.4,10.3,32.7,5.3c11.7-4.4,18.6-17.4,21-30.2c2.6-13.3,8.1-25.9,15.7-37.1 c8.3-12.1,10.8-27.9,5.3-42.7C150.5,20.3,134.6,9,117,7.6C107.9,6.9,98.8,5,90.1,1.9C83-0.6,75-0.7,67.4,2.1 c-9.9,3.7-17,11.6-20.1,21c-3.3,10.1-10.9,18-20.6,22.2c-0.1,0-0.1,0.1-0.2,0.1c-20.3,8.9-31,32-24.6,53.2 C6.9,115.6,25.2,125.2,43.2,126.9z"></path></svg>
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
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 0 160 150" x="0px" y="0px" id="svg-b0a0"><path d="M43.2,126.9c14.2,1.3,27.6,7,39.1,15.6c8.3,6.1,19.4,10.3,32.7,5.3c11.7-4.4,18.6-17.4,21-30.2c2.6-13.3,8.1-25.9,15.7-37.1 c8.3-12.1,10.8-27.9,5.3-42.7C150.5,20.3,134.6,9,117,7.6C107.9,6.9,98.8,5,90.1,1.9C83-0.6,75-0.7,67.4,2.1c-9.9,3.7-17,11.6-20.1,21c-3.3,10.1-10.9,18-20.6,22.2c-0.1,0-0.1,0.1-0.2,0.1c-20.3,8.9-31,32-24.6,53.2 C6.9,115.6,25.2,125.2,43.2,126.9z"></path></svg>
                </div>
                <div class="u-palette-4-base u-shape u-shape-circle u-shape-2" data-animation-name="fadeIn" data-animation-duration="1000" data-animation-direction="Right" data-animation-delay="0"></div>
                <div class="u-align-right u-container-style u-grey-15 u-group u-radius-10 u-shape-round u-group-1" data-animation-name="fadeIn" data-animation-duration="1000" data-animation-delay="200" data-animation-direction="Up" style="width: 70vw;">
                    <div class="u-container-layout u-valign-top u-container-layout-1" data-animation-name="fadeIn">
                        <h2 class="u-custom-font u-text u-text-default u-text-grey-70 u-text-1" style="color: #001B48;">التقويــــم</h2>
                        <!-- Start calendar -->
                        <div mbsc-page class="demo-create-read-update-delete-CRUD">
                            <div style="height:80%">
                                <div id="demo-add-delete-event"></div>
                                <div id="demo-add-popup">
                                    <div class="mbsc-form-group">
                                        <label>
                                            Title
                                            <input mbsc-input id="event-title">
                                        </label>
                                        <label>
                                            Description
                                            <textarea mbsc-textarea id="event-desc"></textarea>
                                        </label>
                                    </div>
                                    <div class="mbsc-form-group">
                                        <label>
                                            All-day
                                            <input mbsc-switch id="event-all-day" type="checkbox" />
                                        </label>
                                        <label>
                                            Starts
                                            <input mbsc-input id="start-input" />
                                        </label>
                                        <label>
                                            Ends
                                            <input mbsc-input id="end-input" />
                                        </label>
                                        <div id="event-date"></div>
                                        <div id="event-color-picker" class="event-color-c">
                                            <div class="event-color-label">Color</div>
                                            <div id="event-color-cont">
                                                <div id="event-color" class="event-color"></div>
                                            </div>
                                        </div>
                                        <label>
                                            Show as busy
                                            <input id="event-status-busy" mbsc-segmented type="radio" name="event-status" value="busy">
                                        </label>
                                        <label>
                                            Show as free
                                            <input id="event-status-free" mbsc-segmented type="radio" name="event-status" value="free">
                                        </label>
                                        <div class="mbsc-button-group">
                                            <button class="mbsc-button-block" id="event-delete" mbsc-button data-color="danger" data-variant="outline">Delete event</button>
                                        </div>
                                    </div>
                                </div>
                                <div id="demo-event-color">
                                    <div class="crud-color-row">
                                        <div class="crud-color-c" data-value="#ffeb3c">
                                            <div class="crud-color mbsc-icon mbsc-font-icon mbsc-icon-material-check" style="background:#ffeb3c"></div>
                                        </div>
                                        <div class="crud-color-c" data-value="#ff9900">
                                            <div class="crud-color mbsc-icon mbsc-font-icon mbsc-icon-material-check" style="background:#ff9900"></div>
                                        </div>
                                        <div class="crud-color-c" data-value="#f44437">
                                            <div class="crud-color mbsc-icon mbsc-font-icon mbsc-icon-material-check" style="background:#f44437"></div>
                                        </div>
                                        <div class="crud-color-c" data-value="#ea1e63">
                                            <div class="crud-color mbsc-icon mbsc-font-icon mbsc-icon-material-check" style="background:#ea1e63"></div>
                                        </div>
                                        <div class="crud-color-c" data-value="#9c26b0">
                                            <div class="crud-color mbsc-icon mbsc-font-icon mbsc-icon-material-check" style="background:#9c26b0"></div>
                                        </div>
                                    </div>
                                    <div class="crud-color-row">
                                        <div class="crud-color-c" data-value="#3f51b5">
                                            <div class="crud-color mbsc-icon mbsc-font-icon mbsc-icon-material-check" style="background:#3f51b5"></div>
                                        </div>
                                        <div class="crud-color-c" data-value="">
                                            <div class="crud-color mbsc-icon mbsc-font-icon mbsc-icon-material-check"></div>
                                        </div>
                                        <div class="crud-color-c" data-value="#009788">
                                            <div class="crud-color mbsc-icon mbsc-font-icon mbsc-icon-material-check" style="background:#009788"></div>
                                        </div>
                                        <div class="crud-color-c" data-value="#4baf4f">
                                            <div class="crud-color mbsc-icon mbsc-font-icon mbsc-icon-material-check" style="background:#4baf4f"></div>
                                        </div>
                                        <div class="crud-color-c" data-value="#7e5d4e">
                                            <div class="crud-color mbsc-icon mbsc-font-icon mbsc-icon-material-check" style="background:#7e5d4e"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
            
            /* Complaint
            ================================================== */
            function popUpComplaint() {
                document.getElementById("ComplaintPopUp").style.display = "block";
            }
            
            function closeComplaint() {
                document.getElementById("ComplaintPopUp").style.display = "none";
            }
            
            /*Calendar
            ========================================================*/
                
            mobiscroll.setOptions({
                locale: mobiscroll.localeAr,                                  // Specify language like: locale: mobiscroll.localePl or omit     setting to use default
                theme: 'windows',                                             // Specify theme like: theme: 'ios' or omit setting to use default
                themeVariant: 'light'                                         // More info about themeVariant: https://docs.mobiscroll.com/5-16-    1/javascript/eventcalendar#opt-themeVariant
            });
            
            var oldEvent,
                tempEvent = {},
                deleteEvent,
                restoreEvent,
                colorPicker,
                tempColor,
                titleInput = document.getElementById('event-title'),
                descriptionTextarea = document.getElementById('event-desc'),
                allDaySwitch = document.getElementById('event-all-day'),
                freeSegmented = document.getElementById('event-status-free'),
                busySegmented = document.getElementById('event-status-busy'),
                deleteButton = document.getElementById('event-delete'),
                colorSelect = document.getElementById('event-color-picker'),
                pickedColor = document.getElementById('event-color'),
                colorElms = document.querySelectorAll('.crud-color-c'),
                datePickerResponsive = {
                    medium: {
                        controls: ['calendar'],
                        touchUi: false
                    }
                },
                datetimePickerResponsive = {
                    medium: {
                        controls: ['calendar', 'time'],
                        touchUi: false
                    }
                },
                myData = [{
                    id: 1,
                    start: '2022-05-08T13:00',
                    end: '2022-05-08T13:45',
                    title: 'Lunch @ Butcher\'s',
                    description: '',
                    allDay: false,
                    free: true,
                    color: '#009788'
                }, {
                    id: 2,
                    start: '2022-05-18T15:00',
                    end: '2022-05-18T16:00',
                    title: 'General orientation',
                    description: '',
                    allDay: false,
                    free: false,
                    color: '#ff9900'
                }, {
                    id: 3,
                    start: '2022-05-17T18:00',
                    end: '2022-05-17T22:00',
                    title: 'Dexter BD',
                    description: '',
                    allDay: false,
                    free: true,
                    color: '#3f51b5'
                }, {
                    id: 4,
                    start: '2022-05-19T10:30',
                    end: '2022-05-19T11:30',
                    title: 'Stakeholder mtg.',
                    description: '',
                    allDay: false,
                    free: false,
                    color: '#f44437'
                }];
            
            function createAddPopup(elm) {
                // hide delete button inside add popup
                deleteButton.style.display = 'none';
                
                deleteEvent = true;
                restoreEvent = false;
                
                // set popup header text and buttons for adding
                popup.setOptions({
                    headerText: 'New event',                                  // More info about headerText: https://docs.mobiscroll.com/5-16-  1/javascript/eventcalendar#opt-headerText
                    buttons: ['cancel', {                                     // More info about buttons: https://docs.mobiscroll.com/5-16- 1/javascript/eventcalendar#opt-buttons
                        text: 'Add',
                        keyCode: 'enter',
                        handler: function () {
                            calendar.updateEvent({
                                id: tempEvent.id,
                                title: tempEvent.title,
                                description: tempEvent.description,
                                allDay: tempEvent.allDay,
                                start: tempEvent.start,
                                end: tempEvent.end,
                                color: tempEvent.color,
                            });
                            
                            // navigate the calendar to the correct view
                            calendar.navigate(tempEvent.start);
                            
                            deleteEvent = false;
                            popup.close();
                        },
                        cssClass: 'mbsc-popup-button-primary'
                    }]
                });
                
                // fill popup with a new event data
                mobiscroll.getInst(titleInput).value = tempEvent.title;
                mobiscroll.getInst(descriptionTextarea).value = '';
                mobiscroll.getInst(allDaySwitch).checked = true;
                range.setVal([tempEvent.start, tempEvent.end]);
                mobiscroll.getInst(busySegmented).checked = true;
                range.setOptions({ controls: ['date'], responsive: datePickerResponsive });
                pickedColor.style.background = '';

                // set anchor for the popup
                popup.setOptions({ anchor: elm });
                
                popup.open();
            }
            
            function createEditPopup(args) {
                var ev = args.event;
                
                // show delete button inside edit popup
                deleteButton.style.display = 'block';
                
                deleteEvent = false;
                restoreEvent = true;
                
                // set popup header text and buttons for editing
                popup.setOptions({
                    headerText: 'Edit event',                                 // More info about headerText: https://docs.mobiscroll.com/5-16-  1/javascript/eventcalendar#opt-headerText
                    buttons: ['cancel', {                                     // More info about buttons: https://docs.mobiscroll.com/5-16- 1/javascript/eventcalendar#opt-buttons
                        text: 'Save',
                        keyCode: 'enter',
                        handler: function () {
                            var date = range.getVal();
                            // update event with the new properties on save button click
                            calendar.updateEvent({
                                id: ev.id,
                                title: titleInput.value,
                                description: descriptionTextarea.value,
                                allDay: mobiscroll.getInst(allDaySwitch).checked,
                                start: date[0],
                                end: date[1],
                                free: mobiscroll.getInst(freeSegmented).checked,
                                color: ev.color,
                            });
                            
                            // navigate the calendar to the correct view
                            calendar.navigate(date[0]);;
                            
                            restoreEvent = false;
                            popup.close();
                        },
                        cssClass: 'mbsc-popup-button-primary'
                    }]
                });
                
                // fill popup with the selected event data
                mobiscroll.getInst(titleInput).value = ev.title || '';
                mobiscroll.getInst(descriptionTextarea).value = ev.description || '';
                mobiscroll.getInst(allDaySwitch).checked = ev.allDay || false;
                range.setVal([ev.start, ev.end]);
                pickedColor.style.background = ev.color || '';
                        
                if (ev.free) {
                    mobiscroll.getInst(freeSegmented).checked = true;
                } else {
                    mobiscroll.getInst(busySegmented).checked = true;
                }
                
                // change range settings based on the allDay
                range.setOptions({
                    controls: ev.allDay ? ['date'] : ['datetime'],
                    responsive: ev.allDay ? datePickerResponsive : datetimePickerResponsive
                });
                
                // set anchor for the popup
                popup.setOptions({ anchor: args.domEvent.currentTarget });
                popup.open();
            }
            
            var calendar = mobiscroll.eventcalendar('#demo-add-delete-event', {
                clickToCreate: 'double',                                      // More info about clickToCreate: https://docs.mobiscroll.com/5-16-   1/javascript/eventcalendar#opt-clickToCreate
                dragToCreate: true,                                           // More info about dragToCreate: https://docs.mobiscroll.com/5-16-    1/javascript/eventcalendar#opt-dragToCreate
                dragToMove: true,                                             // More info about dragToMove: https://docs.mobiscroll.com/5-16-  1/javascript/eventcalendar#opt-dragToMove
                dragToResize: true,                                           // More info about dragToResize: https://docs.mobiscroll.com/5-16-    1/javascript/eventcalendar#opt-dragToResize
                view: {                                                       // More info about view: https://docs.mobiscroll.com/5-16-    1/javascript/eventcalendar#opt-view
                    calendar: { labels: true }
                },
                data: myData,                                                 // More info about data: https://docs.mobiscroll.com/5-16-    1/javascript/eventcalendar#opt-data
                onEventClick: function (args) {                               // More info about onEventClick: https://docs.mobiscroll.com/5-16-    1/javascript/eventcalendar#event-onEventClick
                    oldEvent = Object.assign({}, args.event);
                    tempEvent = args.event;
                    
                    if (!popup.isVisible()) {
                        createEditPopup(args);
                    }
                },
                onEventCreated: function (args) {                             // More info about onEventCreated: https://docs.mobiscroll.com/5-16-  1/javascript/eventcalendar#event-onEventCreated
                    popup.close();
                    // store temporary event
                    tempEvent = args.event;
                    createAddPopup(args.target);
                },
                onEventDeleted: function () {                                 // More info about onEventDeleted: https://docs.mobiscroll.com/5-16-  1/javascript/eventcalendar#event-onEventDeleted
                    mobiscroll.snackbar({ 
                        button: {
                            action: function () {
                                calendar.addEvent(args.event);
                            },
                            text: 'Undo'
                        },
                        message: 'Event deleted'
                    });
                }
            });
            
            var popup = mobiscroll.popup('#demo-add-popup', {
                display: 'bottom',                                            // Specify display mode like: display: 'bottom' or omit setting to    use default
                contentPadding: false,
                fullScreen: true,
                onClose: function () {                                        // More info about onClose: https://docs.mobiscroll.com/5-16- 1/javascript/eventcalendar#event-onClose
                    if (deleteEvent) {
                        calendar.removeEvent(tempEvent);
                    } else if (restoreEvent) {
                        calendar.updateEvent(oldEvent);
                    }
                },
                responsive: {                                                 // More info about responsive: https://docs.mobiscroll.com/5-16-  1/javascript/eventcalendar#opt-responsive
                    medium: {
                        display: 'anchored',                                  // Specify display mode like: display: 'bottom' or omit setting to    use default
                        width: 400,                                           // More info about width: https://docs.mobiscroll.com/5-16-   1/javascript/eventcalendar#opt-width
                        fullScreen: false,
                        touchUi: false
                    }
                }
            });

            titleInput.addEventListener('input', function (ev) {
                // update current event's title
                tempEvent.title = ev.target.value;
            });
            
            descriptionTextarea.addEventListener('change', function (ev) {
                // update current event's title
                tempEvent.description = ev.target.value;
            });
            
            allDaySwitch.addEventListener('change', function () {
                var checked = this.checked
                // change range settings based on the allDay
                range.setOptions({
                    controls: checked ? ['date'] : ['datetime'],
                    responsive: checked ? datePickerResponsive : datetimePickerResponsive
                });
                
                // update current event's allDay property
                tempEvent.allDay = checked;
            });
            
            var range = mobiscroll.datepicker('#event-date', {
                controls: ['date'],
                select: 'range',
                startInput: '#start-input',
                endInput: '#end-input',
                showRangeLabels: false,
                touchUi: true,
                responsive: datePickerResponsive,                             // More info about responsive: https://docs.mobiscroll.com/5-16-  1/javascript/eventcalendar#opt-responsive
                onChange: function (args) {
                    var date = args.value;
                    // update event's start date
                    tempEvent.start = date[0];
                    tempEvent.end = date[1];
                }
            });
            
            document.querySelectorAll('input[name=event-status]').forEach(function (elm) {
                elm.addEventListener('change', function () {
                    // update current event's free property
                    tempEvent.free = mobiscroll.getInst(freeSegmented).checked;
                });
            });
            
            deleteButton.addEventListener('click', function () {
                // delete current event on button click
                calendar.removeEvent(oldEvent);
                popup.close();
                
                // save a local reference to the deleted event
                var deletedEvent = tempEvent;
                
                mobiscroll.snackbar({ 
                    button: {
                        action: function () {
                            calendar.addEvent(deletedEvent);
                        },
                        text: 'Undo'
                    },
                    message: 'Event deleted'
                });
            });
            
            colorPicker = mobiscroll.popup('#demo-event-color', {
                display: 'bottom',                                            // Specify display mode like: display: 'bottom' or omit setting to    use default
                contentPadding: false,
                showArrow: false,
                showOverlay: false,
                buttons: [                                                    // More info about buttons: https://docs.mobiscroll.com/5-16- 1/javascript/eventcalendar#opt-buttons
                    'cancel',
                    {
                        text: 'Set',
                        keyCode: 'enter',
                        handler: function (ev) {
                            setSelectedColor();
                        },
                        cssClass: 'mbsc-popup-button-primary'
                    }
                ],
                responsive: {                                                 // More info about responsive: https://docs.mobiscroll.com/5-16-  1/javascript/eventcalendar#opt-responsive
                    medium: {
                        display: 'anchored',                                  // Specify display mode like: display: 'bottom' or omit setting to    use default
                        anchor: document.getElementById('event-color-cont'),  // More info about anchor: https://docs.mobiscroll.com/5-16-  1/javascript/eventcalendar#opt-anchor
                        buttons: {}                                           // More info about buttons: https://docs.mobiscroll.com/5-16- 1/javascript/eventcalendar#opt-buttons
                    }
                }
            });
            
            function selectColor(color, setColor) {
                var selectedElm = document.querySelector('.crud-color-c.selected');
                var newSelected = document.querySelector('.crud-color-c[data-value="' + color + '"]');
                
                if (selectedElm) {
                    selectedElm.classList.remove('selected')
                }
                if (newSelected) {
                    newSelected.classList.add('selected')
                }
                if (setColor) {
                    pickedColor.style.background = color || '';
                }
            }
            
            function setSelectedColor() {
                tempEvent.color = tempColor;
                pickedColor.style.background = tempColor;
                colorPicker.close();
            }
            
            colorSelect.addEventListener('click', function () {
                selectColor(tempEvent.color || '');
                colorPicker.open();
            });
            
            colorElms.forEach(function (elm) {
                elm.addEventListener('click', function () {
                    tempColor = elm.getAttribute('data-value');
                    selectColor(tempColor);
                    
                    if (!colorPicker.s.buttons.length) {
                        setSelectedColor();
                    }
                });
            });
        </script>
    </body>
    <!-- End Body -->
</html>