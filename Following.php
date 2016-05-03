<?php
session_start();
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Homepage </title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body style="background-color:lightgrey;">
        <div id="header">
            <a href="Front.php">
                <img src="Pictalklogo.png" style="width:175px;height:150px;"> 
            </a>
        </div>
        <?php
        echo "Today is " . date("l-d-m-y") . "<br>";
        ?>     
        <style>
            table {
                border: 1px solid black;
                border-collapse: collapse;
            }
            th, td {
                padding: 20px;
            }
        </style>
        <div style="background-color:whitesmoke;"id='Sign-In'><fieldset style='width:99,5%'> 
                <table width=100%>  
                    <div>
                            <?php
                            echo "<td><CENTER><button><a href='Profil.php?username=$username'>PROFILE</a></button></button></CENTER></td>";
                            ?>
                        <td><CENTER><button><a href="Following.php">FOLLOWING</a></button></button></CENTER></td>
                        <td><CENTER><button><a href="About.php">ABOUT</a></button></CENTER></td>
                        <td><CENTER><button><a href="Settings.php">SETTINGS</a></button></button></CENTER></td>
                    </div>
                </table>
 

