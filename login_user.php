<?php

session_start();

include 'scripts/db.php';

$pdo = get_database_connection();

$username = $_POST['username'];
$password = $_POST['password'];

$statement = $pdo->prepare('SELECT user_id, password FROM users WHERE username=?');
$statement->execute(array($username)); 

$row = $statement->fetch();
$stored_password = $row['password'];

if (password_verify($password, $stored_password)) {
    $_SESSION['user_id'] = $row['user_id'];
    // Redirect the user to their account.
    header('Location: account.php');
    exit(0);
}

// Close database connection.
$pdo = null;

// This session variable will be used to display an error message.
$_SESSION['invalid_login'] = true;

// Redirect user back to login page if login attempt was invalid.
header('Location: login.php');
