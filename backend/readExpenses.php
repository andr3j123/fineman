<?php
include "dbConn.php";

$stmt = $conn->prepare("SELECT expenseName, expensePrice, expenseDate FROM expenses INNER JOIN users ON expenses.users_id = users.users_id WHERE expenses.users_id = ? AND expenses.expenseName IS NOT NULL");
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo '<tr class="expenseContent">
                <td>'. htmlspecialchars($row['expenseName']) .'</td>
                <td>'. htmlspecialchars($row['expensePrice']) .'€</td>
                <td>'. htmlspecialchars($row['expenseDate']) .'</td>
            </tr>';
    }
}

$stmt->close();