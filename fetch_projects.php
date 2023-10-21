<?php
// Connect to the database
$servername = "your_servername";
$username = "your_username";
$password = "your_password";
$dbname = "bugtrackingsystem";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch projects based on search text
$searchText = $_POST['search'];
$query = "SELECT * FROM projects WHERE project_name LIKE '%$searchText%'";
$result = $conn->query($query);

// Generate HTML content for dropdown list
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<li><a class="dropdown-item" href="#">' . $row['project_name'] . '</a></li>';
    }
} else {
    echo '<li><a class="dropdown-item" href="#">No projects found</a></li>';
}

$conn->close();
?>