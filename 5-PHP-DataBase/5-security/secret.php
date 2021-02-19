<?php
require "function-security.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Security Form - Secret SQL</title>
</head>
<body>
    <nav>
         <a href="http://localhost:8081/">Home</a> - 
         <a href="../5-index_security.php">Security index SQL</a> - 
         <a href="inscription.php">Security inscription SQL</a> - 
         <a href="login.php">Security login SQL</a>
    </nav><br>
    <h1>Security Form - Secret SQL</h1>

    <h3> Hello <?=$_SESSION["user"]["username"]?></h3>
    
</body>
</html>