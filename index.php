<?php 
session_start();

// Checks if user is already logged in and redirects him to dashboard if he is.

if(isset($_SESSION['user_id'])){
    header("Location: dashboard.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Home</title>
</head>
<body>
    <?php include "./components/navbar.html";?>

    <div class="bubble-left">
        <h2 class="bubble-title">Simplify Your Savings</h2>
        <p class="bubble-text">Managing your finances doesn’t have to be complicated. With Fineman, you can create custom collections, set target amounts, and track your progress in a straightforward, intuitive way.</p>
    </div>
    <div class="bubble-right">
        <h2 class="bubble-title">Designed for You</h2>
        <p class="bubble-text">We know that simplicity is key. That’s why our app is built with casual users in mind, offering a clean, user-friendly interface that makes financial management a breeze.</p>
    </div>
</body>
</html>