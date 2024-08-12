<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Sign in</title>
</head>
<body>
    <?php include "./components/navbar.html"; ?>

    <div class="loginFormContainer">
        <form action="./backend/registerFunc.php" method="post" class="logInForm">
            <label for="firstLastName" class="logInLabels">First and Last name:</label>
            <input type="text" name="firstLastName" class="logInInput" id="firstLastNameInput" maxlength="40" required>
            <label for="email" class="logInLabels">Email:</label>
            <input type="email" name="email" id="emailInput" class="logInInput" maxlength="244" required>
            <label for="password" class="logInLabels">Password:</label>
            <input type="password" name="password" id="passwordInput" class="logInInput" minlength="8" maxlength="100" required>
            <input type="submit" value="Register Now!" class="logInBtn">
        </form>
        <p>Already have an account? <a href="login.php" class="functionAnchorTag">Log in instead!</a></p>
    </div>
</body>
</html>