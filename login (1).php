<?php
    session_start();
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
      form {
        width: 400px;
      }
      input {
        background-color: #f1f1f2 !important;
      }
      a {
        text-decoration: none;
      }
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
        <form class="px-4 mx-auto" action="login_user.php" method="post">
                    <?php 
            if (isset($_SESSION["user_just_registered"])) {
                echo '<div class="alert alert-success">';
                echo 'Huzzah! You can now sign in.';
                echo '</div>';
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
                // print_r($_SESSION);
                if (isset($_SESSION['invalid_login'])) {
                    echo <<<EOF
                        <div class="alert alert-danger">
                            Invalid username or password.
                        </div>
                    EOF;
                    unset($_SESSION['invalid_login']);
                }
            ?>
            <button class="btn btn-primary mt-2" type="submit" style="width: 232px">Submit</button>
          </div>

          <div class="my-3 text-center">
            <span>New to haight banking? <a href="register.php">Sign up</a></span>
          </div>

        </form>
      </div>
      <div style="height: 250px;"></div>
    </div>

  </body>
</html>
