<?php
require "function-security.php";

 
$inscriptionData = [];
    
            /****************
             *  SAVE Data   *
             ***************/
$isPosted = filter_has_var(INPUT_POST, "username");

if($isPosted){

/* 
    $filters = [
        "username" => FILTER_SANITIZE_STRING,
        "login" => FILTER_SANITIZE_STRING,
        "password" => FILTER_SANITIZE_STRING,
    ];

    $data = filter_input_array(INPUT_POST, $filters);
 */
    $username = filter_input(INPUT_POST,"username", FILTER_SANITIZE_STRING);
    $login = filter_input(INPUT_POST,"login", FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, "password",  FILTER_SANITIZE_STRING );
    $hash = password_hash($password, PASSWORD_BCRYPT);

    
    $isValid = !empty($username) && !empty($login) && !empty($password);

    
        if ($isValid) {
            try {
                $newUser = [$username, $login, $hash];
                array_push($inscriptionData, $newUser);
                
                $pdo = getPDO();
                insertSQL($pdo, $newUser);

                header("location:login.php");
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
    <title>Security Form - Inscription SQL</title>
</head>
<body>
     <nav>
         <a href="http://localhost:8081/">Home</a> - 
         <a href="../5-index_security.php">Security index SQL</a> - 
         <a href="inscription.php">Security inscription SQL</a> - 
         <a href="login.php">Security login SQL</a>
    </nav><br>
    <h3>Security Form - Inscription SQL</h3>

    <form method="POST">
        <input type="text" name="username" placeholder="Votre Nom">
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