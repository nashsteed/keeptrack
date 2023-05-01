<?php 


function selectAllDatabaseInfo($ID)
{
    global $db;
    $query = "select * from databaseInfo D, items I where I.dbID = D.dbID and D.dbID =:ID";
    $statement = $db->prepare($query);
    $statement->bindValue(':ID', $ID);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}

function search($itemName,$ID)
{
    global $db;
    $query = "select * from databaseInfo D, items I where I.dbID = D.dbID and D.dbID =:ID and I.itemName =:itemName";
    $statement = $db->prepare($query);
    $statement->bindValue(':ID', $ID);
    $statement->bindValue(':itemName', $itemName);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}

function findFriend($myid)
{
    global $db;
    $query = "select * from friend where userID2 =:myid";
    $statement = $db->prepare($query);
    $statement->bindValue(':myid', $myid);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}

function findDatabaseInfoForUser($inemail)
{
    global $db;
    $query = "select dbID,uID from users where email =:inemail";
    $statement = $db->prepare($query);
    $statement->bindValue(':inemail', $inemail);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}

function addFriend($dbID, $myid, $friendID)
{
    try{
    global $db;
    $query = "insert into friend (userID1,userID2,dbID) values (:myid, :friendID, :dbID)";
    $statement = $db->prepare($query);
    $statement->bindValue(':dbID', $dbID);
    $statement->bindValue(':myid', $myid);
    $statement->bindValue(':friendID', $friendID);
    $statement->execute();
    $statement->closeCursor();
    }
    catch (PDOException $e) 
{
   // echo $e->getMessage();
   // if there is a specific SQL-related error message
   //    echo "generic message (don't reveal SQL-specific message)";

   if (str_contains($e->getMessage(), "Duplicate"))
      echo "Failed to add a friend <br/>";
} catch (Exception $e)
{
   echo $e->getMessage();
}

}



function findDatabaseIDForUser($dbName){
    global $db;
    $query = "select dbID from databaseInfo where dbName =:dbName";
    $statement = $db->prepare($query);
    $statement->bindValue(':dbName', $dbName);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}

function createnewandfinddbID($dbname,$loclist)
{
    global $db;
    $query = "insert into databaseInfo (dbName,locList) values (:dbname,:loclist);
    select * from databaseInfo where dbName =:dbname";
    $statement = $db->prepare($query);
    $statement->bindValue(':dbname', $dbname);
    $statement->bindValue(':loclist', $loclist);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}


function deleteFriend($friend_to_delete)
{
    global $db;
    $query = "delete from friends where name =:friend_to_delete";
    $statement = $db->prepare($query);
    $statement->bindValue(':friend_to_delete', $friend_to_delete);
    $statement->execute();
    $statement->closeCursor();

}

function deleteItem($itemID)
{
    global $db;
    $query = "delete from items where itemID =:itemID";
    $statement = $db->prepare($query);
    $statement->bindValue(':itemID', $itemID);
    $statement->execute();
    $statement->closeCursor();

}

function updateFriend($name, $major, $year){
    global $db;
    $query = "update friends set major = :major, year = :year WHERE name =:friend_to_update";
    $statement = $db->prepare($query);
    $statement->bindValue(':friend_to_update', $name);
    $statement->bindValue(':major',$major);
    $statement->bindValue(':year',$year);
    $statement->execute();
    $statement->closeCursor();
}

function editItem($itemName, $location, $image, $description, $quantity, $adjList, $itemID){
    global $db;
    $query = "update items set itemName = :itemName, location = :location, image = :image, description = :description, quantity = :quantity, adjList = :adjList WHERE itemID =:itemID";
    $statement = $db->prepare($query);
    $statement->bindValue(':itemName',$itemName);
    $statement->bindValue(':location',$location);
    $statement->bindValue(':image',$image);
    $statement->bindValue(':description',$description);
    $statement->bindValue(':quantity',$quantity);
    $statement->bindValue(':adjList',$adjList);
    $statement->bindValue(':itemID',$itemID);
    $statement->execute();
    $statement->closeCursor();
}

function loantoID($dbID,$itemID){
    global $db;
    $query = "update items set dbID = :dbID where itemID =:itemID;";
    $statement = $db->prepare($query);
    $statement->bindValue(':dbID',$dbID);
    $statement->bindValue(':itemID',$itemID);
    $statement->execute();
    $statement->closeCursor();
}

function finddbName($id){
    global $db;
    $query = "select * from databaseInfo where dbID =:id";
    $statement = $db->prepare($query);
    $statement->bindValue(':id',$id);
    $statement->execute();
    $statement->closeCursor();
}

