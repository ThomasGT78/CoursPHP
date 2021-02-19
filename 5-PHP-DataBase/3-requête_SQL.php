<?php

                /****************************
                 *  Traitement Formulaire   *
                 ***************************/
$isPosted = filter_has_var(INPUT_POST, "title");

if($isPosted) {
    // Récupération de la saisie
    $title = filter_input(INPUT_POST,"title", FILTER_SANITIZE_STRING);
    $author = filter_input(INPUT_POST,"author", FILTER_SANITIZE_STRING);
    $price = filter_input(INPUT_POST, "price",  FILTER_DEFAULT );

    if(!empty($title) && !empty($author) && !empty($price)){
        try {
            $dsn = "mysql:host=127.0.0.1;dbname=formation_php;charset=utf8";
            $user = "root";
            $pass = "";

            $pdo = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
            // var_dump($pdo);

            $sql = "INSERT INTO livres (titre, auteur, prix) VALUES (?,?,?)";
            $statement = $pdo->prepare($sql);
            $statement->execute([$title, $author, $price]);

            // $success = $pdo->exec($sql);

            var_dump($statement);
            echo "Données ajoutées avec succès dans la table «livres» de la BD «formation_php»";

        } catch (PDOException $err) {
            echo $err->getMessage();
        }
    } // if empty
} // if isPosted


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <!-- <link type="text/css" rel="stylesheet" href="css/3-Style_ComptePersistant.css" /> -->
    <title>requête_SQL</title>
</head>
<body>
    <nav>
        <a href="http://localhost:8081/">Home</a> - 
        <a href="http://localhost:8081/5-PHP-DataBase/3-requête_SQL.php">requête_SQL</a> - 
        <a href="http://localhost:8081/5-PHP-DataBase/3.2-requête_SQL_factorized.php">requête_SQL_factorized</a>
    </nav><br>
    <h3>requête_SQL</h3>

    <div class="row justify-content-center">
        <div class="col-md-4">
            
            <h3>Ajouter des transactions</h3>
            <form method="post" >
                <div class="container-fluid">
                    <label for="title">Titre</label>
                    <input type="text" name="title" class="form-control" placeholder="Titre" >
                </div>
                <div class="container-fluid">
                    <label for="author">Auteur</label>
                    <input type="text" name="author" class="form-control" placeholder="Auteur" >
                </div>
                <div class="container-fluid">
                    <label for="price">Prix</label>
                    <input type="text" name="price" class="form-control" placeholder="Prix" >
                </div>

                <button type="submit" name="ajouter" class="btn btn-primary btn-block mt-3">Ajouter</button>
            </form>

        </div>
    </div>
</body>
</html>