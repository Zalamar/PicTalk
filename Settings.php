<html>
        <body style="background-color:darkorange;">
    <head>
        <title>Homepage</title>
    <div id="header">
        <a href="Front.php">
            <img src="Pictalklogo.png" style="width:200px;height:150px;"> 
        </a>   
    </div>
    <?php
    echo "Today is " . date("l-d-m-y") . "<br>";
    ?>
</head>
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

<CENTER><div style="background-color:whitesmoke;"id='Sign-In'><fieldset style='width:99,5%'> 
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
     <div class="scroll">
         <p>Settings will arrive soon..</p>
</body>
</html>