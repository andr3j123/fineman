<?php 
session_start();

// Check if user is logged in and has active user_id in session. If not it will redirect to login page.

if(!isset($_SESSION['user_id'])){
    header("Location: login.php?error=session_expired");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <title>Dashboard</title>
</head>
<body>
    <?php include "./components/navbar.html";?>


    <h2 class='welcomeMsg'>Welcome <a href="./backend/logout.php" class="functionAnchorTag" id="userName"><?php echo $_SESSION['firstLastName']; ?></a></h2>

    <div class="addNewForm">
        <form action="./backend/addNewExpense.php" method="post">
            <input type="text" name="expenseName" id="expenseName" class="expenseName" placeholder="What did you spend money on?" maxlength="40" required>
            <input type="number" name="expensePrice" id="expensePrice" class="expensePrice" min="1" placeholder="€" max="10000000" step="0.01" required>
            <input type="date" name="expenseDate" id="expenseDate" class="expenseDate" required>
            <input type="submit" value="Create New" class="submitBtn">
        </form>
    </div>

    <div class="expenseList">
        <div class="searchContainer">
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="get" class="searchForm">
                <input type="text" name="searchExpense" class="searchExpense" id="searchExpense" placeholder="Search your expenses">
            </form>
        </div>

        <div class="tables">
            <table class="expense">
                <tr class="expenseHeader">
                    <th>Name</th>
                    <th>Price</th>
                    <th>Date</th>
                </tr>
                <?php include "./backend/readExpenses.php"; ?>
            </table>
        </div>
    </div>

    <section>
        <h2 class="collectionsTitle">Collections</h2>
        <button type="button" class="createCollectionBtn" onclick="redToCreate()">Create collection</button>

        <div class="collectionCardsList">
            <?php include "./backend/readCollectionCards.php"; ?>
        </div>
    </section>
</body>
</html>