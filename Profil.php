<html>
    <head>
        <title>Profile</title>
    <div id="header">
        <a href="Front.php">
            <img src="Pictalklogo.png" style="width:200px;height:150px;"> 
        </a>    
    </div>
    <?php
    echo "Today is " . date("l-d-m-y") . "<br>";
    ?>
</head>
<body
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
            Firsname Lastnameson
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
        <?php
        $age = array("Peter" => "35");
        echo "Age - " . $age['Peter'];
        ?>
    </td>
</tr>
<tr>
    <td>
        <?php
        $nummer = array("Peter" => "12 34 56 78");
        echo "Phone number - " . $nummer['Peter'];
        ?>
    </td> 
</tr>
<tr>
    <td>
        <?php
        $gender = array("Peter" => "Male", "Jannis" => "Female");
        echo "Gender - " . $gender['Peter'];
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