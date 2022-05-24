<?php
include '../confi/app.php';
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>نظرة عامة</title>
        <link rel="icon" href="../template/assets/images/ErshadLogo.svg" type="image/gif" sizes="16x16"> <!-- favicon.-->
        
        <!-- Nucleo Icons -->
        <link href="../template/assets/css/nucleo-icons.css" rel="stylesheet" />
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <!-- CSS Files -->
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link id="pagestyle" href="../template/assets/css/Dashboard_Style.css" rel="stylesheet" />
        <link id="pagestyle" href="../template/assets/css/Library_Style.css" rel="stylesheet" />
        <link id="pagestyle" rel="stylesheet" href="../template/assets/css/mobiscroll.min.css">
        
        
        <!-- link Java Script -->
        <script src='../template/assets/js/argon-dashboard.js' type="text/javascript"></script>
        <script src='../template/assets/js/Dashboard.js' type="text/javascript"></script>
        <script src="../template/assets/js/main.js"></script>
        <script src="../template/assets/js/mobiscroll.javascript.min.js"></script>
        <script>
            // Ignore this in your implementation
            window.isMbscDemo = true;
        </script>
        
        <!-- font link -->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
        
        <!-- Start CSS Style -->
        <style>
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
                        <a class="nav-link active" href="dshboard_committee.php">
                            <div class="icon icon-shape icon-sm border-radius-md text-center ms-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
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
                        <a class="nav-link" href="assign_student_ToAdviser.php">
                            <div class="icon icon-shape icon-sm border-radius-md text-center ms-2 d-flex align-items-center justify-content-    center">
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
                            <li class="breadcrumb-item text-sm text-white active" aria-current="page">نظرة عامة</li>
                        </ol>
                        <!-- <h6 class="font-weight-bolder text-white mb-0">RTL</h6>-->
                    </nav>
                    <div class="collapse navbar-collapse mt-sm-0 mt-2 px-0" id="navbar"  style="height: 4vw;">
                        <!-- Start navigation list -->
                        <ul class="navbar-nav me-auto ms-0 justify-content-end">
                            <li class="nav-item px-3 d-flex align-items-center">
                                <a href="edit_profile_committee.php" class="nav-link text-white p-0">
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
                                                    <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1"       xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
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
            <div class="container-fluid py-2">
                <!-- Start Second row -->
                <div class="row mt-4">
                    <!-- Start block 1 -->
                    <div class="col-lg-6 mb-lg-0 mb-4">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-lg-4 me-auto ms-0 text-center">
                                        <div class="bg-gradient-primary border-radius-lg max-height-200 max-width-200">
                                            <img src="../template/assets/images/waves-white.svg" class="max-width-300 position-absolute h-100 top-0 d-md-block d-none" alt="waves">
                                            <div class="position-relative pt-5 pb-4 pe-4 min-width-100">
                                                <img class="max-width-100 w-100 position-relative z-index-2" src="../template/assets/images/person.svg">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 mb-lg-0 mb-4">
                                        <div class="d-flex flex-column h-100" style="padding: 1.5vw;">
                                            <h2 class="font-weight-bolder">
                                            <?php
                                            $query = "SELECT * FROM `acadmic_advising`";
                                            $number = $mysql->query($query)->fetch_all(MYSQLI_ASSOC);
                                            echo count($number);
                                            ?>
                                            </h2>
                                            <h4 class="mb-2">عدد المرشدين</h4>
                                            <a class="text-dark font-weight-bold ps-1 mb-0 icon-move-left mt-auto" href="adviser_list.php">
                                                المزيد
                                                <i class="icm icon-arrow-left text-sm ms-1" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End block 1 -->

                    <!-- Start block 2 -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-lg-4 me-auto ms-0 text-center">
                                        <div class="bg-gradient-primary border-radius-lg max-height-200 max-width-200">
                                            <img src="../template/assets/images/waves-white.svg" class="max-width-300 position-absolute h-100 top-0 d-md-block d-none" alt="waves">
                                            <div class="position-relative pt-5 pb-4 pe-4 min-width-100">
                                                <img class="max-width-100 w-100 position-relative z-index-2" src="../template/assets/images/meeting.svg">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 mb-lg-0 mb-4">
                                        <div class="d-flex flex-column h-100" style="padding: 1.5vw;">
                                            <h2 class="font-weight-bolder">
                                                <?php
                                                $query = "SELECT * FROM `students`";
                                                $number = $mysql->query($query)->fetch_all(MYSQLI_ASSOC);
                                                echo count($number);
                                                ?>
                                            </h2>
                                            <h4 class="mb-2">عدد الطلاب</h4>
                                            <a class="text-dark font-weight-bold ps-1 mb-0 icon-move-left mt-auto" href="students_List.php">
                                                المزيد
                                                <i class="icm icon-arrow-left text-sm ms-1" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End block 2 -->
                </div>
                <!-- End second row -->

                <!--Start forth row -->
                <div class="row my-4">
                    <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
                        <div class="card">
                            <div class="card-header pb-0">
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <h3>التقويم</h3>
                                    </div>
                                </div>
                            </div>

                            <!-- Start calendar -->

                            <div mbsc-page class="demo-create-read-update-delete-CRUD">
                                <div style="height:60%">
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
                <!--End forth row-->
                
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
        
        <!--==========================================================================================-->
        
        <!-- Internal Java Script -->
        <script>
            
            /*Calendar
            ========================================================*/
            
            mobiscroll.setOptions({
                locale: mobiscroll.localeAr,                                  // Specify language like: locale: mobiscroll.localePl or omit setting to use default
                theme: 'windows',                                             // Specify theme like: theme: 'ios' or omit setting to use default
                themeVariant: 'light'                                         // More info about themeVariant: https://docs.mobiscroll.com/5-16-1/javascript/eventcalendar#opt-themeVariant
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
                    headerText: 'New event',                                  // More info about headerText: https://docs.mobiscroll.com/5-16-1/javascript/eventcalendar#opt-headerText
                    buttons: ['cancel', {                                     // More info about buttons: https://docs.mobiscroll.com/5-16-1/javascript/eventcalendar#opt-buttons
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
                    headerText: 'Edit event',                                 // More info about headerText: https://docs.mobiscroll.com/5-16-1/javascript/eventcalendar#opt-headerText
                    buttons: ['cancel', {                                     // More info about buttons: https://docs.mobiscroll.com/5-16-1/javascript/eventcalendar#opt-buttons
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
                clickToCreate: 'double',                                      // More info about clickToCreate: https://docs.mobiscroll.com/5-16-1/javascript/eventcalendar#opt-clickToCreate
                dragToCreate: true,                                           // More info about dragToCreate: https://docs.mobiscroll.com/5-16-1/javascript/eventcalendar#opt-dragToCreate
                dragToMove: true,                                             // More info about dragToMove: https://docs.mobiscroll.com/5-16-1/javascript/eventcalendar#opt-dragToMove
                dragToResize: true,                                           // More info about dragToResize: https://docs.mobiscroll.com/5-16-1/javascript/eventcalendar#opt-dragToResize
                view: {                                                       // More info about view: https://docs.mobiscroll.com/5-16-1/javascript/eventcalendar#opt-view
                    calendar: { labels: true }
                },
                data: myData,                                                 // More info about data: https://docs.mobiscroll.com/5-16-1/javascript/eventcalendar#opt-data
                onEventClick: function (args) {                               // More info about onEventClick: https://docs.mobiscroll.com/5-16-1/javascript/eventcalendar#event-onEventClick
                    oldEvent = Object.assign({}, args.event);
                    tempEvent = args.event;

                    if (!popup.isVisible()) {
                        createEditPopup(args);
                    }
                },
                onEventCreated: function (args) {                             // More info about onEventCreated: https://docs.mobiscroll.com/5-16-1/javascript/eventcalendar#event-onEventCreated
                    popup.close();
                    // store temporary event
                    tempEvent = args.event;
                    createAddPopup(args.target);
                },
                onEventDeleted: function () {                                 // More info about onEventDeleted: https://docs.mobiscroll.com/5-16-1/javascript/eventcalendar#event-onEventDeleted
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
                display: 'bottom',                                            // Specify display mode like: display: 'bottom' or omit setting to use default
                contentPadding: false,
                fullScreen: true,
                onClose: function () {                                        // More info about onClose: https://docs.mobiscroll.com/5-16-1/javascript/eventcalendar#event-onClose
                    if (deleteEvent) {
                        calendar.removeEvent(tempEvent);
                    } else if (restoreEvent) {
                        calendar.updateEvent(oldEvent);
                    }
                },
                responsive: {                                                 // More info about responsive: https://docs.mobiscroll.com/5-16-1/javascript/eventcalendar#opt-responsive
                    medium: {
                        display: 'anchored',                                  // Specify display mode like: display: 'bottom' or omit setting to use default
                        width: 400,                                           // More info about width: https://docs.mobiscroll.com/5-16-1/javascript/eventcalendar#opt-width
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
                responsive: datePickerResponsive,                             // More info about responsive: https://docs.mobiscroll.com/5-16-1/javascript/eventcalendar#opt-responsive
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
                display: 'bottom',                                            // Specify display mode like: display: 'bottom' or omit setting to use default
                contentPadding: false,
                showArrow: false,
                showOverlay: false,
                buttons: [                                                    // More info about buttons: https://docs.mobiscroll.com/5-16-1/javascript/eventcalendar#opt-buttons
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
                responsive: {                                                 // More info about responsive: https://docs.mobiscroll.com/5-16-1/javascript/eventcalendar#opt-responsive
                    medium: {
                        display: 'anchored',                                  // Specify display mode like: display: 'bottom' or omit setting to use default
                        anchor: document.getElementById('event-color-cont'),  // More info about anchor: https://docs.mobiscroll.com/5-16-1/javascript/eventcalendar#opt-anchor
                        buttons: {}                                           // More info about buttons: https://docs.mobiscroll.com/5-16-1/javascript/eventcalendar#opt-buttons
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