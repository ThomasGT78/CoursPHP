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
         <a href="http://localhost:8081/5-PHP-DataBase/5-index_security.php">Security index SQL</a>
    </nav><br>
    <h1>Security INDEX SQL</h1>
    <nav>
        <ul class="nav">
            <?php if($isAuthenticated):?>
            <li class="nav-item">
                <a class="nav-link" href="5-security/deconnexion.php">Déconnexion SQL</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="5-security/secret.php">Secret Page SQL</a>
            </li>
            <?php else: ?>
            <li class="nav-item">
                <a class="nav-link" href="5-security/inscription.php">Inscription SQL</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="5-security/login.php">Login SQL</a>
            </li>
            <?php endif ?>
        </ul>
    </nav>
    
    
</body>
</html>