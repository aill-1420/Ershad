<?php
ob_start();
session_start();
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include 'confi/app.php';
include 'template/header.php';
//check if Email is used for any user
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $checkEmail = $_POST['email'];
    $query = "SELECT * FROM `students` WHERE `email` = '$checkEmail'";
    $queryAdvisor = "SELECT * FROM `acadmic_advising` WHERE `email` = '$checkEmail'";
    $queryCommittee = "SELECT * FROM `acadmic_advising_committee` WHERE `email` = '$checkEmail'";
    $checkStudent = $mysql->query($query);
    $queryAfv = $mysql->query($queryAdvisor);
    $checksCommittee = $mysql->query($queryCommittee);
    if ($checkStudent->num_rows > 0) {
        $messageEmailVail = 'هذا الإيميل مسجل كطالب';
    } elseif ($queryAfv->num_rowws > 0) {
        $messageEmailVail = "هذا الإيميل مسجل كعضو هيئة تدريس";
    } elseif ($queryCommittee->num_rowws > 0) {
        $messageEmailVail = "هذا الإيميل مسجل كعضو في لجنة الإرشاد";
    }


    if (!isset($messageEmailVail)) {
        //sign up student
        if ($_POST['userType'] == 'student') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $query = "SELECT * FROM `students` WHERE `email` = '$email'";
            // validation for email not dublicate
            $validateEmail = $mysql->query($query);
            if ($validateEmail->num_rows > 0) {
                $messageEmailVail = "Sorry this email is used try another one";
            } else {

                $password = $_POST['password'];
                $userType = $_POST['userType'];
                $gender = $_POST['gender'];
                $college = $_POST['college'];
                $major = $_POST['major'];
                $studentid = $_POST['studentid'];
                $query = "INSERT INTO `students` (`full_name`, `email`, `password`, `collage`, `major`, `sex`, `profile_photo`, `studentid`) 
                    VALUES ('$name', '$email', '$password', '$college', '$major', '$gender' , NULL, '$studentid')";
                $mysql->query($query);

                // Set session variables
                $_SESSION = [];
                $_SESSION['userid'] = $mysql->insert_id;
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                $_SESSION['studentid'] = $studentid;
                $_SESSION['college'] = $college;
                $_SESSION['major'] = $major;
                redirect('student/studentHome.php');
                die();
            }
        } //sign up adviser
        elseif ($_POST['userType'] == 'adviser') {
            $email = $_POST['email'];
            $name = $_POST['name'];
            $userType = 'adviser';
            $college = $_POST['college'];
            $password = $_POST['password'];
            $gender = $_POST['gender'];
            $major = $_POST['major'];
            $adviderid = $_POST['studentid'];
            $query = "INSERT INTO `acadmic_advising` (`full_name`, `password`, `collage`, `major`, `sex`, `email`, `phone`, `profile_photo`,`adviderid`) 
                    VALUES ('$name', '$password', '$college', '$major', 'famale', '$email', NULL, NULL,'$adviderid')";
            $stmt = $mysql->query($query);
            $_SESSION = [];
            $_SESSION['userid'] = $mysql->insert_id;
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['adviderid'] = $adviderid;
            redirect('academic_adviser/dashboard_adviser.php');
            die();
        } //sign up committee
        elseif ($_POST['userType'] == 'committee') {
            $email = $_POST['email'];
            $name = $_POST['name'];
            $userType = 'committee';
            $college = $_POST['college'];
            $password = $_POST['password'];
            $gender = $_POST['gender'];
            $major = $_POST['major'];
            $query = "INSERT INTO `acadmic_advising_committee` (`full_name`, `password`, `collage`, `major`, `sex`, `email`, `phone_number`, `profile_photo`) 
                    VALUES ('$name', '$password', '$college', '$major', '$gender', '$email', NULL, NULL)";
            $stmt = $mysql->query($query);
            $_SESSION = [];
            $_SESSION['userid'] = $mysql->insert_id;
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;

            redirect('academic_advising_committee/dshboard_committee.php');
            die();
        }
    }
}
?>

<!DOCTYPE html>
<html dir="rtl">
<!-- Start Head -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>إرشاد</title>
    <link rel="icon" href="template/assets/images/ErshadLogo.svg" type="image/gif" sizes="16x16"> <!-- favicon -->

    <!-- CSS Link -->
    <link rel="stylesheet" type="text/css" href="template/assets/css/Welcome_Page_Style.css">
    <link rel="stylesheet" type="text/css" href="template/assets/css/Library_Style.css">
