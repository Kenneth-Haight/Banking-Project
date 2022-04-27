<?php

session_start();

include 'scripts/db.php';

$pdo = get_database_connection();

$first    = $_POST['first-name'];
$last     = $_POST['last-name'];
$username = $_POST['username'];
$password = $_POST['password'];
$confirm  = $_POST['confirm-password'];
$email    = $_POST['email-address'];
$phone    = $_POST['phone-number'];

// Sessions variables will be used to repopulate the form if
// there's an error (excluding passwords).
$_SESSION['first-name']    = $first;
$_SESSION['last-name']     = $last;
$_SESSION['username']      = $username;
$_SESSION['email-address'] = $email;
$_SESSION['phone-number']  = $phone;

// Check if password match.

if ($password !== $confirm) {
    $_SESSION['unequal_passwords'] = true;
    header('Location: register.php');
    exit;
}


// Check if username is taken.

$statement = $pdo->prepare("SELECT * FROM users WHERE username=?");
$statement->execute(array($username));

$rows = $statement->rowCount();
$is_username_taken = ($rows > 0);

if ($is_username_taken) {
    $_SESSION['taken_username'] = true;
    header('Location: register.php');
    exit;
}


// Check if email is taken.

$statement = $pdo->prepare("SELECT * FROM users WHERE email=?");
$statement->execute(array($email));

$rows = $statement->rowCount();
$is_email_taken = ($rows > 0);

if ($is_email_taken) {
    $_SESSION['taken_email'] = true;
    header('Location: register.php');
    exit;
}


// Check if phone number is taken.

$statement = $pdo->prepare("SELECT * FROM users WHERE phone_number=?");
$statement->execute(array($phone));

$rows = $statement->rowCount();
$is_phone_number_taken = ($rows > 0);

if ($is_phone_number_taken) {
    $_SESSION['taken_phone_number'] = true;
    header('Location: register.php');
    exit;
}


$statement1 = "INSERT INTO users (first_name, last_name, email_address, phone_number, username, password)
VALUES (:first_name, :last_name, :email_address, :phone_number, :username, :password)";

$foo = $pdo->prepare($statement1);

$hash = password_hash($password, PASSWORD_DEFAULT);

$foo->execute(array(
    'first_name'    => $first,
    'last_name'     => $last,
    'email_address' => $email,
    'phone_number'  => $phone,
    'username'      => $username,
    'password'      => $hash,
));

// if ($foo) {
//     $stmt = $pdo->prepare("SELECT user_id FROM users WHERE username=?");
//     $stmt->execute(array($username));
//     $row = $stmt->fetch();
    
//     $acc = "INSERT INTO accounts (user_id, balance) VALUES (:id, :balance)";
//     $foo = $pdo->prepare($acc);

//     $foo->execute(array(
//         'id'   => $row['user_id'],
//         'balance' => (int)0,
//     ));
// }

// Close database connection.
$pdo = null;

// To tell the user that they can now sign in to their new account.
$_SESSION["user_just_registered"] = true;

// Redirect user to the login page.
header('Location: login.php');