function signup($email, $username, $password, $firstname, $lastname, $street, $city, $zipcode, $state, $dbID){
    global $db;
    $query = "insert into users (email,password,street,dbID,city,zipcode) values (:email,:password,:street,:dbID,:city,:zipcode);
    insert ignore into names values (:email,:firstname,:lastname,:username);
    insert ignore into stateInfo values (:zipcode,:state)";
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':username', $username);
    $pwd = password_hash($password, PASSWORD_BCRYPT);
    $statement->bindValue(':password',$pwd);
    $statement->bindValue(':firstname',$firstname);
    $statement->bindValue(':lastname',$lastname);
    $statement->bindValue(':street',$street);
    $statement->bindValue(':dbID',$dbID);
    $statement->bindValue(':city',$city);
    $statement->bindValue(':zipcode',$zipcode);
    $statement->bindValue(':state',$state);
    $statement->execute();
    $statement->closeCursor();
}

function selectUserRow2($inusername,$inemail)
{
    global $db;
    $query = "select * from users U, names N where (U.email = N.email) and ((U.email =:inemail) or (N.userName =:inusername))";
    $statement = $db->prepare($query);
    $statement->bindValue(':inusername', $inusername);
    $statement->bindValue(':inemail', $inemail);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}

function populateGarage($dbID)
{
    global $db;
    $query = "insert into items (itemName,location,image,description,dbID,quantity,adjList) values ('hammer','table','https://www.acwholesalers.com/products-image/600/rap12525_107217_1000.jpg','red hammer',:dbID,1,'saw, fridge');
	insert into items (itemName,location,image,description,dbID,quantity,adjList) values ('saw','table','https://m.media-amazon.com/images/I/61yxCOECFaL.jpg','red and black saw',:dbID,1,'hammer, fridge');
		insert into items (itemName,location,image,description,dbID,quantity,adjList) values ('fridge','floor','https://images.sabergrills.com/saber/saber/product/images/1_1_k00aa3314_large.jpg.ashx?height=395&width=432','large fridge',:dbID,1,'hammer, saw')";
    $statement = $db->prepare($query);
    $statement->bindValue(':dbID', $dbID);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}

function populateOffice($dbID)
{
    global $db;
    $query = "insert into items (itemName,location,image,description,dbID,quantity,adjList) values ('stapler','desk drawer','https://bostitchoffice.com/media/catalog/product/cache/8d622783d0b606912c99e4ab1818c82c/b/4/b440-black_1_main_300dpi.jpg','red mixer',:dbID,1,'copier, laptop');
	insert into items (itemName,location,image,description,dbID,quantity,adjList) values ('paper','desk','https://www.collinsdictionary.com/images/full/paper_111691001.jpg','nice knife set',:dbID,20,'file cabinet, pens');
		insert into items (itemName,location,image,description,dbID,quantity,adjList) values ('magnets','file cabinet','https://www.harborfreight.com/media/catalog/product/cache/9fc4a8332f9638515cd199dd0f9238da/i/m/image_23125.jpg','large fridge',:dbID,5,'paper, pens')";
    $statement = $db->prepare($query);
    $statement->bindValue(':dbID', $dbID);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}

function populateKitchen($dbID)
{
    global $db;
    $query = "insert into items (itemName,location,image,description,dbID,quantity,adjList) values ('mixer','pantry','https://m.media-amazon.com/images/I/61jFYI4spyL.jpg','red mixer',:dbID,1,'knife set, fridge');
	insert into items (itemName,location,image,description,dbID,quantity,adjList) values ('knife set','counter','https://i5.walmartimages.com/asr/dc9f2c13-faf3-4622-8026-0993dc8707b6.7b6ab9bb1e9b0c044d1dfc836f55fa13.jpeg','nice knife set',:dbID,1,'mixer, fridge');
		insert into items (itemName,location,image,description,dbID,quantity,adjList) values ('fridge','floor','https://images.sabergrills.com/saber/saber/product/images/1_1_k00aa3314_large.jpg.ashx?height=395&width=432','large fridge',:dbID,1,'knife set, mixer')";
    $statement = $db->prepare($query);
    $statement->bindValue(':dbID', $dbID);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}

function addItem($itemName, $location, $image, $description, $quantity, $adjList, $dbID)
{
    try{
    global $db;
    $query = "insert into items (itemName, location, image, description, quantity, adjList, dbID) values (:itemName, :location, :image, :description,:quantity,:adjList,:dbID)";
    $statement = $db->prepare($query);
    $statement->bindValue(':itemName',$itemName);
    $statement->bindValue(':location',$location);
    $statement->bindValue(':image',$image);
    $statement->bindValue(':description',$description);
    $statement->bindValue(':quantity',$quantity);
    $statement->bindValue(':adjList',$adjList);
    $statement->bindValue(':dbID',$dbID);
    $statement->execute();
    $statement->closeCursor();
} catch (PDOException $e) 
{
   // echo $e->getMessage();
   // if there is a specific SQL-related error message
   //    echo "generic message (don't reveal SQL-specific message)";

   if (str_contains($e->getMessage(), "Duplicate"))
      echo "Failed to add a friend <br/>";
} catch (Exception $e)
{
   echo $e->getMessage();
}


}
?>