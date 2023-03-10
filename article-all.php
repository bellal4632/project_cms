<?php
require "inc/connection.php";
require "inc/adminauth.php";


$q = "select articles.*,categories.name as catname,users.name as username, post_s.name as active from articles,categories,users,post_s where articles.category_id = categories.id and articles.user_id = users.id and articles.active = post_s.id order by created_at desc";



$a = $conn->query($q);
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
                    <h1 class="my-1">All Users</h1>
                    <hr>

                    <!-- content -->

                    <div class="container">
                        <table class="table table-bordered table-striped table align-middle table-success table-hover">
                            <thead style="text-align: center;" class="table-light">
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Category</th>
                                    <th>Active Status</th>
                                    <th>User Name</th>
                                    <th>Create time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Connect to your database
                                require "inc/connection.php";

                                // Query to get the total number of rows
                                $result = mysqli_query($conn, "SELECT COUNT(*) AS total_rows FROM articles");

                                // Get the total number of rows
                                $row = mysqli_fetch_assoc($result);
                                $total_rows = $row['total_rows'];

                                // Calculate the total number of pages
                                $total_pages = ceil($total_rows / 10);

                                // Get the current page from the URL
                                $page = isset($_GET['page']) ? $_GET['page'] : 1;

                                // Calculate the offset for the current page
                                $offset = ($page - 1) * 10;

                                // Query your database to get the rows for the current page
                                $result = mysqli_query($conn, "select articles.*,categories.name as catname,users.name as username from articles,categories,users where articles.category_id = categories.id and articles.user_id = users.id order by created_at desc LIMIT 10 OFFSET $offset");

                                // Loop through the rows and display them in the table
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr style='text-align: center;'>";
                                    echo "<td>" . $row['title'] . "</td>";

                                    echo "<td> <div style=' text-align:justify; background-color: #B0C4DE; width:200px; height: 250px; overflow: auto;' class='form-control'>" . $row['description'] . "</div></td>";

                                    echo "<td> <img width='120px' src='assets/aimages/" . $row['images'] . "'/></td>";

                                    echo "<td>" . $row['catname'] . "</td>";

                                    // echo "<td> <a style='width:115px;' class='btn btn-success btn-sm' href='article-active.php?id=" . $row['id'] . "' onclick=\"return confirm('Your Article Will Be PUBLISED. Press Ok to Confirm')\" role='button'><i class='fa-sharp fa-solid fa-cloud-arrow-up px-2'></i>Publish</a>"


                                    

                                    switch ($row["active"]) {
                                        case 1:
                                            echo "<td>Publish</td>";
                                            break;
                                        case 0:
                                            echo "<td>Unpublish</td>";
                                            break;
                                       
                                            default :
                                            echo "<td>".$row["active"]."</td>";
                                    }
                            

                                    
                            
                                    // "<a style='width:115px;' class='btn btn-secondary btn-sm' href='article-inactive.php?id=" . $row['id'] . "' onclick=\"return confirm('Your Article Will Be UNPUBLISED. Press Ok to Confirm')\" role='button'><i class='fas fa-archive px-2'></i>Unpublish</a>
                            
                                    // </td>";
                                    echo "<td>" . $row['username'] . "</td>";

                                    echo "<td>" . $row['created_at'] . "</td>";

                                    echo "<td>
        
                            <a style='width:100px;' class='btn btn-info btn-sm my-1 mx-1' href='article-edit.php?id=" . $row['id'] . "' role='button'><i class='fas fa-edit px-2'></i>Edit</a>
                            
                            <a style='width:100px;' class='btn btn-danger btn-sm my-1 mx-1' href='article-delete.php?id=" . $row['id'] . "' onclick=\"return confirm('Your Article Will Be DELETED. Press Ok to Confirm')\" role='button'><i class='fas fa-trash px-2'></i>Delete</a>

                                    </td>";
                                    echo "</tr>";
                                }

                                // Close the database connection
                                mysqli_close($conn);
                                ?>
                            </tbody>
                            
                        </table>
                        <div class="d-flex justify-content-center">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <?php
                                    // Display the pagination links
                                    for ($i = 1; $i <= $total_pages; $i++) {
                                        echo "<li class='page-item " . ($page == $i ? 'active' : '') . "'><a class='page-link' href='?page=$i'>$i</a></li>";
                                    }
                                    ?>
                                </ul>
                            </nav>
                        </div>
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
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html>