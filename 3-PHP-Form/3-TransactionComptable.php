<?php
include "functions/3-createTableComptable.php";
include "functions/3-getForm.php";

$hasPostedData = count($_POST) > 0;
$errors = [];
$hasError;

$accountMoves = [
    ["label" => "Salaire", "date" => "2021-01-01", "amount" => 1800, "type" => "credit"],
    ["label" => "Loyer", "date" => "2021-01-05", "amount" => 600, "type" => "debit"],
    ["label" => "Courses Lidl", "date" => "2021-01-08", "amount" => 110, "type" => "debit"],
    ["label" => "Location Parking", "date" => "2021-01-10", "amount" => 80, "type" => "credit"],
    ["label" => "Courses Epicerie", "date" => "2021-01-15", "amount" => 35, "type" => "debit"],
    ["label" => "Réparation Moto", "date" => "2021-01-25", "amount" => 670, "type" => "debit"],
    ["label" => "Solde Nike", "date" => "2021-01-27", "amount" => 110, "type" => "debit"],
];
/////////////////////////////////
getForm($hasPostedData, $accountMoves, $errors, $hasError);
 /////////////////////////
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="css/3-Style_TransactionComptable.css" />
    <title>Formulaire</title>
</head>
<body class="container-fluid">
    <nav>
        <a href="http://localhost:8081/">Home</a> -
        <a href="http://localhost:8081/3-PHP-Form/3-TransactionComptable.php">TransactionComptable</a>
    </nav><br>
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