<?php
require "function-security.php";
    
            /****************
             *  SAVE Data   *
             ***************/
$isPosted = filter_has_var(INPUT_POST, "login");

if($isPosted){
    $login = filter_input(INPUT_POST,"login", FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST,"password", FILTER_DEFAULT);

    // Ajout des données des input seulement si la saisie n'est pas vide
    if (!empty($login) && !empty($password)) {
        $newUser = [
            "login" => $login, 
            "password" => $password];

        if (authenticateUser($newUser)){
            header("location:secret.php");
        }
        
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="../css/5-Style_Security_Form.css" />
    <title>Security Form - Login SQL</title>
</head>
<body>
     <nav>
         <a href="http://localhost:8081/">Home</a> - 
         <a href="../5-index_security.php">Security index SQL</a> - 
         <a href="inscription.php">Security inscription SQL</a> - 
         <a href="login.php">Security login SQL</a>
    </nav><br>
    <h3>Security Form - Login SQL</h3>

    <form method="POST">
        <input type="text" name="login" placeholder="Votre Login">
        <input type="password" name="password" placeholder="Votre Mot de Passe">
        <button type="submit">Valider</button>
    </form>

    <table>
        <tr>
            <th>Username</th>
            <th>Login</th>
            <th>Password</th>
        </tr>
        
    </table>
</body>
</html>