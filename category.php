<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
require "inc/connection.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
else{
    exit;
}
$q = "select * from articles where active='1' and category_id='".$id."' order by created_at desc";
$r = $conn->query($q);

?>
<?php require "frontinc/header.php"; ?>
</head>

<body>
  <div class="container">
    <!-- navbar -->
    <?php require "frontinc/navbar.php"; ?>
    <!-- navbar ends -->
    <!-- carousel -->
    <?php require "frontinc/carousel.php"; ?>
    <!-- carousel ends -->
    <!--  -->
    <div class="row">
      
      <div class="col-md-9">
        <div class="row">
          <?php
          while ($row = $r->fetch_assoc()) {
          ?>
            <div class="card mb-3 col-md-4">
              <a style="text-decoration: none" href="details.php?id=<?= $row['id'] ?>">
                <img src="assets/aimages/<?= $row['images'] ?>" class="card-img-top" alt="<?= $row['title'] ?>">
                <div class="card-body">
                  <h5 class="card-title"><?= $row['title'] ?></h5>
                  <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
                  <p class="card-text">
                    <small class="text-muted">Last updated <?= $row['created_at']; ?></small>
                  </p>

                </div>
              </a>
            </div>
          <?php
          }
          ?>
        </div>
      </div>
      <div class="col-md-3">
      <?php require "inc/leftcategory.php"; ?>
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