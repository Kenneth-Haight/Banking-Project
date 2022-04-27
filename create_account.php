<?php

session_start();

include 'scripts/db.php';

$user_id = $_SESSION['user_id'];

$pdo = get_database_connection();
$statement = $pdo->prepare('SELECT * FROM accounts WHERE user_id = ? AND approved = 0');
$statement->execute(array($user_id));

$num_unapproved_accounts = $statement->rowCount();
$has_unapproved_account = ($num_unapproved_accounts > 0);

if ($has_unapproved_account) {
    $_SESSION['has_unapproved_account'] = true;
    header('Location: profile.php');
    exit;
} 

$sql = 'INSERT INTO accounts (user_id, balance) VALUES (:id, :balance)';
$statement = $pdo->prepare($sql);

$statement->execute(array(
    'id'      => $user_id,
    'balance' => (int)0,
));

header('Location: profile.php');
