<?php
require "5-security/function-security.php";

$isAuthenticated = isAuthenticated();
var_dump($isAuthenticated);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css" />
    <title>Security INDEX SQL</title>
</head>
<body>
    <nav>
         <a href="http://localhost:8081/">Home</a> - 
         <a href="http://localhost:8081/5-PHP-DataBase/6-correction_index_security.php">Security index SQL Correction</a>
    </nav><br>
    <h1>Security INDEX SQL Correction</h1>
    <nav>
        <ul class="nav">
            <?php if($isAuthenticated):?>
            <li class="nav-item">
                <a class="nav-link" href="6-correction_security/deconnexion.php">Déconnexion SQL Correction</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="6-correction_security/secret.php">Secret Page SQL Correction</a>
            </li>
            <?php else: ?>
            <li class="nav-item">
                <a class="nav-link" href="6-correction_security/inscription.php">Inscription SQL Correction</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="6-correction_security/login.php">Login SQL Correction</a>
            </li>
            <?php endif ?>
        </ul>
    </nav>
    
    
</body>
</html>