<?php
session_start();


$dsn = 'mysql:host=localhost;dbname=haightk1_hbdb';
$username = 'haightk1_administrator';
$password = 'NYE99xyzCPA';

$db = new PDO($dsn, $username, $password);

$username = $_POST['username'];
$password = $_POST['password'];

  $stmt = $db->prepare("SELECT user_id, password FROM users WHERE username=?");
  $stmt->execute(array($username)); 
$user = $stmt->fetch();
if ($user) {
    if (password_verify($password, $user['password'])){
        $_SESSION["userID"] = $user['user_id'];
        echo ("<script>document.location.href='account.php';</script>");
        exit(0);
    }
} 

$_SESSION["invalid_login"] = "Incorrect username or password";
// print_r($_SESSION);

echo "<script>document.location.href='login.php';</script>";


$db->close();
?>