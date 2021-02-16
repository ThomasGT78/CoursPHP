<?php
require "function-security.php";

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
    <title>Index</title>
</head>
<body>
    <nav>
         <a href="http://localhost:8081/">Home</a> - 
         <a href="http://localhost:8081/4-PHP-Persistence/security/index.php">Security index</a>
    </nav><br>
    <h1>Security Form - Secret</h1>
    <nav>
        <ul class="nav">
            <?php if($isAuthenticated):?>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost:8081/4-PHP-Persistence/security/deconnexion.php">Déconnexion</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost:8081/4-PHP-Persistence/security/secret.php">Secret Page</a>
            </li>
            <?php else: ?>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost:8081/4-PHP-Persistence/security/inscription.php">Inscription</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost:8081/4-PHP-Persistence/security/login.php">Login</a>
            </li>
            <?php endif ?>
        </ul>
    </nav>
    
    
</body>
</html>