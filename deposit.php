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
            <td><input type = "submit" value = "Submit" /></td>
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
  
if ($user) {
    if($amount <= 0){
        echo "Error, input cannot be a negative amount or zero, please try again";
    }
    else{
        $update = "UPDATE accounts SET balance = '$totalAmount' WHERE account_id = $account_id";
  $stmt = $db->query($update);
  
  
    $stmt = $db->prepare("SELECT balance FROM accounts WHERE account_id=?");
  $stmt->execute(array($account_id));
    $check = $stmt->fetch();
    echo "Current Balance: " . $check['balance'];
    
        $timestamp = date("Y-m-d H:i:s");
        $transaction = "INSERT INTO account_transactions (account_id, time_made, description, amount, updated_balance)
VALUES (:id, :time, :desc, :amount, :balance)";

$desc = 'You deposited $' .$amount;

$foo = $db->prepare($transaction);

$foo->execute(array(
    'id'   => $account_id,
    'time'   => $timestamp,
    'desc'    => $desc,
    'amount'        => $amount,
    'balance' => $check['balance'],
));
    }
} else {
    echo "Error, unable to connect to database.";
} 
}

  $result->free();
  $db->close();
?>
</body>
</html>