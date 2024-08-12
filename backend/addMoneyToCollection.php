<?php
include "dbConn.php";

session_start();

$amount = filter_input(INPUT_POST, "amount", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
$expenseDate = date("Y-m-d", strtotime($_POST['expenseDate']));

if(empty($amount) || empty($expenseDate)){
    header("Location: ../collection.php?id=". $_POST["collection_id"]. "?error=fields-cant-be-empty");
    exit();
}

$stmt = $conn->prepare("INSERT INTO expenses (users_id, collections_id, expensePrice, expenseDate) VALUES (?, ?, ?, ?)");
$stmt->bind_param("iids", $_SESSION["user_id"], $_POST["collection_id"], $amount, $expenseDate);
$stmt->execute();
$stmt->close();

header("Location: ../collection.php?id=". $_POST["collection_id"]);
exit();
?>