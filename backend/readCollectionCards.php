<?php
include "dbConn.php";

$stmt = $conn->prepare("SELECT collections_id ,collectionName, collectionDescription, collectionTarget, isDone FROM collections WHERE users_id = ?");
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();


if($result->num_rows < 0){
    echo '<p>You have no collections.</p>';
}
while($row = $result->fetch_assoc()){
    echo '<div class="collectionCard">
                <div class="cardText">
                    <h3 class="collectionName">'. $row['collectionName'] .'</h3>
                    <p class="collectionDesc">'. $row['collectionDescription'] .'</p>
                </div>
                <p class="target">'. $row['collectionTarget'] .'€</p>
                <a class="collectionCardBtn" href="./collection.php?id='. $row['collections_id'] .'">Enter</a>
            </div>';
}


?>