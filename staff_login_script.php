<?php
/*
Login for admin 
userNAme: man
pass: bread
*/

if(isset($_POST['username']) || isset($_POST['password'])){
    $dsn = 'mysql:host=localhost;dbname=haightk1_hbdb';
	$username = 'haightk1_administrator';
	$password = 'NYE99xyzCPA';

  $db = new PDO($dsn, $username, $password);

$inputted_username = $_POST['username'];
$inputted_password = $_POST['password'];
// $hash = password_hash($inputted_password, PASSWORD_DEFAULT);
// echo $hash;

// exit();
  $stmt = $db->prepare("SELECT password FROM staff WHERE username=?");
  $stmt->execute(array($inputted_username)); 
    $user = $stmt->fetch();

if ($user) {
    if (password_verify($inputted_password, $user['password'])){
        $URL="staff_page.php";
      echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
      echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
    }
    else {
    echo "Invalid password. Please try again.";
} 
} else {
    echo "Invalid user. Please try again.";
} 
}

//   $result->free();
  $db->close();
  
  
?>