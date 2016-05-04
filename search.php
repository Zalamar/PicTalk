<?php
include 'Database.php';
session_start();
$userid = $_SESSION['userid'];
$search = $_GET['search'];

$data = mysql_query("SELECT userid,name,picture FROM users WHERE name LIKE '%$search%'");
if ($data) {
    while ($row = mysql_fetch_assoc($data)) {
        $searchId[] = $row['name'];
        $searchName[] = $row['name'];
        $searchPicture[] = $row['picture'];
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
                <td id="navbarsearch">
                    <form action="search.php"> 
                        <input  type="text" name="search"> 
                        <input  type="submit" value="Search"> 
                    </form> 
                </td>
                <?php
                echo "<td><a href='Profil.php?userid=$userid'>Profile</a></td>";
                ?>
                <td><a href="Following.php">Following</a></td>
                <td><a href="About.php">About</a></td>
                <td><a href="Settings.php">Settings</a></td>
                <td><a href="logout.php">Log Out</a></td>
            </table>
        </div>
        <div>
            <h1>Search Results</h1>
            <div class="users">
                <table>
                    <?php

                    function tdTemplate($picture, $followedid, $followedname) {
                        if (!$picture) {
                            $picture = "avatar.png";
                        }
                        return '<td>
                        <div>
                            <div>
                                <a href="Profil.php?userid=' . $followedid . '"><img src="' . $picture . '"></a>
                            </div>
                            <div>
                                <a href="Profil.php?userid=' . $followedid . '">' . $followedname . '</a>
                            </div>
                        </div>
                    </td>';
                    }

                    if (isset($searchId)) {
                        if ($searchId > 0) {

                            $searchIdCount = count($searchId);
                            $rows = floor($searchIdCount / 4);
                            $additionalRow = $searchIdCount % 4;

                            $p = 0;
                            if ($rows > 0) {
                                for ($i = 0; $i <= $rows - 1; $i++) {
                                    echo "<tr>";
                                    for ($o = 0; $o <= 3; $o++) {
                                        echo tdTemplate($searchPicture[$p], $searchId[$p], $searchName[$p]);
                                        $p++;
                                    }
                                    echo "</tr>";
                                }
                            }

                            if ($additionalRow > 0) {
                                echo "<tr>";
                                for ($o = 0; $o <= $additionalRow - 1; $o++) {
                                    echo tdTemplate($searchPicture[$p], $searchId[$p], $searchName[$p]);
                                    $p++;
                                }
                                echo "</tr>";
                            }
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>