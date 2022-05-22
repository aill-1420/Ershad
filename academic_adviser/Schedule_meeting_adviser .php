<?php
include "../confi/app.php";
session_start();
ob_start();
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $date = $_POST['date'];
    $duration = $_POST['duration'];
    $place = $_POST['place'];
    $id = $_SESSION['userid'];
    $query = "INSERT INTO `meeting` (`date_time`, `duration`, `place`, `acadmic_advising_id`) 
                VALUES ('$date', '$duration', '$place', '$id')";
    $stmt = $mysql->query($query);
    $SUCCESS = TRUE;
}

$userid = $_SESSION['userid'];
$query = "SELECT * FROM meeting WHERE acadmic_advising_id =" . $userid;
$data = $mysql->query($query)->fetch_all(MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>لقاءات الطلاب</title>
        <link rel="icon" href="../template/assets/images/ErshadLogo.svg" type="image/gif" sizes="16x16"> <!-- favicon.-->

        <!-- Nucleo Icons -->
        <link href="../template/assets/css/nucleo-icons.css" rel="stylesheet"/>
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <!-- CSS Files -->

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link id="pagestyle" href="../template/assets/css/Dashboard_Style.css" rel="stylesheet"/>
        <link id="pagestyle" href="../template/assets/css/Library_Style.css" rel="stylesheet"/>

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
                box-shadow: 1px 1px 3px #E5E5EB;
                background-color: #E7F3F5;
                border-radius: 15px 15px 0px 0px;
                width: 100%;
                z-index: 3;
                margin: 1vw 0vw;
            }

            /* Style the buttons that are used to open the tab content */
            .tab button {
                background-color: inherit;
                float: right;
                border: none;
                outline: none;
                cursor: pointer;
                padding: 14px 16px;
                transition: 0.3s;
            }

            /* Change background color of buttons on hover */
            .tab button:hover {
                background-color: #97CADB;
                color: #fff;
            }

            /* Create an active/current tablink class */
            .tab button.active {
                background-color: #97CADB;
                color: #fff;
            }

            /* Style the tab content */
            .tabcontent {
                display: none;
                padding: 6px 12px;
                border-radius: 15px;

            }


            /*            تنسيق زر انشاء موعد جديد*/
            .btn:hover {
                background-color: RoyalBlue;
            }

            /* The popup form - hidden by default */
            #scheduleMeetingPopUp {
                display: none;
            }

            .scheduleMeeting-popup {
                display: none;
                position: fixed;
                top: 0vw;
                border-radius: 15px;
                box-shadow: 2px 2px 6px #AEADBF;
                z-index: 20;
                background-color: rgb(91, 90, 114, 0.7);
                height: 100%;
                width: 100%;
                direction: rtl;
                overflow: inherit;
            }

            /* Add styles to the form container */
            .scheduleMeeting-container {
                max-width: 30vw;
                height: 70%;
                padding: 2vw;;
                background-color: white;
                border-radius: 15px;
                margin: 6vw 25vw;
            }

            .scheduleMeeting-container label {
                color: #02457A;
                font-size: 18px;
            }

            /* Full-width input fields */
            .scheduleMeeting-container input[type=text], .scheduleMeeting-container input[type=datetime-local], .scheduleMeeting-container input[type=time] {
                width: 100%;
                padding: 0.5vw;
                margin: 5px 0 22px 0;
                border: none;
                background: #f1f1f1;
                border-radius: 15px;
            }

            /* When the inputs get focus, do something */
            .scheduleMeeting-container input[type=text]:focus, .scheduleMeeting-container input[type=datetime-local]:focus, .scheduleMeeting-container input[type=time]:focus {
                background-color: #ddd;
                outline: none;
            }

            /* Set a style for the submit/login button */
            .scheduleMeeting-container .btn {
                background-color: #02457A;
                color: white;
                border: none;
                cursor: pointer;
                width: 100%;
                opacity: 0.8;
                text-align-last: center;
            }


            /* Add a red background color to the cancel button */
            .scheduleMeeting-container .cancel {
                background-color: #97CADB;
                text-align-last: center;
            }

            /* Add some hover effects to buttons */
            .scheduleMeeting-container .btn:hover, .open-button:hover {
                opacity: 1;
            }


            /* --- list style  --- */

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

            #list tr:nth-child(even) {
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

            .tableBtn {
                background-color: #97CADB;
                color: #fff;
                border-radius: 15px;
                border: none;
                padding: 0.2vw 2vw 0.1vw;
                font-size: 20px;
            }

            .tableBtn:hover {
                opacity: 0.4;
            }
        </style>
    </head>
             
    <!--==========================================================================================-->
    
    <!-- Start Body -->
    <body class="g-sidenav-show rtl  bg-gray-100" style="font-family: 'Tajawal', sans-serif; text-align-last: right;">
        <!-- Top Background Color-->
        <div class="min-height-300 bg-primary position-absolute w-100"></div>
        <!-- Start Right List-->
        <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-end me-4 rotate-caret"
               id="sidenav-main">
            <!-- Start header list-->
            <div class="sidenav-header" style="text-align-last: right;">
                <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute start-0 top-0 d-none d-xl-none"
                   aria-hidden="true" id="iconSidenav"></i>
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
                        <a class="nav-link " href="Schedule_meeting_adviser .php">
                            <div class="icon icon-shape icon-sm border-radius-md text-center ms-2 d-flex align-items-center justify-content-    center">
                                <i class="ni ni-calendar-grid-58 text-secondary text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text me-1">لقاءات الطلاب</span>
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
            <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
                 data-scroll="false">
                <div class="container-fluid py-1 px-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 ">
                        <li class="breadcrumb-item text-sm ps-2"><a class="opacity-5 text-white" href="dashboard_adviser.php">نظرة عامة</a></li>
                            <li class="breadcrumb-item text-sm text-white active" aria-current="page">لقاءات الطلاب</li>
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
                                <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton"
                                   data-bs-toggle="dropdown" aria- expanded="false">
                                    <i class="fa fa-bell cursor-pointer"></i>
                                </a>
                                <ul class="dropdown-menu  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                                    <li class="mb-2">
                                        <a class="dropdown-item border-radius-md" href="javascript:;">
                                            <div class="d-flex py-1">
                                                <div class="my-auto">
                                                    <img src="../template/assets/img/team-2.jpg"
                                                         class="avatar avatar-sm  ms-3 ">
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
                                                    <img src="../template/assets/images/logo-spotify.svg"
                                                         class="avatar avatar-sm bg-gradient-dark   ms-3 ">
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
                                                    <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1"
                                                         xmlns="http://www.w3.org/2000/svg"
                                                         xmlns:xlink="http://www.w3.org/1999/xlink">
                                                        <title>credit-card</title>
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF"
                                                               fill- rule="nonzero">
                                                                <g transform="translate(1716.000000, 291.000000)">
                                                                    <g transform="translate(453.000000, 454.000000)">
                                                                        <path class="color-background"
                                                                              d="M43,10.7482083 L43,3.58333333         C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0    0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
                                                                              opacity="0.593633743"></path>
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
            <div class="container-fluid py-4">
                <!--Start forth row -->
                <div class="row my-3">
                    <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
                        <div class="card" style="height: 35vw; display: block;">
                            <?php
                            if (isset($SUCCESS) && $SUCCESS == TRUE) { ?>
                            <div class="alert alert-success" role="alert">
                                    تم انشاء الموعد بنجاح
                            </div>
                            <?php }
                            $SUCCESS = FALSE; ?>
                            <div class="card-header pb-0">
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <h3>لقاءات الطلاب</h3>
                                    </div>
                                    <div class="col-lg-6 mb-lg-0 mb-3">
                                        <div class="d-flex flex-column h-100">
                                            <a class="btn"
                                               style="background-color: #018ABE; border: none; color: white; padding: 1vw 2vw;  font-size: 16px; cursor: pointer; text-align-last: center;margin: -0.5vw; width: 50%; margin-right: 45%"
                                               onclick="popUpscheduleMeeting()"><i class="fa fa-home"></i> إنشاء لقاء جديد</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-6 mb-md-0 mb-2">
                                    <div class="card" style="padding: 0vw; height: 28vw; overflow-y: scroll;">
                                        <table id="list">
                                            <tr>
                                                <th>رقم اللقاء</th>
                                                <th>التاريخ</th>
                                                <th>الوقت</th>
                                                <th>مدة اللقاء</th>
                                                <th>مكان اللقاء</th>
                                            </tr>
                                            <?php foreach ($data as $m) { $time = new DateTime($m['date_time']); ?>
                                                <tr>
                                                    <td><?php echo $m['id'] ?></td>
                                                    <td><?php echo $time->format('d-m-Y'); ?></td>
                                                    <td><?php echo $time->format('h:i:s A'); ?></td>
                                                    <td><?php echo $m['duration'] ?></td>
                                                    <td><?php echo $m['place'] ?></td>
                                                </tr>
                                            <?php } ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End forth row-->

                <!--==========================================================================================-->

                <!-- Start schedule meeting pop up -->
                <div class="scheduleMeeting-popup" id="scheduleMeetingPopUp">
                    <form class="scheduleMeeting-container" method="POST"
                          <?php echo $_SERVER["PHP_SELF"] ?>>
                        <h3>إنشاء لقاء جديد</h3>
                        <label for="date"><b>تاريخ ووقت اللقاء</b></label>
                        <br>
                        <input id="date" type="datetime-local"  name="date" required>
                        <br>
                        <label for="duration"><b>مدة اللقاء</b></label>
                        <input id="duration" type="text" placeholder="30 دقيقة" name="duration" required>
                        <label for="place"><b>مكان اللقاء</b></label>
                        <input id="place" type="text" placeholder="مقر الجامعة - قسم نظم المعلومات" name="place" required>
                        <div class="row">
                            <div class="col-lg-6 mb-lg-0 mt-5">
                                <button type="submit" class="btn">إرسال</button>
                            </div>
                            <div class="col-lg-6 mb-lg-0 mt-5">
                                <button type="button" class="btn cancel" onclick="closeScheduleMeeting()">إلغاء</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- End schedule meeting pop up -->

                <!--==========================================================================================-->

                <!-- Start Footer -->
                <footer class="footer pt-3">
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
                              
        <!--==========================================================================================-->

        <!-- Internal Java Script -->
        <script>
            function openCity(evt, cityName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(cityName).style.display = "block";
                evt.currentTarget.className += " active";
            }

            // Get the element with id="defaultOpen" and click on it
            document.getElementById("defaultOpen").click();

            /* scheduleMeeting
        ================================================== */
            function popUpscheduleMeeting() {
                document.getElementById("scheduleMeetingPopUp").style.display = "block";
            }

            function closeScheduleMeeting() {
                document.getElementById("scheduleMeetingPopUp").style.display = "none";
            }
        </script>
    </body>
    <!-- End Body -->
</html>