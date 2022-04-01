<html>
<head>
  <title>Deposit</title>
</head>
<body>
<h1>Deposit</h1>
    <body>
        <form method = "post">
   <table>
   <tr>
   <td>Deposit amount: </td>
               <td><input name = "deposit" type = "double" size = "25" autofocus maxlength="30"> </td>
			   </tr>
			            <tr>
            <td><input type = "submit" value = "Submit" />
            <input type = "reset" value = "Clear" /></td>
            </tr>
			       </table>
			       </form>
<?php
  if(isset($_POST['deposit']))      {    
    $dsn = 'mysql:host=localhost;dbname=haightk1_hbdb';
	$username = 'haightk1_administrator';
	$password = 'NYE99xyzCPA';

  $db = new PDO($dsn, $username, $password);
  
  $amount = $_POST['deposit'];

  $account_id = '1';
  
  $stmt = $db->prepare("SELECT balance FROM accounts WHERE account_id=?");
  $stmt->execute(array($account_id));
    $user = $stmt->fetch();
  $totalAmount = $amount + $user['balance'];
  
  $update = "UPDATE accounts SET balance = '$totalAmount' WHERE account_id = $account_id";
  $stmt = $db->query($update);
if ($stmt) {
    echo "Current Balance: " . $user['balance'];
} else {
    echo "Error";
} 
}

  $result->free();
  $db->close();
?>
</body>
</html>