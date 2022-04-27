<?php 

session_start();

if (!isset($_SESSION['user_id'])) {
    include 'includes/403.php';
    exit();
}

$user_id = $_SESSION['user_id'];
// echo $user_id;

include 'scripts/db.php';

$pdo = get_database_connection();

$sql = "SELECT * FROM users WHERE user_id = $user_id";
$stmt = $pdo->query($sql);
$row = $stmt->fetch();

?>

<!doctype html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Account Dashboard - haight banking</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body style="background: /*#A1B5D8*/ #f3f7fb">
    <div class="d-flex mx-3 mt-5" style="height: 1000px !important">
        <div class="mx-3">
            <div class="p-3" style="background-color: #fff">
                <?php $first_letter = $row['first_name'][0];  ?>
                <div class="border border-2 border-dark p-3 py-1 h2 rounded" id="pfp"><?= $first_letter ?></div>
                <p class="profile.php">Welcome, <?= "{$row['first_name']}" ?>!</h6>
                <div class="d-flex">
                    <a href="">Profile</a>
                    <button onclick="location.href = 'logout.php'">Sign out</button>
                </div>
            </div>
        </div>
        <div class="flex-grow-1 p-3 mx-3" style="background-color: #fff;">
            <!--<div class="my-2 p-2" style="background-color: #E4F0D0; border-radius: 0.7rem">-->
            <!--    <h4 class="text-center">haight banking</h4>-->
            <!--</div>-->
            <div class="">
                <h2 class="d-inline">My profile</h2>
                <div class="float-end">
                        <button onclick="location.href = 'create_account.php'">
                            <i class="bi bi-plus"></i>Create a new account
                        </button>
                    </div>
            </div>
            <div>
                <?php
                    if ($_SESSION['has_unapproved_account']) {
                        echo '<div class="alert alert-danger mb-4">Already have an account awaiting approval.</div>';
                        unset($_SESSION['has_unapproved_account']);
                    }
                ?>
            </div>
            <div>
                <h4>Accounts</h4>
                
                <?php foreach ($pdo->query("SELECT * FROM accounts WHERE user_id = $user_id ORDER BY account_id") as $row): ?>
                    <div class="d-flex border mb-3 profile-account" onclick="<?php
                        if ($row['approved']) {
                            echo "location.href= 'account.php?id={$row['account_id']}'";
                        } else {
                            echo "";
                        }
                    ?>">
                        <div class="flex-grow">
                            <h6 class="border border-1 border-dark p-3 py-1 h6 rounded"><?= $row['account_id'] ?></h6>
                        </div>
                        <div>
                            <p><?= formatAmount($row['balance']) ?></p>
                            
                        </div>
                        <div>
                            <?php 
                                if (!$row['approved']) {
                                    echo 'unapproved';
                                }
                            ?>
                        </div>
                    </div>
                <?php endforeach; ?>
                
            </div>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
