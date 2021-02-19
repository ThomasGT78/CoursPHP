<?php
include "functions/3-createTableComptable.php";
include "functions/3-getForm.php";

$hasPostedData = count($_POST) > 0;
$errors = [];
$hasError;


                /****************
                 *  GET Data   *
                 ***************/

define("FILE_PATH", "data/3-comptes.json"); // constante au lieu de variable dessous
$jsonContent = file_get_contents(FILE_PATH);
// $filePath = "data/3-comptes.json";
// $jsonContent = file_get_contents($filePath);

$accountMoves = json_decode($jsonContent, true);

getForm($hasPostedData, $accountMoves, $errors, $hasError);


                /****************************
                 *  Traitement Formulaire   *
                 ***************************/
                
// Traitement du formulaire
$isPosted = filter_has_var(INPUT_POST, "label");

if($isPosted) {
    // Récupération de la saisie
    $sanitizeLabel = filter_input(INPUT_POST,"label", FILTER_SANITIZE_STRING);
    $date = $_POST["date"] ?? "";
    
    $amount = $_POST["amount"] ?? "";
    $sanitizeAmount = filter_input(INPUT_POST, "amount",  FILTER_SANITIZE_NUMBER_INT ) ?? "";
    $validateAmount = filter_input(INPUT_POST, "amount", FILTER_VALIDATE_INT );
    $type = $_POST["type"];

    
                /****************
                 *  SAVE Data   *
                 ***************/
    // Ajout des données des input  seulement si la saisie n'est pas vide
    if(!empty($sanitizeLabel) && !empty($date) && !empty($sanitizeAmount)){
        array_push($accountMoves, ["label" => $sanitizeLabel, "date" => $date, "amount" => $validateAmount, "type" => $type]);
         // Conversion du tableau en chaine de caractères
        $jsonAccountMoves = json_encode($accountMoves);
        // Enregistrement de la chaine de caractères dons un fichier
        file_put_contents($filePath,$jsonAccountMoves);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="css/3-Style_ComptePersistant.css" />
    <title>compte_persistant</title>
</head>
<body>
    <nav><a href="http://localhost:8081/">Home</a></nav><br>
    <h3>compte_persistant</h3>

    <div class="row justify-content-center">
        <div class="col-md-4">
        <?php if ($hasPostedData && !$hasError): ?>
            <h1>Resultat</h1>
            <p>Vous avez ajouter: Label: <?=$sanitizeLabel?> - Date: <?=$date?> - <?=$type?>: <?=$validateAmount?></p>

        <?php else : ?>
            <?php if ($hasError): ?>
                <div class="alert alert-danger">
                    <?php foreach ($errors as $error): ?>
                        <p><?=$error?></p>
                    <?php endforeach?>
                </div>
            <?php endif?>

        <?php endif?>
            <?=createTable($accountMoves)?>
            <h3>Ajouter des transactions</h3>
            <form method="post" >
                <div class="container-fluid">
                    <label for="label">Description</label>
                    <input type="text" name="label" class="form-control" value="<?=$sanitizeProfession ?? ""?>" >
                </div>
                <div class="container-fluid">
                    <label for="date">Date</label>
                    <input type="date" name="date" class="form-control" value="<?=$sanitizeSalary ?? ""?>">
                </div>
                <div class="container-fluid">
                    <label for="amount">Montant</label>
                    <input type="text" name="amount" class="form-control" value="<?=$sanitizeSalary ?? ""?>">
                </div>

                <button type="submit" name="type" value="credit" class="btn btn-primary btn-block mt-3">Ajouter Crédit</button>
                <button type="submit" name="type" value="debit" class="btn btn-primary btn-block mt-3">Ajouter Débit</button>
            </form>
            
        </div>
    </div>
</body>
</html>