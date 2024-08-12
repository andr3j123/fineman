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
    <title>Create new</title>
</head>
<body>
    <div class="createCollectionContainer">
        <form action="./backend/createCollectionFunc.php" method="post" class="createCollectionForm">
            <label for="collectionName">Name of the collection:</label>
            <input type="text" name="collectionName" class="collectionName" id="collectionName" maxlength="20" required>
            <label for="collectionDisc">Description:</label>
            <textarea type="text" name="collectionDisc" class="collectionDisc" id="collectionDisc" maxlength="160"></textarea>
            <label for="collectionTarget">Target:</label>
            <input type="number" name="collectionTarget" class="collectionTarget" id="collectionTarget" placeholder="€" min="1" max="10000000" step="0.01" required>
            <div class="createCollectionBtnContainer">
                <input type="submit" value="Create" class="createBtn">
                <button type="button" class="goBackBtn" onclick="redToDash()">Go back!</button>
            </div>
        </form>
    </div>
</body>
</html>