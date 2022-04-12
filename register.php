<?php

session_start();

?>

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
        <h1 class="display-6 fw-bold">haight banking</h1>
        <p class="text-muted">easy, simple, secure banking</p>
      </header>
      <div class="d-flex mt-1">
        <form class="px-4 mx-auto" action="register_user.php" method="post">

          <h5 class="mt-4 text-center">Create an account</h5>

          <div class="row mt-3">
            <!-- First name   -->
            <div class="col">
              <input class="form-control" type="text" name="first-name" maxlength="20" value="<?php echo (isset($_SESSION['first-name']) ? $_SESSION['first-name'] : ""); unset($_SESSION['first-name']);  ?>" placeholder="First name" required>
            </div>
            <!-- Last name -->
            <div class="col">
              <input class="form-control" type="text" name="last-name" value="<?php echo (isset($_SESSION['last-name']) ? $_SESSION['last-name'] : ""); unset($_SESSION['last-name']);  ?>" placeholder="Last name">
            </div>
          </div>

          <!-- Username -->
          <div class="mt-3">
            <input class="form-control" type="text" name="username" placeholder="Username" required value="<?php echo (isset($_SESSION['username']) ? $_SESSION['username'] : ""); unset($_SESSION['username']);  ?>">
          </div>

          <!-- Password -->
          <div class="mt-3">
            <input class="form-control" type="password" name="password" placeholder="Password" required>
          </div>

            <!-- Confirm password -->
          <div class="mt-3">
            <input class="form-control" type="password" name="confirm-password" placeholder="Confirm password" required>
          </div>

          <!-- Email -->
          <div class="mt-3">
            <input class="form-control" type="email" name="email-address" placeholder="Email" required value="<?php echo (isset($_SESSION['email-address']) ? $_SESSION['email-address'] : ""); unset($_SESSION['email-address']);  ?>">
          </div>

          <!-- Phone number -->
          <div class="mt-3">
            <input class="form-control" type="tel" name="phone-number" placeholder="Phone number" onkeydown="phoneNumberFormatter()" id="phone-number" required value="<?php echo (isset($_SESSION['phone-number']) ? $_SESSION['phone-number'] : ""); unset($_SESSION['phone-number']);  ?>">
          </div>

          <div class="mt-4">
            <?php
                if (isset($_SESSION['unequal_passwords'])) {
                    echo '<div class="alert alert-danger">Password do not match.</div>';
                    unset($_SESSION['unequal_passwords']);
                }
                
                if (isset($_SESSION['taken_username'])) {
                    echo '<div class="alert alert-warning">Username is already taken.<br>Please enter another.</div>';
                    unset($_SESSION['taken_username']);
                }
                
                if (isset($_SESSION['taken_email'])) {
                    echo '<div class="alert alert-warning">Email is already taken.<br>Please enter another.</div>';
                    unset($_SESSION['taken_email']);
                }
                
                if (isset($_SESSION['taken_phone_number'])) {
                    echo '<div class="alert alert-warning">Phone number is already taken.<br>Please enter another.</div>';
                    unset($_SESSION['taken_phone_number']);
                }
            ?>
            <button class="btn btn-primary mt-2" type="submit" style="width: 232px">Submit</button>
          </div>

          <div class="my-3 text-center">
            <span>Already have an account? <a href="login.php">Sign in</a></span>
          </div>

            <div class="mt-5 text-center">
            <a class="btn py-1 rounded" href="index.php" style="background-color:#e4edfb; color: #174ea6; width: 100px">Back</a>
          </div>

        </form>
      </div>

      <div style="height: 120px;"></div>
    </div>
    <script>
      function formatPhoneNumber(value) {
        if (!value) return value;
        const phoneNumber = value.replace(/[^\d]/g, '');
        const phoneNumberLength = phoneNumber.length;
        if (phoneNumberLength < 4) return phoneNumber;
        if (phoneNumberLength < 7) {
          return `(${phoneNumber.slice(0, 3)}) ${phoneNumber.slice(3)}`;
        }
        return `(${phoneNumber.slice(0, 3)}) ${phoneNumber.slice(
          3,
          6
        )}-${phoneNumber.slice(6, 9)}`;
      }

      function phoneNumberFormatter() {
        const inputField = document.getElementById('phone-number');
        const formattedInputValue = formatPhoneNumber(inputField.value);
        inputField.value = formattedInputValue;
      }
    </script>
  </body>
</html>
