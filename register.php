<?php
$message = "Create Account";
if (isset($_POST['register'])) {
    $error = false;
    require "inc/connection.php";
    $name = $_POST['fname'] . ' ' . $_POST['lname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    //check the email is not already used
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    if ($name != '' && $email != '' && $pass1 != '' && $pass2 != '') {
        if ($pass1 == $pass2) {
            $h = password_hash($pass1, PASSWORD_DEFAULT);
            $q = "insert into users values(null,'" . $name . "','" . $email . "','" . $username . "','" . $h . "','1',null)";
            $conn->query($q);
            if ($conn->affected_rows) {
                header("location:login.php");
            } else {
                $error = true;
                $message = "Maybe email already used";
            }
        } else {
            $error = true;
            $message = "Passwords do not match";
        }
    } else {
        $error = true;
        $message = "All Fields must be filled up";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Register - SB Admin</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link href="assets/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-light">

    <div class="vh-100 d-flex align-items-center">
        <div class="mx-auto col-md-4">

            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4"><?php echo $message ?? ""; ?></h3>
                </div>
                <div class="card-body bg-light">
                    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="inputFirstName" name="fname" type="text" placeholder="Enter your first name" required />
                                    <label for="inputFirstName">First name</label>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input class="form-control" id="inputLastName" name="lname" type="text" placeholder="Enter your last name" required />
                                    <label for="inputLastName">Last name</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control" id="username" name="username" type="username" placeholder="Username" required />
                            <label for="username">Username</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control" id="inputEmail" name="email" type="email" placeholder="name@example.com" required />
                            <label for="inputEmail">Email address</label>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="inputPassword" type="password" name="pass1" placeholder="Create a password" required />
                                    <label for="inputPassword">Password</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="inputPasswordConfirm" type="password" name="pass2" placeholder="Confirm password" required />
                                    <label for="inputPasswordConfirm">Confirm Password</label>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 mb-0">
                            <div class="d-grid">
                                <input class="btn btn-dark btn-block" type="submit" name="register" value="Create Account">
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card-footer text-center py-3">
                    <div class="small"><a style="text-decoration: none;" href="login.php"> <b class="text-success">Have an account? Go to login</b> </a></div>
                </div>
            </div>

        </div>
    </div>



    <script src="assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>