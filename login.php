<?php

session_cache_limiter('private, must-revalidate');
session_start();

$username = $_POST['username'] ?? null;
$password = $_POST['password'] ?? null;

if (isset($username) && isset($password)) {

    include 'scripts/db.php';
    $pdo = get_database_connection();

    $statement = $pdo->prepare('SELECT user_id, password FROM users WHERE username=?');
    $statement->execute(array($username)); 
    
    $row = $statement->fetch();
    $stored_password = $row['password'];

    if (password_verify($password, $stored_password)) {
        $_SESSION['user_id'] = $row['user_id'];
        header('Location: profile.php');
        exit;
    }
    
    // Close database connection.
    $pdo = null;
    
    // This session variable will be used to display an error message.
    $_SESSION['invalid_login'] = true;
    
    // header('Location: login.php');
}
    
?>

<!doctype html>
<html>
<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Login - haight banking</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    
    <style>
        form { width: 400px; }
        input { background-color: #f6f8f9 !important; }
        a { text-decoration: none; }
    </style>
</head>
<body>
  <?php include 'includes/shapes.php'; ?>
    <div class="container text-center mt-5">
      <header>
        <h1 class="display-6 fw-bold">haight banking</h1>
        <p class="text-muted">easy, simple, secure banking</p>
      </header>
      <div class="d-flex mt-1">
        <form class="px-4 mx-auto" method="post">
            <?php 
                // Display a message if the user just registered.
                if (isset($_SESSION["user_just_registered"])) {
                    echo '<div class="alert alert-success mt-1">Nice! You can now sign in.</div>';
                    unset($_SESSION["user_just_registered"]);
                }
            ?>
            
            <h5 class="mt-4 text-center">Sign in to your account</h5>
          
          <!-- Username -->
          <div class="mt-3">
            <input class="form-control" type="text" name="username" placeholder="Username" required>
          </div>

          <!-- Password -->
          <div class="mt-3">
            <input class="form-control" type="password" name="password" placeholder="Password" required>
          </div>

          <div class="mt-4">
            <?php 
                // Display a message if login isn't valid.
                if (isset($_SESSION['invalid_login'])) {
                    echo '<div class="alert alert-danger">Invalid username or password.</div>';
                    unset($_SESSION['invalid_login']);
                }
            ?>
            <button class="btn btn-primary mt-2" type="submit" style="width: 232px">Submit</button>
          </div>

          <div class="my-3 text-center">
            <span>New to haight banking? <a href="register.php">Sign up</a></span>
          </div>
          
        <div class="mt-5 text-center">
            <a class="btn px-2 py-1 rounded" href="index.php" style="background-color:#e4edfb; color: #174ea6; width: 100px">Back</a>
          </div>

        </form>
      </div>
      <div style="height: 250px;"></div>
    </div>

</body>
</html>
