<?php
session_start();

if (isset($_SESSION['login'])) {
    header("Location: http://localhost/Pictalk/Front.php");
    die();
}
?>

<!DOCTYPE html>
<html>
    <head>  
        <title>Sign-Up</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <h1>PicTalk</h1>
        <div class="login"> <fieldset style='width:30%'>
                <legend>REGISTRATION FORM</legend> 
                <form method='POST' action='registration.php'>
                    <div>
                        <label>Name</label>
                        <div>
                            <input type="text" name="name" placeholder="name">
                        </div>
                    </div>
                    <div>
                        <label>Username</label>
                        <div>
                            <input type="username" name="username" placeholder="username">
                        </div>
                    </div>
                    <div>
                        <label>Password</label>
                        <div>
                            <input type="password" name="password" placeholder="Password">
                        </div>
                    </div>
                    <div>
                        <button type="submit" name="action" value="sign up">Sign up</button>
                    </div>
                    <div>
                        <?php
                        if (isset($_GET["err"])) {
                            ?>
                            <div>Error in username or password.</div>
                            <?php
                        }
                        ?>
                    </div>
                </form>
            </fieldset>
        </div>
    </body>
</html>