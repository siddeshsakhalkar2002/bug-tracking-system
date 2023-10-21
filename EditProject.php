<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bugtrackingsystem";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $projectID = $_GET["id"];


    $conn = new mysqli($servername, $username, $password, $dbname);


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $stmt = $conn->prepare("UPDATE projects SET project_name=?, submission_date=?, client_name=?, client_address=?, client_number=?, project_lead=?, description=? WHERE id=?");


    $stmt->bind_param("sssssssi", $projectName, $submissionDate, $clientName, $clientAddress, $clientNumber, $projectLead, $description, $projectID);

    $projectName = $_POST["projectName"];
    $submissionDate = $_POST["submissionDate"];
    $clientName = $_POST["clientName"];
    $clientAddress = $_POST["clientAddress"];
    $clientNumber = $_POST["clientNumber"];
    $projectLead = $_POST["projectLead"];
    $description = $_POST["description"];


    if ($stmt->execute()) {
        echo '<script>alert("Record updated successfully.");</script>';

        header("Location: reports.php");
        exit();
    } else {
        echo '<script>alert("Error: ' . $stmt->error . '");</script>';
    }


    $stmt->close();
    $conn->close();
} else {

    $projectID = $_GET["id"];


    $conn = new mysqli($servername, $username, $password, $dbname);


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $stmt = $conn->prepare("SELECT project_name, submission_date, client_name, client_address, client_number, project_lead, description FROM projects WHERE id=?");


    $stmt->bind_param("i", $projectID);


    $stmt->execute();


    $stmt->store_result();


    $stmt->bind_result($projectName, $submissionDate, $clientName, $clientAddress, $clientNumber, $projectLead, $description);


    $stmt->fetch();


    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Edit Project</title>
    <style>
        .btn1 {
            border: none;
            outline: none;
            height: 40px;
            width: 100%;
            background-color: black;
            color: white;
            border-radius: 5px;
        }

        .btn1:hover {
            background-color: white;
            color: black;
            border: 1px solid;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a href="#" class="navbar-brand h1 mx-1 mb-0 p-0">
            <img src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" width="30" height="30" alt="">
        </a>
        <a class="navbar-brand" href="#">Bug Tracking System</a>
        <button type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" class="navbar-toggler"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="Home.php">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Add New
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="AddProject.php">Add New Project</a>
                        <a class="dropdown-item" href="AddBug.php">Add New Bug</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="reports.php">Reports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php?logout=true">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h1>Edit Project</h1>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $projectID; ?>">
            <div class="form-row">
                <div class="col-lg-7">
                    Project Name:<input type="text" placeholder="Project Name" class="form-control my-3 py-2"
                        name="projectName" value="<?php echo $projectName; ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="col-lg-7">
                    Submission Date:<input type="text" placeholder="dd-mm-yyyy" class="form-control my-3 py-2"
                        name="submissionDate" value="<?php echo $submissionDate; ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="col-lg-7">
                    Client Name:<input type="type" placeholder="Client Name" class="form-control my-3 py-2"
                        name="clientName" value="<?php echo $clientName; ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="col-lg-7">
                    Client Address:<input type="type" placeholder="Client Address" class="form-control my-3 py-2"
                        name="clientAddress" value="<?php echo $clientAddress; ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="col-lg-7">
                    Client No.:<input type="tel" placeholder="Contact No. (0123456789)" class="form-control my-3 py-2"
                        pattern="[0-9]{10}" name="clientNumber" value="<?php echo $clientNumber; ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="col-lg-7">
                    Project Lead:<select type="text" class="form-control my-3 py-2" name="projectLead">
                        <option disabled selected>Project Lead</option>
                        <option value="#">#</option>
                        <option value="#">#</option>
                        <option value="#">#</option>
                    </select>
                </div>
            </div>
            <div class="form-row d-flex align-items-center">
                <div class="col-lg-7">
                    Description:<br><textarea placeholder="Description" id="" cols="81" rows="3"
                        name="description"><?php echo $description; ?></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="col-lg-7">
                    <button type="submit" class="btn1 my-3 mb-5">Update</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>