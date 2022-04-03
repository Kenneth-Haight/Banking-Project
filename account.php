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
 
<input type="radio" name="time" id="sunrise" checked />
<input type="radio" name="time" id="sunset" />
<div id="app">
  <div class="glow"></div>
  <div class="sky"></div>
  <div class="stars"></div>
  <div class="city">
    <div class="building">
      <div class="tower">
        <div class="windows"></div>
      </div>
      <div class="tower">
        <div class="windows"></div>
        <div class="ledge"></div>
      </div>
      <div class="tower">
        <div class="windows"></div>
      </div>
    </div>
    <div class="building">
      <div class="tower">
        <div class="windows"></div>
      </div>
      <div class="tower">
        <div class="windows"></div>
        <div class="ledge"></div>
      </div>
      <div class="tower">
        <div class="windows"></div>
        <div class="ledge"></div>
      </div>
    </div>
    <div class="building">
      <div class="tower">
        <div class="windows"></div>
      </div>
      <div class="tower">
        <div class="windows"></div>
        <div class="ledge"></div>
      </div>
      <div class="tower">
        <div class="windows"></div>
      </div>
    </div>
  </div>
  <div class="times">
    <div class="time"
      data-sunrise="7:20"
      data-sunset="9:14"
    ></div>
    <div class="time"
      data-sunrise="7:25"
      data-sunset="9:18"
    ></div>
    <div class="time"
      data-sunrise="7:29"
      data-sunset="9:23"
    ></div>
    <div class="time"
      data-sunrise="7:32"
      data-sunset="9:32"
    ></div>
    <div class="time"
      data-sunrise="7:37"
      data-sunset="9:37"
    ></div>
  </div>
  <div class="heavens">
    <label for="sunrise" class="sunrise" data-title="Sunrise"></label>
    <label for="sunset" class="sunset" data-title="Sunset"></label>
  </div>
  <div class="clouds"></div>
</div>
  </body>










<!--- Database for Account Details --->
<?php
$user_id = '1';

$dsn = 'mysql:host=localhost;dbname=haightk1_hbdb';
	$username = 'haightk1_administrator';
	$password = 'NYE99xyzCPA';

  $db = new PDO($dsn, $username, $password);

$stmt = $db->prepare("SELECT * FROM accounts WHERE user_id=?");
  $stmt->execute(array($user_id));
  $num_results = $stmt->rowCount();
  
  for ($i=0; $i <$num_results; $i++) {
         $user = $stmt->fetch();
	echo "Account Number: ".htmlspecialchars(stripslashes($user['account_id']));
	$id = $user['account_id'];
	echo "<br>";

     echo "Balance: ".htmlspecialchars(stripslashes($user['balance']));
     echo "<br>";
	       echo "<button id='deposit' class='float-left submit-button' >Deposit</button>";
echo '<script type="text/javascript"> document.getElementById("mdeposit").onclick = function () { location.href = "deposit.php"; } </script>';
     echo "<br>";
	       echo "<button id='withdraw' class='float-left submit-button' >Withdraw</button>";
echo '<script type="text/javascript"> document.getElementById("withdraw").onclick = function () { location.href = "withdraw.php"; } </script>';
     echo "<br>";
	       echo "<button id='transfer' class='float-left submit-button' >Transfer</button>";
echo '<script type="text/javascript"> document.getElementById("transfer").onclick = function () { location.href = "transfer.php"; } </script>';
  }
  $result->free();
  $db->close();
     exit;
?>
</html>