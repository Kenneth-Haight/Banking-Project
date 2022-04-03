<!doctype html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>haight banking</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        nav button {
            height: 50px;
            width: 280px;
            border-radius: 0.5rem;
        }
    </style>
  </head>
  <body>
      <div>
          <?php include 'includes/shapes.php'; ?>
      </div>
      <div class="container text-center mt-5">
        <header>
            <h1 class="display-6 fw-bold">haight banking</h1>
            <p class="text-muted">easy, simple, secure banking</p>
        </header>
        <nav class="d-flex flex-column mx-auto mt-4 mb-4" style="width: 280px;">
            <div>
                <button class="btn btn-primary my-2" onclick="location = 'login.php'">
                    Log in as customer
                </button>
            </div>
            <div>
                <button class="btn btn-primary my-2 mb-1" onclick="location = 'register.php'">
                    Register for an account
                </button>
            </div>
            <hr>
            <div>
                <button class="btn btn-success my-1" onclick="location = 'staff_login.php'">
                    Log in as bank staff
                </button>
            </div>
        </nav>
        <div>
            <?php include 'includes/cat.php'; ?>
        </div>
        <div style="height: 100px;"></div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>
