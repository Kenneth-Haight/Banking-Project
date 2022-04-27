<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    include 'includes/403.php';
    exit();
}

$account_id = $_GET['id'];

$user_id = $_SESSION["user_id"];

include 'scripts/db.php';
$pdo = get_database_connection();

$stmt = $pdo->prepare("SELECT * FROM accounts WHERE account_id=?");
$stmt->execute(array($account_id));
$num_results = $stmt->rowCount();
$user = $stmt->fetch();

// $account_id =  $_GET['user_id'] || $user['account_id'];
$_SESSION['account_id'] = $account_id;

$balance = $user['balance'];

$pdo = null;
?>

<!doctype html> 
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Account - haight banking</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
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
                <a class="mx-4 fw-bold" href=<?= "account.php?id=$account_id" ?>>Home</a>
                <a class="mx-4" href=<?= "deposit.php?id=$account_id" ?>>Deposit</a>
                <a class="mx-4" href=<?= "withdraw.php?id=$account_id" ?>>Withdraw</a>
                <a class="mx-4" href=<?= "transfer.php?id=$account_id" ?>>Transfer</a>
                <a class="mx-4" href=<?= "statement.php?id=$account_id" ?>>Statement</a>
            </div>
            <div>
                <a href="logout.php" class="btn btn-secondary mx-2" id="sign-out-btn">Sign out</a>
            </div>
        </nav>
        <div class="d-flex flex-row py-4" style="background-color: #5B6C5DC4;">
            <div class="m-4 p-3 pb-1 rounded" style="background: #fff; width: 405px;">
                <h6 class="display-6">Current balance:</h6>
                <div class="display-6"><?= formatAmount($balance) ?></div>
                <p class="text-muted mt-2">Account number: <?= $account_id ?></p>
            </div>
            
            <?php
                $pdo = get_database_connection();
                // $account = $_POST['Account'];
                
                $statement = $pdo->prepare("SELECT * FROM account_transactions WHERE account_id = ? AND description LIKE '%Deposit%'");
                $statement->execute(array($account_id));
                $num_deposits = $statement->rowCount();
                
                $statement = $pdo->prepare("SELECT * FROM account_transactions WHERE account_id = ? AND description LIKE '%Withdrawal%'");
                $statement->execute(array($account_id));
                $num_withdrawals = $statement->rowCount();
                
                $statement = $pdo->prepare("SELECT * FROM account_transactions WHERE account_id = ? AND description LIKE '%sent%'");
                $statement->execute(array($account_id));
                $num_transfers = $statement->rowCount();

                $pdo = null;
            ?>
            
            <div class="m-4 p-3 rounded" style="background: #fff; max-width: fit-content;">
                <h6 class="display-6" style="font-size: 25px">Number of Deposits: </h6>
                <div>
                    <h6 class="display-6"><?= $num_deposits ?></h6>
                </div>
            </div>
            
            <div class="m-4 p-3 rounded" style="background: #fff; max-width: fit-content;">
                <h6 class="display-6" style="font-size: 25px">Number of Withdrawals: </h6>
                <div>
                    <h6 class="display-6"><?= $num_withdrawals ?></h6>
                </div>
            </div>
            
            <div class="m-4 p-3 rounded" style="background: #fff; max-width: fit-content;">
                <h6 class="display-6" style="font-size: 25px">Number of Transfers: </h6>
                <div>
                    <h6 class="display-6"><?= $num_transfers ?></h6>
                </div>
            </div>

        </div>

        <div class="m-3 p-4 mt-2 rounded" style="background-color: ;">
            <h3 class="display-6 fw-bold" style="font-size: 22px">Transaction History</h3>
            <hr>

    <?php
    

    $pdo = get_database_connection();
    
    $stmt1 = $pdo->prepare("SELECT * FROM account_transactions WHERE account_id = ? ORDER BY time_made DESC");
    $stmt1->execute(array($account_id));
    $nrows = $stmt1->rowCount();
    
    if ($nrows == 0) {
        echo '<div class="alert alert-secondary">You appear to have no transactions.</div>';
        echo '<div style="height: 200px"></div>';
        exit;
    }

    echo <<<EOD
        <table class="table table-hover" id="transactions-table">
            <thead class="table-light">
                <th style="width: 10%;"></th> 
                <th style="width: 15%">Date</th>
                <th style="width: 40%">Description</th>
                <th style="width: 15%; text-align: end">Amount</th>
                <th style="width: 20%; text-align: end">Balance</th>
                <th style=""></th>
            </thead>
            <tbody>
EOD;

    for ($i = 1; $i <= $nrows; $i++) {
        $transaction = $stmt1->fetch();
        if ($i % 2 == 0) {
            echo '<tr style="background-color: #ebf2fb">';
        } else {
            echo '<tr>';
        }
        
        echo "<td>$i</td>";
        echo "<td class='text-muted'>";
        // echo date("M d, Y", strtotime($transaction['time_made']));
        echo $transaction['time_made'];
        echo "</td>";
        echo "<td>{$transaction['description']}</td>";
        
        echo "<td>" . formatAmount($transaction['amount']) . "</td>";
        
        echo "<td>" . '$' . number_format($transaction['updated_balance'], 2, '.', ',') . "</td>";
        echo "<td></td>";
        echo '</tr>';
    }
    
    echo '</tbody>';
    echo '</table>'
    
    ?>

        </div>
        <div style="height: 200px"></div>
    </div>


    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

  </body>
</html>
