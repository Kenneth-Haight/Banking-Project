<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    include 'includes/403.php';
    exit();
}

  if(isset($_POST['withdraw']))      {    
    include 'scripts/db.php';
    $db = get_database_connection();
  
  $input = $_POST['withdraw'];
  $amount = floatval($input);
  
  $_SESSION['withdraw'] = $input;
  
      // Input validation
    
    $is_input_numeric = is_numeric($input);
    $is_amount_positive = ($amount > 0);
    
    // Amounts should only have 2 decimal places max.
    $valid_decimals = (round($amount, 2) === $amount);

    $is_input_valid = ($is_input_numeric && $is_amount_positive && $valid_decimals);

    if (!$is_input_valid) {
        $_SESSION['invalid_withdrawal_amount'] = true;
        header('Location: withdraw.php');
        exit(0);
    }

    

  $account_id = $_SESSION["account_id"];
    $timestamp = date("Y-m-d H:i:s");
  
  $stmt = $db->prepare("SELECT balance FROM accounts WHERE account_id=?");
  $stmt->execute(array($account_id));
    $user = $stmt->fetch();
  $totalAmount = $user['balance'] - $amount;
  
  if ($totalAmount < 0) {
    $_SESSION['will_overdraft'] = true;
    header('Location: withdraw.php');
    exit(1);
  }
  
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
    // echo "Current Balance: " . $check['balance'];
    
    $transaction = "INSERT INTO account_transactions (account_id, time_made, description, amount, updated_balance)
VALUES (:id, :time, :desc, :amount, :balance)";

$desc = 'Withdrawal of $' . number_format($amount, 2, ".", ",");;

$foo = $db->prepare($transaction);

$foo->execute(array(
    'id'   => $account_id,
    'time'   => $timestamp,
    'desc'    => $desc,
    'amount'        => -1*$amount,
    'balance' => $check['balance'],
));
  $db = null;
  header('Location: account.php');
        }
    } else {
    echo "Error, unable to connect to database.";
} 
}

?>


<html>
<head>
        <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Withdraw - haight banking</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="css/account.css">
    
</head>
<body>
    <body>
        <div class="container px-0" style="background: #fff;">
        <header class="py-2 text-center">
            <div class="container-fluid">
                <h4 class="fw-bold">haight banking</h1>
            </div>
        </header>
        <nav class="py-2 pb-1 d-flex flex-row">
            <div class="flex-grow-1">
                <a class="mx-4" href="account.php">Home</a>
                <a class="mx-4" href="deposit.php">Deposit</a>
                <a class="mx-4 fw-bold" href="withdraw.php">Withdraw</a>
                <a class="mx-4" href="transfer.php">Transfer</a>
                <a class="mx-4" href="statement.php">Statement</a>
                <a class="mx-4" href="edit.php">Edit User</a>
            </div>
            <div>
                <a href="logout.php" class="btn btn-secondary mx-2" id="sign-out-btn">Sign out</a>
            </div>
        </nav>
        <div class="py-4" style="background-color: #5B6C5DC4;">
            <div class="m-4 mx-auto p-4 rounded" style="background: #fff; width: 600px">
            <h1 class="display-6 mb-4" style="font-size: 30px;">Make a withdrawal</h1>
            <hr>
                <form method="post" class="mt-4">
                    <div class="row mb-4">
                   <form method="post" class="mt-4">
                    <div class="row mb-4">
                        <label for="Account">Choose a bank account #:</label>
<select name="Account" id="Account">
      <?php
    include 'scripts/db.php';
    $db = get_database_connection();
    $stmt = $db->prepare("SELECT account_id FROM accounts WHERE user_id=? AND approved = 1");
    $stmt->execute(array($_SESSION['user_id']));
    $num_accounts = $stmt->rowCount();
    for($i = 0; $i < $num_accounts; $i++){
    $check = $stmt->fetch();
    $account_id = $check['account_id'];
    echo "<option value='$account_id'>$account_id</option>";
    }
    ?>
</select>
                        <label class="col-sm-3 col-form-label fw-bold" style="font-size: 16px" for="deposit">Amount</label>
                        <div class="col-sm-9">
                            <input class="form-control" name = "withdraw" type="double" maxlength="15" required placeholder="Enter an amount to withdraw"
                            value="<?php echo (isset($_SESSION['withdraw']) ? $_SESSION['withdraw'] : ""); unset($_SESSION['withdraw']);  ?>">
                        </div>
                    </div>
                    
                        
                        
            <?php 
                if (isset($_SESSION['invalid_withdrawal_amount'])) {
                    echo '<div class="alert alert-danger mb-4">Please enter a valid withdrawal amount.</div>';
                    unset($_SESSION['invalid_withdrawal_amount']);
                }
                
                if (isset($_SESSION['will_overdraft'])) {
                    echo '<div class="alert alert-danger mb-4">Amount entered will result to an overdraft.</div>';
                    unset($_SESSION['will_overdraft']);
                }
            ?>
                        
                    <div class="row mb-2 mt-2 mx-auto" style="width: 263px;">
                        <button class="btn btn-primary" style="" type="submit">Submit</button>
                    </div>

                </form>
                </div>
        </div>
                <div style="height: 400px"></div>
                </div>


</body>
</html>