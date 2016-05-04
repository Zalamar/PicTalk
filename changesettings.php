<?php

session_start();
include('database.php');
$userid = $_SESSION['userid'];

function redirect($location) {
    header("Location: http://localhost/Pictalk/$location");
    die();
}

if ($_POST['name'] != null) {
    $name = $_POST['name'];
    $sql = "UPDATE users SET name='$name' WHERE userid = '$userid'";
    $result = mysql_query($sql);
    $_SESSION['name'] = $name;
}

if ($_POST['password'] != null) {
    $password = md5($_POST['password']);
    $sql = "UPDATE users SET password='$password' WHERE userid = '$userid'";
    $result = mysql_query($sql);
}

if ($_POST['age'] != null) {
    $age = $_POST['age'];
    $sql = "UPDATE users SET age='$age' WHERE userid = '$userid'";
    $result = mysql_query($sql);
}

if ($_POST['phone'] != null) {
    $phone = $_POST['phone'];
    $sql = "UPDATE users SET phone='$phone' WHERE userid = '$userid'";
    $result = mysql_query($sql);
}

if ($_POST['gender'] != null) {
    if ($_POST['gender'] == "male")
        $gender = 0;
    elseif ($_POST['gender'] == "female")
        $gender = 1;
    else
        redirect("Profil.php");
    $sql = "UPDATE users SET gender = '$gender' WHERE userid = '$userid'";
    $result = mysql_query($sql);
}

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["pic"]["name"]);
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

if ($_FILES["pic"]["name"] != null) {
    if (file_exists($target_file)) {
        redirect("Profil.php");
    }

    if ($_FILES["pic"]["size"] > 500000) {
        redirect("Profil.php");
    }

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        redirect("Profil.php");
    }

    if (move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)) {
        $data = mysql_query("UPDATE users SET picture = '$target_file' WHERE userid = '$userid'");
        redirect("Profil.php");
    } else {
        redirect("Profil.php");
    }
}
redirect("Profil.php");
?>