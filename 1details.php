<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
else{
    exit;
}
require "inc/connection.php";
$q = "select articles.*, categories.name as catname from articles,categories where articles.active='1' and articles.id='".$id."' and articles.category_id=categories.id limit 1";
$r = $conn->query($q);
if($r->num_rows){}
else{echo "article not found!!"; exit;}
$r = $r->fetch_assoc();
?>
<?php require "frontinc/header.php"; ?>
<style>
  
</style>
</head>

<body>
  <div class="container">
    <!-- navbar -->
    <?php require "frontinc/navbar.php"; ?>
    <!-- navbar ends -->
    <!-- carousel -->
    <div id="carouselExampleCaptions" class="carousel slide mb-3">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="assets/banner/01.png" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>First slide label</h5>
            <p>Some representative placeholder content for the first slide.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="assets/banner/02.png" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Second slide label</h5>
            <p>Some representative placeholder content for the second slide.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="assets/banner/03.png" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Third slide label</h5>
            <p>Some representative placeholder content for the third slide.</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    <!-- carousel ends -->
    
    <!--  -->
    <div class="row">
      <div class="col-md-3">
      <?php require "inc/leftcategory.php"; ?>
      </div>
      <div class="col-md-9">
        <div class="row">
<!--  -->
<div class="container my-5">
  <div style="max-width: 700px; top: -80px;" class="mx-auto text-secondary">
    <div>
        <small>
          <a href="#" class="text-primary"><?= $r['catname'] ?></a>
          
      </small>
    </div>
    <h1 class="font-weight-bold text-dark"><?= $r['title'] ?></h1>
    <!-- <p class="my-2" style="line-height: 2;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p> -->
    
    <!-- <div class="my-3 d-flex align-items-center justify-content-between">
      <div class="d-flex align-items-center">
      <img src="https://avatars0.githubusercontent.com/u/39916324?s=460&u=602ca47fcce463981a2511a21148236f304ec934&v=4" style="width: 50px;"/>
      <small class="ml-2">
        <a href="#" class="text-primary d-block">Ahmad Sultani</a>
        <span>Aug 18</span>
      </small>
    </div> -->
      <div class="text-primary">
         <a href="/#" class="mx-1">
            <svg fill="currentColor" width="30px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule: evenodd; clip-rule: evenodd; stroke-linejoin: round; stroke-miterlimit: 2;">
               <path id="Twitter" d="M24,12c0,6.627 -5.373,12 -12,12c-6.627,0 -12,-5.373 -12,-12c0,-6.627
                  5.373,-12 12,-12c6.627,0 12,5.373 12,12Zm-6.465,-3.192c-0.379,0.168
                  -0.786,0.281 -1.213,0.333c0.436,-0.262 0.771,-0.676
                  0.929,-1.169c-0.408,0.242 -0.86,0.418 -1.341,0.513c-0.385,-0.411
                  -0.934,-0.667 -1.541,-0.667c-1.167,0 -2.112,0.945 -2.112,2.111c0,0.166
                  0.018,0.327 0.054,0.482c-1.754,-0.088 -3.31,-0.929
                  -4.352,-2.206c-0.181,0.311 -0.286,0.674 -0.286,1.061c0,0.733 0.373,1.379
                  0.94,1.757c-0.346,-0.01 -0.672,-0.106 -0.956,-0.264c-0.001,0.009
                  -0.001,0.018 -0.001,0.027c0,1.023 0.728,1.877 1.694,2.07c-0.177,0.049
                  -0.364,0.075 -0.556,0.075c-0.137,0 -0.269,-0.014 -0.397,-0.038c0.268,0.838
                  1.048,1.449 1.972,1.466c-0.723,0.566 -1.633,0.904 -2.622,0.904c-0.171,0
                  -0.339,-0.01 -0.504,-0.03c0.934,0.599 2.044,0.949 3.237,0.949c3.883,0
                  6.007,-3.217 6.007,-6.008c0,-0.091 -0.002,-0.183 -0.006,-0.273c0.413,-0.298
                  0.771,-0.67 1.054,-1.093Z"></path>
            </svg>
         </a>
         <a href="/#" class="w-6 mx-1">
            <svg fill="currentColor" width="30px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule: evenodd; clip-rule: evenodd; stroke-linejoin: round; stroke-miterlimit: 2;">
               <path id="Facebook" d="M24,12c0,6.627 -5.373,12 -12,12c-6.627,0 -12,-5.373 -12,-12c0,-6.627
                  5.373,-12 12,-12c6.627,0 12,5.373
                  12,12Zm-11.278,0l1.294,0l0.172,-1.617l-1.466,0l0.002,-0.808c0,-0.422
                  0.04,-0.648 0.646,-0.648l0.809,0l0,-1.616l-1.295,0c-1.555,0 -2.103,0.784
                  -2.103,2.102l0,0.97l-0.969,0l0,1.617l0.969,0l0,4.689l1.941,0l0,-4.689Z"></path>
            </svg>
         </a>
         <a href="/#" class="w-6 mx-1">
            <svg fill="currentColor" width="30px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule: evenodd; clip-rule: evenodd; stroke-linejoin: round; stroke-miterlimit: 2;">
               <path id="Shape" d="M7.3,0.9c1.5,-0.6 3.1,-0.9 4.7,-0.9c1.6,0 3.2,0.3 4.7,0.9c1.5,0.6 2.8,1.5
                  3.8,2.6c1,1.1 1.9,2.3 2.6,3.8c0.7,1.5 0.9,3 0.9,4.7c0,1.7 -0.3,3.2
                  -0.9,4.7c-0.6,1.5 -1.5,2.8 -2.6,3.8c-1.1,1 -2.3,1.9 -3.8,2.6c-1.5,0.7
                  -3.1,0.9 -4.7,0.9c-1.6,0 -3.2,-0.3 -4.7,-0.9c-1.5,-0.6 -2.8,-1.5
                  -3.8,-2.6c-1,-1.1 -1.9,-2.3 -2.6,-3.8c-0.7,-1.5 -0.9,-3.1 -0.9,-4.7c0,-1.6
                  0.3,-3.2 0.9,-4.7c0.6,-1.5 1.5,-2.8 2.6,-3.8c1.1,-1 2.3,-1.9
                  3.8,-2.6Zm-0.3,7.1c0.6,0 1.1,-0.2 1.5,-0.5c0.4,-0.3 0.5,-0.8 0.5,-1.3c0,-0.5
                  -0.2,-0.9 -0.6,-1.2c-0.4,-0.3 -0.8,-0.5 -1.4,-0.5c-0.6,0 -1.1,0.2
                  -1.4,0.5c-0.3,0.3 -0.6,0.7 -0.6,1.2c0,0.5 0.2,0.9 0.5,1.3c0.3,0.4 0.9,0.5
                  1.5,0.5Zm1.5,10l0,-8.5l-3,0l0,8.5l3,0Zm11,0l0,-4.5c0,-1.4 -0.3,-2.5
                  -0.9,-3.3c-0.6,-0.8 -1.5,-1.2 -2.6,-1.2c-0.6,0 -1.1,0.2 -1.5,0.5c-0.4,0.3
                  -0.8,0.8 -0.9,1.3l-0.1,-1.3l-3,0l0.1,2l0,6.5l3,0l0,-4.5c0,-0.6 0.1,-1.1
                  0.4,-1.5c0.3,-0.4 0.6,-0.5 1.1,-0.5c0.5,0 0.9,0.2 1.1,0.5c0.2,0.3 0.4,0.8
                  0.4,1.5l0,4.5l2.9,0Z"></path>
            </svg>
         </a>
      </div>
    </div>
    </div>
  <img class="w-100 my-3" src="assets/aimages/<?=$r['images'] ?>" />
  
  <div style="max-width: 700px; top: -80px;" class="mx-auto text-secondary">

