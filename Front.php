<?php
include 'Database.php';
session_start();

if (!$_SESSION['login']) {
    header("Location: http://localhost/Pictalk");
    die();
}

$name = $_SESSION['name'];
$userid = $_SESSION['userid'];

$followIds = array();

$followData = mysql_query("SELECT * FROM follows WHERE follower = '$userid'");
if ($followData) {
    while ($row = mysql_fetch_assoc($followData)) {
        $followIds[] = $row['followed'];
    }
}

$followIdsCount = count($followIds);
$followIdsSql = "userid = '$userid' OR ";
for ($x = 0; $x <= $followIdsCount - 1; $x++) {
    $followIdsSql = $followIdsSql . "userid = '" . $followIds[$x] . "' OR ";
}
$followIdsSql = substr($followIdsSql, 0, -4);

function changeComment($comment) {
    if ($comment)
        return '<img src="' . $comment . '">';
}

function changeCommentPoster($commentPoster, $commentPosterId) {
    if ($commentPoster)
        return 'Posted by: <a href="Profil.php?userid=' . $commentPosterId . '">' . $commentPoster . '</a>';
}

function postTemplate($postid, $picture, $description, $posterId, $poster, $comment1, $commentPoster1, $commentPosterId1, $comment2, $commentPoster2, $commentPosterId2, $comment3, $commentPoster3, $commentPosterId3) {
    $comment1 = changeComment($comment1);
    $commentPoster1 = changeCommentPoster($commentPoster1, $commentPosterId1);
    $comment2 = changeComment($comment2);
    $commentPoster2 = changeCommentPoster($commentPoster2, $commentPosterId2);
    $comment3 = changeComment($comment3);
    $commentPoster3 = changeCommentPoster($commentPoster3, $commentPosterId3);
    $postTemplate = '<div class="postblock">
                <div class="post">
                    <img src="' . $picture . '">
                    <p>' . $description . '</p>
                    <p>Posted by: <a href="Profil.php?userid=' . $posterId . '">' . $poster . '</a></p>
                </div>
                <div class="comment">
                    <table>
                        <tr>
                            <td>
                                ' . $comment1 . '<br>
                                ' . $commentPoster1 . '
                            </td>
                            <td>
                                ' . $comment2 . '<br>
                                ' . $commentPoster2 . '
                            </td>
                            <td>
                                ' . $comment3 . '<br>
                                ' . $commentPoster3 . '
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="addcomment">
                    <form method="post" action="uploadcomment.php" enctype="multipart/form-data">
                        <p>New comment:</p>
                        <input type="hidden" name="postid" value="' . $postid . '"> 
                        <input type="file" name="pic">
                        <input type="submit" value="Submit">
                    </form> 
                </div>
            </div>';
    return $postTemplate;
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
                    <form  method="post" action="search.php?go"> 
                        <input  type="text" name="name"> 
                        <input  type="submit" name="submit" value="Search"> 
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
        <h1><?php echo $name ?>'s feed</h1>
        <div class="post">
            <form method="post" action="upload.php" enctype="multipart/form-data">
                <input type="file" name="pic" id="pic">
                <p>Description:</p>
                <textarea name="description" cols="40" rows="5"></textarea><br>
                <input type="submit" value="Submit">
            </form> 
            <?php
// Giver en række mulige fejl fra upload.php
            if (isset($_GET['err'])) {
                if ($_GET['err'] == 1) {
                    echo "<p>Error: File is not an image.</p>";
                } elseif ($_GET['err'] == 2) {
                    echo "<p>Error: File already exists, please change name.</p>";
                } elseif ($_GET['err'] == 3) {
                    echo "<p>Error: File is too large.</p>";
                } elseif ($_GET['err'] == 4) {
                    echo "<p>Error: Please use filetype jpg, png, jpeg or gif.</p>";
                } elseif ($_GET['err'] == 5) {
                    echo "<p>Error: An unknown error has occured.</p>";
                }
            }
            ?>
        </div>
        <?php
        $data = mysql_query("SELECT * FROM posts WHERE $followIdsSql ORDER BY postid DESC");
        if ($data) {
            while ($row = mysql_fetch_assoc($data)) {

                $postid = $row['postid'];
                $picture = $row['picture'];
                $description = $row['description'];

                $posterId = $row['userid'];
                $userData = mysql_query("SELECT userid,name FROM users WHERE userid = '$posterId'");
                if ($userData) {
                    $userRow = mysql_fetch_assoc($userData);
                    $poster = $userRow['name'];
                }

                $commentNumber = 0;
                $commentData = mysql_query("SELECT * FROM comments WHERE postid = '$postid' ORDER BY commentid DESC LIMIT 3");
                if ($commentData) {
                    while ($commentRow = mysql_fetch_assoc($commentData)) {
                        $commentNumber++;
                        $comment[$commentNumber] = $commentRow['picture'];

                        $commentPosterIdTemp = $commentRow['userid'];
                        $commentPosterId[$commentNumber] = $commentPosterIdTemp;
                        $commentPosterData = mysql_query("SELECT userid,name FROM users WHERE userid = '$commentPosterIdTemp'");
                        if ($commentPosterData) {
                            $commentPosterRow = mysql_fetch_assoc($commentPosterData);
                            $commentPoster[$commentNumber] = $commentPosterRow['name'];
                        }
                    }
                }
                if (!isset($comment[1])) {
                    $comment[1] = false;
                    $commentPoster[1] = false;
                    $commentPosterId[1] = false;
                }
                if (!isset($comment[2])) {
                    $comment[2] = false;
                    $commentPoster[2] = false;
                    $commentPosterId[2] = false;
                }
                if (!isset($comment[3])) {
                    $comment[3] = false;
                    $commentPoster[3] = false;
                    $commentPosterId[3] = false;
                }
                echo postTemplate($postid, $picture, $description, $posterId, $poster, $comment[1], $commentPoster[1], $commentPosterId[1], $comment[2], $commentPoster[2], $commentPosterId[2], $comment[3], $commentPoster[3], $commentPosterId[3]);

                unset($comment);
                unset($commentPoster);
                unset($commentPosterId);
            }
        }
        ?>
    </body>
</html>