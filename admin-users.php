<?php

require "inc/connection.php";
require "inc/adminauth.php";
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

                    <div class="container-fluid">
                        <table class="table  table-bordered table-striped table align-middle table-success table-hover">
                            <thead style="text-align: center;" class="table-light">
                                <tr>
                                    <th class="col-md-2">Name</th>
                                    <th class="col-md-2">Username</th>
                                    <th class="col-md-3">Email</th>
                                    <th class="col-md-2">Role</th>
                                    <th class="col-md-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Connect to your database
                                require "inc/connection.php";

                                // Query to get the total number of rows
                                $result = mysqli_query($conn, "SELECT COUNT(*) AS total_rows FROM users");

                                // Get the total number of rows
                                $row = mysqli_fetch_assoc($result);
                                $total_rows = $row['total_rows'];

                                // Calculate the total number of pages
                                $total_pages = ceil($total_rows / 7);

                                // Get the current page from the URL
                                $page = isset($_GET['page']) ? $_GET['page'] : 1;

                                // Calculate the offset for the current page
                                $offset = ($page - 1) * 7;

                                // Query your database to get the rows for the current page
                                $result = mysqli_query($conn, "select * from users order by role desc LIMIT 7 OFFSET $offset");

                                // Loop through the rows and display them in the table
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr style='text-align: center;'>";
                                    echo "<td>" . $row['name'] . "</td>";
                                    echo "<td>" . $row['username'] . "</td>";
                                    echo "<td>" . $row['email'] . "</td>";

                                    switch ($row["role"]) {
                                        case 1:
                                            echo "<td>Publisher</td>";
                                            break;
                                        case 2:
                                            echo "<td>Moderator</td>";
                                            break;
                                        case 3:
                                            echo "<td><b>Admin</b></td>";
                                            break;
                                            default :
                                            echo "<td>".$row["role"]."</td>";
                                    }


                                    echo "<td>        
                            <a style='width: 100px;' class='btn btn-info btn-sm mx-2' href='user-edit.php?id=" . $row['id'] . "' role='button'><i class='fas fa-edit px-2'></i>Edit</a>

                            <a style='width: 100px;' class='btn btn-danger btn-sm mx-2' href='article-delete.php?id=" . $row['id'] . "' onclick=\"return confirm('Your Article Will Be DELETED. Press Ok to Confirm')\" role='button'><i class='fas fa-trash px-2'></i>Delete</a>
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
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="assets/js/datatables-simple-demo.js"></script>
</body>

</html>