<?= $r['description'] ?>

    
    <div class="my-3">
      <small>
        <?php
        $tagarr = explode(",",$r['tags']);
        if(count($tagarr)){
            foreach ($tagarr as $value) {
                echo '<a href="#" class="text-primary">#'.$value.'</a>';
            }            
        }
        ?>

      </small>
    </div>
    
  </div>
</div>
<!--  -->

<!-- comment -->
   <div class="app container py-4">
      <div class="col-md-10 col-lg-8 m-auto">
         <div class="bg-white rounded-3 shadow-sm p-4 mb-4">
         <?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']){
  if($_SESSION['role'] == "1" || $_SESSION['role'] == "2"){
?>
            <!-- New Comment //-->
            <div class="d-flex">
               <img class="rounded-circle me-3"
                    style="width:3rem;height:3rem;"
                    src="https://via.placeholder.com/128/fe669e/ffcbde.png?text=<?=$_SESSION['username'][0] ?>" />
               <div class="flex-grow-1">
                  <div class="hstack gap-2 mb-1">
                     <a href="#" class="fw-bold link-dark"><?= $_SESSION['username'] ?></a>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="hidden" name="aid" value="<?= $id ?>">
                     <textarea class="form-control w-100"
                               placeholder="Leave a comment here"
                               id="my-comment"
                               style="height:7rem;"></textarea>
                     <label for="my-comment">Leave a comment here</label>
                  </div>
                  <div class="hstack justify-content-end gap-2">
                     <button class="btn btn-sm btn-link link-secondary text-uppercase">cancel</button>
                     <button id="commentBtn" type="button" class="btn btn-sm btn-primary text-uppercase">comment</button>
                  </div>
               </div>
            </div>
            <?php }} else { ?>
    <h3>You have to <a href="login.php">login</a> to comment first, You can register from <a href="register.php">here</a></h3>
   <?php } ?>
         </div>
         <div class="bg-white rounded-3 shadow-sm p-4">
