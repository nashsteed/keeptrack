<?php

require("dbinfo-connect.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("session.php");
require("connect-db2.php");
// include("connect-db.php");
// include("connect-db.php");
//require("dfinfo-connect.php");
//echo "user logged in: ";
$username = $_SESSION['username'];
$inemail = $_SESSION['email'];
$ID = findDatabaseInfoForUser($inemail);
$id = $ID;
foreach ($ID as $item){
    $id = $item['dbID'];
  }
$databaseInfo = selectAllDatabaseInfo($id);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">  
  
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="author" content="your name">
  <meta name="description" content="include some description about your page">  
    
  <title>Bootstrap example</title>
    
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

  <link rel="icon" type="image/png" href="http://www.cs.virginia.edu/~up3f/cs4750/images/db-icon.png" />
   
</head>

<body>
    <?php include("header.php"); ?>
<div class="container">
  <h1><?php echo $username ?>'s Database</h1>  
    <div class="row justify-content-center">  
    <table class="w3-table w3-bordered w3-card-4 center" style="width:70%">
    <thead>
    <tr style="background-color:#B0B0B0">
        <th>dbName</th> 
        <th>locList</th> 
         <th>itemID</th>  
         <th>itemName</th>     
         <th>location</th>    
         <th>image</th>
         <th>description</th> 
         <th>quantity</th> 
         <th>adjList</th>                         
    </tr>
    </thead>
    <?php foreach ($databaseInfo as $item): ?>
    <tr>
        <td><?php echo $item['dbName']; ?></td>
        <td><?php echo $item['locList']; ?></td>
         <td><?php echo $item['itemID']; ?></td>
         <td><?php echo $item['itemName']; ?></td>
         <td><?php echo $item['location']; ?></td>
         <td><a href= <?php echo $item['image']; ?>> Image </a></td>
         <td><?php echo $item['description']; ?></td>    
         <td><?php echo $item['quantity']; ?></td>
         <td><?php echo $item['adjList']; ?></td>       
         <td>
         </td>           
    </tr>
    <?php endforeach; ?>
    </table>
</div>    
</div>    
</body>
</html>


