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

    <!-- link Java Script -->
    <script src='../template/assets/js/argon-dashboard.js' type="text/javascript"></script>
    <script src='../template/assets/js/Dashboard.js' type="text/javascript"></script>
    <script src="../template/assets/js/jquery.min.js"></script>
    <script src="../template/assets/js/main.js"></script>

    <!-- font link -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">


    <style>

        #wrap {
            width: 1100px;
            margin: 0 auto;
            padding: 2vw 0;
        }

        #external-events {
            float: left;
            width: 150px;
            padding: 0 10px;
        }

        #external-events h4 {
            font-size: 16px;
            margin-top: 0;
            padding-top: 1em;
        }

        .external-event { /* try to mimick the look of a real event */
            margin: 10px 0;
            padding: 2px 4px;
            background: #3366CC;
            color: #fff;
            font-size: .85em;
            cursor: pointer;
        }

        #external-events p {
            margin: 1.5em 0;
            font-size: 11px;
            color: #666;
        }

        #external-events p input {
            margin: 0;
            vertical-align: middle;
        }

        #calendar {
            /* 		float: right; */
            margin: 0 auto;
            width: 900px;
            background-color: #FFFFFF;
            border-radius: 6px;
            box-shadow: 0 1px 2px #C3C3C3;
        }

    </style>
</head>

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
                <a class="nav-link" href="students_List.php" style="cursor: pointer;">
                    <div class="icon icon-shape icon-sm border-radius-md text-center ms-2 d-flex align-items-center justify-content-    center">
                        <i class="icm icon-users text-secondary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text me-1">الطلاب</span>
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


<!--Start content -->
<main class="main-content position-relative border-radius-lg overflow-hidden">

    <!-- Start navigation -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 ">
                    <li class="breadcrumb-item text-sm ps-2"><a class="opacity-5 text-white" href="dshboard_committee.php">لوحة القيادة</a></li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">نظرة عامة</li>
                </ol>
                <!-- <h6 class="font-weight-bolder text-white mb-0">RTL</h6>-->
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 px-0" id="navbar">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    <!-- Start Search -->
                    <div class="input-group">
                        <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" placeholder="أكتب هنا...">
                    </div>
                    <!-- End Search -->
                </div>
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
                                        <i class="fas fa-arrow-left text-sm ms-1" aria-hidden="true"></i>
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
                                        $query = "SELECT * FROM `meeting`";
                                        $number = $mysql->query($query)->fetch_all(MYSQLI_ASSOC);
                                        echo count($number);
                                        ?>
                                    </h2>
                                    <h4 class="mb-2">عدد اللقاءات</h4>
                                    <a class="text-dark font-weight-bold ps-1 mb-0 icon-move-left mt-auto" href="meeting.php">
                                        المزيد
                                        <i class="fas fa-arrow-left text-sm ms-1" aria-hidden="true"></i>
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
                                        <div class="dialog" id="dialog" style="text-align-last: center;">
                                            <h2 class="dialog-header"> إضافة موعد جديد </h2>
                                            <form class="form" id="form">
                                                <div class="form-container" style="text-align-last: center;  margin: 5vw 3vw;">
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
        <!--End forth row-->

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