<?php
$comments = "select comments.*,users.name as name from comments,users where comments.article_id='".$id."' and comments.user_id= users.id order by comments.created_at";
// echo $comments;
$q = $conn->query($comments);
if($q->num_rows){
  $total = $q->num_rows;

?>
            <h4 class="mb-4"><?= $total; ?> Comments</h4>
<?php
while($row = $q->fetch_assoc()){
?>
            <!-- Comment #1 //-->
            <div class="">
               <div class="py-3">
                  <div class="d-flex comment">
                     <img class="rounded-circle comment-img"
                          src="https://via.placeholder.com/64/fe669e/ffcbde.png?text=<?=$row['name'][0] ?>" />
                     <div class="flex-grow-1 ms-3">
                        <div class="mb-1"><a href="#" class="fw-bold link-dark me-1"><?= $row['name']; ?></a> <span class="text-muted text-nowrap"><?= $row['created_at'] ?></span></div>
                        <div class="mb-2"><?= $row['comment'] ?></div>
                        <?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']){
  if($_SESSION['role'] == "2"){
?>
                        <a href="ajax/deletecomment.php?commentid=<?=$row['id'];?>" onclick="return confirm('Are you sure?')" class="link-danger small ms-3" href="#">DELETE</a>
                        <?php }} ?>
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
            <?php }} else{ echo "no comments yet";} ?>

         </div>
      </div>
   </div>
   <!-- comment end -->



   <!-- Testing //-->
   <div class="app-menu position-fixed bg-white shadow-sm border rounded p-2 vstack gap-2"
        style="bottom:15px;right:15px;">
      <button class="app-dl-mode btn btn-primary d-flex align-items-center justify-content-center"><i class="zmdi zmdi-sun"></i></button>
   </div>



<!-- comment ends -->
    </div>
    </div>

  </div>
  <!-- footer -->
  <?php require "inc/footer.php"; ?>
  <!-- footer ends -->
  </div>


  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <!-- <script src="assets/js/"></script> -->
  <script src="assets/js/jquery-3.6.3.min.js"></script>
  <script>
    $(document).ready(function () {
      $("#commentBtn").click(function(){
        let comment = $("#my-comment").val();
        if(comment.length < 10){ alert("comment must be at least 10 characters"); return; }

        $.post("ajax/addcomment.php",{
          action:"addcomment",
          id: <?= $id ?>,
          comment : comment,
          userid : <?= $_SESSION['userid'] ?> 
        },function(d){
          d = JSON.parse(d);
          if(d.done){
          alert(d.message);
          location.reload();
          }
          else{
            alert(d.message); 
          }

        })
      });
    });
  </script>
</body>

</html>