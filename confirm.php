<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <script src="script.js"></script>
    <title>Confirmation</title>
</head>
<body>
    <form action="./backend/deleteCollection.php" method="get" class="confirmDelete">
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
        <button type="button" class="goBackBtn" onclick="redToDash()">Go back!</button>
        <input type="submit" value="Delete" class="deleteConfirmBtn">
    </form>
</body>
</html>