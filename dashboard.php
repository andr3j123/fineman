<?php 
session_start();

// Check if user is logged in and has active user_id in session. If not it will redirect to login page.

if(!isset($_SESSION['user_id'])){
    header("Location: login.php?error=session_expired");
    exit();
}

// Expense search

include "./backend/dbConn.php";

$query = isset($_GET['searchExpense']) ? $_GET['searchExpense'] : '';

if (!empty($query)){
    $stmt = $conn->prepare("SELECT * FROM expenses WHERE expenseName LIKE ? OR expensePrice LIKE ?");
    $searchTerm = "%" . $query . "%";
    $stmt->bind_param("ss", $searchTerm, $searchTerm);
    
    $stmt->execute();
    $result = $stmt->get_result();
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
                <?php

                    // Checks if user typed something into search bar. If user typed something it will display it either by name or price, otherwise it will display everything.

                    if (!isset($_GET['searchExpense']) || empty($_GET['searchExpense'])){
                        include "./backend/readExpenses.php";
                    }

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr class="expenseContent">
                                <td>'. htmlspecialchars($row['expenseName']) .'</td>
                                <td>'. htmlspecialchars($row['expensePrice']) .'€</td>
                                <td>'. htmlspecialchars($row['expenseDate']) .'</td>
                            </tr>';
                        }
                    }
                ?>
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