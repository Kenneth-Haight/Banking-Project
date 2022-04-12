<?php

session_start();

include 'scripts/db.php';
$pdo = get_database_connection();

$username = $_POST['username'];
$password = $_POST['password'];

$statement = $pdo->prepare('SELECT staff_id, password FROM staff WHERE username=?');
$statement->execute(array($username)); 

$row = $statement->fetch();
$stored_password = $row['password'];

if (password_verify($password, $stored_password)) {
    
    $_SESSION['staff_id'] = $row['staff_id'];
    
    // Redirect the user to their account.
    echo "<script>document.location.href='staff_page.php';</script>";
    exit(0);
}

// Close database connection.
$pdo = null;

// This session variable will be used to display an error message.
$_SESSION["invalid_login"] = true;

// Redirect back to staff login page if login attempt was invalid.
header('Location: staff_login.php');
