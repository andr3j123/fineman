<?php
include "dbConn.php";

session_start();

$expenseName = filter_input(INPUT_POST, "expenseName", FILTER_SANITIZE_SPECIAL_CHARS);
$expensePrice = filter_input(INPUT_POST, "expensePrice", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
$expenseDate = date("Y-m-d", strtotime($_POST['expenseDate']));

if(empty($expenseDate) || empty($expensePrice) || empty($expenseName)){
    header("Location: ../dashboard.php?error=empty_fields");
    exit();
}

$stmt = $conn->prepare("INSERT INTO expenses (users_id, expenseName, expensePrice, expenseDate) VALUES (?, ?, ?, ?)");
$stmt->bind_param("isds", $_SESSION['user_id'], $expenseName, $expensePrice, $expenseDate);
$stmt->execute();
$stmt->close();

header("Location: ../dashboard.php");