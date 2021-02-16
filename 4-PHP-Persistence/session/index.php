<?php
session_start();

session_regenerate_id();
$name = $_SESSION["name"] ?? "bel inconnu" ;

if(password_verify("123", $_SESSION["password"])) {
    echo "Pass OK";
} else {
    echo "pass KO";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Session</title>
</head>
<body>
    <nav><a href="http://localhost:8081/">Home</a></nav><br>
    <h3>Index Session</h3>
    <nav><a href="form.php">Donnez votre nom</a></nav><br>

    <p>Bonjour <?=$name?></p>
</body>
</html>