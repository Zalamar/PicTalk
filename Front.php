<!DOCTYPE html>
<html>
    <head>
        <title>Homepage</title>
    <div id="header">
        <a href="Front.php">
            <img src="Pictalklogo.png" style="width:200px;height:150px;"> 
        </a>
    </div>
</head>
<?php
echo "Today is " . date("l-d-m-y") . "<br>";
?>
<body>      
    <style>
        table {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 20px;
        }
    </style>
<CENTER><div id='Sign-In'><fieldset style='width:99,5%'> 
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
        </CENTER></div>
    <br>
    <h1 style="text-align:center;">WELCOME</h1>
    <table>
        <div class="scroll">
            <style>
                div.scroll {
                    border: solid 1px black;
                    position: fixed;
                    left: 48%;
                    top: 70%;
                    background-color: white;
                    z-index: 100;
                    overflow: scroll;
                    height: 250px;
                    margin-top: -200px;
                    width: 700px;
                    margin-left: -300px;
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
                <br>
                <br>
                </body>
                </html>




