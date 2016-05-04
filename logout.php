<?php
session_start();
session_unset();
function redirect($location) {
    header("Location: http://localhost/Pictalk/$location");
    die();
}
redirect("");
?>