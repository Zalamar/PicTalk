<?php
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
        <title>Profile</title>
        <link rel="stylesheet" type="text/css" href="mystyle.css">
    </head>
    <body>
    <div id="header">
        <a href="Front.php">
            <img src="Pictalklogo.png" style="width:200px;height:150px;"> 
        </a>    
    </div>
<?php
echo "Today is " . date("l-d-m-y") . "<br>";
?>
<Center><div id='Sign-In'> <fieldset style='width:99,5%'> 
            <table width=100%>  
                <DIV>
                    <TD>
                    <td><CENTER><button><a href="About.php">ABOUT</a></button></CENTER></td>
                    <td><CENTER><button><a>FOLLOWING</a></button></button></CENTER></td>
                    <td><CENTER><button><a href="Profil.php">PROFILE</a></button></button></CENTER></td>
                    <td><CENTER><button><a href="Settings.php">SETTINGS</a></button></button></CENTER></td>
                    </TD>
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
        <fieldset style='width:27%'>
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
        }
        th, td {
            padding: 20px;
        }
    </style>
    <td>
        Age - 
<?php
if(isset($age)) { echo $age; }
else { echo "Private"; }
?>
    </td>
</tr>
<tr>
    <td>
        Phone number - 
<?php
if(isset($phone)) { echo $phone; }
else { echo "Private"; }
?>
    </td> 
</tr>
<tr>
    <td>
        Gender - 
<?php
if(isset($gender)) {
    if($gender) { echo "Female"; }
    else { echo "Male"; }
}
else { echo "Private"; } 
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

</body>
</html>