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
    <body id='body-color'>
        <h1><CENTER>PicTalk</CENTER></h1>
    <CENTER><div id='Sign-In'> <fieldset style='width:30%'>
                <legend>LOG-IN HERE</legend> 
                <form method='POST' action='succes.php'>
                    <div class="form-group">
                        <label for="inputusername3" class="col-sm-2 control-label">E-mail</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputusername3" name="email" placeholder="username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="rememberme"> Remember me
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default" name="action" value="sign in">Sign in</button>
                            <button type="submit" class="btn btn-default" name="action" value="sign up">sign up</button>
                        </div>
                    </div>
                </form></CENTER>
                </body>
                </html>