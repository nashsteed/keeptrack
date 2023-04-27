
<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require("session.php");
require("connect-db2.php");
// include("connect-db.php");
require("dbinfo-connect.php");
// include("connect-db.php");

$databaseInfo = selectAllDatabaseInfo();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    if(!empty($_POST['actionBtn']) && ($_POST['actionBtn'] == "Add Friend")){
        addFriend($_POST['name'], $_POST['major'], $_POST['year']);
        $friends = selectAllFriends();
    }
    else if (!empty($_POST['actionBtn']) && ($_POST['actionBtn'] == "Delete"))
    {
        deleteFriend($_POST['friend_to_delete']);
        $friends = selectAllFriends();
    }
    else if (!empty($_POST['actionBtn']) && ($_POST['actionBtn'] == "Update Friend"))
     {
        updateFriend($_POST['name'], $_POST['major'], $_POST['year']);
        $friends = selectAllFriends();
     }
}
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
<div class="container">
  <h1>Hello World!</h1>  
    <form name="mainForm" action="simpleform.php" method="post">   
        <div class="row mb-3 mx-3">
            Name:
            <input type="text" class="form-control" name="name" required />    
        </div>  
        <div class="row mb-3 mx-3">
            Major:  
            <input type="text" class="form-control" name="major" required />    
        <div class="row mb-3 mx-3">
            Year:
            <input type="text" class="form-control" name="year" required />
        </div>
        <div class="row mb-3 mx-3">
            <input type = "submit" class = "btn btn-success" name = "actionBtn" value="Add Friend" title="click to insert a friend" />
            <input type = "submit" class = "btn btn-success" name = "actionBtn" value="Update Friend" title="click to update a friend"/>       
        </div>
    </form>  

    <div class="row justify-content-center">  
    <table class="w3-table w3-bordered w3-card-4 center" style="width:70%">
    <thead>
    <tr style="background-color:#B0B0B0">
         <th>Name</th>  
         <th>Locations List</th>     
         <th>View</th>                    
    </tr>
    </thead>
    <?php foreach ($databaseInfo as $item): ?>
    <tr>
         <td><?php echo $item['dbName']; ?></td>
         <td><?php echo $item['locList']; ?></td>        
         <td>
            <form action = "simpleform.php" method = "post">
                <input type = "submit" name = "actionBtn" value="Delete" class = "btn btn-danger" />
                <input type = "hidden" name = "friend_to_delete" value="<?php echo $item['name']; ?>" />
            </form>
         </td>           
    </tr>
    <?php endforeach; ?>
    </table>
</div>    
</div>    
</body>
</html>


