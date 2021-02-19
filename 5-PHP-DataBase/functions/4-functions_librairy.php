<?php

function getPDO(){
    $dsn = "mysql:host=127.0.0.1;dbname=formation_php;charset=utf8";
    $user = "root";
    $pass = "";

    $pdo = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    // var_dump($pdo);
    return $pdo;
}

function insertSQL($pdo, $data) {
    $sql = "INSERT INTO livres (titre, auteur, prix) VALUES (:title, :author, :price)";
    $statement = $pdo->prepare($sql);
    $statement->execute($data);
    // var_dump($statement);
}

function selectSQL($pdo)
{
    $sql = "SELECT * FROM livres ";
    $query = $pdo->query($sql);

    $bookList = $query->fetchAll(PDO::FETCH_ASSOC);
    return $bookList;
}


?>