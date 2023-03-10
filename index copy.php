<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
require "inc/connection.php";

?>



<?php require "frontinc/header.php"; ?>
</head>

<body>
  <div class="container-fluid bg-light">
    <?php require "frontinc/navbar.php"; ?>
    <div class="row mb-1">
      <?php require "frontinc/carousel.php"; ?>
    </div>


    <!--  -->
    <div class="row">
      <div class="col-md-9">
        <?php
        // database connection details

        // determine current page number
        if (isset($_GET['page'])) {
          $page = $_GET['page'];
        } else {
          $page = 1;
        }

        // set how many cards to display per page
        $cards_per_page = 15;

        // calculate the limit and offset values for the SQL query
        $limit = $cards_per_page;
        $offset = ($page - 1) * $cards_per_page;

        // create SQL query
        $sql = "SELECT * FROM articles ORDER BY `articles`.`id` DESC LIMIT $limit OFFSET $offset";
        $result = $conn->query($sql);

        // display cards
        echo '<div class="container">';
        echo '<div class="row">';
        while ($row = $result->fetch_assoc()) {
          echo '<div class="my-1 col-md-4 col-mb-3"">';
          echo '<div class="card">';
          echo '<img src="assets/aimages/'. $row['images'] .'" class="card-img-top" alt="'. $row['title'] .'">';
          echo '<div class="card-body" style="height:100px;">';          
          echo '<h5 class="card-title" >' . $row['title'] . '</h5>';
          echo '<p class="card-text">' . $row['created_at'] . '</p>';          
          echo '</div>';
          echo '<div class="card-footer text-center py-2">';
          echo '<div class="small ">';
          echo '<a style="text-decoration: none" href="details.php? '. $row['id'].' ">';
          echo '<b class="text-primary">Read More</b>';
          echo '</a>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
        }
        echo '</div>';
        echo '</div>';

        // create pagination links
        echo '<div class="container">';
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

      <div class="col-md-3">
        <?php require "inc/leftcategory.php"; ?>
      </div>

    </div>


  </div>

  <!-- footer -->
  <?php require "frontinc/footer.php"; ?>
  <!-- footer ends -->



  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <!-- <script src="assets/js/"></script> -->
</body>

</html>