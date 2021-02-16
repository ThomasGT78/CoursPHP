<?php
define("FILE_PATH", "users.json"); // constante au lieu de variable dessous
session_start();

function getUserList()
{
$jsonContent = file_get_contents(FILE_PATH);
$usersData = json_decode($jsonContent, true);
return $usersData;
}

// Trouver les utilisateurs qui possèdent un login donné
function getUsersByLogin($login){
    $userList = getUserList();
    $foundUsers = [];
    foreach($userList as $user){
        if($user["login"] == $login){
            array_push($foundUsers, $user);
        }
    }
    return $foundUsers;
}

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
?>