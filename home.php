<?php
$user_id = '1';

$dsn = 'mysql:host=localhost;dbname=haightk1_hbdb';
	$username = 'haightk1_administrator';
	$password = 'NYE99xyzCPA';

  $db = new PDO($dsn, $username, $password);

$stmt = $db->prepare("SELECT * FROM accounts WHERE user_id=?");
  $stmt->execute(array($user_id));
  $num_results = $stmt->rowCount();
  
  echo "<p>Number of accounts: ".$num_results."</p>";

  for ($i=0; $i <$num_results; $i++) {
         $user = $stmt->fetch();
        echo "<form method = 'post'>";
			      echo '</form>';
	echo "Account Number: ".htmlspecialchars(stripslashes($user['account_id']));
	$id = $user['account_id'];
	echo "<br>";
	        echo "<form method = 'post'>";
	       // echo "<input type = 'submit' value = '$id' />";
			      echo '</form>';
     echo "Balance: ".htmlspecialchars(stripslashes($user['balance']));
     echo "<br>";
  }
  $result->free();
  $db->close();
     exit;
?>