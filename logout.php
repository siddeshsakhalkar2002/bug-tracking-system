<?php
session_start();

if (isset($_GET['logout'])) {

    session_unset();


    session_destroy();


    header("Location: LoginForm.php");
    exit();
}


if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {

    header("Location: LoginForm.php");
    exit();
}
?>