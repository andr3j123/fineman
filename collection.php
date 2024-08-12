<?php

session_start();

// Checks if user accessed collection through "Enter" button. If not it will redirect to the dashboard.

if(!isset($_GET['id'])){
    header("Location: ./dashboard.php?error=collection-not-found");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title></title>
</head>
<body>
    <div class="addNewForm">
        <form action="./backend/addMoneyToCollection.php" method="post">
            <input type="hidden" name="collection_id" value="<?php echo $_GET['id'] ?>">
            <input type="number" name="amount" id="expensePrice" class="expensePrice" min="0.01" placeholder="€" max="10000000" step="0.01" required>
            <input type="date" name="expenseDate" id="expenseDate" class="expenseDate" required>
            <input type="submit" value="Add" class="submitBtn">
        </form>
    </div>

    <div class="expenseList">
        <?php include "./backend/moneyLeft.php"; ?>

        <div class="tables">
            <table class="expense">
                <tr class="expenseHeader">
                    <th>Amount</th>
                    <th>Date</th>
                </tr>
                <?php include "./backend/readCollectionAmount.php"; ?>
            </table>
        </div>
    </div>
    <div class="collectionBtns">
        <a class="goBackBtn" href="./dashboard.php" style="color: white;">Go Back</a>
        <a class="deleteBtn" href="./confirm.php?id=<?php echo $_GET['id']; ?>">Delete</a>
    </div>
</body>
</html>