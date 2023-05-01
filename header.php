<?php
require("session.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
  if(!empty($_POST['logoutbtn']) && ($_POST['logoutbtn'] == "Log Out")){
      header("Location: index.php");
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
            <!-- <nav class="navbar navbar-light" style="background-color: #32594a;">
                <div class="container-fluid">            
                    <a class="navbar-brand" href="home.php" style="font-size: 26px;" style="font-family: Brush Script MT;">
                        <img src="keepTracklogo.png" width = 200>
                    </a>
                    <button class="btn btn-light" style="float: left" disabled>Logged in as: <?php echo $_SESSION['username']; ?></button>
                    <div class='btn-toolbar pull-right' class ="navbar-nav ml-auto">
                        <button class="btn btn-light" style="float: right" href=home.php></button>
                        <button class="btn btn-light" style="float: right" href=viewDB.php></button>

                        <form action="viewDB.php" method="post">
                            <input type="submit" name="viewdbbtn" class="btn btn-light" value="View Database" style="float: right"></input>
                        </form>
                        <form action="home.php" method="post">
                            <input type="submit" name="homebtn" class="btn btn-light" value="Home" style="float: right"></input>
                        </form>

                        <form action="header.php" method="post">
                            <input type="submit" name="logoutbtn" class="btn btn-light" value="Log Out" style="float: right"></input>
                        </form>
                    </div>
                </div>
            </nav> -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="home.php" style="font-size: 26px;" style="font-family: Brush Script MT;">
                        <img src="keepTracklogo.png" width = 200>
                    </a>
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