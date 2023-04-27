<?php 


function selectUserRow($inusername)
{
    global $db;
    $query = "select * from users U, names N where (U.email = N.email) and (N.userName =:inusername)";
    $statement = $db->prepare($query);
    $statement->bindValue(':inusername', $inusername);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}



?>