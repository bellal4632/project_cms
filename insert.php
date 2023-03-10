<?php

$conn = new mysqli("localhost","root","","web4cms");

// check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$title1 = $conn->escape_string($_POST['title1']);
$title2 = $conn->escape_string($_POST['title2']);
$title3 = $conn->escape_string($_POST['title3']);

// upload images to "Assets" folder

$image1 =null;
if (isset($_FILES['image1'])) {
    $im1 = $_FILES['image1'];
    $image1 = uniqid() . ".png";
    move_uploaded_file($_FILES['image1']['tmp_name'], 'assets/carousel/' . $image1); 
}
$image2 = null;
if (isset($_FILES['image2'])) {
    $im2 = $_FILES['image2'];
    $image2 = uniqid() . ".png";
    move_uploaded_file($_FILES['image2']['tmp_name'], 'assets/carousel/' . $image2); 
}

$image3 = null;
if (isset($_FILES['image3'])) {
    $im3 = $_FILES['image3'];
    $image3 = uniqid() . ".png";
    move_uploaded_file($_FILES['image3']['tmp_name'], 'assets/carousel/' . $image3);
}


// insert title & image paths into database
$sql = "INSERT INTO carousel (title_1, image_1, title_2, image_2, title_3, image_3) VALUES ('$title1', '$image1', '$title2', '$image2', '$title3', '$image3')";
if ($conn->query($sql) === TRUE) {
	header("location:carousel-list.php");
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
