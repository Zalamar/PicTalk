<?php
session_start();
$username = $_SESSION['username'];

include('database.php');

function redirect($location) {
    header("Location: http://localhost/Pictalk/$location");
    die();
}

$username = $_GET['username'];
$data = mysql_query("SELECT * FROM users WHERE username = '$username'");
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
?>
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
    <Center><div style="background-color:whitesmoke;"id='Sign-In'> <fieldset style='width:99,5%'>
                <table width=100%>  
                    <DIV>
                            <?php
                            echo "<td><CENTER><button><a href='Profil.php?username=$username'>PROFILE</a></button></button></CENTER></td>";
                            ?>
                        <td><CENTER><button><a href="Following.php">FOLLOWING</a></button></button></CENTER></td>
                        <td><CENTER><button><a href="About.php">ABOUT</a></button></CENTER></td>
                        <td><CENTER><button><a href="Settings.php">SETTINGS</a></button></b<td>
                    </DIV>
                </table>
        </div></Center>
    <br>
    <br>
    <div>
        <Center><img src="Unknown-17.png" style="width:408px;height:356px;"border="2"></Center>
    </div>
    <form>
        <Center>
            <fieldset style="background-color:whitesmoke;"style='width:27%'>
                <legend></legend>
                <?php echo $name ?>
        </Center>
    </form>

    <table style="width:33%" border='1'>
        <tr>
        <style>
            table {
                border: 1px solid black;
                border-collapse: collapse;
                background-color: whitesmoke;
            }
            th, td {
                padding: 20px;
            }
        </style>
    </table>
    <table>
        <div class="scroll">
            <style>
                div.scroll {
                    border: solid 1px black;
                    float:center;
                    background-color: white;
                    overflow: scroll;
                    height: 250px;
                    width: 500px;
                }
            </style>
            <form action="succes.php">
                <br>
                <input type="file" name="pic" id="pic">
                <br>Discription:
                <input type="text" name="discription" value="insert discription">
                <br><br><br><br><br><br><br><br><br><br>
                <input type="submit" value="Submit">
            </form> 
    </table>
    <table>
        <div class="scroll">
            <style>
                div.scroll {
                    border: solid 1px black;
                    float:right;
                    background-color: white;
                    overflow: scroll;
                    height: 250px;
                    width: 500px;
                    word-spacing: 30px;

                }
            </style>
            <form action="succes.php">
                <br>
                <input type="file" name="pic" id="pic">
                <br>Discription:
                <input type="text" name="discription" value="insert discription">
                <br><br><br><br><br><br><br><br><br><br>
                <input type="submit" value="Submit">
            </form> 
        </div>
        <td>
            Age - 
            <?php
            if (isset($age)) {
                echo $age;
            } else {
                echo "Private";
            }
            ?>
        </td>
        <tr>
            <td>
                Phone number - 
                <?php
                if (isset($phone)) {
                    echo $phone;
                } else {
                    echo "Private";
                }
                ?>
            </td> 
        </tr>
        <tr>
            <td>
                Gender - 
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
                ?>
            </td>
        <tr>
            <td>

<?php
$nummer = array("Peter" => "10");
echo "Follower count:" . $nummer["Peter"];
?>
            </td>
        </tr>
        <br>
        <br>
    </table>
</body>
</html>