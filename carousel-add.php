<?php require "inc/header.php"; ?>
</head>

<body class="sb-nav-fixed">
    <?php require "inc/topnav.php"; ?>
    <div id="layoutSidenav">
        <?php require "inc/leftnav.php"; ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-2">
                        <li class="breadcrumb-item active">Add Carousel</li>
                    </ol>

                    <!-- content -->
                    <div class="container">
                        <h1>Add Carousel Item</h1>
                        <form action="insert.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-4 my-1">
                                    <div class="form-group">
                                        <label for="image1">Image 1:</label>
                                        <input type="text" class="form-control" name="title1" id="title1" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            required
                                        </div>
                                        <input class="form-control my-1" type="file" name="image1" id="image1">
                                    </div>
                                </div>

                                <div class="col-md-4 my-1">
                                    <div class="form-group">
                                        <label for="image2">Image 2:</label>
                                        <input type="text" class="form-control" name="title2" id="title2" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            required
                                        </div>
                                        <input class="form-control my-1" type="file" name="image2" id="image2">
                                    </div>
                                </div>

                                <div class="col-md-4 my-1">
                                    <div class="form-group">
                                        <label for="image3">Image 3:</label>
                                        <input type="text" class="form-control" name="title3" id="title3" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            required
                                        </div>
                                        <input class="form-control my-1" type="file" name="image3" id="image3">
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>


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