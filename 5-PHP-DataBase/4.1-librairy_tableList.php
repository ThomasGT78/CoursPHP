<?php
include "functions/4-functions_librairy.php";

try {
    $pdo = getPDO();
    $bookList = selectSQL($pdo);
} catch (PDOException $err) {
    echo $err->getMessage();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <!-- <link type="text/css" rel="stylesheet" href="css/3-Style_ComptePersistant.css" /> -->
    <title>Librairy</title>
</head>
<body>
    <nav>
        <a href="http://localhost:8081/">Home</a> - 
        <a href="http://localhost:8081/5-PHP-DataBase/4.1-librairy_tableList.php">Librairy</a>
    </nav><br>
    <h3>Librairy</h3>

    <div class="row justify-content-center">
        <div class="col-md-4">
            <h3>Liste des livres</h3>
            <div class="mt-2 mb-3">
                <button type="button" onclick='window.location.href="http://localhost:8081/5-PHP-DataBase/4.2-librairy_insertForm.php";' class="btn btn-primary btn-block mt-3">Ajouter des livres</button>
                <br>
                
                <table>
                    <tr>
                        <th>Titre</th>
                        <th>Auteur</th>
                        <th>Prix</th>
                    </tr>
                    <?php foreach($bookList as $book): ?>
                        <tr>
                            <td><?=$book["titre"]?></td>
                            <td><?=$book["auteur"]?></td>
                            <td><?=$book["prix"]?></td>
                            <td>
                                <a href="4.3-librairy_delete.php?id=<?=$book["id"]?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>