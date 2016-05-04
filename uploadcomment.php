<?php
session_start();
include('database.php');
$userid = $_SESSION['userid'];
$postid = $_POST['postid'];

function redirect($location) {
    header("Location: http://localhost/Pictalk/$location");
    die();
}

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["pic"]["name"]);
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["pic"]["tmp_name"]);
    if($check) {
        redirect("Front.php?err=1");
    }
}

if (file_exists($target_file)) {
    redirect("Front.php?err=2");
}

if ($_FILES["pic"]["size"] > 500000) {
    redirect("Front.php?err=3");
}

if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
    redirect("Front.php?err=4");
}

if (move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)) {
    $data = mysql_query("INSERT INTO comments (picture, userid, postid) VALUES ('$target_file', '$userid', '$postid') ");
    redirect("Front.php");
} else {
    redirect("Front.php?err=5");
}

?> 