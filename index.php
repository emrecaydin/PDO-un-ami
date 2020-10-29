<?php
require_once '_connec.php';

$pdo = new \PDO(DSN, USER, PASS);



$query = "SELECT * FROM friend";
$statement = $pdo->query($query);
$friends = $statement->fetchAll(); 


echo '<ul>';

foreach($friends as $friend) {
    echo '<li>' . $friend['firstname'] . ' ' . $friend['lastname'] . '</li>';
    
}
echo '</ul>';
var_dump()
if (filter_has_var(INPUT_POST, 'firstname')&& filter_has_var (INPUT_POST, 'lastname')){
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $query = "INSERT INTO friend (firstname, lastname) VALUES (:firstname, :lastname)";
    $statement = $pdo->prepare($query);
    $statement->bindValue(':firstname', $firstname, \PDO::PARAM_STR);
    $statement->bindValue(':lastname', $lastname, \PDO::PARAM_STR);
    $statement->execute();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <ul>
        <li>Quentin</li>
        <li>Celia</li>
        <li>kevin</li>
        <li>Léo</li>
    </ul>

    <form action="" method="POST">
        <div>
            <label for="firstname">Firstname</label>
            <input id="firstname" type="firstname">
        </div>
        <div>
            <label for="lastname">Lastname</label>
            <input id="lastname" type="lastname">
        </div>
        <div>
            <button type="submit">Ajouter</button>
        </div>
        

    </form>
    

</body>


</html>