</head>
<!-- End Head -->
<!-- Start Body -->
<body class="u-body" style="font-family: 'Tajawal', sans-serif;">

<!-- Start Header-->
<header class="u-clearfix u-header u-sticky u-sticky-5894 u-header" id="sec-92d8"
        style="direction: rtl; height: 5vw; padding-right:    5vw;">
    <!-- Start Logo -->
    <a href="#" class="u-image u-logo u-image-1" data-image-width="709" data-image-height="512">
        <img src="template/assets/images/ErshadLogo.svg" class="u-logo-image u-logo-image-1"
             style="margin-right: 0.5vw; margin-top: -0.5vw;">
    </a>
    <!-- End Logo -->
</header>
<!-- End Header-->

<!--==========================================================================================-->
<!-- Start Background SVG Shapes -->
<section class="u-clearfix u-section-1" id="sec-b4b5" style="z-index: 1; margin-top: -17vw;">
    <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-container-style u-group u-shape-rectangle u-group-1">
            <div class="u-container-layout u-container-layout-1">
                <div class="u-shape u-shape-svg u-text-palette-4-light-3 u-shape-1 fadeInRightBig"
                     data-animation-name="fadeInRightBig" data-animation- duration="1000"
                     data-animation-direction="Right">
                    <svg class="u-svg-link" preserveAspectRatio="none" viewBox="0 0 160 150">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-1a24"></use>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                         xml:space="preserve" class="u-svg-content" viewBox="0 0 160 150" x="0px" y="0px" id="svg-1a24">
                                <path d="M43.2,126.9c14.2,1.3,27.6,7,39.1,15.6c8.3,6.1,19.4,10.3,32.7,5.3c11.7-4.4,18.6-17.4,21-30.2c2.6-13.3,8.1-25.9,15.7-37.1
                                c8.3-12.1,10.8-27.9,5.3-42.7C150.5,20.3,134.6,9,117,7.6C107.9,6.9,98.8,5,90.1,1.9C83-0.6,75-0.7,67.4,2.1
                                c-9.9,3.7-17,11.6-20.1,21c-3.3,10.1-10.9,18-20.6,22.2c-0.1,0-0.1,0.1-0.2,0.1c-20.3,8.9-31,32-24.6,53.2
                                C6.9,115.6,25.2,125.2,43.2,126.9z"></path>
                            </svg>
                </div>
                <div class="u-palette-4-base u-shape u-shape-circle u-shape-2" data-animation-name="slideIn"
                     data-animation- duration="1000" data-animation-direction="Left"></div>
            </div>
        </div>
    </div>
</section>
<!-- End Background SVG Shapes -->

<!--==========================================================================================-->

<!-- Start Block 1 -->
<div class="row" style="margin-top: -18vw;">
    <!-- Start Slidshow -->
    <div class="slideshow-container" dir="ltr">
        <!-- Start Slide 1 -->
        <div class="mySlides w3-animate-top">
            <div class="col-6">
                <img src="template/assets/images/slide-1.svg">
            </div>
            <div class="col-6">
                <div class="titleText">منصة إرشاد للإرشاد الأكاديمي</div>
                <div class="text">مخصصة للارشاد الاكاديمي بجامعة ام القرى</div>
            </div>
        </div>
        <!-- End Slide 1 -->
        <!-- Start Slide 2 -->
        <div class="mySlides w3-animate-top">
            <div class="col-6">
                <img src="template/assets/images/slide-2.svg">
            </div>
            <div class="col-6">
                <div class="titleText">تنظيم اللقاءات الارشادية عبر إرشاد</div>
                <div class="text">سهولة ترتيب اللقاءات عبر خدمات إرشاد المختلفة</div>
            </div>
        </div>
        <!-- End Slide 2 -->
        <!-- Start Slide 3 -->
        <div class="mySlides w3-animate-top">
            <div class="col-6">
                <img src="template/assets/images/slide-3.svg">
            </div>
            <div class="col-6">
                <div class="titleText">المتابعة المتكاملة للعملية الارشادية</div>
                <div class="text">بدءا من الطالب وصولا الى لجنة الارشاد الاكاديمي</div>
            </div>
        </div>
        <!-- End Slide 3 -->
    </div>
    <!-- End Slidshow -->
    <!-- Start Sign Button -->
    <div style="margin-top: -9vw; margin-right: 12vw; z-index: 3;">
        <a class="signBtn" onclick="popUpSignUp()">تسجيل جديد</a>
        <a class="signBtn" onclick="popUpSignIn()">تسجيل دخول</a>
    </div>
    <!-- End Sign Button -->
    <br>
    <div class="dots" style="text-align:center">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>
    <div class="row" style="height: 2.2vw;">
    </div>
