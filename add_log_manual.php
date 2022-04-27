<?php

session_start();

include 'scripts/db.php';

$admin_id = $_POST['admin_id'];
$desc = $_POST['desc'];

$pdo = get_database_connection();
    $statement = ("INSERT INTO staff_log (staff_ID, logDesc) VALUES (:admin_id, :logDesc)");
    $insert = $pdo->prepare($statement);
    $insert->execute(array(
    'admin_id'    => $admin_id,
    'logDesc'     => $desc,
));

?>

<html>
    <body>
        <form method="post">
              <label for="admin_id">Admin ID:</label><br>
  <input type="text" id="admin_id" name="admin_id" required><br>
  <label for="desc">Description:</label><br>
  <input type="text" id="desc" name="desc" required>
  <input type="submit" value="Submit">
        </form>
    </body>
</html>