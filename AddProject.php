<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/8697432736.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="AddProject.css">

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

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>


    <div class="container">
        <div class="row my-3 d-flex justify-items-center">
            <H1 class="font-weight-bold my-4 py-3 d-flex justify-content-center">Add New Project</H1>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

                <div class="form-row ">

                    <div class="col-lg-7">
                        Project Name:<input type="text" placeholder="Project Name" class="form-control my-3 py-2"
                            name="projectName">
                    </div>
                </div>

                <div class="form-row ">

                    <div class="col-lg-7">
                        Submission Date:<input type="text" placeholder="dd-mm-yyyy" class="form-control my-3 py-2"
                            name="submissionDate">
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-lg-7 ">
                        Client Name:<input type="type" placeholder="Client Name" class="form-control my-3 py-2"
                            name="clientName">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-lg-7 ">
                        Client Address:<input type="type" placeholder="Client Address" class="form-control my-3 py-2"
                            name="clientAddress">
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-lg-7 ">
                        Client no.<input type="tel" placeholder="Contact No. (0123456789)"
                            class="form-control my-3 py-2" pattern="[0-9]{10}" name="clientNumber">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-lg-7 ">
                        Project Lead:<select type="text" class="form-control my-3 py-2" name="projectLead">
                            <option disabled selected>Project Lead</option>
                            <option value="#">#</option>
                            <option value="#">#</option>
                            <option value="#">#</option>
                        </select>
                    </div>
                </div>
                <div class="form-row d-flex align-items-center">
                    <div class="col-lg-7 ">
                        Description:<br><textarea placeholder="Description" id="" cols="81" rows="3"
                            name="description"></textarea>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-lg-7">
                        <button type="submit" class="btn1 my-3 mb-5">Submit</button>
                    </div>
                </div>
            </form>
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
                    echo '<script>alert("Project added successfully.");</script>;';
                } else {
                    echo '<script>alert("Error: ' . $stmt->error . '");</script>';
                }


                $stmt->close();
                $conn->close();
            }
            ?>
        </div>
    </div>



</body>

</html>