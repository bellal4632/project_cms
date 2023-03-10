<?php require "inc/header.php"; ?>
</head>


<?php require "inc/header.php"; ?>
</head>

<body class="sb-nav-fixed bg-secondary">
  <?php require "inc/topnav.php"; ?>
  <div id="layoutSidenav">
    <?php require "inc/leftnav.php"; ?>
    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid text-light">
          <h1 class="my-1">Add Article</h1>
          <hr>

          <!-- content -->

          <div class="row d-flex justify-content-center">
            <div class="col-md-10 bg-light text-dark my-2 mx-2 py-3 px-3">
              <div class="container-fluid">
                <?php
                // Get carousel item ID from query string
                $id = $_GET['id'];

                // Connect to database
                $conn = mysqli_connect("localhost", "root", "", "web4cms");

                // Check if form has been submitted
                if (isset($_POST['submit'])) {
                  // Get form data
                  $name = $_POST['name'];
                  $email = $_POST['email'];
                  $username = $_POST['username'];
                  $new_password = $_POST['new_password'];
                  $confirm_password = $_POST['confirm_password'];

                  // Validate the passwords
                  if ($new_password != $confirm_password) {
                    $error = "Passwords do not match";
                  } elseif (strlen($new_password) < 8) {
                    $error = "Password must be at least 8 characters long";
                  }



                  // Update carousel item in database
                  $query = "UPDATE users SET name='$name', email='$email', username='$username', password='$new_password' WHERE id=$id";
                  mysqli_query($conn, $query);

                  // Show success message
                  echo '<div class="alert alert-success">Profile Info updated successfully!</div>';
                }

                // Select carousel item data from database
                $query = "SELECT * FROM users WHERE id = $id";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_assoc($result);


                
                ?>


                <form method="post" enctype="multipart/form-data">

                  <div class="row mb-2">
                    <div class="col-md-6">

                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>">
                      </div>

                      <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" value="<?php echo $row['email']; ?>">
                      </div>



                      <div class="form-group">
                        <label>Active</label>
                        <select class="form-control" name="active">
                          <option value="1" <?php echo $row['role'] ? 'selected' : ''; ?>>Publisher</option>
                          <option value="2" <?php echo !$row['role'] ? 'selected' : ''; ?>>Moderator</option>
                          <option value="2" <?php echo !$row['role'] ? 'selected' : ''; ?>>Admin</option>
                        </select>
                      </div>

                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>New Password</label>
                        <input type="password" class="form-control" name="new_password">
                      </div>
                      <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" name="confirm_password">
                      </div>
                      <div class="form-group">
                        <label>Userame</label>
                        <input type="text" class="form-control" name="username" value="<?php echo $row['username']; ?>">
                      </div>
                    </div>

                  </div>


                  <button type="submit" class="btn btn-primary" name="submit">Update</button>
                </form>
              </div>
            </div>


          </div>
          <!--  content-end-->
        </div>
      </main>

      <!-- footer -->
      <?php require "inc/footer.php"; ?>


    </div>
  </div>
  <script src="assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="assets/js/scripts.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
  <script src="assets/js/datatables-simple-demo.js"></script>
</body>

</html>