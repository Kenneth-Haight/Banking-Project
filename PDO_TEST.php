<html>
<head>
  <title>Checkout</title>
</head>
<body>
<h1>Checkout</h1>
<?php
            
    $dsn = 'mysql:localhost=localhost;dbname=haightk1_ProjectDB';
	$username = '...';
	$password = '...';
	
	$email='demo@gmail.com';
	$searchpassword='DEMO';

  $db = new PDO($dsn, $username, $password);

  $stmt = $db->prepare("SELECT * FROM CLIENT WHERE email=? and password=?");
  $stmt->execute(array($email, $searchpassword)); 
    $user = $stmt->fetch();
if ($user) {
    echo "email found";
} else {
    echo "Invalid login. Please try again.";
} 

  $result->free();
  $db->close();
  
  
?>
</body>
</html>
