<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>  
        <title>Sign-In</title>
    </head>
        <body id='body-color'>
            <h1><CENTER>PicTalk</CENTER></h1>
        <?php
       
        include "database.php";
        $link = mysql_connect('localhost', 'root', '');
        if (!$link) {
            die('Could not connect: ' . mysql_error());
        }
        $link = mysql_select_db('2.E database (victor)');
        if (!$link) {
            die('Can\'t use foo : ' . mysql_error());
        }
        ?>
        <CENTER><div id='Sign-In'> <fieldset style='width:30%'>
        <legend>LOG-IN HERE</legend> 
       <form method='POST' action='succes.php'>
  <div class="form-group">
    <label for="inputusername3" class="col-sm-2 control-label">Username</label>
    <div class="col-sm-10">
      <input type="username" class="form-control" id="inputusername3" placeholder="username">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox"> Remember me
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Sign in</button>
    </div>
  </div>
</CENTER></form>
    </body>
</html>
