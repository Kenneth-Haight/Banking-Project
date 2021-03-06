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
        background-color: #f6f8f9 !important;
      }
      a {
        text-decoration: none;
      }
    </style>
  </head>
  <body>
        <div class="py-4" style="background-color: #5B6C5DC4;">
            <div class="m-4 mx-auto p-4 rounded" style="background: #fff; width: 600px">
                <h1 class="display-6 mb-4" style="font-size: 30px;">Add a user</h1>
                <hr>
                <form method="post" class="mt-4">
                    <div class="row mb-4">
<!--<label for="Account">Choose a bank account #:</label>-->
           
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
          <div class="container">
  <div class="center">
      <button class="btn btn-primary mt-2" type="submit" style="width: 100%">Submit</button>
    <!--<button>Centered Button</button>-->
  </div>
          
          
                    </div>
    <!--</script>-->
  </body>
</html>
