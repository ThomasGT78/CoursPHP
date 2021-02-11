<?php
$fruitList = ["Pommes", "Poires", "Oranges"];

$fruitList[0] = "Grenades";     // remplace le premier item du tableau par Grenades
$fruitList[count($fruitList)] = "Pommes";    // ajoute un item à la fin du tableau
//count = .length, on crée ici un item Pommes à l'indice 3 car il y a 3 items, donc après le dernier item existant qui à lui la position 2
array_push($fruitList, "Abricots");     // ajoute un item à la fin du tableau

/*
array_splice($fruitList, 1, 1); // supprime 1 élément: Poires
array_splice($fruitList, 1, 2); // supprime 2 éléments: Poires et le suivant
array_splice($fruitList, 1, 0); // supprime rien
array_splice($fruitList, 1);    // supprime tout après Poires
*/


$animalList=["Pangolin", "Hamster", "Chien", "Pigeon", "Baleine"];
$adjectiveList=["fidèle", "furieux", "rapide", "intrépide", "malicieux"];

$name = $animalList[array_rand($animalList)] . " " . $adjectiveList[array_rand($adjectiveList)];
// array_round = Math.floor(Math.random()*tab.length)
// prend au hasard un item de chaque tableau et les concatène

$nombreHasard = mt_rand(3,8);   // nombre alátoire entre 3 et 8 (inclus 3 et 8)

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <nav><a href="http://localhost:8081/">Home</a></nav><br>
    <?php foreach ($fruitList as $item): ?>
        <li> <?=$item?> </li>
    <?php endforeach ?>
    <br>
    <?php echo $name ?>
    <br>
    <?php echo $nombreHasard ?>
</body>
</html>