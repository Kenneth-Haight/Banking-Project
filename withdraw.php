<html>
<head>
  <title>Withdraw</title>
</head>
<body>
<h1>Withdraw</h1>
    <body>
        <form method = "post">
   <table>
   <tr>
   <td>Withdrawl amount: </td>
               <td><input name = "withdraw" type = "double" size = "25" autofocus maxlength="30"> </td>
			   </tr>
			            <tr>
            <td><input type = "submit" value = "Submit" /></td>
            </tr>
			       </table>
			       </form>
<?php
  if(isset($_POST['withdraw']))      {    
    $dsn = 'mysql:host=localhost;dbname=haightk1_hbdb';
	$username = 'haightk1_administrator';
	$password = 'NYE99xyzCPA';

  $db = new PDO($dsn, $username, $password);
  
  $amount = $_POST['withdraw'];

  $account_id = '1';
    $timestamp = date("Y-m-d H:i:s");
  
  $stmt = $db->prepare("SELECT balance FROM accounts WHERE account_id=?");
  $stmt->execute(array($account_id));
    $user = $stmt->fetch();
  $totalAmount =$user['balance'] - $amount;
  
if ($user) {
    if($amount <= 0){
        echo "Error, input cannot be a negative amount or zero, please try again";
    }
        else if($totalAmount < 0){
            echo "Sorry you cannot overdraft.";
        }else{
        $update = "UPDATE accounts SET balance = '$totalAmount' WHERE account_id = $account_id";
  $stmt = $db->query($update);
  
    $stmt = $db->prepare("SELECT balance FROM accounts WHERE account_id=?");
  $stmt->execute(array($account_id));
    $check = $stmt->fetch();
    echo "Current Balance: " . $check['balance'];
    
    $transaction = "INSERT INTO account_transactions (account_id, time_made, description, amount, updated_balance)
VALUES (:id, :time, :desc, :amount, :balance)";

$desc = 'You withdrawed $' .$amount;

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