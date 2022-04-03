<?php

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

$statement1 = "INSERT INTO users (first_name, last_name, email_address, phone_number, username, password)
VALUES (:first_name, :last_name, :email, :phone_number, :username, :password)";

$foo = $pdo->prepare($statement1);

$foo->execute(array(
    'first_name'   => $first,
    'last_name'    => $last,
    'email'        => $email,
    'phone_number' => $phone,
    'username'     => $username,
    'password'     => $hash,
));
$foo->fetch();

    //$stmt = $db->prepare("SELECT balance FROM accounts WHERE account_id=?");
 // $stmt->execute(array($account_id));
  //  $check = $stmt->fetch();

// $result = $pdo->query("SELECT user_id FROM users WHERE username=$username");

// $user_id = $result->fetch();

// $statement2 = "INSERT INTO accounts (user_id, balance) VALUES ($user_id, 0)";
// $pdo->query($statement2);

$pdo->close();

// $URL="login.php";
// include '<script>window.location.href = "login.php";</script>'
// echo "<script type='text/javascript'>window.location.href='{$URL}';</script>";
// echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
        // $URL="login.php";
        echo "<script type='text/javascript'>document.location.href='login.php';</script>";
        echo "<META HTTP-EQUIV='refresh' content=\"0;URL='login.php'\">";
