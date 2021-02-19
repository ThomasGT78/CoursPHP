<?php
require "function-security.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Security Form - Secret SQL Correction</title>
</head>
<body>
    <nav>
         <a href="http://localhost:8081/">Home</a> - 
         <a href="../6-correction_index_security.php">Security index SQL Correction</a> - 
         <a href="inscription.php">Security inscription SQL Correction</a> - 
         <a href="login.php">Security login SQL Correction</a>
    </nav><br>
    <h1>Security Form - Secret SQL Correction</h1>

    <h3> Hello <?=$_SESSION["user"]["username"]?></h3>
    
</body>
</html>