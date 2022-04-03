<?php
session_start();
$user_id = $_SESSION["userID"];

$dsn = 'mysql:host=localhost;dbname=haightk1_hbdb';
	$username = 'haightk1_administrator';
	$password = 'NYE99xyzCPA';

  $db = new PDO($dsn, $username, $password);

$stmt = $db->prepare("SELECT * FROM accounts WHERE user_id=?");
  $stmt->execute(array($user_id));
  $num_results = $stmt->rowCount();
  
  for ($i=0; $i <$num_results; $i++) {
         $user = $stmt->fetch();
	echo "Account Number: ".htmlspecialchars(stripslashes($user['account_id']));
	$id = $user['account_id'];
	echo "<br>";

     echo "Balance: ".htmlspecialchars(stripslashes($user['balance']));
     echo "<br>";
	       echo "<button id='deposit' class='float-left submit-button' >Deposit</button>";
echo '<script type="text/javascript"> document.getElementById("deposit").onclick = function () { location.href = "deposit.php"; } </script>';
     echo "<br>";
	       echo "<button id='withdraw' class='float-left submit-button' >Withdraw</button>";
echo '<script type="text/javascript"> document.getElementById("withdraw").onclick = function () { location.href = "withdraw.php"; } </script>';
     echo "<br>";
	       echo "<button id='transfer' class='float-left submit-button' >Transfer</button>";
echo '<script type="text/javascript"> document.getElementById("transfer").onclick = function () { location.href = "transfer.php"; } </script>';
  }
  $result->free();
  $db->close();

?>