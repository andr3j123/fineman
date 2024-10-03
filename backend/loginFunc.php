<?php
include "dbConn.php";

$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

if(empty($email) || empty($password)){
    header("Location: ../login.php");
    exit();
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../login.php?error=invalid_email");
    exit();
}

$stmt = $conn->prepare("SELECT users_id, first_last_name, usersPassword FROM users WHERE email=?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result($userId, $firstLastName, $storedHashedPassword);
$stmt->fetch();
$stmt->close();

if(!$storedHashedPassword){
    header("Location: ../login.php?error=incorrect_credentials");
    exit();
}
if (password_verify($password, $storedHashedPassword)) {
    session_start();
    $_SESSION['email'] = $email;
    $_SESSION['user_id'] = $userId;
    $_SESSION['firstLastName'] = $firstLastName;
    header("Location: ../dashboard.php");
    exit();
}

header("Location: ../login.php?error=incorrect_credentials");
exit();