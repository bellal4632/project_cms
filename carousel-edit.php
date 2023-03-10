<?php require "inc/header.php"; ?>
</head>

<body class="sb-nav-fixed">
    <?php require "inc/topnav.php"; ?>
    <div id="layoutSidenav">
        <?php require "inc/leftnav.php"; ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1> <hr>
                    <h4>Edit Carousel Item</h4><br>

                    <!-- content -->

                    <div class="container">
                       

                        <?php
                        // Get carousel item ID from query string
                        $id = $_GET['id'];

                        // Connect to database
                        $conn = mysqli_connect("localhost", "root", "", "web4cms");

                        // Check if form has been submitted
                        if (isset($_POST['submit'])) {
                            // Get form data
                            $title = $_POST['title'];
                            $caption = $_POST['caption'];
                            $active = $_POST['active'];

                            // check if image is uploaded
                            if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
                                $image = $_FILES['image']['name'];
                                $tmp_image = $_FILES['image']['tmp_name'];
                                move_uploaded_file($tmp_image, "assets/aimages/caro/$image");
                            } else {
                                // If no new image is uploaded, use the existing one from the database
                                $query = "SELECT * FROM carousel WHERE id = $id";
                                $result = mysqli_query($conn, $query);
                                $row = mysqli_fetch_assoc($result);
                                $image = $row['image'];
                            }

                            // Update carousel item in database
                            $query = "UPDATE carousel SET title='$title', short_caption='$caption', active='$active', image='$image' WHERE id=$id";
                            mysqli_query($conn, $query);

                            // Show success message
                            echo '<div class="alert alert-success">Carousel item updated successfully!</div>';
                        }

                        // Select carousel item data from database
                        $query = "SELECT * FROM carousel WHERE id = $id";
                        $result = mysqli_query($conn, $query);
                        $row = mysqli_fetch_assoc($result);
                        ?>

                        <form method="post" enctype="multipart/form-data">

                            <div class="row mb-2">
                                <div class="col-md-8">

                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control" name="title" value="<?php echo $row['title']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Caption</label>
                                        <input type="text" class="form-control" name="caption" value="<?php echo $row['short_caption']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Active</label>
                                        <select class="form-control" name="active">
                                            <option value="1" <?php echo $row['active'] ? 'selected' : ''; ?>>Yes</option>
                                            <option value="0" <?php echo !$row['active'] ? 'selected' : ''; ?>>No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" class="form-control" name="image">

                                    </div>

                                </div>

                                <div class="col-md-4">

                                    <img src="assets/aimages/caro/<?php echo $row['image']; ?>" class="img-thumbnail mt-5">

                                </div>

                            </div>


                            <button type="submit" class="btn btn-primary" name="submit">Update</button>
                        </form>
                    </div>


                    <!-- content -->
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
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>