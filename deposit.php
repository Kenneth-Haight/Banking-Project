<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    include 'includes/403.php';
    exit();
}

$account_id = $_GET['id'];

if (isset($_POST['deposit'])) {    
    
    include 'scripts/db.php';
    $db = get_database_connection();
  
    $input = $_POST['deposit'];

    // Repopulate amount if there are errors
    $_SESSION['deposit'] = $input;

    if (!isAmountInputValid($input)) {
        $_SESSION['invalid_deposit_amount'] = true;
        header("Location: deposit.php?id=$account_id");
        exit;
    }
    $amount = floatval($input);
    
    if ($amount > 10000) {
        $_SESSION["over_max_deposit_amount"] = true;
        header("Location: deposit.php?id=$account_id");
        exit;
    }

    // $account_id = $_SESSION["account_id"];
    // echo $account_id;
  
    $stmt = $db->prepare("SELECT balance FROM accounts WHERE account_id = ?");
    $stmt->execute(array($account_id));
    $user = $stmt->fetch();
    $totalAmount = $amount + $user['balance'];

    $update = "UPDATE accounts SET balance = '$totalAmount' WHERE account_id = $account_id";
    $stmt = $db->query($update);

    $stmt = $db->prepare("SELECT balance FROM accounts WHERE account_id=?");
    $stmt->execute(array($account_id));
    $check = $stmt->fetch();
    // echo "Current Balance: " . $check['balance'];

    $transaction = "INSERT INTO account_transactions 
    (account_id, time_made, description, amount, updated_balance) 
    VALUES (:id, CURRENT_TIMESTAMP, :desc, :amount, :balance)";

    // $formatted_amount = "$" . number_format($amount, 2, ".", ",");
    $formatted_amount = formatAmount($amount);
    $description = "Deposit of $formatted_amount"; 

    $foo = $db->prepare($transaction);

    $foo->execute(array(
        'id'   => $account_id,
        'desc'    => $description,
        'amount' => $amount,
        'balance' => $check['balance'],
    ));
    
    $db = null;
    
    header("Location: account.php?id=$account_id");
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
            </div>
        </header>
        
        <nav class="py-2 pb-1 d-flex flex-row">
            <div class="flex-grow-1">
                <a class="mx-4 link-secondary" href="profile.php">Back to Profile</a>
                <a class="mx-4" href=<?= "account.php?id=$account_id" ?>>Home</a>
                <a class="mx-4 fw-bold" href=<?= "deposit.php?id=$account_id" ?>>Deposit</a>
                <a class="mx-4" href=<?= "withdraw.php?id=$account_id" ?>>Withdraw</a>
                <a class="mx-4" href=<?= "transfer.php?id=$account_id" ?>>Transfer</a>
                <a class="mx-4" href=<?= "statement.php?id=$account_id" ?>>Statement</a>
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
