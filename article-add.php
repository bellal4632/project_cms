<?php
require "inc/connection.php";
require "inc/adminauth.php";
if (isset($_POST['submit'])) {
    $title = $conn->escape_string($_POST['atitle']);
    $desc = $conn->escape_string($_POST['adesc']);
    $cat = $_POST['acat'];
    $tag = $_POST['atag'];
    $image = null;
    if (isset($_FILES['aimage'])) {
        $im = $_FILES['aimage'];
        $image = uniqid() . ".png";
        move_uploaded_file($_FILES['aimage']['tmp_name'], 'assets/aimages/' . $image);
    }
    $iq = "insert into articles values(null,'" . $cat . "','" . $title . "','" . $desc . "','" . $image . "','1','" . $_SESSION['userid'] . "','" . $tag . "','',null)";

    $conn->query($iq);
    if ($conn->affected_rows) {
        $message = "Article Added";
    }
}

$q = "select * from categories where 1";
$r = $conn->query($q);
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
                    <h1 class="my-1">Add Article</h1>
                    <hr>

                    <!-- content -->
                    <div class="col-md-6 bg-light text-dark my-2 mx-2 py-3 px-3">
                        <form class="row g-3 needs-validation" method="post" enctype="multipart/form-data">
                            <div class="col-md-12">
                                <label for="atitle" class="form-label">Title</label>
                                <input type="text" class="form-control" placeholder="Type Your Title Of Your Arcticle" name="atitle" id="atitle" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    required
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="adesc" class="form-label">Description</label>
                                <textarea name="adesc" id="adesc" placeholder="Type The Details Of Your Article" class="form-control"></textarea>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    required
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="aimage" class="form-label">Image</label>
                                <input type="file" class="form-control" id="aimage" name="aimage" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    required
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="acat" class="form-label">Category</label>
                                <select class="form-select" name="acat" id="acat">
                                    <option selected disabled value="">Choose...</option>
                                    <?php
                                    while ($row = $r->fetch_assoc()) {
                                        echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                    }
                                    ?>
                                </select>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    required
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="atag" class="form-label">Tags</label>
                                <input type="text" class="form-control" placeholder="Type Relative Tags Of Your Article" name="atag" id="atag" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    required
                                </div>
                            </div>
                            <div class="col-12">
                                <button style="float: right;" class="btn btn-primary" type="submit" name="submit">Post Article</button>
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
</body>

</html>