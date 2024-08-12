<?php
include "dbConn.php";

$stmt = $conn->prepare("SELECT expensePrice, expenseDate FROM expenses WHERE collections_id = ?");
$stmt->bind_param("i", $_GET['id']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo '<tr class="expenseContent">
                <td>'. htmlspecialchars($row['expensePrice']) .'€</td>
                <td>'. htmlspecialchars($row['expenseDate']) .'</td>
            </tr>';
    }
}


?>