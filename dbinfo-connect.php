<?php 
function addFriend($name, $major, $year)
{
    try{
    global $db;
    $query = "insert into friends values (:name, :major, :year)";
    $statement = $db->prepare($query);
    $statement->bindValue(':name',$name);
    $statement->bindValue(':major',$major);
    $statement->bindValue(':year',$year);
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

function findDatabaseInfoForUser($inemail)
{
    global $db;
    $query = "select dbID from users where email =:inemail";
    $statement = $db->prepare($query);
    $statement->bindValue(':inemail', $inemail);
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

function updateFriend($name, $major, $year){
    global $db;
    $query = "update friends set major = :major, year = :year
    WHERE name =:friend_to_update";
    $statement = $db->prepare($query);
    $statement->bindValue(':friend_to_update', $name);
    $statement->bindValue(':major',$major);
    $statement->bindValue(':year',$year);
    $statement->execute();
    $statement->closeCursor();
}

?>