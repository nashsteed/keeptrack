<?php
ob_start();
require("session.php");
//require("dfinfo-connect.php");
//echo "user logged in: ";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">  
  
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="author" content="your name">
  <meta name="description" content="include some description about your page">  
    
  <title>KeepTrack</title>
    
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

  <link rel="icon" type="image/png" href="images/db.png" />
   
  <?php include("header.php");
    //echo "user logged in: ";
    $user = $_SESSION['username'];
    //echo $_SESSION['email'];
    // $databases = findDatabasesForUser($user);
    ?>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-auto">
                <div class="card" style="width: 26rem; height: 600px">
                    <img src="images/db.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Your Table</h5>
                        <p class="card-text">View Created Table</p>
                        <a href="viewDB.php" class="btn btn-success">View Table</a>
                    </div>
                </div>
            </div>
            <div class="col-auto">
                <div class="card mb-4" style="width: 26rem; height: 600px">
                    <img class="card-img-top" src="images/keepTrackbanner.png" width="600" height="auto" alt="Card image cap"> 
                </div>
            </div>
            <div class="col-auto">
                <div class="card" style="width: 26rem; height: 600px;">
                    <img src="images/friends.png" class="card-img-top"  alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Friends</h5>
                        <p class="card-text">View Shared Table</p>
                        <a href="friendDB.php" class="btn btn-success">View Table</a>
                        <a href="addFriend.php" class="btn btn-primary">Add Friend</a>
                        <a href="loan.php" class="btn btn-primary">Loan Item</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
