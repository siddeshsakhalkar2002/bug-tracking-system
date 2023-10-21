<?php

if (isset($_POST['projectId'])) {
    $projectId = $_POST['projectId'];


    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bugtrackingsystem";


    $conn = new mysqli($servername, $username, $password, $dbname);


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $sql = "DELETE FROM projects WHERE id = $projectId";

    if ($conn->query($sql) === TRUE) {

        echo '<script>alert("Project Deleted successfully.");</script>;';
        header("Location: reports.php");

    } else {

        echo '<script>alert("Error: ' . $conn->error . '");</script>';
        header("Location: reports.php");

    }


    $conn->close();
} else {

    header("Location: reports.php");
    exit();
}
?>