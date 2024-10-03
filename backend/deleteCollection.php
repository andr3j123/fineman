<?php
include "dbConn.php";

if(!isset($_GET['id'])){
    header("Location: ../dashboard.php?error=collection-not-found");
    exit();
}

$stmt = "DELETE FROM collections WHERE collections_id = ". $_GET['id'];

if($conn->query($stmt)){
    header("Location: ../dashboard.php");
    exit();
}

header("Location: ./collection.php?id=". $_GET['id']."?error=could-not-delete-collection");
exit();