</div>
<!-- End Block 1-->
<!--==========================================================================================-->

<!-- Start Sign Up Pop Up -->
<div class="signUp-popup" id="signUpPopUp">
    <form class="signUp-container" style="height: auto; max-width: 120%" method="POST"
          action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="hidden" name="register" value="1"> <!--If the type of registrar is a student-->
        <h3>تسجيل مستخدم جديد</h3>
        <!-- Start Row 1 -->
        <div class="row">
            <!-- Start Column 1 -->
            <div class="col-6">
                <label for="email"><b>البريد الالكتروني</b></label>
                <input id="email" type="email" placeholder="ادخل البريد الالكتروني" name="email" required>
                <span class="text-danger"> <?php if (isset($messageEmailVail)) echo $messageEmailVail ?>
                        </span>

                <label for="name"><b>الاسم الثلاثي</b></label>
                <input id="name" type="text" placeholder="ادخل اسمك الثلاثي" name="name" required>

                <label for="userType"><b>نوع المستخدم</b></label>
                <select class="signUp-select" name="userType">
                    <option value="student">طالب</option>
                    <option value="adviser">مرشد أكاديمي</option>
                    <option value="committee">عضو بلجنة الإرشاد الأكاديمي</option>
                </select>

                <label for="college"><b>الكلية</b></label>
                <input id="college" type="text" placeholder="ادخل اسم كليتك" name="college" required>

            </div>
            <!-- End Column 1 -->
            <!-- Start Column 2 -->
            <div class="col-6">
                <label for="password"><b>كلمة المرور</b></label>
                <input id="password" type="password" placeholder="ادخل كلمة المرور" name="password" required>

                <label for="name"><b>الرقم الوظيفي/ الرقم الجامعي</b></label>
                <input id="name" type="text" placeholder="ادخل الرقم الوظيفي او الرقم الجامعي" name="studentid"
                       required>

                <label for="gender"><b>الجنس</b></label>
                <select class="signUp-select" name="gender">
                    <option value="male">ذكر</option>
                    <option value="female">أنثى</option>
                </select>

                <label for="major"><b>التخصص</b></label>
                <input id="major" type="text" placeholder="ادخل اسم تخصصك" name="major" required>
            </div>
            <!-- End Column 1 -->
        </div>
        <!-- End Row 1 -->
        <!-- Start Row 2 -->
        <div class="row" style="margin-top: 1vw;">
            <div class="col-lg-8 mb-lg-0 mb-4"></div>
            <div class="col-lg-2 mb-lg-0 mb-4">
                <button type="submit" class="btn">تسجيل</button>
            </div>
            <div class="col-lg-2 mb-lg-0 mb-4">
                <button type="button" class="btn cancel" onclick="closeSignUp()">إلغاء</button>
            </div>
        </div>
        <!-- End Row 2 -->
    </form>
</div>
<!-- End Sign Up Pop Up -->

<!--==========================================================================================-->


<!-- Start Sign In Pop Up -->
<div class="signIn-popup" id="signInPopUp">
    <form class="signIn-container" method="POST" action="student/login_logic.php">
        <h3>تسجل الدخول</h3>
        <label for="email"><b>البريد الالكتروني</b></label>
        <input id="email" type="email" placeholder="ادخل البريد الالكتروني" name="email" required>

        <label for="password"><b>كلمة المرور</b></label>
        <input id="password" type="password" placeholder="ادخل كلمة المرور" name="password" required>

        <select class="signUp-select" name="login_user_type">
            <option value="student">طالب</option>
            <option value="adviser">مرشد أكاديمي</option>
            <option value="committee">عضو بلجنة الإرشاد الأكاديمي</option>
        </select>
        <div class="row">
            <div class="col-lg-6 mb-lg-0 mb-4">
                <button type="submit" class="btn">دخول</button>
            </div>
            <div class="col-lg-6 mb-lg-0 mb-4">
                <button type="button" class="btn cancel" onclick="closeSignIn()">إلغاء</button>
            </div>
        </div>
    </form>
</div>
<!-- End Sign In Pop Up -->
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

<!-- JS Link -->
<script src="template/assets/js/Welcome_Page_JS.js"></script>
</body>
<!-- End Body -->
</html>

