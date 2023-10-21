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

    <div class="container mt-5">
        <h1>View Project</h1>

        <?php
        if (isset($_GET['id']) && isset($_GET['name'])) {
            $projectId = $_GET['id'];
            $projectName = $_GET['name'];

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "bugtrackingsystem";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $projectId = $conn->real_escape_string($projectId);


            $projectStmt = $conn->prepare("SELECT project_name, description, client_name
                                            FROM projects
                                            WHERE id = ?");
            $projectStmt->bind_param("i", $projectId);
            $projectStmt->execute();
            $projectResult = $projectStmt->get_result();

            if ($projectResult) {
                if ($projectResult->num_rows > 0) {
                    $projectRow = $projectResult->fetch_assoc();

                    echo "<h3>Project Details:</h3>";
                    echo "<p><strong>Project Name:</strong> " . $projectRow["project_name"] . "</p>";
                    echo "<p><strong>Description:</strong> " . $projectRow["description"] . "</p>";
                    echo "<p><strong>Client Name:</strong> " . $projectRow["client_name"] . "</p>";


                    $bugStmt = $conn->prepare("SELECT id, bug_name, description FROM bugs WHERE project_name = ?");
                    $bugStmt->bind_param("s", $projectName);
                    $bugStmt->execute();
                    $bugResult = $bugStmt->get_result();

                    if ($bugResult) {
                        if ($bugResult->num_rows > 0) {
                            echo '<h3>Bugs in this project:</h3>';
                            echo '<ul>';
                            while ($bugRow = $bugResult->fetch_assoc()) {
                                echo '<li>';
                                echo '<strong>Bug Name:</strong> ' . $bugRow["bug_name"] . '<br>';
                                echo '<strong>Description:</strong> ' . $bugRow["description"] . '<br>';
                                echo '<a href="UpdateBug.php?id=' . $bugRow["id"] . '&name=' . urlencode($bugRow["bug_name"]) . '">'
                                    . '<button type="submit" class="btn1 my-3 mb-5">Update</button>'
                                    . '</a>';
                                echo '<a href="ResolveBug.php?id=' . $bugRow["id"] . '&name=' . urlencode($bugRow["bug_name"]) . '">'
                                    . '<button type="submit" class="btn1 mx-3 my-3 mb-2">Resolve</button>'
                                    . '</a>';
                                echo '</li>';
                            }
                            echo '</ul>';
                        } else {
                            echo '<p>No bugs found for this project.</p>';
                        }
                    } else {
                        echo '<p>Query error: ' . $conn->error . '</p>';
                    }
                } else {
                    echo '<p>Query error: Project ID not found.</p>';
                }
            } else {
                echo '<p>Query error: ' . $conn->error . '</p>';
            }

            $conn->close();
        } else {
            echo '<p>Invalid project ID.</p>';
        }
        ?>



    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
        crossorigin="anonymous"></script>
</body>

</html>