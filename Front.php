<!DOCTYPE html>
<html>
    <head>
        <title>Homepage </title>
         <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body style="background-color:lightgrey;">
    <div id="header">
        <a href="Front.php">
            <img src="Pictalklogo.png" style="width:200px;height:150px;"> 
        </a>
    </div>
<?php
echo "Today is " . date("l-d-m-y") . "<br>";
?>     
    <style>
        table {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 20px;
        }
    </style>
<div style="background-color:whitesmoke;"id='Sign-In'><fieldset style='width:99,5%'> 
            <table width=100%>  
                <div>
                    <TD>
                    <td><CENTER><button><a href="About.php">ABOUT</a></button></CENTER></td>
                    <td><CENTER><button><a>FOLLOWING</a></button></button></CENTER></td>
                    <td><CENTER><button><a href="Profil.php">PROFILE</a></button></button></CENTER></td>
                    <td><CENTER><button><a href="Settings.php">SETTINGS</a></button></button></CENTER></td>
                    </TD>
                </div>
            </table>
        </div>
    <br>
    <h1 style="text-align:center;">WELCOME</h1>
    <table>
        <div class="post">
            <form action="succes.php">
                <br><br>
                <input type="file" name="pic" id="pic">
                <br><br>Description:<br>
                <textarea name="description" cols="40" rows="5"></textarea>
                <br><br>
                <input type="submit" value="submit">
            </form> 
        </div>
                <br>
                <br>
                </body>
                </html>

