<?php
require_once 'connec.php';
$pdo = new \PDO(DSN, USER, PASS);
$query = "SELECT * FROM friend";
$statement = $pdo->query($query);
$friends = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach($friends as $friend) {
    echo '<li>'.$friend['firstname'] . ' ' . $friend['lastname'] .'</li>';
}
$firstname = trim($_POST['firstname']);
$lastname = trim($_POST['lastname']);
$query = "INSERT INTO friend (firstname, lastname) VALUES (:firstname, :lastname)";
$statement = $pdo->prepare($query);
$statement->bindValue(':firstname', $firstname, \PDO::PARAM_STR);
$statement->bindValue(':lastname', $lastname, \PDO::PARAM_STR);
$statement->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO, un ami pour la vie. </title>
</head>
<body>
<form action="" method="POST">
  <div>
    <label for="firstname">Firstname: </label>
    <input type="text" name="firstname" id="firstname" required>
  </div>
  <div>
    <label for="lastname">Lastname: </label>
    <input type="text" name="lastname" id="lastname" required>
  </div>
  <div>
    <input type="submit" value="Subscribe!">
  </div>
</form>
</body>
</html>





