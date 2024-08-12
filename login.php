<?php 
session_start();

// Checks if user isn't already logged in and redirects him to dashboard if he is.

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
    <title>Log in</title>
</head>
<body>
    <?php include "./components/navbar.html"; ?>

    <div class="loginFormContainer">
        <form action="./backend/loginFunc.php" method="post" class="logInForm">
            <label for="email" class="logInLabels">Email:</label>
            <input type="email" name="email" id="emailInput" class="logInInput" required>
            <label for="password" class="logInLabels">Password:</label>
            <input type="password" name="password" id="passwordInput" class="logInInput" required>
            <input type="submit" value="Log In!" class="logInBtn">
        </form>
        <p>You don't have an account? <a href="register.php" class="functionAnchorTag">Click here to register now!</a></p>
    </div>
</body>
</html>