<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="RegistrationForm.css">
</head>

<body>
    <section class="Form my-5 mx-5 ">
        <div class="container d-flex justify-content-center">
            <div class="row shadow rounded-10 d-flex justify-content-center">
                <div class="col-lg-12 inner-container ">
                    <h1 class="font-weight-bold my-4 py-3 d-flex justify-content-center">Registration</h1>
                    <form method="POST" action="register.php">
                        <div class="form-row">
                            <div class="col-lg-7">
                                <input type="text" name="firstName" placeholder="First Name"
                                    class="form-control my-3 py-2">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <input type="text" name="lastName" placeholder="Last Name"
                                    class="form-control my-3 py-2">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7 ">
                                <select name="gender" class="form-control my-3 py-2">
                                    <option disabled selected="Select Gender">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
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
                            <div class="col-lg-7 ">
                                <input type="tel" name="contactNo" placeholder="Contact No. (0123456789)"
                                    class="form-control my-3 py-2" pattern="[0-9]{10}"
                                    title="Please enter a 10-digit phone number">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <button type="submit" name="submit" class="btn1 my-3 mb-5">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>