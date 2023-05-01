<?php

require("dbinfo-connect.php");
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
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
$dbName = "no";
foreach ($databaseInfo as $item){
    $dbname = $item['dbName'];
  }
  //echo $dbname;

if(!empty($_POST['addbtn']) && ($_POST['addbtn'] == "Add")){
    addItem($_POST['itemName'], $_POST['location'], $_POST['image'], $_POST['description'], $_POST['quantity'], $_POST['adjList'],$id);
    $databaseInfo = selectAllDatabaseInfo($id);
}

if(!empty($_POST['deletebtn']) && ($_POST['deletebtn'] == "Delete")){
    deleteItem($_POST['itemIDtoDelete']);
    $databaseInfo = selectAllDatabaseInfo($id);
}

if(!empty($_POST['editbtn']) && ($_POST['editbtn'] == "Edit")){
    editItem($_POST['itemName'], $_POST['location'], $_POST['image'], $_POST['description'], $_POST['quantity'], $_POST['adjList'],$_POST['itemID']);
    $databaseInfo = selectAllDatabaseInfo($id);
}
if(!empty($_POST['searchbtn']) && ($_POST['searchbtn'] == "Search")){
    $databaseInfo = search($_POST['search'],$id);
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

        <link rel="icon" type="image/png" href="images/db.png" />
        
        <?php include("header.php"); ?>
    </head>
    <body>
        <p>&nbsp;&nbsp;</p>
        <div class="row justify-content-center"> 
            <div class="col-md-8 mb-3">
                <h3 class="row justify-content-left">&nbsp;&nbsp; Search for Items: </h3>  
                <form class="row justify-content-center" action="viewDB.php" method="post">
                    <div class="row justify-content-center">
                        <input class="form-control mr-auto" name="search" type="search" placeholder="Search Item Name" aria-label="Search">
                        <div class="row justify-content-left">
                            <div class="col-auto">
                                <button class="btn btn-success my-2 my-sm-0 mr-2" name ="searchbtn" type="submit" value="Search">Search</button>
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-primary my-2 my-sm-0 mr-2" type="submit">Show All</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div>
            <p>&nbsp;&nbsp;</p>
            <div class="row justify-content-center">  
                <table class="table table-condensed" style="width:70%">
                    <caption> <?php echo $username ?>'s Table: <?php echo $dbname ?> </caption>
                    <thead class="thead-dark">
                        <tr style="background-color:#d49e7e" color="white">
                            <th>ID</th>  
                            <th>Item</th>     
                            <th>Location</th>    
                            <th>Image</th>
                            <th>Description</th> 
                            <th>Quantity</th> 
                            <th>Adjacent</th>  
                            <th>Delete</th>                     
                        </tr>
                    </thead>
                    <?php foreach ($databaseInfo as $item): ?>
                    <tr>   
                        <td><?php echo $item['itemID']; ?></td>
                        <td><?php echo $item['itemName']; ?></td>
                        <td><?php echo $item['location']; ?></td>
                        <td><a href= <?php echo $item['image']; ?> target="_blank"> Image </a></td>
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
                    <div>
                    </div>
                </table>
                <table class="table table-condensed" style="width:70%">
                    <thead class="thead-dark">
                        <tr style="background-color:#90ee90" color="white">
                            <th>ID</th>  
                            <th>Item</th>     
                            <th>Location</th>    
                            <th>Image</th>
                            <th>Description</th> 
                            <th>Quantity</th> 
                            <th>Adjacent</th>  
                            <th>Edit/Add</th>                       
                        </tr>
                    </thead>
                    <form name="mainForm" action="viewDB.php" method="post">
                        <tr>   
                            <td><input type="text" size="75" name="itemID" class="form-control my-4 py-2" placeholder="*only for update* itemID" /></td>
                            <td><input type="text" name="itemName" class="form-control my-4 py-2" placeholder="itemName" required/></td>
                            <td><input type="text" name="location" class="form-control my-4 py-2" placeholder="location" required/></td>
                            <td><input type="text" size="30" name="image" class="form-control my-4 py-2" placeholder="image URL" required/></td>
                            <td><input type="text" name="description" class="form-control my-4 py-2" placeholder="description" required/></td>
                            <td><input type="text" name="quantity" class="form-control my-4 py-2" placeholder="quantity" required/></td>
                            <td><input type="text" name="adjList" class="form-control my-4 py-2" placeholder="adjList" required/></td>
                            <td>
                                <input type = "submit" onclick="return confirm('Are you sure?')" name = "editbtn" value="Edit" class = "btn btn-primary" />
                                <input type = "submit" onclick="return confirm('Are you sure?')" name = "addbtn" value="Add" class = "btn btn-success" />
                            </td> 
                        </tr>
                    </form>
                </table>
            </div>    
        </div> 
    </body>
</html>


