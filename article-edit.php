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
          <div class="col-md-12 bg-light text-dark my-2 mx-2 py-3 px-3">
            <div class="container-fluid">


              <?php
              // Get carousel item ID from query string
              $id = $_GET['id'];

              // Connect to database
              $conn = mysqli_connect("localhost", "root", "", "web4cms");

              // Check if form has been submitted
              if (isset($_POST['submit'])) {
                // Get form data
                $title = $_POST['title'];
                $desc = $_POST['desc'];
                $active = $_POST['active'];

                // check if image is uploaded
                if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
                  $image = $_FILES['image']['name'];
                  $tmp_image = $_FILES['image']['tmp_name'];
                  move_uploaded_file($tmp_image, "assets/aimages/$image");
                } else {
                  // If no new image is uploaded, use the existing one from the database
                  $query = "SELECT * FROM articles WHERE id = $id";
                  $result = mysqli_query($conn, $query);
                  $row = mysqli_fetch_assoc($result);
                  $image = $row['images'];
                }

                // Update carousel item in database
                $query = "UPDATE articles SET title='$title', description='$desc', active='$active', images='$image' WHERE id=$id";
                mysqli_query($conn, $query);

                // Show success message
                echo '<div class="alert alert-success">Article updated successfully!</div>';
              }

              // Select carousel item data from database
              $query = "SELECT * FROM articles WHERE id = $id";
              $result = mysqli_query($conn, $query);
              $row = mysqli_fetch_assoc($result);


              $q = "select * from categories where 1";
              $r = $conn->query($q);
              ?>

              <form method="post" enctype="multipart/form-data">

                <div class="row mb-2">
                  <div class="col-md-8">

                    <div class="form-group">
                      <label>Title</label>
                      <input type="text" class="form-control" name="title" value="<?php echo $row['title']; ?>">
                    </div>

                    <div class="form-group">
                      <label>Description</label>
                      <textarea style="height: 100px;" name="desc" id="desc" class="form-control"><?= $row['description']; ?></textarea>
                    </div>


                    <div class="form-group">
                      <label>Image</label>
                      <input type="file" class="form-control" name="image">
                    </div>
                    <div class="col-md-12">
                      <label for="acat" class="form-label">Category</label>
                      <select class="form-select" name="acat" id="acat">
                        <option selected disabled value="">Choose...</option>
                        <?php
                        while ($c = $r->fetch_assoc()) {
                          $selected = $c['id'] == $row['category_id'] ? "selected" : "";
                          echo "<option value='" . $c['id'] . "' " . $selected . ">" . $c['name'] . "</option>";
                        }

                        ?>
                      </select>
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                      <div class="invalid-feedback">
                        Required
                      </div>
                    </div>

                    <div class="form-group">
                      <label>Active</label>
                      <select class="form-control" name="active">
                        <option value="1" <?php echo $row['active'] ? 'selected' : ''; ?>>Yes</option>
                        <option value="0" <?php echo !$row['active'] ? 'selected' : ''; ?>>No</option>
                      </select>
                    </div>

                  </div>

                  <div class="col-md-4">

                    <img src="assets/aimages/<?php echo $row['images']; ?>" class="img-thumbnail mt-5">

                  </div>

                </div>


                <button type="submit" class="btn btn-primary" name="submit">Update</button>
              </form>
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