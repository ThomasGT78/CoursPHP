<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Connection</title>
</head>
<body>
    <nav>
        <a href="http://localhost:8081/">Home</a> - 
        <a href="http://localhost:8081/5-PHP-DataBase/1-test-connecxion-pdo.php">test-connecxion-pdo</a>
    </nav><br>
    <h3>Test Connection</h3>
</body>
</html>


<?php

$dsn = "mysql:host=127.0.0.1;dbname=formation_php;charset=utf8";
$user = "root";
$pass = "";

try{
    $pdo = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    // var_dump($pdo);

    /* $sql = "INSERT INTO livres (titre, auteur, prix)
    VALUES ('50 nuances de PDO', 'Martin Fowler', 50)";

    $success = $pdo->exec($sql);

    var_dump($success);
    echo "Données ajoutées avec succès dans la table «livres» de la BD «formation_php»";
    */
    //
    $sql = "SELECT * FROM livres";
    $query = $pdo->query($sql);
    // var_dump($query);

    // var_dump($query->fetch(PDO::FETCH_ASSOC));
    while($row = $query->fetch(PDO::FETCH_ASSOC)) {
        echo $row["id"] . "<br>";
    }
    
    $query = $pdo->query($sql);
    $bookList = $query->fetchAll(PDO::FETCH_ASSOC);
    var_dump($bookList);

} catch (PDOException $err){
    echo $err->getMessage();
}




?>