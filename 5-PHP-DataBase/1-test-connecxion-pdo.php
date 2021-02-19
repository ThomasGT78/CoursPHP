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
    echo "<br><br> ligne 43 <br>";
    while($row = $query->fetch(PDO::FETCH_ASSOC)) {
        echo $row["id"] . "<br>";
    }

    // Récupération de toutes les données d'un seul coup
    // Rééxécution de la requête pour remettre le curseur au début
    $query = $pdo->query($sql);
    $bookList = $query->fetchAll(PDO::FETCH_ASSOC);
    echo "<br><br> ligne 52 <br>";
    var_dump($bookList);

    /// Récupération des données d'une colonne
    // 1 ligne
    $query = $pdo->query($sql);
    echo "<br><br> ligne 58 <br>";
    var_dump($query->fetchColumn(1));


    // Boucle pour récupérer toutes les lignes de la colonne sélectionner
    $query = $pdo->query($sql);
    echo "<br><br> ligne 64 <br>";
    while($col = $query->fetchColumn(0)){
        var_dump($col);
    }
} catch (PDOException $err){
    echo $err->getMessage();
}


?>