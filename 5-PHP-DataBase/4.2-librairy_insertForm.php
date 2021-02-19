<?php
include "functions/4-functions_librairy.php";

$isPosted = filter_has_var(INPUT_POST, "title");

if ($isPosted) {
    // Récupération de la saisie
    $filters = [
        "title" => FILTER_SANITIZE_STRING,
        "author" => FILTER_SANITIZE_STRING,
        "price" => [
            "filters" => FILTER_SANITIZE_NUMBER_INT,
            "options" => ["min-range" => 1, "max-range" => 180],
        ],
    ];

    $data = filter_input_array(INPUT_POST, $filters);
    $isValid = !empty($data["title"]) && !empty($data["author"]) && $data["price"];

    if ($isValid) {
        try {
            $pdo = getPDO();
            insertSQL($pdo, $data);
            var_dump($data);

            echo "Données ajoutées avec succès dans la table «livres» de la BD «formation_php»";

        } catch (PDOException $err) {
            echo $err->getMessage();
        }
    } // if isValid
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
            <h3>Ajouter un livre</h3>

            <button type="button" onclick='window.location.href="http://localhost:8081/5-PHP-DataBase/4.1-librairy_tableList.php";' class="btn btn-primary btn-block mt-3">Visualiser la liste des livres</button>
            <br>
            
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Titre</label>
                    <input type="text" name="title" class="form-control" placeholder="Titre" >
                </div>
                <div class="form-group">
                    <label for="author">Auteur</label>
                    <input type="text" name="author" class="form-control" placeholder="Auteur" >
                </div>
                <div class="form-group">
                    <label for="price">Prix</label>
                    <input type="text" name="price" class="form-control" placeholder="Prix" >
                </div>

                <button type="submit" name="ajouter" class="btn btn-primary btn-block mt-3">Ajouter</button>
            </form>
            <div class="custom-file mb-4">
                <label class="custom-file-label">Couverture</label>
                <input type="file" class="custom-file-input" name="couverture">
            </div>
        </div>
    </div>
</body>
</html>