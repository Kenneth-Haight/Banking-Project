<html>
<head>
  <title>Login</title>
</head>
<body>
<h1>Login</h1>
    <body>
        <form method = "post">
   <table>
   <tr>
   <td>Username: </td>
               <td><input name = "username" type = "text" size = "25" autofocus maxlength="30"> </td>
			   </tr>
			   <tr>
			       <td>Password: </td>
               <td><input name = "password" type = "text" size = "25" maxlength="10"> </td>
			   </tr>
			            <tr>
            <td><input type = "submit" value = "Submit" />
            <input type = "reset" value = "Clear" /></td>
            </tr>
			       </table>
			       </form>
<?php
if(isset($_POST['username']) || isset($_POST['password'])){
    $dsn = 'mysql:host=localhost;dbname=haightk1_hbdb';
	$username = '...';
	$password = '...';

  $db = new PDO($dsn, $username, $password);

$inputted_username = $_POST['username'];
$inputted_password = $_POST['password'];
$hash = password_hash($inputted_password, PASSWORD_DEFAULT);


  $stmt = $db->prepare("SELECT password FROM users WHERE username=?");
  $stmt->execute(array($inputted_username)); 
    $user = $stmt->fetch();
if ($user) {
    if (password_verify($inputted_password, $user['password'])){
        $URL="deposit.php";
      echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
      echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
    }
    else {
    echo "Invalid password. Please try again.";
} 
} else {
    echo "Invalid user. Please try again.";
} 
}

  $result->free();
  $db->close();
  
  
?>
</body>
</html>
