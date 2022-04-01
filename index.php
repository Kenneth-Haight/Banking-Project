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
 
        nav button a {
            color: white !important;
            text-decoration: none;
        }
    </style>
  </head>
  <body>
      <div class="container text-center mt-5">
        <h1 class="display-6 fw-bold">haight banking</h1>
        <nav class="d-flex flex-column mx-auto p-4 my-2 mb-4">
            <div>
                <button class="btn btn-primary my-2">
                    <a href="login.php">Log in as customer</a>
                </button>
            </div>
            <div>
                <button class="btn btn-primary my-2">
                    <a href="register.php">Register for an account</a>
                </button>
            </div>
            <div>
                <button class="btn btn-primary my-2">
                    <a href="">Log in as bank staff</a>
                </button>
            </div>
        </nav>
        <div>
            <?php include 'cat.php'; ?>
        </div>
    </div>
 
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
 
  </body>
</html>