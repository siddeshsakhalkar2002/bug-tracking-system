<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'];
    $password = $_POST['password'];


    $servername = "localhost";
    $username = "root";
    $db_password = "";
    $dbname = "bugtrackingsystem";

    $conn = new mysqli($servername, $username, $db_password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $sql = "SELECT * FROM registration WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {

        header("Location: Home.php");
        exit();
    } else {

        $error = "Invalid email or password";
    }


    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/8697432736.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="LoginForm.css">
</head>

<body>
    <section class="Form my-4 mx-5">
        <div class="container">
            <div class="row row-gutters shadow bg-white rounded-10">
                <div class="col-lg-5 p-0">
                    <img src="bugtracking img1.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-7 px-5 pt-5 mt-5">
                    <h1><i class="fa-solid fa-user"></i></h1>
                    <h3 class="font-weight-bold py-3">Sign in to your account</h3>
                    <form method="POST">
                        <div class="form-row ">
                            <div class="col-lg-7">
                                <input type="email" name="email" placeholder="Email Address"
                                    class="form-control my-3 py-2">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7 ">
                                <input type="password" name="password" placeholder="******"
                                    class="form-control my-3 py-2">

                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <button type="submit" class="btn1 mb-3">Login</button>

                            </div>
                        </div>
                        <a href="#">Forget password</a>
                        <p class="mb-0">Don't have an account? <a href="RegisterForm.php">Register here</a></p>
                    </form>
                    <?php if (isset($error)) { ?>
                        <p>
                            <?php echo $error; ?>
                        </p>22
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
</body>

</html>