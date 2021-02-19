<?php
require "function-security.php";

   
            /****************
             *  SAVE Data   *
             ***************/
$isPosted = filter_has_var(INPUT_POST, "username");

if($isPosted){

    $filters = [
        "username" => FILTER_SANITIZE_STRING,
        "login" => FILTER_SANITIZE_STRING,
        "password" => FILTER_SANITIZE_STRING,
    ];

    $newUser = filter_input_array(INPUT_POST, $filters);
    
    // Ve'rifie si les champs d'input ne sont pas vide
    $isValid = !empty($newUser["username"]) && !empty($newUser["login"]) && $newUser["password"];
    
    // Modifie le not de passe par le Hash
    $newUser["password"] = password_hash($newUser["password"], PASSWORD_BCRYPT);

        if ($isValid) {
            try {
                $pdo = getPDO();
                saveUserSQL($pdo, $newUser);
                // header("location:login.php");

            } catch (PDOException $err) {
                echo $err->getMessage();
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
    <title>Security Form - Inscription SQL Correction</title>
</head>
<body>
     <nav>
         <a href="http://localhost:8081/">Home</a> - 
         <a href="../6-correction_index_security.php">Security index SQL Correction</a> - 
         <a href="inscription.php">Security inscription SQL Correction</a> - 
         <a href="login.php">Security login SQL Correction</a>
    </nav><br>
    <h3>Security Form - Inscription SQL Correction</h3>

    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="username" placeholder="Votre Nom">
        <input type="text" name="login" placeholder="Votre Login">
        <input type="password" name="password" placeholder="Votre Mot de Passe">
        <br><br>
        <div>
            <label for="avatar">Ajouter un Avatar</label>
            <input type="file" name="avatar" id="avatar" >
        </div>
        <br>
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