<?php
session_start();
include('database.php');
$userid = $_SESSION['userid'];
$name = $_SESSION['name'];

if (!$_SESSION['login']) {
    header("Location: http://localhost/Pictalk");
    die();
}

function redirect($location) {
    header("Location: http://localhost/Pictalk/$location");
    die();
}

$data = mysql_query("SELECT * FROM users WHERE userid = '$userid'");
if ($data) {
    if (mysql_num_rows($data) == 1) {
        $row = mysql_fetch_assoc($data);
        $name = $row['name'];
        $age = $row['age'];
        $phone = $row['phone'];
        $gender = $row['gender'];
        $picture = $row['picture'];
    } else {
        redirect("error.php?profile");
    }
} else {
    redirect("error.php?profile");
}

$followers = mysql_query("SELECT * FROM follows WHERE followed = '$userid'");
$count = mysql_num_rows($followers);

function changeComment($comment) {
    if ($comment)
        return '<img src="' . $comment . '">';
}

function changeCommentPoster($commentPoster, $commentPosterId) {
    if ($commentPoster)
        return 'Posted by: <a href="Profil.php?userid=' . $commentPosterId . '">' . $commentPoster . '</a>';
}

function postTemplate($userid, $name, $postid, $picture, $description, $comment1, $commentPoster1, $commentPosterId1, $comment2, $commentPoster2, $commentPosterId2, $comment3, $commentPoster3, $commentPosterId3) {
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
                    <p>Posted by: <a href="Profil.php?userid=' . $userid . '">' . $name . '</a></p>
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
                <?php
                echo "<td><a href='Profil.php?userid=$userid'>Profile</a></td>";
                ?>
                <td><a href="Following.php">Following</a></td>
                <td><a href="About.php">About</a></td>
                <td><a href="Settings.php">Settings</a></td>
                <td><a href="logout.php">Log Out</a></td>
            </table>
        </div>
        <div class="picture">
            <img src="<?php if($picture != null) echo $picture; else echo "avatar.png" ?>">
        </div>
        <div class="name">
            <h2><?php echo $name ?></h2>
        </div>
        <div>
            <table>
                <tr>
                    <td id="profilel">
                        <div class="profiletext">
                            <div>
                                <p>Age - 
                                <?php
                                if (isset($age)) {
                                    echo $age;
                                } else {
                                    echo "Private";
                                }
                                ?></p>
                            </div>
                            <div>
                                <p>Phone number - 
                                <?php
                                if (isset($phone)) {
                                    echo $phone;
                                } else {
                                    echo "Private";
                                }
                                ?></p>
                            </div>
                            <div>
                                <p>Gender - 
                                <?php
                                if (isset($gender)) {
                                    if ($gender) {
                                        echo "Female";
                                    } else {
                                        echo "Male";
                                    }
                                } else {
                                    echo "Private";
                                }
                                ?></p>
                            </div>
                            <div>
                                <p>Follower Count - <?php
                                echo $count;
                                ?></p>
                            </div>
                        </div>
                    </td>
                    <td id="profilem">
                        <?php
                        $data = mysql_query("SELECT * FROM posts WHERE userid = '$userid' ORDER BY postid DESC");
                        if ($data) {
                            while ($row = mysql_fetch_assoc($data)) {

                                $postid = $row['postid'];
                                $picture = $row['picture'];
                                $description = $row['description'];

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
                                echo postTemplate($userid, $name, $postid, $picture, $description, $comment[1], $commentPoster[1], $commentPosterId[1], $comment[2], $commentPoster[2], $commentPosterId[2], $comment[3], $commentPoster[3], $commentPosterId[3]);

                                unset($comment);
                                unset($commentPoster);
                                unset($commentPosterId);
                            }
                        }
                        ?>
                    </td>
                    <td id="profiler">
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>