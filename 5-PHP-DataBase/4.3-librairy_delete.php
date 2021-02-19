<?php
include "functions/4-functions_librairy.php";

try{
// Connexion à la BD
$pdo = getPDO();

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

$sql = "DELETE FROM livres WHERE id = ?";
$statement = $pdo->prepare($sql);
$statement->execute([$id]);

header("location:4.1-librairy_tableList.php");
} catch (PDOException $err){
    echo $err->getMessage();
}

?>