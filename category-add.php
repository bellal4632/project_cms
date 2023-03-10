<?php
require "inc/connection.php";
require "inc/adminauth.php";
if (isset($_POST['submit'])) {
    $title = $conn->escape_string($_POST['cattitle']);
    $desc = $conn->escape_string($_POST['catdesc']);
    $icon = $_POST['caticon'];

    $iq = "insert into categories values(null,'" . $title . "','" . $desc . "','" . $icon . "',null)";
    $conn->query($iq);


    if ($conn->affected_rows) {
        $message = "Category Added";
    }
}
?>

<?php require "inc/header.php"; ?>
</head>

<body class="sb-nav-fixed bg-secondary">
    <?php require "inc/topnav.php"; ?>
    <div id="layoutSidenav">
        <?php require "inc/leftnav.php"; ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid text-light">
                    <h1 class="my-1">Add Category</h1>
                    <hr>

                    <!-- content -->
                    <div class=" col-md-6 bg-light text-dark my-2 mx-2 py-3 px-3">
                        <form class="row g-3 needs-validation" method="post" enctype="multipart/form-data">
                            <div class="col-md-12">
                                <label for="cattitle" class="form-label">Category Name</label>
                                <input type="text" class="form-control" placeholder="Type Name Of Your Category" name="cattitle" id="cattitle" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    required
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="catdesc" class="form-label">Description</label>
                                <textarea name="catdesc" id="catdesc"placeholder="Type Description Of Your Category" class="form-control"></textarea>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    required
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="caticon" class="form-label">Icon</label>
                                <input type="text" class="form-control" placeholder="Paste The Html Icon Tag Of Your Category" name="caticon" id="caticon" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    required
                                </div>
                            </div>
                            <div class="col-12">
                                <button style="float: right;" class="btn btn-primary" type="submit" name="submit">Add Category</button>
                            </div>

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