<?php
include 'Database.php';

function redirect($location) {
    header("Location: http://localhost/Pictalk/$location");
    die();
}

$name = $_POST['name'];
$username = $_POST['username'];
$password = md5($_POST['password']);

$sql = "INSERT INTO users (name, username, password) VALUES ('$name', '$username', '$password')";
$result = mysql_query($sql);

redirect("index.php");
?>