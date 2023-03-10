<?php
require "inc/connection.php";
require "inc/adminauth.php";
?>

<?php require "inc/header.php"; ?>
</head>

<body class="sb-nav-fixed">
    <?php require "inc/topnav.php"; ?>
    <div id="layoutSidenav">
        <?php require "inc/leftnav.php"; ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid bg-secondary py-1">
                    <h1 class="mt-4 text-light">Carousel</h1>
                    <hr>

                    <!-- content -->
                    <div class="container-fluid py-2 bg-light" style="color: black;">
                        <h4>Add Carousel Item</h4>
                        <form action="insert.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-4 my-1">
                                    <div class="form-group">
                                    <h6> Slide One:</h6> <hr>
                                        <label for="image1">Title</label>
                                        <input type="text" class="form-control mt-2" name="title1" id="title1" placeholder="Slider One Title" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            required
                                        </div>
                                        <input class="form-control mt-2" type="file" name="image1" id="image1">
                                    </div>
                                </div>

                                <div class="col-md-4 my-1">
                                    <div class="form-group">
                                    <h6> Slide Two:</h6> <hr>
                                        <label for="image2">Title</label>
                                        <input type="text" class="form-control mt-2" name="title2" id="title2" placeholder="Slider Two Title" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            required
                                        </div>
                                        <input class="form-control mt-2" type="file" name="image2" id="image2">
                                    </div>
                                </div>

                                <div class="col-md-4 my-1">
                                    <div class="form-group">
                                        <h6> Slide Three:</h6> <hr>
                                        <label for="image3">Title</label>
                                        <input type="text" class="form-control mt-2" name="title3" id="title3" placeholder="Slider Three Title" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            required
                                        </div>
                                        <input class="form-control mt-2" type="file" name="image3" id="image3">
                                    </div>
                                </div>
                            </div>

                            <small>N.B: For Better View Please Upload <b>900x400px</b> Images.</small><br>
                            <button type="submit" class="btn btn-primary my-1">Submit</button>
                        </form>
                    </div>

                    <hr>
                    <!-- Carousel list -->
                    <div class="container-fluid bg-light py-1 my-1">
                        <h4>Carousel List</h4>
                        <table class="table table-striped table align-middle table-success table-hover">
                            <thead>
                                <tr style="text-align: center;" class="table-light">

                                    <th>Title One</th>
                                    <th>Image One</th>
                                    <th>Title Two</th>
                                    <th>Image Two</th>
                                    <th>Title Three</th>
                                    <th>Image Three</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Select all data from carousel table
                                $query = "SELECT * FROM carousel ORDER BY `carousel`.`id` DESC";
                                $result = mysqli_query($conn, $query);

                                // Check if select was successful
                                if (mysqli_num_rows($result) > 0) {
                                    // Fetch data and display in table
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<tr style="text-align: center;">';
                                        echo '<td class="col-md-2">' . $row['title_1'] . '</td>';
                                        echo '<td><img src="assets/carousel/' . $row['image_1'] . '" width="150px"></td>';
                                        echo '<td class="col-md-2">' . $row['title_2'] . '</td>';
                                        echo '<td><img src="assets/carousel/' . $row['image_2'] . '" width="150px"></td>';
                                        echo '<td class="col-md-2">' . $row['title_3'] . '</td>';
                                        echo '<td><img src="assets/carousel/' . $row['image_3'] . '" width="150px"></td>';
                                        echo '<td class="col-md-1">
                                <a href="carousel-edit.php?id=' . $row['id'] . '" class="btn btn-warning btn-sm my-2">Edit</a>
                                
                                <a href="carousel-delete.php?id=' . $row['id'] . '" class="btn btn-danger btn-sm my-2">Delete</a>
                              </td>';
                                        echo '</tr>';
                                    }
                                } else {
                                    echo '<tr style="text-align: center;"><td colspan="7">No data found</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
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

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html>