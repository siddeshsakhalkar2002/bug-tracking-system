<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $projectName = $_POST["projectName"];
    $submissionDate = $_POST["submissionDate"];
    $clientName = $_POST["clientName"];
    $clientAddress = $_POST["clientAddress"];
    $clientNumber = $_POST["clientNumber"];
    $projectLead = $_POST["projectLead"];
    $description = $_POST["description"];


    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bugtrackingsystem";


    $conn = new mysqli($servername, $username, $password, $dbname);


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $stmt = $conn->prepare("INSERT INTO projects (project_name, submission_date, client_name, client_address, client_number, project_lead, description) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $projectName, $submissionDate, $clientName, $clientAddress, $clientNumber, $projectLead, $description);

    if ($stmt->execute()) {
        echo "Project added successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }


    $stmt->close();
    $conn->close();
}
?>