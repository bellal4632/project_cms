<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_POST['login'])) {
    require "inc/connection.php";
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $s = "select * from users where email='$email' limit 1";
    $r = $conn->query($s);
    if ($r->num_rows) {
        $row = $r->fetch_assoc();
        if (password_verify($pass, $row['password'])) {
            $_SESSION['userid'] = $row['id'];
            $_SESSION['username'] = $row['name'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['loggedin'] = true;
            if ($row['role'] == 3) {
                header("location:dashboard.php");
            } elseif ($row['role'] == 2) {
                header("location:dashboard.php");
            }
        }
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
    <title>Login - Admin</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link href="assets/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-light">

<div class="conteiner">
<div class="vh-100 d-flex align-items-center">
        <div class="mx-auto col-md-4">

            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-2">Login</h3>
                </div>
                <div class="card-body bg-light">
                    <form action="" method="post">
                        <div class="form-floating mb-3">
                            <input class="form-control" id="inputEmail" type="email" name="email" placeholder="name@example.com" />
                            <label for="inputEmail">Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="inputPassword" type="password" name="password" placeholder="Password" />
                            <label for="inputPassword">Password</label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                            <label class="form-check-label text-primary" for="inputRememberPassword"> <b>Remember Password</b> </label>
                            <a style="text-decoration: none; float: right;" class="small text-danger" href="password.html"><b>Forgot Password?</b></a>
                        </div>
                        <div class="mt-4 mb-0">
                            <div class="d-grid">
                                <input class="btn btn-success" type="submit" name="login" value="Login">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center py-2">
                    <div class="small "><a style="text-decoration: none" href="register.php"><b class="text-dark">Need an account? Sign up!</b></a></div>
                </div>
            </div>

        </div>
    </div>
</div>

    
    <script src="assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>