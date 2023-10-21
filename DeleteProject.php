<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Delete Project</title>
</head>

<body>
    <div class="container mt-5">
        <h1>Delete Project</h1>

        <div class="alert alert-danger" role="alert">
            <strong>Are you sure you want to delete this project?</strong>
        </div>

        <form action="processDeleteProject.php" method="POST">
            <input type="hidden" name="projectId" value="<?php echo $_GET['id']; ?>">

            <button type="submit" class="btn btn-success">Yes</button>
            <a href="reports.php" class="btn btn-danger">No</a>
        </form>
        

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
        crossorigin="anonymous"></script>
</body>

</html>