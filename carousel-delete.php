<?php
    // Connect to database
    $conn = mysqli_connect("localhost", "root", "", "web4cms");

    // Check if id is present in query string
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Delete item from carousel table
        $query = "DELETE FROM carousel WHERE id = $id";
        $result = mysqli_query($conn, $query);

        // Check if delete was successful
        if ($result) {
            // Success message
            echo "<script>alert('Item deleted successfully!'); window.location.href='carousel-list.php';</script>";
        } else {
            // Error message
            echo "<script>alert('Error deleting item!'); window.location.href='carousel-list.php';</script>";
        }
    } else {
        // Error message
        echo "<script>alert('Invalid item id!'); window.location.href='carousel-list.php';</script>";
    }
?>
