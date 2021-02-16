<?php

session_start();

$isPosted = filter_has_var(INPUT_POST, "name");

if($isPosted){
    $name = filter_input(INPUT_POST,"name", FILTER_SANITIZE_STRING);
    $pwd = filter_input(INPUT_POST,"pwd", FILTER_DEFAULT);

    // régénération de l'id de session
    session_regenerate_id(true);

    //pour enregistrer les données de la session
    $_SESSION["name"]= $name;

    // Transforamation du mot de passe avec un fonction de hachage;
    $hash = password_hash($pwd,PASSWORD_BCRYPT);
    $_SESSION["pwd"] = $hash;

    // redirection vers la page
    header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Session</title>
</head>
<body>
    <nav><a href="http://localhost:8081/">Home</a></nav><br>
    <h3>Form Session</h3>

    <form method="POST">
        <input type="text" name="name" placeholder="Votre Nom">
        <input type="password" name="pwd" placeholder="Votre Mot de Passe">
        <button type="submit">Valider</button>
    </form>
</body>
</html>