<?php
require("session.php");
echo "user logged in: ";
echo $_SESSION['username'];

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
    <?php include("header.html") ?>
    <div>
        <div class ="p-3">
        <h1>     Hello, _____!  <span class="badge bg-secondary" style="float: right"></span></h1>
        <h3>     View your databases!  <span class="badge bg-secondary" style="float: right"></span>
        <a> Or create your first!</a>
    </h1>
        
    <div class="card" style="width: 18rem;">
  <img src="3d-delivery-box-icon-png.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
</div>
</body>
