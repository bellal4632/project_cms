<?php

if (isset($_POST['submit'])) {
  // Get the user's input
  $new_password = $_POST['new_password'];
  $confirm_password = $_POST['confirm_password'];

  // Validate the passwords
  if ($new_password != $confirm_password) {
    $error = "Passwords do not match";
  } elseif (strlen($new_password) < 8) {
    $error = "Password must be at least 8 characters long";
  }

  // Connect to the database
  $conn = mysqli_connect('localhost', 'username', 'password', 'mydatabase');

  // Check for errors
  if (mysqli_connect_errno()) {
    $error = "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  // Prepare the SQL statement
  $sql = "UPDATE users SET password='$new_password' WHERE username='$username' AND email='$email'";

  // Execute the query
  $result = mysqli_query($conn, $sql);

  // Check for errors
  if (!$result) {
    $error = "Error: " . mysqli_error($conn);
  } else {
    // Password updated successfully
    header('Location: login.php');
    exit();
  }

  // Close the database connection
  mysqli_close($conn);
}

?>



<!DOCTYPE html>
<html>
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
<body>

  <div class="container mt-5">
    <h3 class="text-center mb-4">Update Password</h3>
    <?php if (isset($error)) { ?>
      <div class="alert alert-danger" role="alert">
        <?php echo $error; ?>
      </div>
    <?php } ?>
    <form method="post">
      <div class="form-group">
        <label>New Password:</label>
        <input type="password" name="new_password" class="form-control" required>
      </div>
      <div class="form-group">
        <label>Confirm Password:</label>
        <input type="password" name="confirm_password" class="form-control" required>
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

</body>
</html>
