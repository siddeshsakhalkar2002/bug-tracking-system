<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bugtrackingsystem";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $contactNo = $_POST['contactNo'];


    $sql = "INSERT INTO registration (firstName, lastName, gender, email, password, contactNo)
            VALUES ('$firstName', '$lastName', '$gender', '$email', '$password', '$contactNo')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
        header("Location:LoginForm.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>