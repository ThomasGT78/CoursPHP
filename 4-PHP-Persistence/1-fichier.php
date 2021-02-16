

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <nav><a href="http://localhost:8081/">Home</a></nav><br>
    <h3>Liste de Livres Json</h3>
    <?php

// Nom du fichier
$fileName = "secret.txt";

// Lecture du fichier avant modification
$content = file_get_contents($fileName);
var_dump($content);

// Ecriture dans un fichier
$newContent = "Hello";
file_put_contents($fileName, $newContent, FILE_APPEND | LOCK_EX);

// Lecture du fichier après modification
$content = file_get_contents($fileName);
?><br>
    <?php var_dump($content); ?>
</body>
</html>

