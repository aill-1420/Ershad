<?php
include '../confi/app.php';
session_start();
//login all user
$email = $_POST['email'];
$password = $_POST['password'];

if($_POST['login_user_type'] == 'student') {

    $query = "SELECT * FROM students WHERE email = '$email'";
    $user = $mysql->query($query);
    if ($user->num_rows > 0) {
        $result = $user->fetch_array();
        if ($result['password'] == $password) {


            $_SESSION = [];
            $_SESSION['name'] = $result['full_name'];
            $_SESSION['email'] = $email;
            $_SESSION['userid'] = $result['id'];
            $_SESSION['college'] = $result['collage'];
            $_SESSION['major'] = $result['major'];
            $_SESSION['studentid'] = $result['studentid'];

            redirect('studentHome.php');
            die();
        } else {
            die("password not correct");
        }
    }
    die('no user with this email in students');

} elseif($_POST['login_user_type'] == 'adviser') {

    //login acadmic advising
    $query = "SELECT * FROM acadmic_advising WHERE email = '$email'";
    $user = $mysql->query($query);
    if ($user->num_rows) {
        $result = $user->fetch_array();
        if ($result['password'] == $password) {
            $_SESSION = [];
            $_SESSION['name'] = $result['full_name'];
            $_SESSION['email'] = $email;
            $_SESSION['userid'] = $result['id'];
            $_SESSION['collage'] = $result['collage'];
            $_SESSION['major'] = $result['major'];
            redirect('../academic_adviser/dashboard_adviser.php');
            die();

        } else {
            die("password not correct");
        }
    }

    die('no user with this email at adviser');


} elseif($_POST['login_user_type'] == 'committee') {

    $query = "SELECT * FROM acadmic_advising_committee WHERE email = '$email'";
    $user = $mysql->query($query);
    if ($user->num_rows) {
        $result = $user->fetch_array();
        if ($result['password'] == $password) {
            $_SESSION = [];
            $_SESSION['name'] = $result['full_name'];
            $_SESSION['email'] = $email;
            $_SESSION['userid'] = $result['id'];
            $_SESSION['collage'] = $result['collage'];
            $_SESSION['major'] = $result['major'];
            redirect('../academic_advising_committee/dshboard_committee.php');
            die();

        } else {
            die("password not correct");
        }
    }
    die('no user with this email in committe');
}