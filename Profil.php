<html>
    <head>
        <title>Profile</title>
    <div id="header">
        <h1 style="font-family:serif;"<BIG><U>PicTalk</U></BIG></h1>
    </div>
</head>
<body
<Center><div id='Sign-In'> <fieldset style='width:99,5%'> 
            <table width=100%>  
                <DIV>
                    <TD>
                    <td><CENTER><button><a>ABOUT</a></button></CENTER></td>
                    <td><CENTER><button><a>FOLLOWING</a></button></button></CENTER></td>
                    <td><CENTER><button><a>FOLLOWERS</a></button></button></CENTER></td>
                    <td><CENTER><button><a>SETTINGS</a></button></button></CENTER></td>
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
        <td>
            <style>
    table {
        border: 1px solid black;
        border-collapse: collapse;
    }
    th, td {
        padding: 20px;
    }
</style>
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
    <br>
    <br>

    </body>
    </html>