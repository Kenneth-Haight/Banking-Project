<?php

session_start();

?>

<!doctype html>
<html>
  <head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Staff Login - haight banking</title>

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
        <form class="px-4 mx-auto" action="staff_login_script.php" method="post">
          <h5 class="mt-4 text-center">Sign in to your staff account</h5>
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
            <button class="btn btn-success mt-2" type="submit" style="width: 232px">Submit</button>
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
