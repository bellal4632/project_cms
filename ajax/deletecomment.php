<?php
ini_set('display_errors', 1);
require "../inc/adminauth.php";
if(isset($_GET['commentid'])){
    require "../inc/connection.php";
    $id = $_GET['commentid'];
    $q = "delete from comments where id='".$id."' limit 1";
    // $ref = $_SERVER['HTTP_REFERER'];
    // echo $ref."\n";
    // exit;
    $conn->query($q);
    if($conn->affected_rows){
       echo "<h1>comment deleted successfully.</h1><a href='../index.php'>Home<a> ";
    }

}
?>