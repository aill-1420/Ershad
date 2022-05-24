<?php
ob_start();
session_start();
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include '../confi/app.php';

$user = $_SESSION['userid'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userid = $_SESSION['userid'];
    $date_birthday = $_POST['date_birthday'];
    $nationality = $_POST['nationality'];
    $address = $_POST['address'];
    $psychiatric_disorders__syndromes = $_POST['psychiatric_disorders__syndromes'];
    $incurable_diseases = $_POST['incurable_diseases'];
    $chronic_diseases = $_POST['chronic_diseases'];
    $special_care = $_POST['special_care'];
    $father_alive = $_POST['father_alive'];
    $mother_alive = $_POST['mother_alive'];
    $number_brother_sister = $_POST['number_brother_sister'];
    $order_student_on_family = $_POST['order_student_on_family'];
    $Parents_status = $_POST['Parents_status'];
    $Father_educational_level = $_POST['Father_educational_level'];
    $Mother_educational_level = $_POST['Mother_educational_level'];
    $father_southern_border = $_POST['father_southern_border'];
    $injured_the_southern_border = $_POST['injured_the_southern_border'];
    $southern_border = $_POST['southern_border'];
    $father_profession = $_POST['father_profession'];
    $mother_job = $_POST['mother_job'];
    $family_income = $_POST['family_income'];
    $type_home = $_POST['type_home'];
    $house_ownership = $_POST['house_ownership'];

    // INSERT INTO `advising_file` (`student_id`, `date_birth`, `nationality`, `address`, `psychiatric_disorders__syndromes`, `incurable_diseases`, `chronic_diseases`, `special_care`, `father_alive`, `mother_alive`, `number_brother_sister`, `order_student_on_family`, `Parents_status`, `Father_educational_level`, `Mother_educational_level`, `father_southern_border`, `injured_the_southern_border`, `southern_border`, `father_profession`, `mother_job`, `family_income`, `type_home`, `house_ownership`)
    // VALUES ('1', 'asdfas', 'fasdf', 's', 'f', 'sadf', 'asdf', 'asdf', 'asdf', 'sdfs', 'sdfa', 'dfsdf', 'asdf', 's', 'f', 'as', 'as', 'sdfas', 'asdf', 'asdfsdf', 'a', 's', 'asdfasdf');
    $query = "INSERT INTO `advising_file` (`student_id`, `date_birth`, `nationality`, `address`, `psychiatric_disorders__syndromes`, `incurable_diseases`, `chronic_diseases`, `special_care` , `father_alive` , `mother_alive` , `number_brother_sister`, `order_student_on_family`, `Parents_status`, `Father_educational_level`, `Mother_educational_level`, `father_southern_border` , `injured_the_southern_border` , `southern_border` , `father_profession` , `mother_job` , `family_income` , `type_home` , `house_ownership`) 
                    VALUES ('$userid', '$date_birthday', '$nationality', '$address', '$psychiatric_disorders__syndromes', '$incurable_diseases', '$chronic_diseases', '$special_care' , '$father_alive', '$mother_alive' , '$number_brother_sister', '$order_student_on_family' , '$Parents_status', '$Father_educational_level' , '$Mother_educational_level', '$father_southern_border' ,'$injured_the_southern_border', '$southern_border' , '$father_profession', '$mother_job' , '$family_income' , '$type_home' , '$house_ownership')";
    $mysql->query($query);

    redirect('view_advising_file.php');
    die();
}
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
?>
<!DOCTYPE html>
<html len="ar">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>الملف الإرشادي</title>
        <link rel="icon" href="../template/assets/images/ErshadLogo.svg" type="image/gif" sizes="16x16"> <!-- favicon.-->
        
        <!-- link css -->
        <link id="pagestyle" href="../template/assets/css/Library_Style.css" rel="stylesheet"/>
        <link id="pagestyle" href="../template/assets/css/Student_Style.css" rel="stylesheet"/>
        <link id="pagestyle" href="../template/assets/css/nucleo-icons.css" rel="stylesheet"/>
        
        <!-- link Java Script -->
        <script class="u-script" type="text/javascript" src="../template/assets/js/Student_JS.js" defer=""></script>
        <script src="../template/assets/js/jquery.min.js"></script>
        <script src="../template/assets/js/main.js"></script>
        
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        
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
                padding: 0.5vw 1vw;
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
            .tabTitle {
                color: #02457A;
                padding: 1vw 0.5vw 0vw 0.5vw;
                font-size: 20px;
                float: right;
                width: 100%;
                text-align: center;
            }
            /*Information Group Style*/
            .group-title {
                position: relative;
                top: 0.5rem;
                right: 1.25rem;
                z-index: 3;
                font-weight: 600;
                font-size: 16px;
                text-align: right;
                color: #97CADB;
                background-color: #fff;
                padding-right: 0.75vw !important;
                padding-left: 1vw !important;
                cursor: default;
                box-sizing: border-box;
                font-family: 'Tajawal', sans-serif;
                margin: 0px;
            }
            .group-content {
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
                overflow-x: auto;
            }
            .infromation-group {
                margin: 0vw;
                padding-top: 0vw;
            }
            .card {
                margin: 1vw;
                margin-top: 0vw;
            }
            .infromation-groupForm {
                margin: 0vw;
                padding-top: 0vw;
                display: block;
            }
            .infromation-groupForm .group-title {
                position: relative;
                top: 0.5rem;
                right: 1.25rem;
                z-index: 3;
                font-weight: 600;
                font-size: 16px;
                text-align: right;
                color: #97CADB;
                background-color: #fff;
                padding-right: 0.75vw !important;
                padding-left: 1vw !important;
                cursor: default;
                box-sizing: border-box;
                font-family: 'Tajawal', sans-serif;
                margin: 0px;
            }
            .infromation-groupForm .group-content {
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
            .infoCheckLabel {
                color: #001B48;
                font-weight: 400;
                font-size: 14px;
            }
            .control-label {
                color: #001B48;
                font-weight: 500;
                font-size: 16px;
                margin: 0.5vw 0vw 0vw 0vw;
            }
            .card-header {
                position: fixed;
                z-index: 5;
                width: 90%;
                top: 5vw;
                padding-top: 1vw;
            }
            ::placeholder {
                color: #d6dbe3;
                opacity: 1; 
            }
        </style>
        <!-- End CSS Style -->
        
    </head>
    
    <!--==========================================================================================-->
    
    <!-- Start Body -->
    <body class="u-body" style="font-family: 'Tajawal', sans-serif;" dir="rtl">
        
        <!-- Start Header-->
        <header class="u-clearfix u-header u-sticky u-sticky-5894 u-header" id="sec-92d8" style="direction: rtl;background-color: white; box-shadow: 1px 1px 6px #AEADBF; height: 5vw; padding-right: 2vw;">
            <!-- Start Logo -->
            <a href="#" class="u-image u-logo u-image-1" data-image-width="709" data-image-height="512">
                <img src="../template/assets/images/ErshadLogo.svg" class="u-logo-image u-logo-image-1" style="margin-right: 0.5vw; margin-top: -0.5vw;">
            </a>
            <!-- End Logo -->
            <!-- Start Navigation Bar -->
            <div class="u-clearfix u-sheet u-sheet-1" style="top: -2.5vw; z-index: 30; left: 3vw;">
                <div class="headerNavbar" style="margin-top: 0.2vw; margin-right: -9vw; width: 80%;">
                    <ul>
                        <li><a href="studentHome.php">الرئيسية</a></li>
                        <li><a href="metting.php">حجز موعد لقاء</a></li>
                        <!--  check if advsing file exists-->
                        <?php if($file == true) { ?>
                        <li><a class="activeNav" href="view_advising_file.php">الملف الإرشادي</a></li>
                        <?php } else { ?>
                        <li><a class="activeNav" href="create_advising_file.php">الملف الإرشادي</a></li>
                        <?php } ?>
                        <li><a href="listComplaint.php">الشكاوى المرسلة</a></li>
                    </ul>
                </div>
            </div>
            <!-- End Navigation Bar -->
            <!-- Start navigation -->
            <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false" style="top: -8.8vw; z-index: 20;">
                <!-- Start navigation list -->
                <ul class="navbar-nav me-auto ms-2 justify-content-end" style="margin-top: -0.3vw;">
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
                        <ul class="dropdown-menu px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                            <li class="mb-2">
                                <a class="dropdown-item border-radius-md" href="javascript:;">
                                    <div class="d-flex py-1">
                                        <div class="my-auto">
                                            <img src="../assets/images/team-2.jpg" class="avatar avatar-sm  ms-3 ">
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
                                            <img src="../assets/images/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark  ms-  3 ">
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
                                            <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
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
                    <li class="nav-item px-0 d-flex align-items-center icon-lg">
                        <a href="logout.php" class="nav-link text-success font-weight-bold px-2">
                            <i class="icm icon-power-off me-sm-1"></i>
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

        <!--Start content -->
        <div class="container-fluid py-4" style="padding: 0vw 7vw; z-index: 50;">
            <!-- Start Advising File Form -->
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                <div class="col-lg-12">
                    <div class="card-header pb-0">
                        <div class="row mb-2">
                            <div class="col-6">
                                <h3 style="color: #001B48;">الملف الارشادي</h3>
                            </div>
                            <div class="col-4"></div>
                            <div class="col-2">
                                <div class="tabBtn" id="edit">
                                    <a onclick="openForm()">
                                        <button class="tablinks"><i class="icm icon-check" style="font-size: 24px;"></i> حفظ</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3" style="margin-top: 3vw;">
                        <!-- Start first row -->
                        <div class="row">
                            <!-- Start Card 1 Form -->
                            <div class="card p-0" id="cardForm">
                                <div class="tab">
                                    <div class="row">
                                        <h5 class="tabTitle">المعلومات الشخصية</h5>
                                    </div>
                                </div>
                                <!-- Start Personal Information Card Form -->
                                <div class="card-body p-3">
                                    <div class="informationForm">
                                        <!-- Start row 1 -->
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="infromation-groupForm">
                                                    <label class="group-title">اسم الطالب</label>
                                                    <input class="group-content" id="studentName" placeholder="سحر عبدالله الزهراني">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="infromation-groupForm">
                                                    <label class="group-title">تاريخ الميلاد</label>
                                                    <input class="group-content" type="date" name="date_birthday" id="studentDateOfBirth" placeholder="1/24/2000">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="infromation-groupForm">
                                                    <label class="group-title">الجنسية</label>
                                                    <input type="text" class="group-content" name="nationality" placeholder="سعودي">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="infromation-groupForm">
                                                    <label class="group-title">العنوان</label>
                                                    <input class="group-content" name="address" id="studentAddress" placeholder="بطحاء قريش-مكة الكرمة">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End row 1 -->
                                    </div>
                                </div>
                                <!-- End Personal Information Card Form -->
                            </div>
                            <!-- End Card 1 Form -->
                        </div>
                        <!-- End first row -->
                        <!-- ----------------------------------------------------------------------- -->
                        <!-- Start Second row -->
                        <div class="row">
                            <!-- Start Card 2 Form -->
                            <div class="card p-0" id="cardForm1">
                                <div class="tab">
                                    <div class="row">
                                        <h5 class="tabTitle">المعلومات الصحية</h5>
                                    </div>
                                </div>
                                <!-- Start Health Information Card Form -->
                                <div class="card-body p-3">
                                    <div class="informationForm">
                                        <!-- Start row 1 -->
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="infromation-groupForm">
                                                    <label class="group-title">الاضطرابات النفسية</label>
                                                    <input class="group-content" name="psychiatric_disorders__syndromes" id="psychiatricSyndromes" placeholder="اكتئاب، نقص الانتباه، صعوبات التعلم">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="infromation-groupForm">
                                                    <label class="group-title">الأمراض المستعصية</label>
                                                    <input class="group-content" name="incurable_diseases" id="incurableDiseases" placeholder="أورام سرطانية، نقص المناعة">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="infromation-groupForm">
                                                    <label class="group-title">الأمراض المزمنة</label>
                                                    <input class="group-content" name="chronic_diseases" id="chronicDiseases"  placeholder="السكري، ضغط الدم،">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="infromation-groupForm">
                                                    <label class="group-title">هل تحتاج رعاية خاصة</label>
                                                    <input class="group-content" name="special_care" id="specialCare" placeholder="لا">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End row 1 -->
                                    </div>
                                </div>
                                <!-- End Health Information Card Form -->
                            </div>
                            <!-- End Card 2 Form -->
                        </div>
                        <!-- End Second row -->
                        <!-- ----------------------------------------------------------------------- -->
                        <!-- Start Third row -->
                        <div class="row">
                            <!-- Start Card 3 Form -->
                            <div class="card p-0" id="cardForm2">
                                <div class="tab">
                                    <div class="row">
                                        <h5 class="tabTitle">المعلومات الاجتماعية</h5>
                                    </div>
                                </div>
                                <!-- Start Social Information Card Form -->
                                <div class="card-body p-3">
                                    <div class="informationForm">
                                        <!-- Start row 1 -->
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="infromation-groupForm">
                                                    <label class="group-title">هل الأب على قيد الحياة؟</label>
                                                    <input class="group-content" name="father_alive" id="Father" placeholder="نعم">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="infromation-groupForm">
                                                    <label class="group-title">هل الأم على قيد الحياة؟</label>
                                                    <input class="group-content" name="mother_alive" id="Mother" placeholder="نعم">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="infromation-groupForm">
                                                    <label class="group-title">عدد الاخوة والأخوات</label>
                                                    <input class="group-content" type="number" name="number_brother_sister" id="numberOfBrothers" placeholder="6">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="infromation-groupForm">
                                                    <label class="group-title">ترتيب الطالب بين اخوته</label>
                                                    <input class="group-content" type="number" name="order_student_on_family" id="studentRank" placeholder="2">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End row 1 -->
                                        <!-- Start row 2 -->
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="infromation-groupForm">
                                                    <label class="group-title">الوضع الاجتماعي للوالدين</label>
                                                    <input class="group-content" id="ParentsSocialStatus" name="Parents_status" placeholder="مستقران">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="infromation-groupForm">
                                                    <label class="group-title">المستوى التعليمي للأب</label>
                                                    <input class="group-content" id="educationalLevelOfFather" name="Father_educational_level" placeholder="بكالوريوس">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="infromation-groupForm">
                                                    <label class="group-title">المستوى التعليمي للأم</label>
                                                    <input class="group-content" id="educationalLevelOfMother" name="Mother_educational_level" placeholder="بكالوريوس">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End row 2 -->
                                        <!-- Start row 3 -->
                                        <div class="row">
                                            <p style="margin-top: 1vw; color: red;">في حال عمل الأب في السلك العسكري، اجب عن التالي</p>
                                            <div class="col-3">
                                                <div class="infromation-groupForm">
                                                    <label class="group-title">هل الأب مرابط في الحد الجنوبي؟</label>
                                                    <input class="group-content" id="fight" name="father_southern_border"
                                                           placeholder="لا">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="infromation-groupForm">
                                                    <label class="group-title">هل أصيب الأب في الحد الجنوبي؟</label>
                                                    <input class="group-content" id="injured" name="injured_the_southern_border" placeholder="لا">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End row 3 -->
                                        <!-- Start row 4 -->
                                        <div class="row">
                                            <p style="margin-top: 1vw; color: red;">في حال كون الأب ليس على قيد الحياة، اجب عن التالي</p>
                                            <div class="col-3">
                                                <div class="infromation-groupForm">
                                                    <label class="group-title">هل هو شهيد في الحد الجنوبي؟</label>
                                                    <input class="group-content" id="martyr" name="southern_border" placeholder="لا">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End row 4 -->
                                    </div>
                                </div>
                                <!-- End Social Information Card Form -->
                            </div>
                            <!-- End Card 3 Form -->
                        </div>
                        <!-- End Third row -->
                        <!------------------------------------------------------------------------- -->
                        <!-- Start Forth row -->
                        <div class="row">
                            <!-- Start Card 4 Form -->
                            <div class="card p-0" id="cardForm3">
                                <div class="tab">
                                    <div class="row">
                                        <h5 class="tabTitle">المعلومات الاقتصادية</h5>
                                    </div>
                                </div>
                                <!-- Start Economic Information Card Form -->
                                <div class="card-body p-3">
                                    <div class="informationForm">
                                        <!-- Start row 1 -->
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="infromation-groupForm">
                                                    <label class="group-title">مهنة الأب</label>
                                                    <input class="group-content" id="fatherProfession" name="father_profession" placeholder="مهندس">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="infromation-groupForm">
                                                    <label class="group-title">مهنة الأم</label>
                                                    <input class="group-content" id="MotherProfession" name="mother_job" placeholder="معلمة">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="infromation-groupForm">
                                                    <label class="group-title">دخل الأسرة</label>
                                                    <input class="group-content" id="familyIncome" name="family_income" placeholder="10,000">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End row 1 -->
                                        <!-- Start row 2 -->
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="infromation-groupForm">
                                                    <label class="group-title">نوع السكن</label>
                                                    <input class="group-content" id="homeType" name="type_home" placeholder="شقة">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="infromation-groupForm">
                                                    <label class="group-title">ملكية السكن</label>
                                                    <input class="group-content" id="homeOwnership" name="house_ownership" placeholder="إيجار">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End row 2 -->
                                    </div>
                                </div>
                                <!-- End Economic Information Card Form -->
                            </div>
                            <!-- End Card 4 Form -->
                        </div>
                        <!-- End Forth row -->
                    </div>
                </div>
            </form>
            <!-- End Advising File Form -->
        </div>
        <!-- End content -->  
             
        <!--==========================================================================================-->                        

        <!-- Start Footer-->
        <section class="u-backlink u-clearfix u-grey-80" dir="rtl">
            <p class="u-text">
                <span>جميع الحقوق محفوظة لدى فريق </span>
            </p>
            <a class="u-link" href=""><span>إرشاد</span></a>.
        </section>
        <!-- End Footer-->
        
        <!--==========================================================================================-->
        
        <!-- Internal Java Script -->
        <script>
            'use strict';
            var $window = $(window);
            function run() {
                var fName = arguments[0],
                    aArgs = Array.prototype.slice.call(arguments, 1);
                try {
                    fName.apply(window, aArgs);
                } catch (err) {    
                }
            };
            /* header
            ================================================== */
            $(window).scroll(function () {
                var scroll = $(window).scrollTop();
                if (scroll > 0) {
                    $("#sec-92d8").addClass("active");
                } else {
                    $("#sec-92d8").removeClass("active");
                }
            });
            
        </script>
    </body>
    <!-- End Body -->
</html>