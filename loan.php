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

if(!empty($_POST['loanbtn']) && ($_POST['loanbtn'] == "Loan Item")){
    $ID = findDatabaseInfoForUser($_POST['email']);
    $dbIDtoAdd = $ID;
    foreach($ID as $item){
        $dbIDtoAdd = $item['dbID'];
    }

    loantoID($dbIDtoAdd,$_POST["itemID"]);
}

$ID = findDatabaseInfoForUser($inemail);
$id = $ID;
foreach ($ID as $item){
    $id = $item['dbID'];
  }
$databaseInfo = selectAllDatabaseInfo($id);
$dbName = "no";
foreach ($databaseInfo as $item){
    $dbname = $item['dbName'];
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
   
</head>
<body>
    <?php include("header.php");
    //echo "user logged in: ";
    ?>
    <div style="text-align:center">
    <form action="loan.php" method="post">
    <input type="text" width="50" size="75" name="email" class="form-control my-4 py-2" placeholder="enter friend's email" />
    <input type="text" width="50" size="75" name="itemID" class="form-control my-4 py-2" placeholder="itemID of item the friend will borrow" />
    <input type = "submit" onclick="return confirm('Are you sure?')" name = "loanbtn" value="Loan Item" class = "btn btn-primary" />
    </form>

    <p>&nbsp;&nbsp;</p>
  <h1>&nbsp;&nbsp;<?php echo $username ?>'s Table: <?php echo $dbname ?> </h1>  
    <div class="row justify-content-center">  
    <table class="table table-condensed" style="width:70%">
    <thead class="thead-dark">
    <tr style="background-color:#d49e7e" color="white">
         <th>itemID</th>  
         <th>itemName</th>     
         <th>location</th>    
         <th>image</th>
         <th>description</th> 
         <th>quantity</th> 
         <th>adjList</th>   
         <th>Delete</th>                     
    </tr>
    </thead>
    <?php foreach ($databaseInfo as $item): ?>
        
    <tr>   
        <td><?php echo $item['itemID']; ?></td>
        <td><?php echo $item['itemName']; ?></td>
        <td><?php echo $item['location']; ?></td>
        <td><a href= <?php echo $item['image']; ?>> Image </a></td>
        <td><?php echo $item['description']; ?></td>
        <td><?php echo $item['quantity']; ?></td>
        <td><?php echo $item['adjList']; ?></td>
        <td>
        <form action = "viewDB.php" method = "post">
                <input type = "submit" onclick="return confirm('Are you sure?')" name = "deletebtn" value="Delete" class = "btn btn-danger" />
                <input type = "hidden" name = "itemIDtoDelete" value="<?php echo $item['itemID']; ?>" />
            </form>
    </td>
        
        
    </tr>
    <?php endforeach; ?>
</div>
    

</body>
