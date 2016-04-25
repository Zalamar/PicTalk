<?php
if (isset($_COOKIE["login_token"])) {
    header("Location: http://localhost/Front.php");
    die();
}
?>

<!DOCTYPE html>

<html>
    <head>  
        <title>Sign-In</title>
    </head>
    <body id='body-color' style="background-color:lightgray;">
        <h1><CENTER>PicTalk</CENTER></h1>
    <CENTER><div id='Sign-In'> <fieldset style='width:30%'>
                <legend>LOG-IN HERE</legend> 
                <form method='POST' action='succes.php'>
                    <div class="form-group"style="background-color:white;">
                        <label for="inputusername3" class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-10">
                            <input type="username" class="form-control" id="inputusername3" name="username" placeholder="username">
                        </div>
                    </div>
                    <div class="form-group"style="background-color:white;">
                        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group"style="background-color:white;">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default" name="action" value="sign in">Sign in</button>
                            <button type="submit" class="btn btn-default" name="action" value="sign up">Sign up</button>
                        </div>
                    </div>
                    <div>
                        <?php
                            if(isset($_GET["err"])) {
                                ?>
                                    <div>Error in username or password.</div>
                                <?php
                            }
                        ?>
                    </div>
                </form></CENTER>
                </body>
                </html>