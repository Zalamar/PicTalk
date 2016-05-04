<?php
include 'Database.php';
session_start();
$userid = $_SESSION['userid'];

if (!$_SESSION['login']) {
    header("Location: http://localhost/Pictalk");
    die();
}

$data = mysql_query("SELECT name,age,phone,gender FROM users WHERE userid = '$userid'");
if ($data) {
    $row = mysql_fetch_assoc($data);
    $userName = $row['name'];
    $userAge = $row['age'];
    $userPhone = $row['phone'];
    $userGender = $row['gender'];
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
        <div class="settings">
            <h1>Change your information:</h1>
            <p>Change picture:</p>
            <form method="post" action="changesettings.php" enctype="multipart/form-data">
                <input type="file" name="pic">
                <p>Change name:</p>
                <input type="text" name="name" placeholder="<?php echo $userName ?>">
                <p>Change password:</p>
                <input type="password" name="password" placeholder="password">
                <p>Change age:</p>
                <input type="text" name="age" placeholder="<?php echo $userAge ?>">
                <p>Change phone number:</p>
                <input type="text" name="phone" placeholder="<?php echo $userPhone ?>">
                <p>Change gender:</p>
                <input type="text" name="gender" placeholder="<?php if($userGender) echo "female"; else echo "male"; ?>">
                <br><input type="submit" value="Submit" style="margin-top: 20px;">
            </form> 
        </div>
    </body>
</html>