<!--   Core JS Files   -->
<script>
    var ctx1 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
    new Chart(ctx1, {
        type: "line",
        data: {
            labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
                label: "Mobile apps",
                tension: 0.4,
                borderWidth: 0,
                pointRadius: 0,
                borderColor: "#5e72e4",
                backgroundColor: gradientStroke1,
                borderWidth: 3,
                fill: true,
                data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                maxBarThickness: 6

            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                }
            },
            interaction: {
                intersect: false,
                mode: 'index',
            },
            scales: {
                y: {
                    grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5]
                    },
                    ticks: {
                        display: true,
                        padding: 10,
                        color: '#fbfbfb',
                        font: {
                            size: 11,
                            family: "Open Sans",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
                x: {
                    grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false,
                        borderDash: [5, 5]
                    },
                    ticks: {
                        display: true,
                        color: '#ccc',
                        padding: 20,
                        font: {
                            size: 11,
                            family: "Open Sans",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
            },
        },
    });

    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>



<script>

    $(document).ready(function() {
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();

        /*  className colors

        className: default(transparent), important(red), chill(pink), success(green), info(blue)

        */


        /* initialize the external events
        -----------------------------------------------------------------*/

        $('#external-events div.external-event').each(function() {

            // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
            // it doesn't need to have a start or end
            var eventObject = {
                title: $.trim($(this).text()) // use the element's text as the event title
            };

            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject);

            // make the event draggable using jQuery UI
            $(this).draggable({
                zIndex: 999,
                revert: true,      // will cause the event to go back to its
                revertDuration: 0  //  original position after the drag
            });

        });


        /* initialize the calendar
        -----------------------------------------------------------------*/

        var calendar =  $('#calendar').fullCalendar({
            header: {
                left: 'title',
                center: 'agendaDay,agendaWeek,month',
                right: 'prev,next today'
            },
            editable: true,
            firstDay: 1, //  1(Monday) this can be changed to 0(Sunday) for the USA system
            selectable: true,
            defaultView: 'month',

            axisFormat: 'h:mm',
            columnFormat: {
                month: 'ddd',    // Mon
                week: 'ddd d', // Mon 7
                day: 'dddd M/d',  // Monday 9/7
                agendaDay: 'dddd d'
            },
            titleFormat: {
                month: 'MMMM yyyy', // September 2009
                week: "MMMM yyyy", // September 2009
                day: 'MMMM yyyy'                  // Tuesday, Sep 8, 2009
            },
            allDaySlot: false,
            selectHelper: true,
            select: function(start, end, allDay) {
                var title = prompt('Event Title:');
                if (title) {
                    calendar.fullCalendar('renderEvent',
                        {
                            title: title,
                            start: start,
                            end: end,
                            allDay: allDay
                        },
                        true // make the event "stick"
                    );
                }
                calendar.fullCalendar('unselect');
            },
            droppable: true, // this allows things to be dropped onto the calendar !!!
            drop: function(date, allDay) { // this function is called when something is dropped

                // retrieve the dropped element's stored Event Object
                var originalEventObject = $(this).data('eventObject');

                // we need to copy it, so that multiple events don't have a reference to the same object
                var copiedEventObject = $.extend({}, originalEventObject);

                // assign it the date that was reported
                copiedEventObject.start = date;
                copiedEventObject.allDay = allDay;

                // render the event on the calendar
                // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

                // is the "remove after drop" checkbox checked?
                if ($('#drop-remove').is(':checked')) {
                    // if so, remove the element from the "Draggable Events" list
                    $(this).remove();
                }

            },

            events: [
                {
                    title: 'All Day Event',
                    start: new Date(y, m, 1)
                },
                {
                    id: 999,
                    title: 'Repeating Event',
                    start: new Date(y, m, d-3, 16, 0),
                    allDay: false,
                    className: 'info'
                },
                {
                    id: 999,
                    title: 'Repeating Event',
                    start: new Date(y, m, d+4, 16, 0),
                    allDay: false,
                    className: 'info'
                },
                {
                    title: 'Meeting',
                    start: new Date(y, m, d, 10, 30),
                    allDay: false,
                    className: 'important'
                },
                {
                    title: 'Lunch',
                    start: new Date(y, m, d, 12, 0),
                    end: new Date(y, m, d, 14, 0),
                    allDay: false,
                    className: 'important'
                },
                {
                    title: 'Birthday Party',
                    start: new Date(y, m, d+1, 19, 0),
                    end: new Date(y, m, d+1, 22, 30),
                    allDay: false,
                },
                {
                    title: 'Click for Google',
                    start: new Date(y, m, 28),
                    end: new Date(y, m, 29),
                    url: 'http://google.com/',
                    className: 'success'
                }
            ],
        });


    });

</script>
</body>

</html>
