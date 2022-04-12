<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    include 'includes/403.php';
    exit();
}

if (isset($_POST['deposit'])) {    
    
    include 'scripts/db.php';
    $db = get_database_connection();
  
    $input = $_POST['deposit'];
    $account = $_POST['Account'];
    $amount = floatval($input);

    $_SESSION['deposit'] = $input;

    // Input validation
    
    $is_input_numeric = is_numeric($input);
    $is_amount_positive = ($amount > 0);
    
    // Amounts should only have 2 decimal places max.
    $valid_decimals = (round($amount, 2) === $amount);

    $is_input_valid = ($is_input_numeric && $is_amount_positive && $valid_decimals);

    if (!$is_input_valid) {
        $_SESSION['invalid_deposit_amount'] = true;
        header('Location: deposit.php');
        exit(0);
    }
    
    if ($amount > 10000) {
        $_SESSION["over_max_deposit_amount"] = true;
        header('Location: deposit.php');
        exit;
    }

    $account_id = $_SESSION["account_id"];
    // echo $account_id;
  
    $stmt = $db->prepare("SELECT balance FROM accounts WHERE account_id=?");
    $stmt->execute(array($account));
    $user = $stmt->fetch();
    $totalAmount = $amount + $user['balance'];
  
    if ($user) {
        if ($amount <= 0){
            echo "Error, input cannot be a negative amount or zero, please try again";
        }
        else {
            $update = "UPDATE accounts SET balance = '$totalAmount' WHERE account_id = $account";
            $stmt = $db->query($update);
  
            $stmt = $db->prepare("SELECT balance FROM accounts WHERE account_id=?");
            $stmt->execute(array($account));
            $check = $stmt->fetch();
            // echo "Current Balance: " . $check['balance'];
    
            $timestamp = date("Y-m-d H:i:s");
            $transaction = "INSERT INTO account_transactions 
            (account_id, time_made, description, amount, updated_balance) 
            VALUES (:id, :time, :desc, :amount, :balance)";

            $formatted_amount = "$" . number_format($amount, 2, ".", ",");
            $desc = "Deposit of $formatted_amount"; 

            $foo = $db->prepare($transaction);

            $foo->execute(array(
                'id'   => $account,
                'time'   => $timestamp,
                'desc'    => $desc,
                'amount'        => $amount,
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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Deposit - haight banking</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/account.css">
</head>
<body>
    <div class="container px-0" style="background: #fff;">
        
        <header class="py-2 text-center">
            <div class="container-fluid">
                <h4 class="fw-bold">haight banking</h1>
                <!--<button class="btn btn-primary" >Sign out</button>-->
            </div>
        </header>
        
        <nav class="py-2 pb-1 d-flex flex-row">
            <div class="flex-grow-1">
                <a class="mx-4" href="account.php">Home</a>
                <a class="mx-4 fw-bold" href="deposit.php">Deposit</a>
                <a class="mx-4" href="withdraw.php">Withdraw</a>
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
                <h1 class="display-6 mb-4" style="font-size: 30px;">Make a deposit</h1>
                <hr>
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
                            <input class="form-control" name = "deposit" type="double" id="deposit" maxlength="15" required placeholder="Enter an amount to deposit"
                            value="<?php echo (isset($_SESSION['deposit']) ? $_SESSION['deposit'] : ""); unset($_SESSION['deposit']);  ?>">
                        </div>
                    </div>
                        
                        
                        <?php 
                        if (isset($_SESSION['invalid_deposit_amount'])) {
                            echo '<div class="alert alert-danger mb-4">Please enter a valid deposit amount.</div>';
                            unset($_SESSION['invalid_deposit_amount']);
                        }
                        if (isset($_SESSION['over_max_deposit_amount'])) {
                            echo '<div class="alert alert-danger mb-4">Deposit amount cannot exceed $10,000.</div>';
                            unset($_SESSION['over_max_deposit_amount']);
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
