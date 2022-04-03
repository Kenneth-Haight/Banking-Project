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
        <form class="px-4 mx-auto" action="staff_login_script.php" method="post">
          <h5 class="mt-4 text-center">Sign in to Admin account</h5>
          <!-- Username -->
          <div class="mt-3">
            <input class="form-control" type="text" name="username" placeholder="Username" required>
          </div>

          <!-- Password -->
          <div class="mt-3">
            <input class="form-control" type="password" name="password" placeholder="Password" required>
          </div>

          <div class="mt-4">
            <button class="btn btn-primary" type="submit" style="width: 232px">Submit</button>
          </div>
          
          <div class="my-3 text-center">
            <span><a href="index.php">Return Home</a></span>
          </div>

        </form>
      </div>
      <div style="height: 250px;"></div>
    </div>

  </body>
</html>
