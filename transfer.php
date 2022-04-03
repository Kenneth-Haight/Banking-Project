<html>
<head>
  <title>Transfer to another user</title>
</head>
<body>
<h1>Transfer to another user</h1>
    <body>
        <form method = "post">
   <table>
   <tr>
   <td>Transfer amount: </td>
               <td><input name = "transfer" type = "double" size = "25" autofocus maxlength="30"> </td>
			   </tr>
			            <tr>
            <td><input type = "submit" value = "Submit" /></td>
            </tr>
			       </table>
			       </form>
<?php
  if(isset($_POST['transfer']))      {    
    $dsn = 'mysql:host=localhost;dbname=haightk1_hbdb';
	$username = 'haightk1_administrator';
	$password = 'NYE99xyzCPA';

  $db = new PDO($dsn, $username, $password);
  
  $amount = $_POST['transfer'];

  $account_id = '1';
  $transferTo = '2';
  
$stmt = $db->prepare("SELECT user_id FROM users WHERE user_id=?");
  $stmt->execute(array($account_id));
  $user1 = $stmt->fetch();
  
  $stmt2 = $db->prepare("SELECT user_id FROM users WHERE user_id=?");
  $stmt2->execute(array($transferTo));
  $user2 = $stmt->fetch();
  
  $stmt = $db->prepare("SELECT balance FROM accounts WHERE account_id=?");
  $stmt->execute(array($account_id));
    $user = $stmt->fetch();
  $totalAmount = $user['balance'] - $amount;
  
    if($amount <= 0){
        echo "Error, input cannot be a negative amount or zero, please try again";
    }
    else if($totalAmount < 0){
           echo "Sorry you cannot overdraft."; 
           exit();
    }
    else{
        
  $bal = $db->prepare("SELECT balance FROM accounts WHERE account_id=?");
  $bal->execute(array($account_id));
    $temp = $bal->fetch();
        $totalAmount;
        $update1 = "UPDATE accounts SET balance = '$totalAmount' WHERE account_id = $account_id";
  $stmt1 = $db->query($update1);
  //Add transaction history to user 1
   $transaction = "INSERT INTO account_transactions (account_id, time_made, description, amount, updated_balance)
VALUES (:id, :time, :desc, :amount, :balance)";

$desc = 'You transfered $' .$amount. " to " .$transferTo;

$foo = $db->prepare($transaction);

$foo->execute(array(
    'id'   => $account_id,
    'time'   => $timestamp,
    'desc'    => $desc,
    'amount'        => $amount,
    'balance' => $temp['balance'],
));
  
  $bal2 = $db->prepare("SELECT balance FROM accounts WHERE account_id=?");
  $bal2->execute(array($transferTo));
    $temp2 = $bal2->fetch();
  $totalAmount = $amount + $temp2['balance'];
  $update2 = "UPDATE accounts SET balance = '$totalAmount' WHERE account_id = $transferTo";
  $stmt2 = $db->query($update2);
  //Add transaction history to user 2
     $transaction = "INSERT INTO account_transactions (account_id, time_made, description, amount, updated_balance)
VALUES (:id, :time, :desc, :amount, :balance)";

$desc = $account_id. " gave you $" .$amount;

$foo = $db->prepare($transaction);

$foo->execute(array(
    'id'   => $transferTo,
    'time'   => $timestamp,
    'desc'    => $desc,
    'amount'        => $amount,
    'balance' => $temp2['balance'],
));
  
    }
    }

  $result->free();
  $db->close();
?>
</body>
</html>