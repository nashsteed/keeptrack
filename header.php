<?php
require("session.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
  if(!empty($_POST['logoutbtn']) && ($_POST['logoutbtn'] == "Log Out")){
      header("Location: index.php");
          $_SESSION['username'] = NULL;
        }
    
  }

?>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252"></head><body><header>  
    <nav class="navbar navbar-light" style="background-color: #32594a;">
        <div class="container-fluid">            
          <a class="navbar-brand" href="home.php" style="font-size: 26px;" style="font-family: Brush Script MT;">
            <img src="keepTracklogo.png" width = 200></a>
            <div class='btn-toolbar pull-right' class ="navbar-nav ml-auto">
              <form action="header.php" method="post">
              <input type="submit" name="logoutbtn" class="btn btn-light" value="Log Out" style="float: right"></input>
              </form>
            </div>
        </div>
      </nav>
    </header></body></html>