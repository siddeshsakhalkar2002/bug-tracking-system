<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bugtrackingsystem";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_GET["id"])) {
        $bugID = $_GET["id"];
        $resolvedDate = $_POST["bugDate"];
        $resolvedDescription = $_POST["description"];


        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }


        $stmt = $conn->prepare("SELECT bug_name, project_name, bug_date, description FROM bugs WHERE id=?");
        $stmt->bind_param("i", $bugID);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($bugName, $projectName, $bugDate, $description);
        $stmt->fetch();
        $stmt->close();


        $insertStmt = $conn->prepare("INSERT INTO resolved (bug_name, project_name, bug_date, description, resolved_date, resolved_description) VALUES (?, ?, ?, ?, ?, ?)");
        $insertStmt->bind_param("ssssss", $bugName, $projectName, $bugDate, $description, $resolvedDate, $resolvedDescription);
        $insertStmt->execute();
        $insertStmt->close();


        $deleteStmt = $conn->prepare("DELETE FROM bugs WHERE id=?");
        $deleteStmt->bind_param("i", $bugID);
        $deleteStmt->execute();
        $deleteStmt->close();

        $conn->close();


        header("Location: reports.php");
        exit();
    } else {
        echo '<script>alert("Invalid request.");</script>';
    }
} else {
    if (isset($_GET["name"]) && isset($_GET["id"])) {
        $bugName = $_GET["name"];
        $bugID = $_GET["id"];


        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }


        $stmt = $conn->prepare("SELECT bug_name, project_name, bug_date, description FROM bugs WHERE id=?");
        $stmt->bind_param("i", $bugID);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($bugName, $projectName, $bugDate, $description);
        $stmt->fetch();
        $stmt->close();
        $conn->close();
    } else {
        echo '<script>alert("Invalid request.");</script>';
    }
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
    <title>View Project</title>
    <style>
        .btn1 {
            border: none;
            outline: none;
            height: 40px;
            width: 20%;
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
                <li class="nav-item">
                    <a class="nav-link" href="reports.php">Back to Reports</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row my-3 d-flex justify-items-center">
            <H1 class="font-weight-bold my-4 py-3 d-flex justify-content-center">Resolve Bug</H1>

            <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $bugID; ?>">
                <div class="form-row">
                    <div class="col-lg-7">
                        Bug Name:<input type="text" name="bugName" placeholder="Bug Name" class="form-control my-3 py-2"
                            value="<?php echo $bugName; ?>" readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-lg-7">
                        Project:<input type="text" name="project" placeholder="Project" class="form-control my-3 py-2"
                            value="<?php echo $projectName; ?>" readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-lg-7">
                        Bug Date:<input type="text" name="bugDate" placeholder="dd-mm-yyyy"
                            value="<?php echo $bugDate; ?>" class="form-control my-3 py-2" readonly>
                    </div>
                </div>
                <div class="form-row d-flex align-items-center">
                    <div class="col-lg-7">
                        Description:<br>
                        <textarea placeholder="Description" name="description" cols="81" rows="3" class="form-control"
                            readonly><?php echo $description; ?></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-lg-7">
                        Resolve Date: <input name="bugDate" type="text" placeholder="dd-mm-yyyy"
                            class="form-control my-3 py-2">
                    </div>
                </div>
                <div class="form-row d-flex align-items-center">
                    <div class="col-lg-7">
                        Resolved Description:<br>
                        <textarea placeholder="Resolved Description" name="description" cols="81" rows="3"
                            class="form-control"></textarea>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-lg-7">
                        <button type="submit" class="btn1 my-3 mb-5">Resolve</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


</body>

</html>