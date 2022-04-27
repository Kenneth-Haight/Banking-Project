<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    include 'includes/403.php';
    exit();
}

$account_id = $_GET['id'];

if (isset($_POST['transfer']) && isset($_POST['Account'])) {    
  
    include 'scripts/db.php';
    $db = get_database_connection();
  
    $input = $_POST['transfer'];

    $_SESSION['recipient'] = $_POST['Account'];
    $_SESSION['transfer'] = $_POST['transfer'];

    if (!isAmountInputValid($input)) {
        $_SESSION['invalid_transfer_amount'] = true;
        header('Location: transfer.php');
        exit;
    }
    $amount = floatval($input);

    // $account_id = $_SESSION["account_id"];
  
    $transferTo = $_POST['Account'];
    
    if ($account_id == $transferTo) {
        $_SESSION['self-transfer'] = true;
        header('Location: transfer.php');
        exit();
    }
    
    $recipient_account_id = $_POST['Account'];
  
    // Get current user's account id.
    $stmt = $db->prepare("SELECT user_id FROM users WHERE user_id=?");
    $stmt->execute(array($account_id));
    $user1 = $stmt->fetch();
  
    // Get recipient's account id.
    $stmt2 = $db->prepare("SELECT user_id FROM accounts WHERE account_id=?");
    //   $stmt2 = $db->prepare("SELECT * FROM accounts WHERE account_id=?");
    $stmt2->execute(array($recipient_account_id));
    $user2 = $stmt2->fetch();
  
    $recipient_does_not_exist = ($stmt2->rowCount() === 0);
  
    if ($recipient_does_not_exist) {
        $_SESSION['invalid_recipient'] = true;
        header('Location: transfer.php');
        exit;
    }

    // 
    $statement = $db->prepare("SELECT balance FROM accounts WHERE account_id = ?");
    $statement->execute(array($account_id));
    $user = $statement->fetch();
    
    $totalAmount = $user['balance'] - $amount;
  
    if ($totalAmount < 0) {
        $_SESSION['will_overdraft'] = true;
        header("Location: transfer.php?id=$account_id");
        exit;
    }
  
    $bal = $db->prepare("SELECT balance FROM accounts WHERE account_id = ?");
    $bal->execute(array($account_id));
    $temp = $bal->fetch();
    
    $update1 = "UPDATE accounts SET balance = '$totalAmount' WHERE account_id = $account_id";
    $stmt1 = $db->query($update1);
    
    // Add transaction history to user 1
    $transaction = "INSERT INTO account_transactions 
    (account_id, time_made, description, amount, updated_balance)
    VALUES (:id, CURRENT_TIMESTAMP, :desc, :amount, :balance)";

    // $desc = 'Transfer of $' .$amount. " to " .$transferTo;
    $desc = "Transfer of " . "$" . number_format($amount, 2, ".", ",") . " sent to account #$transferTo";

    $foo = $db->prepare($transaction);

    $timestamp = date("Y-m-d H:i:s");

    $foo->execute(array(
        'id'   => $account_id,
        'desc'    => $desc,
        'amount'        => -1*$amount,
        'balance' => $totalAmount,
    ));
  
    $bal2 = $db->prepare("SELECT balance FROM accounts WHERE account_id=?");
    $bal2->execute(array($transferTo));
    $temp2 = $bal2->fetch();
    $totalAmount = $amount + $temp2['balance'];
    $update2 = "UPDATE accounts SET balance = '$totalAmount' WHERE account_id = $transferTo";
    $stmt2 = $db->query($update2);
    
    // Add transaction history to user 2
    $transaction = "INSERT INTO account_transactions 
    (account_id, time_made, description, amount, updated_balance)
    VALUES (:id, CURRENT_TIMESTAMP, :desc, :amount, :balance)";

    // $desc = "Transfer of " . $account_id. " gave you $" .$amount;
    $desc = "Transfer of " . "$" . number_format($amount, 2, ".", ",") . " received from account #$account_id";

    $foo = $db->prepare($transaction);

    $foo->execute(array(
        'id'   => $transferTo,
        'desc'    => $desc,
        'amount'        => $amount,
        'balance' => $totalAmount,
    ));
  
    $db = null;
    header("Location: account.php?id=$account_id");
}

?>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Transfer - haight banking</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="css/account.css">
    
</head>
<body>
            <div class="container px-0" style="background: #fff;">
        <header class="py-2 text-center" style="width: 100%">
            <div class="container-fluid" style="width: 100%;">
                <!--<span class="navbar-brand mb-0 h1">haight banking</span>-->
                <h4 class="fw-bold">haight banking</h1>
                <!--<button class="btn btn-primary" >Sign out</button>-->
            </div>
        </header>
        <nav class="py-2 pb-1 d-flex flex-row">
            <div class="flex-grow-1">
                <a class="mx-4 link-secondary" href="profile.php">Back to Profile</a>
                <a class="mx-4" href=<?= "account.php?id=$account_id" ?>>Home</a>
                <a class="mx-4" href=<?= "deposit.php?id=$account_id" ?>>Deposit</a>
                <a class="mx-4" href=<?= "withdraw.php?id=$account_id" ?>>Withdraw</a>
                <a class="mx-4 fw-bold" href=<?= "transfer.php?id=$account_id" ?>>Transfer</a>
                <a class="mx-4" href=<?= "statement.php?id=$account_id" ?>>Statement</a>
            </div>
            <div>
                <a href="logout.php" class="btn btn-secondary mx-2" id="sign-out-btn">Sign out</a>
            </div>
        </nav>
        <div class="py-4" style="background-color: #5B6C5DC4;">
            <div class="m-4 mx-auto p-4 rounded" style="background: #fff; width: 600px">
                <h1 class="display-6 mb-4" style="font-size: 30px;">Transfer an amount</h1>
                <hr>
                <form method="post" class="mt-4">
                    <div class="row mb-4">
                        <div class="col-sm-7">
                             <label for="Account">Choose a recipient #:</label>
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
        if ($account_id == $_SESSION['account_id']) continue;
        echo "<option value=$account_id>$account_id</option>";
    }
    ?>
</select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-sm-5 col-form-label fw-bold" style="font-size: 16px" for="deposit">Amount</label>
                        <div class="col-sm-7">
                            <input class="form-control" name = "transfer" type="double" maxlength="20" required placeholder="Enter an amount to transfer"
                            value="<?php echo (isset($_SESSION['transfer']) ? $_SESSION['transfer'] : ""); unset($_SESSION['transfer']);  ?>"
                            >
                        </div>
                    </div>
                        
                        
                    <?php 
                                    if (isset($_SESSION['invalid_transfer_amount'])) {
                    echo '<div class="alert alert-danger mb-4">Please enter a valid transfer amount.</div>';
                    unset($_SESSION['invalid_transfer_amount']);
                }
                        if (isset($_SESSION['invalid_recipient'])) {
                            echo '<div class="alert alert-danger mb-4">We can\'t find a recipient with that account number.</div>';
                            unset($_SESSION['invalid_recipient']);
                        }
                                    if (isset($_SESSION['will_overdraft'])) {
                    echo '<div class="alert alert-danger mb-4">Amount entered will would result to an overdraft.</div>';
                    unset($_SESSION['will_overdraft']);
                }
                if (isset($_SESSION['self-transfer'])) {
                    echo '<div class="alert alert-danger mb-4">Cannot send a transfer to your own account.</div>';
                    unset($_SESSION['self-transfer']);
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