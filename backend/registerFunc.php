<?php

include "dbConn.php";

$firstLastName = filter_input(INPUT_POST, "firstLastName", FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

if(empty($firstLastName) || empty($email) || empty($password)){
    header("Location: ../register.php");
    exit();
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../register.php?error=invalid_email");
    exit();
}

$stmt = $conn->prepare("SELECT email FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->close();
    header("Location: ../register.php?error=email_exists");
    exit();
}

$stmt->close();

$hashedPass = password_hash($password, PASSWORD_BCRYPT);

$stmt = $conn->prepare("INSERT INTO users (first_last_name, email, usersPassword) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $firstLastName, $email, $hashedPass);
$stmt->execute();

$stmt->close();

session_start();

$_SESSION['email'] = $email;
$_SESSION['user_id'] = $userId;
$_SESSION['firstLastName'] = $firstLastName;

header("Location: ../dashboard.php");
exit();