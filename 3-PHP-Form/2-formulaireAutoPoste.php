<?php
$hasPostedData = count($_POST) > 0;
$errors = [];

if ($hasPostedData){
// Test Profession
$sanitizeProfession = filter_input(
    INPUT_POST,
    "profession",
    FILTER_SANITIZE_STRING
) ?? "inconnu";

// test Salaire
$sanitizeSalary = filter_input(
    INPUT_POST,
    "salaire",
    FILTER_SANITIZE_NUMBER_INT
) ?? "inconnu";

$validateSalary = filter_input(
    INPUT_POST,
    "salaire",
    FILTER_VALIDATE_INT
);

if(empty($sanitizeProfession)){
    array_push($errors, "Vous devez saisir une profession");
}

if (empty($sanitizeSalary)) {
    array_push($errors,"Vous devez saisir un salaire" );
}
if (!$validateSalary) {
    array_push($errors, "Le salaire saisi est incorrect");
}
} // end if
$hasError = !empty($errors);
// $hasError =count($errors)>0;


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <title>Formulaire</title>
</head>
<body class="container-fluid">
    <nav>
        <a href="http://localhost:8081/">Home</a> - 
        <a href="http://localhost:8081/3-PHP-Form/2-formulaireAutoPoste.php">formulaireAutoPoste</a>
    </nav><br>
    <div class="row justify-content-center">
        <div class="col-md-4">
        <?php if ($hasPostedData && !$hasError): ?>
            <h1>Resultat</h1>
            <p>Vous êtes <?=$sanitizeProfession?> et vous gagnez <?=$validateSalary?>K€ par an</p>

        <?php else: ?>
            <?php if ($hasError): ?>
                <div class="alert alert-danger">
                    <?php foreach($errors as $error):?>
                        <p><?= $error ?></p>
                    <?php endforeach ?>
                </div>
            <?php endif ?>
        <h1>Formulaire</h1>
            <form method="post" >
                <div class="container-fluid">
                    <label for="profession">Profession</label>
                    <input type="text" name="profession" class="form-control" value="<?=$sanitizeProfession ?? ""?>" >
                </div>
                <div class="container-fluid">
                    <label for="salaire">Salaire</label>
                    <input type="text" name="salaire" class="form-control" value="<?=$sanitizeSalary ?? ""?>">
                </div>
                    <button type="submit" class="btn btn-primary btn-block mt-3">Envoyer</button>
                
            </form>
        <?php endif ?>
        </div>
    </div>
</body>
</html>