<?php

session_start();

        /************************
         *    Correction TP     *
         ***********************/

function getPDO(){
    $pdo = new PDO (
        "mysql:host=127.0.0.1;dbname=formation_php;charset=utf8",
        "root",
        "",
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]
    );
    return $pdo;
}


function saveUserSQL($pdo, $newUser){

    // test de la présence d'un upload
    $fileName = uploadAvatar();
    // var_dump($fileName);
    if($fileName){
        $sql = "INSERT INTO users_security_correction (username, user_login, user_password, user_Avatar) VALUES (:username, :login, :password, :avatar)";
        $newUser["avatar"] = $fileName;
    } else {
        $sql = "INSERT INTO users_security_correction (username, user_login, user_password) VALUES (:username, :login, :password)";
    }

    $statement = $pdo->prepare($sql);
    $success = $statement->execute($newUser);
    return $success;
 }


 function getUsersByLogin($login){
     $pdo = getPDO();
     $sql = "SELECT * FROM users-correction WHERE user_login=?";
     $statement = $pdo->prepare($sql);
     $statement->execute([$login]);

     // récupération des données sous la forme d'un tableau
     $foundUsers = $statement->fetchAll();
     return $foundUsers;
 }


 function authenticateUser($credentials) {
    $foundUserList = getUsersByLogin($credentials["login"]);
    $authenticated = false;

    foreach ($foundUserList as $user) {
        if (password_verify($credentials["password"], $user["user_password"])) {
            $_SESSION["authenticatedUser"] = $user;
            $authenticated = true;
            break;
        }
    }
    return $authenticated;
}


function isAuthenticated() {
    return isset($_SESSION["authenticatedUser"]);
}


function getAuthenticatedUser() {
    if(isAuthenticated()){
        return $_SESSION["authenticatedUser"];
    } else {
        return null;
    }
}


function logOut () {
    session_regenerate_id(true);
    unset($_SESSION["authenticatedUser"]);
    header("location:../6-correction_index_security.php");
}

            /********************
            *   UPLOAD AVATAR   *
            ********************/
// Vérifi si une image à été transmise dans la requête
function hasUploadedAvatar(){
    return isset($_FILES["avatar"]);
}

// Retoune les données du fichier envoyé par l'utilisateur
// -type : le type mime du fichier (ex: image/jpeg)
// -error: code d'entier indiquants'il y a des erreurs (0 = pas d'erreur)
// -tmp_name: nom du fichier temporaire sur le serveur
// -name: nom du fichier d'origine
function getUploadedDataAvatar()
{
    return $_FILES["avatar"];
}


// Récupération de l'extension du fichier en fonction du type mime
// et vérification que cette extension fait partie de la liste des extensions autorisées
function getFileExtension($file) {
    $allowedExtensions = [
        "image/jpeg" => "jpg",  //mime type pour reconnaître le type de fichier
        "image/png" => "png"
    ];

    // test si le type du fichier est bien autorisé
    if(array_key_exists($file["type"], $allowedExtensions)) {
        return $allowedExtensions[$file["type"]];
    } else {
        return false;
    }
}


// Génère un nom unique pour le fichier
function getFileName($file) {
    $ext = getFileExtension($file);
    if($ext) {
        // Création d'un nom unique si l'extension est autorisé
        return uniqid(). ".$ext";
    } else {
        return false;
    }
}
// Détermine qu'il n'y a pas d'erreur et que le nom du fichier est OK
// doc que l'on peut finaliser l'upload
function isUploadOK($file, $fileName){
    return $file["error"] == 0 && $fileName !== false;
}


function uploadAvatar(){

    $success = false;
    if (hasUploadedAvatar()) {
        $avatar = getUploadedDataAvatar();  // Récup des données
        $fileName = getFileName($avatar);   // Obtension du nom du fichier
        // si tout est OK alors on tente de déplacer le fichier 
        // depuis le dossier temporaire vers sa destination
        $success = isUploadOK($avatar, $fileName)
            && move_uploaded_file($avatar["tmp_name"], getcwd(). "/img/$fileName");
        // Si l'upload est ok on retourne le nom du fichier
            if($success) {
            return $fileName;
        }
    }
    return $success;
}

?>