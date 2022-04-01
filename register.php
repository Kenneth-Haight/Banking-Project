<!doctype html>
<html>
  <head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <title>Register - haight banking</title>
 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container text-center mt-5">
      <h1 class="display-6 fw-bold">haight banking</h1>
      <div class="d-flex mt-2">
        <form class="px-4 mx-auto" action="..." method="post">
          <h5 class="py-2 pt-4 text-center">Create an account</h5>
 
          <div class="row mt-3">
            <!-- First name   -->
            <div class="col">
              <input class="form-control" type="text" name="first-name" placeholder="First name" required>
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
            <span>Have an account already? <a href="login.php">Sign in</a></span>
          </div>
 
        </form>
      </div>
    </div>
  </body>
</html>
