<?php
include 'Database.php';
session_start();
$userid = $_SESSION['userid'];

if (!$_SESSION['login']) {
    header("Location: http://localhost/Pictalk");
    die();
}

$followIds = array();
$followData = mysql_query("SELECT follower,followed FROM follows WHERE follower = '$userid'");
if ($followData) {
    while ($row = mysql_fetch_assoc($followData)) {
        $followIds[] = $row['followed'];
    }
}

$followIdsCount = count($followIds);
$followIdsSql = "";
for ($x = 0; $x <= $followIdsCount - 1; $x++) {
    $followIdsSql = $followIdsSql . "userid = '" . $followIds[$x] . "' OR ";
}
$followIdsSql = substr($followIdsSql, 0, -4);

$userData = mysql_query("SELECT userid,name,picture FROM users WHERE $followIdsSql");
if ($userData) {
    while ($userRow = mysql_fetch_assoc($userData)) {
        $userNames[] = $userRow['name'];
        $userPictures[] = $userRow['picture'];
    }
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
        <div class="users">
            <table>
                <?php

                function tdTemplate($picture, $followedid, $followedname) {
                    if(!$picture) {
                        $picture = "avatar.png";
                    }
                    return '<td>
                        <div>
                            <div>
                                <a href="Profil.php?userid='. $followedid . '"><img src="' . $picture . '"></a>
                            </div>
                            <div>
                                <a href="Profil.php?userid='. $followedid . '">' . $followedname . '</a>
                            </div>
                        </div>
                    </td>';
                }

                $followIdsCount = count($followIds);
                $rows = floor($followIdsCount / 4);
                $additionalRow = $followIdsCount % 4;
                
                $p = 0;
                if ($rows > 0) {
                    for ($i = 0; $i <= $rows - 1; $i++) {
                        echo "<tr>";
                        for ($o = 0; $o <= 3; $o++) {
                            echo tdTemplate($userPictures[$p], $followIds[$p], $userNames[$p]);
                            $p++;
                        }
                        echo "</tr>";
                    }
                }
                
                if ($additionalRow > 0) {
                    echo "<tr>";
                    for ($o = 0; $o <= $additionalRow - 1; $o++) {
                            echo tdTemplate($userPictures[$p], $followIds[$p], $userNames[$p]);
                            $p++;
                        }
                    echo "</tr>";
                }
                
                ?>
            </table>
        </div>
    </body>
</html>
