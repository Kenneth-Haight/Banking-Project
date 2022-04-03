<!doctype html>
<html>
  <head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Register - haight banking</title>

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
        <h1 class="display-6 fw-bold"><a href="index.php" style="text-decoration: none; color: initial;">haight banking</a></h1>
        <p class="text-muted">easy, simple, secure banking</p>
      </header>
      <div class="d-flex mt-1">
        <form class="px-4 mx-auto" action="register_user.php" method="post">

          <h5 class="mt-4 text-center">Create an account</h5>

          <div class="row mt-3">
            <!-- First name   -->
            <div class="col">
              <input class="form-control" type="text" name="first-name" maxlength="20" placeholder="First name" required>
            </div>
            <!-- Last name -->
            <div class="col">
              <input class="form-control" type="text" name="last-name" placeholder="Last name">
            </div>
          </div>

          <!-- Username -->
          <div class="mt-3">
            <input class="form-control" type="text" name="username" placeholder="Username" required>
          </div>

          <!-- Password -->
          <div class="mt-3">
            <input class="form-control" type="password" name="password" placeholder="Password" required>
          </div>

            <!-- Confirm password -->
          <div class="mt-3">
            <input class="form-control" type="password" name="password-confirm" placeholder="Confirm password" required>
          </div>

          <!-- Email -->
          <div class="mt-3">
            <input class="form-control" type="email" name="email-address" placeholder="Email" required>
          </div>

          <!-- Phone number -->
          <div class="mt-3">
            <input class="form-control" type="tel" name="phone-number" placeholder="Phone number" required>
          </div>

          <div class="mt-4">
            <button class="btn btn-primary" type="submit" style="width: 232px">Submit</button>
          </div>

          <div class="my-3 text-center">
            <span>Already have an account? <a href="login.php">Sign in</a></span>
          </div>

        </form>
      </div>

      <div style="height: 100px;"></div>
    </div>

  </body>
</html>
