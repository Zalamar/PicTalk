<?php
session_start();
$username = $_SESSION['username'];
?>
<html>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <head>
        <title>About</title>
    <div id="header">
        <a href="Front.php">
            <img src="Pictalklogo.png" style="width:175px;height:150px;"> 
        </a>   
    </div>
    <?php
    echo "Today is " . date("l-d-m-y") . "<br>";
    ?>
</head>
<body style="background-color:lightgrey;">  
    <style>
        table {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 20px;
        }
    </style>

<CENTER><div style="background-color:whitesmoke;"id='Sign-In'><fieldset style='width:99,5%'>
            <table width=100%>  
                <div>
                    <TD>
                    <td><CENTER><button><a href="About.php">ABOUT</a></button></CENTER></td>
                    <td><CENTER><button><a>FOLLOWING</a></button></button></CENTER></td>
                    <?php
                    echo "<td><CENTER><button><a href='Profil.php?username=$username'>PROFILE</a></button></button></CENTER></td>";
                    ?>
                    <td><CENTER><button><a href="Settings.php">SETTINGS</a></button></button></CENTER></td>
                    </TD>
                </div>
            </table>
            </div>
        <style>
        div.scroll {
            background-color: #white;
            width: 99%;
            height: 1000px;
            alignment: left;
            overflow: scroll;
        }
    </style>
    <div style="color:black;"class="scroll">
        The website PicTalk is a school project
            <br>Made by 3 highschool students
            <br>Named - Thor Bjørn gabe, Tobias Rydberg and Victor Mtsimbe Norrild.
        <div style="float: right;"><IMG SRC="itguy1.jpg"><br>Victor Mtsimbe Norrild</div>       
        <br>It was made for our finals in a class
        <br>called "Information Technologi".
        <br>It was required that it held 
        <br>a image file, a login system, a database, tables, list, logos/self made vidoes og other things.
        <br>
        <br>The project is to delivered on the 24th of April.
        <br>On our schools platform. 
        <br>
        <br>Further information awaits, in the meanwhile, heres some ed sheeran.
        <br><br><br><br><br><br><br>
        <div style="float: right;"><IMG SRC="itguy3.jpg"><br>Tobias Rydberg</div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

        <div style="float: right;"><IMG SRC="itguy2.jpg"><br>Thor Bjørn Gabe</div>
    </div>

            </body>
            </html>