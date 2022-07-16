<?php

session_start();
if (isset($_SESSION['login_admin'])) {
    unset($_SESSION['login_admin']);
}
require_once './config/config.php';

if (isset($_POST['login'])) {

    $user = mysqli_real_escape_string($conn, $_POST['txtUser']);
    $pass = mysqli_real_escape_string($conn, $_POST['txtPass']);

    $sel_user = "SELECT * FROM `admin` WHERE `a_user` = '$user' AND `a_pass` = '$pass'";

    $run_user = mysqli_query($conn, $sel_user);
    $check_user = mysqli_num_rows($run_user);

    if ($check_user > 0) {

        $_SESSION['login_admin'] = $user;

        echo "<script>window.open('dashboard.php', '_self')</script>";
    } else {

        echo "<script>alert('نام کاربری و رمز عبور تطابق ندارند.')</script>";
        echo "<script>window.open('login.php', '_self')</script>";
    }
}

