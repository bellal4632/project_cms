<?php
require "../inc/connection.php";
if(isset($_POST['action'])){
    $articleid = $_POST['id'];
    $comment = $conn->escape_string($_POST['comment']);
    $user = $_POST['userid'];
    $q = "insert into comments values(null,'".$articleid."','".$user."','".$comment."',null,null)";
    $fh =fopen("sql.txt", "a");
    fwrite($fh,$q."\n");
    fclose($fh);
    $qr = $conn->query($q);
    if($conn->affected_rows){
        echo json_encode(['done'=>true,'message'=>"comments added"]);
    }
    else{
        echo json_encode(['done'=>false,'message'=>"Error!!"]);
    }
}