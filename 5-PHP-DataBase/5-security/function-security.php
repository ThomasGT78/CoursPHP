<?php
define("FILE_PATH", "users.json"); // constante au lieu de variable dessous
session_start();

function authenticateUser($credentials){
    $foundUserList = getUsersByLogin($credentials["login"]);
    $authenticated = false;

    foreach($foundUserList as $user){
        if(password_verify($credentials["password"], $user["password"])){
            $_SESSION["user"] = $user;
            $authenticated = true;
            break;
        }
    }
    return $authenticated;
}

function isAuthenticated(){
    return isset($_SESSION["user"]);
}

            /********************
            *   Functions SQL   *
            ********************/

function getPDO()
{
    $dsn = "mysql:host=127.0.0.1;dbname=formation_php;charset=utf8";
    $user = "root";
    $pass = "";

    $pdo = new PDO(
        $dsn, 
        $user, 
        $pass, 
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    // var_dump($pdo);
    return $pdo;
}

function insertSQL($pdo, $newUser)
{
    $sql = "INSERT INTO users_security (Username, Login, Password) VALUES (?, ?, ?)";
    $statement = $pdo->prepare($sql);
    // var_dump($inscriptionData);
    $statement->execute($newUser);
    // var_dump($statement);
}

function selectSQL($pdo)
{
    $sql = "SELECT * FROM livres ";
    $query = $pdo->query($sql);

    $bookList = $query->fetchAll(PDO::FETCH_ASSOC);
    return $bookList;
}

?>