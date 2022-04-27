<?php
session_start();

$account = $_POST['account'];

include 'db.php';

$pdo = get_database_connection();

$stmt = $pdo->prepare("UPDATE accounts SET approved = 1 WHERE account_id =?");
$stmt->execute(array($account));

header('Location: ../staff_page.php');

// Close database connection.
$pdo = null;
