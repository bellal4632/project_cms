<?php
require "inc/connection.php";
require "inc/adminauth.php";
//update article
if (isset($_POST['update'])) {
  $id = $_POST['id'];

  $title = $_POST['atitle'];
  $icon = $_POST['icon'];

  $cupdate = "UPDATE categories SET name='$title', icon= '$icon' WHERE categories.id =  $id  limit 1";

  echo $cupdate;
  $conn->query($cupdate);



  if ($conn->affected_rows) {
    header("location: category-all.php");
  }
}

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $s = "SELECT * FROM `categories` where id='" . $id . "' limit 1;";
  $r = $conn->query($s);
  $row = $r->fetch_assoc();
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
                <div class="container-fluid">
                    <h1 class="my-1">Edit Category</h1> <hr>
                    

          <!-- content -->
          <form class="row g-3 needs-validation" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $id ?>">

            <div class="col-md-9">
              <div class="col-md-12">
                <label for="atitle" class="form-label">Title</label>
                <input type="text" class="form-control" name="atitle" id="atitle" value="<?= $row['name']; ?>">

              </div>

              <div class="col-md-12">
                <label for="atitle" class="form-label">Fontawesome Icon Tag</label>
                <input type="text" class="form-control" name="icon" id="icon" value='<?= $row['icon']; ?>' placeholder='"<?= $row['icon']; ?>"'>

              </div>
            </div>


            <div class="col-md-3">
              <h3>Present Icon Preview</h3>
              <div style=" display: flex; justify-content: center; align-items: center; height: 60%; ">
                <?= $row['icon']  ?>
              </div>

            </div>
            <hr>


            <div class="col-12">
              <button class="btn btn-outline-primary" type="submit" name="update">Update Icon</button>
            </div>
          </form>
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