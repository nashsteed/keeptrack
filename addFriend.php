<?php

require("dbinfo-connect.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("session.php");
require("connect-db2.php");
//require("dfinfo-connect.php");
//echo "user logged in: ";
$username = $_SESSION['username'];
$inemail = $_SESSION['email'];
$ID = findDatabaseInfoForUser($inemail);
$dbid = $ID;
$myid = $ID;
foreach ($ID as $item){
    $dbid = $item['dbID'];
    $myid = $item['uID'];

  }

if(!empty($_POST['friendbtn']) && ($_POST['friendbtn'] == "Add Friend")){
    $ID = findDatabaseInfoForUser($_POST['email']);
    $friendID = $ID;
    foreach($ID as $item){
        $friendID = $item['uID'];
    }
    addFriend($dbid,$myid,$friendID);
    header("Location: home.php");
}

 

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
        <link rel="icon" type="image/png" href="keepTracklogo.png" />
        <?php include("header.php");?>
    </head>
    <body>
        <div class="row justify-content-center">
            <div class="col-4">
                <form action="addFriend.php" method="post">
                    <input type="text" width="50" size="75" name="email" class="form-control my-4 py-2" placeholder="Enter friend's email here" />
                    <input type = "submit" onclick="return confirm('Are you sure?')" name = "friendbtn" value="Add Friend" class = "btn btn-primary" />
                </form>
            </div>
        </div>
    </body>
</html>