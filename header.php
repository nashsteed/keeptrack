<?php
ob_start();
require("session.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
  if(!empty($_POST['logoutbtn']) && ($_POST['logoutbtn'] == "Log Out")){
      header("Location: login.php");
          $_SESSION['username'] = NULL;
        }
    
  }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    </head>
    <body>
        <header> 
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="home.php" style="font-size: 26px;" style="font-family: Brush Script MT;">
                        <img src="images/keepTracklogo.png" width = 200>
                    </a>
                    <button disabled="true"> Logged in as <?php echo $_SESSION['username']?> </button>
                    <button
                    class="navbar-toggler"
                    type="button"
                    data-mdb-toggle="collapse"
                    data-mdb-target="#navbarNavAltMarkup"
                    aria-controls="navbarNavAltMarkup"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                    >
                    <i class="fas fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ms-auto">
                        <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                        <a class="nav-link active" aria-current="page" href="viewDB.php">View Items</a>
                        <form action="header.php" method="post">
                            <input type="submit" name="logoutbtn" class="btn btn-light" value="Log Out" style="float: right"></input>
                        </form>
                    </div>
                    </div>
                </div>
            </nav>
            </div>
        </nav>
        </header>
    </body>
</html>