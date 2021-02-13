<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <title>Profession Traitement</title>
</head>
<body>
    <nav>
        <a href="http://localhost:8081/">Home</a> - 
        <a href="http://localhost:8081/3-PHP-Form/1-formulaire.php">formulaire</a>
    </nav><br>
    <title>Profession Traitement</title>
    <?php
$profession = $_POST["profession"] ?? "inconnu";
echo "Vous êtes un $profession<br>";

$professionSafe = filter_input(
    INPUT_POST, 
    "profession", 
    FILTER_SANITIZE_STRING
    ) 
    ?? "inconnu";
echo "Version sécurité: Vous êtes un $professionSafe<br>";

// Nettoie les caractères incorrect et ne garde que les caractères désirés
$sanitizeSalary = filter_input(
    INPUT_POST,
    "salaire",
    FILTER_SANITIZE_NUMBER_INT
    ) 
    ?? "inconnu";
echo "Sanitize: Vous gagnez {$sanitizeSalary}K€ par an<br>";

// N'envoi aucun charactère si il y a des caractères incorrect
$validateSalary = filter_input(
    INPUT_POST,
    "salaire",
    FILTER_VALIDATE_INT
    ) 
    ?? "inconnu";
if ($validateSalary === false) {
echo "Erreur le format n'est pas respecté<br>";
} else {
echo "Validate: Vous gagnez {$validateSalary}K€ par an<br>";
}

    ?>
</body>
</html>