<?php
session_start();

include 'scripts/db.php';
$user_id = $_SESSION["user_id"];

$pdo = get_database_connection();
    
    $acc = "INSERT INTO accounts (user_id, balance) VALUES (:id, :balance)";
    $foo = $pdo->prepare($acc);

    $foo->execute(array(
        'id'   => $user_id,
        'balance' => (int)0,
    ));
    
    header('Location: account.php');
?>