<?php
require "function-security.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Security Form - Secret</title>
</head>
<body>
    <nav>
         <a href="http://localhost:8081/">Home</a> - 
         <a href="http://localhost:8081/4-PHP-Persistence/security/index.php">Security index</a> - 
         <a href="http://localhost:8081/4-PHP-Persistence/security/inscription.php">Security inscription</a> - 
         <a href="http://localhost:8081/4-PHP-Persistence/security/login.php">Security login</a>
    </nav><br>
    <h1>Security Form - Secret</h1>

    <h3> Hello <?=$_SESSION["user"]["username"]?></h3>
    
</body>
</html>