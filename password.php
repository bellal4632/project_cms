<?php

if (isset($_POST['submit'])) {
  // Get the user's input
  $username = $_POST['username'];
  $email = $_POST['email'];

  // Connect to the database
  $conn = mysqli_connect("localhost", "root", "", "web4cms");

  // Check for errors
  if (mysqli_connect_errno()) {
    $error = "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  // Prepare the SQL statement
  $sql = "SELECT * FROM users WHERE username='$username' AND email='$email'";

  // Execute the query
  $result = mysqli_query($conn, $sql);

  // Check for errors
  if (!$result) {
    $error = "Error: " . mysqli_error($conn);
  }

  // Check if a matching row was found
  if (mysqli_num_rows($result) == 1) {
    // Redirect to the "Update Password" form
    header('Location: update_password.php');
    exit();
  } else {
    $error = "Invalid username or email";
  }

  // Close the database connection
  mysqli_close($conn);
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
                        <h3 class="text-center font-weight-light my-2">Forgot Password</h3>
                        <?php if (isset($error)) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error; ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="card-body bg-light">
                        <form method="post">

                            <div class="form-floating my-2">
                                <input class="form-control" id="email" type="email" name="email" placeholder="name@example.com" />
                                <label for="inputEmail">Email address</label>
                            </div>

                            <div class="form-floating my-2">
                                <input class="form-control" id="username" type="text" name="username" placeholder="username" />
                                <label for="username">Username</label>
                            </div>

                            <div class="my-2">
                                <div class="d-grid">
                                    <input class="btn btn-success" type="submit" name="login" value="Login">
                                </div>
                            </div>

                            <div class="my-2 mx-2">
                                <a style="text-decoration: none; float: left;" class="small text-danger" href="password.html"><b>Create New Accout</b></a>
                                <a style="text-decoration: none; float: right;" class="small text-danger" href="password.html"><b>Create New Accout</b></a>
                            </div>

                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>



    <script src="assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="assets/js/scripts.js"></script>


</body>

</html>