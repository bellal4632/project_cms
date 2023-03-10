<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
require "inc/connection.php";

// determine current page number
if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = 1;
}

// set how many cards to display per page
$cards_per_page = 9;

// calculate the limit and offset values for the SQL query
$limit = $cards_per_page;
$offset = ($page - 1) * $cards_per_page;


$q = "select * from articles where active='1' ORDER BY `articles`.`id` DESC LIMIT $limit OFFSET $offset";
$r = $conn->query($q);

?>

<?php require "frontinc/header.php"; ?>
</head>

<body class="bg-light">
  <div class="container-fluid bg-secondary">
    <?php require "frontinc/navbar.php"; ?>
    <div class="row">
      <?php require "frontinc/carousel.php"; ?>
    </div>


    <!--  -->
    <div class="container-fluid bg-light">
      <div class="row">

        <div class="col-md-9">

          <div class="row my-2">
            <?php
            while ($row = $r->fetch_assoc()) {
            ?>
              <div class="my-1 col-md-4 col-mb-3">
                <div class="card">
                  <img src="assets/aimages/<?= $row['images'] ?>" class="card-img-top" alt="<?= $row['title'] ?>">
                  <div class="card-body" style="height:120px;">
                    <h5 class="card-title"><?= $row['title'] ?></h5>
                    <p style="float:inline-end;" class="card-text">
                    <small class="text-muted">Post By: <?= $row['created_at']; ?></small>
                  </p>

                  </div>
                  <div class="card-footer text-center ">
                    <div style="float:right;" class="small ">
                      <a style="text-decoration: none;" href="details.php?id=<?= $row['id'] ?>">
                        <b class="text-primary">Read More</b>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            <?php
            }
            ?>
          </div>

          <!-- // create pagination links -->
          <?php
          echo '<div class="container my-2">';
          echo '<ul class="pagination justify-content-center">';
          $pages = ceil($conn->query("SELECT COUNT(*) FROM articles")->fetch_row()[0] / $cards_per_page);
          for ($i = 1; $i <= $pages; $i++) {
            echo '<li class="page-item';
            if ($i == $page) {
              echo ' active';
            }
            echo '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
          }
          echo '</ul>';
          echo '</div>';
          ?>
        </div>


        <div class="col-md-3 my-2">
          <?php require "inc/leftcategory.php"; ?>
        </div>
      </div>
    </div>


    <!-- footer -->
    <?php require "frontinc/footer.php"; ?>
    <!-- footer ends -->
  </div>


  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <!-- <script src="assets/js/"></script> -->
</body>

</html>