<?php



            /****************
             *  GET Data   *
             ***************/
define("FILE_PATH", "users.json"); // constante au lieu de variable dessous
$jsonContent = file_get_contents(FILE_PATH);
$usersData = json_decode($jsonContent, true);
    
            /****************
             *  SAVE Data   *
             ***************/
$isPosted = filter_has_var(INPUT_POST, "username");

if($isPosted){
    $username = filter_input(INPUT_POST,"username", FILTER_SANITIZE_STRING);
    $login = filter_input(INPUT_POST,"login", FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST,"password", FILTER_DEFAULT);
    $hash = password_hash($password, PASSWORD_BCRYPT);


    // Ajout des données des input seulement si la saisie n'est pas vide
    if (!empty($username) && !empty($login) && !empty($password)) {
        $newUser = ["username" => $username, 
        "login" => $login, 
        "password" => $hash];
        array_push($usersData, $newUser);
        // Conversion du tableau en chaine de caractères
        $jsonUsersData = json_encode($usersData);
        // Enregistrement de la chaine de caractères dons un fichier
        file_put_contents(FILE_PATH, $jsonUsersData);
    }

    /////////////////////////////////////////////
    // redirection vers la page
    // header("location:inscription.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="../css/5-Style_Security_Form.css" />
    <title>Document</title>
</head>
<body>
     <nav>
         <a href="http://localhost:8081/">Home</a> - 
         <a href="http://localhost:8081/4-PHP-Persistence/security/inscription.php">Security inscription</a>
    </nav><br>
    <h3>Security Form</h3>

    <form method="POST">
        <input type="text" name="username" placeholder="Votre Nom">
        <input type="text" name="login" placeholder="Votre Pseudo">
        <input type="password" name="password" placeholder="Votre Mot de Passe">
        <button type="submit">Valider</button>
    </form>

    <table>
        <tr>
            <th>Username</th>
            <th>Login</th>
            <th>Password</th>
        </tr>
        <?php foreach($usersData as $user): ?>
            <tr>
                <td><?=$user["username"]?></td>
                <td><?=$user["login"]?></td>
                <td><?=$user["password"]?></td>
            </tr>
        <?php endforeach ?>
    </table>
</body>
</html>