<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
if (isset($_GET['id'])) {
  $id = $_GET['id'];
} else {
  exit;
}
require "inc/connection.php";
$q = "select articles.*, categories.name as catname, users.name as uname from articles,categories,users where articles.active='1' and articles.id='" . $id . "' and articles.category_id=categories.id and articles.user_id=users.id limit 1";
$r = $conn->query($q);
if ($r->num_rows) {
} else {
  echo "article not found!!";
  exit;
}
$r = $r->fetch_assoc();
?>
<?php require "frontinc/d.header.php"; ?>
<style>

</style>
</head>

<body>
  <div class="container-fluid">
    <!-- navbar -->
    <?php require "frontinc/navbar.php"; ?>
    <!-- navbar ends -->

    <!--  -->
    <div class="container-fluid">
    <div class="row mt-3">

      

<div class="col-md-9">
  <d<article>
  <!-- Post header-->
  <header class="mb-4">
    <!-- Post title-->
    <h1 class="font-weight-bold text-dark"><?= $r['title'] ?></h1>
    <!-- Post meta content-->
    <div class="text-muted fst-italic mb-2">Posted on <?= $r['created_at'] ?></div>
    
    <!-- Post categories-->          
    <a class="badge bg-secondary text-decoration-none link-light" href="category.php?id=<?= $r['category_id'] ?>"><?= $r['catname'] ?></a>
  </header>
  <!-- Preview image figure-->
  <figure class="mb-4"><img style="width: 100%;" class="img-fluid rounded" src="assets/aimages/<?= $r['images'] ?>" alt="..." /><small>Posted By: <b> <?= $r['uname'] ?> </b></small></figure>
  <!-- Post Publisher -->
  
  <!-- Post content-->
  <section  class="mb-5">
    <p style="font-size: 15px;"> <?= $r['description'] ?></p>
 
    <div  class="my-3">
        <small>Tags:
          <?php
          $tagarr = explode(",", $r['tags']);
          if (count($tagarr)) {
            foreach ($tagarr as $value) {
              echo '<a style="text-decoration: none" href="#" class="text-primary">#' . $value . '</a>';
            }
          }
          ?>

        </small>
      </div>
  </section>
</article>
  <!--  -->

  <!-- comment -->
  <div style="width: 100%;" class="app container py-4">
    <div class="col-md-10 col-lg-10 m-auto">
      <div class="bg-white rounded-3 shadow-sm p-4 mb-4">
        <?php
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
          if ($_SESSION['role'] == "1" || $_SESSION['role'] == "2") {
        ?>
            <!-- New Comment //-->
            <div class="d-flex">
              <img class="rounded-circle me-3" style="width:3rem;height:3rem;" src="https://via.placeholder.com/128/fe669e/ffcbde.png?text=<?= $_SESSION['username'][0] ?>" />
              <div class="flex-grow-1">
                <div class="hstack gap-2 mb-1">
                  <a href="#" class="fw-bold link-dark"><?= $_SESSION['username'] ?></a>
                </div>
                <div class="form-floating mb-3">
                  <input type="hidden" name="aid" value="<?= $id ?>">
                  <textarea class="form-control w-100" placeholder="Leave a comment here" id="my-comment" style="height:7rem;"></textarea>
                  <label for="my-comment">Leave a comment here</label>
                </div>
                <div class="hstack justify-content-end gap-2">
                  <button class="btn btn-sm btn-link link-secondary text-uppercase">cancel</button>
                  <button id="commentBtn" type="button" class="btn btn-sm btn-primary text-uppercase">comment</button>
                </div>
              </div>
            </div>
          <?php }
        } else { ?>
          <h3>You have to <a href="login.php">login</a> to comment first, You can register from <a href="register.php">here</a></h3>
        <?php } ?>
      </div>
      <div class="bg-white rounded-3 shadow-sm p-4">
        <?php
        $comments = "select comments.*,users.name as name from comments,users where comments.article_id='" . $id . "' and comments.user_id= users.id order by comments.created_at";
        // echo $comments;
        $q = $conn->query($comments);
        if ($q->num_rows) {
          $total = $q->num_rows;

        ?>
          <h4 class="mb-4"><?= $total; ?> Comments</h4>
          <?php
          while ($row = $q->fetch_assoc()) {
          ?>
            <!-- Comment #1 //-->
            <div class="">
              <div class="py-3">
                <div class="d-flex comment">
                  <img class="rounded-circle comment-img" src="https://via.placeholder.com/64/fe669e/ffcbde.png?text=<?= $row['name'][0] ?>" />
                  <div class="flex-grow-1 ms-3">
                    <div class="mb-1"><a href="#" class="fw-bold link-dark me-1"><?= $row['name']; ?></a> <span class="text-muted text-nowrap"><?= $row['created_at'] ?></span></div>
                    <div class="mb-2"><?= $row['comment'] ?></div>
                    <?php
                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
                      if ($_SESSION['role'] == "2") {
                    ?>
                        <a href="ajax/deletecomment.php?commentid=<?= $row['id']; ?>" onclick="return confirm('Are you sure?')" class="link-danger small ms-3" href="#">DELETE</a>
                    <?php }
                    } ?>
                    <!-- <div class="hstack align-items-center mb-2">
                     <a class="link-primary me-2" href="#"><i class="zmdi zmdi-thumb-up"></i></a>
                     <span class="me-3 small">55</span>
                     <a class="link-secondary me-4" href="#"><i class="zmdi zmdi-thumb-down"></i></a>
                     <a class="link-secondary small" href="#">REPLY</a>
                     <a class="link-danger small ms-3" href="#">DELETE</a>
                  </div>
                  <a class="fw-bold d-flex align-items-center" href="#">
                     <i class="zmdi zmdi-chevron-down fs-4 me-3"></i>
                     <span>Hide Replies</span>
                  </a> -->
                  </div>
                </div>
              </div>



            </div>
        <?php }
        } else {
          echo "no comments yet";
        } ?>

      </div>
    </div>
  </div>
  <!-- comment end -->



  <!-- Testing //-->
  <!-- <div class="app-menu position-fixed bg-white shadow-sm border rounded p-2 vstack gap-2" style="bottom:15px;right:15px;">
    <button class="app-dl-mode btn btn-primary d-flex align-items-center justify-content-center"><i class="zmdi zmdi-sun"></i></button>
  </div> -->



  <!-- comment ends -->
</div>
<div class="col-md-3">
  <?php require "inc/leftcategory.php"; ?>
</div>
</div>
    </div>
    


  </div>

  </div>
  <!-- footer -->
  <?php require "frontinc/footer.php"; ?>
  <!-- footer ends -->
  </div>


  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <!-- <script src="assets/js/"></script> -->
  <script src="assets/js/jquery-3.6.3.min.js"></script>
  <script>
    $(document).ready(function() {
      $("#commentBtn").click(function() {
        let comment = $("#my-comment").val();
        if (comment.length < 10) {
          alert("comment must be at least 10 characters");
          return;
        }

        $.post("ajax/addcomment.php", {
          action: "addcomment",
          id: <?= $id ?>,
          comment: comment,
          userid: <?= $_SESSION['userid'] ?>
        }, function(d) {
          d = JSON.parse(d);
          if (d.done) {
            alert(d.message);
            location.reload();
          } else {
            alert(d.message);
          }

        })
      });
    });
  </script>
</body>

</html>