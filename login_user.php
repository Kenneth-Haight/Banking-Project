<?php
/*$dsn = 'mysql:host=localhost;dbname=haightk1_hbdb';
$username = 'haightk1_administrator';
$password = 'NYE99xyzCPA';

$db = new PDO($dsn, $username, $password);

$username = $_POST['username'];
$password = $_POST['password'];

$stmt = $db->prepare("SELECT password FROM users WHERE username=?");
$stmt->execute(array($username)); 
$user = $stmt->fetch();
    
if (password_verify($password, $user['password'])) {
    $URL="account.php";
    include "<script>window.location.href = $URL;</script>";
    // echo "<meta HTTP-EQUIV='refresh' content='0;URL=$URL'>";
}
// $result->free();
$db->close();
    
$_SESSION['INVALID_LOGIN'] = "Incorrect username or password";

?>*/
if(isset($_POST['username']) || isset($_POST['password'])){
    $dsn = 'mysql:host=localhost;dbname=haightk1_hbdb';
	$username = 'haightk1_administrator';
	$password = 'NYE99xyzCPA';

  $db = new PDO($dsn, $username, $password);

$inputted_username = $_POST['username'];
$inputted_password = $_POST['password'];
// $hash = password_hash($inputted_password, PASSWORD_DEFAULT);


  $stmt = $db->prepare("SELECT password FROM users WHERE username=?");
  $stmt->execute(array($inputted_username)); 
    $user = $stmt->fetch();
if ($user) {
    if (password_verify($inputted_password, $user['password'])){
        $URL="account.php";
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
 $db->close();

// session_start();
// $_SESSION["INVALID_LOGIN"] = "Incorrect username or password";

// $URL="login.php";
// echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
// echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';

//   $result->free();
  
  
?>