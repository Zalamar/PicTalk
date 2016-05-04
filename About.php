<?php
session_start();
$userid = $_SESSION['userid'];

if (!$_SESSION['login']) {
    header("Location: http://localhost/Pictalk");
    die();
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Homepage </title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="header">
            <a href="Front.php">
                <img src="Pictalklogo.png"> 
            </a>
        </div>
        <div class="navbar"> 
            <table width=100%>  
                <?php
                echo "<td><a href='Profil.php?userid=$userid'>Profile</a></td>";
                ?>
                <td><a href="Following.php">Following</a></td>
                <td><a href="About.php">About</a></td>
                <td><a href="Settings.php">Settings</a></td>
                <td><a href="logout.php">Log Out</a></td>
            </table>
        </div>
        <div class="text">
            The website PicTalk is a school project<br>
            Made by 3 highschool students<br>
            Named - Thor Bjørn gabe, Tobias Rydberg and Victor Mtsimbe Norrild.<br>
            It was made for our finals in a class<br>
            called "Information Technologi".<br>
            It was required that it held <br>
            a image file, a login system, a database, tables, list, logos/self made vidoes og other things.<br>
            <br>
            The project is to delivered on the 24th of April.<br>
            On our schools platform. <br>
            <table>
                <tr>
                    <td>
                        <img src="itguy1.jpg">
                    </td>
                    <td>
                        <img src="itguy2.jpg">
                    </td>
                    <td>
                        <img src="itguy3.jpg">
                    </td>
                </tr>
            </table>
        </div>

    </body>
</html>