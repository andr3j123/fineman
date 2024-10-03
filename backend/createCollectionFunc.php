<?php
include "dbConn.php";

session_start();

$collectionName = filter_input(INPUT_POST, "collectionName", FILTER_SANITIZE_SPECIAL_CHARS);
$collectionDisc = filter_input(INPUT_POST, "collectionDisc", FILTER_SANITIZE_SPECIAL_CHARS);
$collectionTarget = filter_input(INPUT_POST, "collectionTarget", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

if(empty($collectionName) || empty($collectionTarget)){
    header("Location: ../createCollection.php?error=name_or_target_are_empty");
    exit();
}

$stmt = $conn->prepare("INSERT INTO collections (users_id, collectionName, collectionDescription, collectionTarget) VALUES (?, ?, ?, ?)");
$stmt->bind_param("issd", $_SESSION['user_id'], $collectionName, $collectionDisc, $collectionTarget);
$stmt->execute();
$stmt->close();

header('Location: ../dashboard.php?collectionCreated');
exit();