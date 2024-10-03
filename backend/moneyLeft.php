<?php
include "dbConn.php";

$stmt = $conn->prepare("SELECT SUM(expensePrice) AS totalExpense FROM expenses WHERE collections_id = ?");
$stmt->bind_param("i", $_GET["id"]);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$totalExpense = $row['totalExpense'];
$stmt->close();

// Prepare and execute the second statement to get the collectionTarget
$stmt = $conn->prepare("SELECT collectionTarget FROM collections WHERE collections_id = ?");
$stmt->bind_param("i", $_GET["id"]);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$collectionTarget = $row['collectionTarget'];
$stmt->close();

// Calculate the money left, round is required because it will give random answers sometimes
$moneyLeft = round($collectionTarget - $totalExpense, 2);

if($moneyLeft <= 0){
    $stmt = $conn->prepare("UPDATE collections SET isDone = 1 WHERE collections_id = ?");
    $stmt->bind_param("i", $_GET["id"]);
    $stmt->execute();

    echo '<p class="moneyLeft">You have paid off your collection!</p>';
}
else{
    // Display the result
    echo '<p class="moneyLeft">You have ' . $moneyLeft . '€ left</p>';
}