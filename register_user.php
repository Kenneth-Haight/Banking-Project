<?php

session_start();

$dsn = 'mysql:host=localhost;dbname=haightk1_hbdb';
$username = 'haightk1_administrator';
$password = 'NYE99xyzCPA';

try {
    $pdo = new PDO($dsn, $username, $password);
}
catch (PDOException $exception) {
    $errorMessage = $exception->getMessage();
    echo $errorMessage;
    exit();
}

$first    = $_POST['first-name'];
$last     = $_POST['last-name'];
$email    = $_POST['email-address'];
$phone    = $_POST['phone-number'];
$username = $_POST['username'];
$password = $_POST['password'];
$confirm  = $_POST['password-confirm'];

$hash = password_hash($password, PASSWORD_DEFAULT);

$statement1 = "INSERT INTO users 
(first_name, last_name, email_address, phone_number, username, password)
VALUES 
(:first_name, :last_name, :email, :phone_number, :username, :password)";

$foo = $pdo->prepare($statement1);

$foo->execute(array(
    'first_name'   => $first,
    'last_name'    => $last,
    'email'        => $email,
    'phone_number' => $phone,
    'username'     => $username,
    'password'     => $hash,
));

if($foo){
    $stmt = $pdo->prepare("SELECT user_id FROM users WHERE username=?");
  $stmt->execute(array($username));
    $row = $stmt->fetch();
    
     $acc = "INSERT INTO accounts (user_id, balance)
VALUES (:id, :balance)";
$foo = $pdo->prepare($acc);

$foo->execute(array(
    'id'   => $row['user_id'],
    'balance' => (int)0,
));
}

$_SESSION["user_just_registered"] = true;

echo "<script>document.location.href='login.php';</script>";

$pdo->close();

?>
