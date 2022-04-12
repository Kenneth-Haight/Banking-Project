<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    include 'includes/403.php';
    exit();
}

$user_id = $_SESSION["user_id"];

include 'scripts/db.php';

$pdo = get_database_connection();

$statement = $pdo->prepare("SELECT * FROM users WHERE user_id=?");
$statement->execute(array($user_id));
$row = $statement->fetch();

$username = $row['username'];
$first = $row['first_name'];
$last  = $row['last_name'];
$email = $row['email_address'];
$phone = $row['phone_number'];
$password = $row['password'];


// Close database connection.
$pdo = null;
?>

<!doctype html> 
<html>
  <head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Statement - haight banking</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/account.css">
    <link rel="stylesheet" href="css/statement.css">
  </head>
  <body>
    <div class="container px-0" style="background: #fff;">
        <header class="py-2 text-center print-hidden">
            <div class="container-fluid">
                <h4 class="fw-bold">haight banking</h1>
            </div>
        </header>
        <nav class="py-2 pb-1 d-flex flex-row print-hidden">
            <div class="flex-grow-1">
                <a class="mx-4" href="account.php">Home</a>
                <a class="mx-4" href="deposit.php">Deposit</a>
                <a class="mx-4" href="withdraw.php">Withdraw</a>
                <a class="mx-4" href="transfer.php">Transfer</a>
                <a class="mx-4" href="statement.php">Statement</a>
                <a class="mx-4 fw-bold" href="edit.php">Edit User</a>
            </div>
            <div>
                <a href="logout.php" class="btn btn-secondary mx-2" id="sign-out-btn">Sign out</a>
            </div>
        </nav>
        <div class="py-4" style="background-color: #5B6C5DC4;">
            <div class="mx-auto mt-4 p-3 rounded" style="background: #fff; width: 900px;" id="statement">
                <div class="mb-3">
                    <h1 class="display-5 fw-bold">haight banking</h1>
                    <h5 class="display-6" style="font-size: 25px;"><?= "$username" ?></h5>
                </div>
                
                <h5 class="my-4"><b>Date</b>: <?= date('d/m/Y') ?></h5>
                <hr>
                <div>
                    <h6><b>Name</b>: <?= "$first $last" ?></h6>
                    <h6><b>Email</b>: <?= $email ?></h6>
                    <h6><b>Phone number</b>: <?= $phone ?></h6>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

  </body>
</html>
