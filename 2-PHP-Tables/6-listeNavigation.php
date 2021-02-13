<?php
$nav = [
    [
        "label" => "fruits",
        "link" => "http://localhost:8081/PHP-Tables/1-fruits.php"
    ],
    [
        "label" => "tableauAssossiatifLangages",
        "link" => "http://localhost:8081/PHP-Tables/2-tableauAssossiatifLangages.php"
    ],
    [
        "label" => "multiTableauxLangages",
        "link" => "http://localhost:8081/PHP-Tables/3-multiTableauxLangages.php"
    ],
    [
        "label" => "explodeStringIntoArray",
        "link" => "http://localhost:8081/PHP-Tables/4-explodeStringIntoArray.php"
    ]
]
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>listeNavigation</title>
</head>
<body>
    <nav><a href="http://localhost:8081/">Home</a></nav><br>
    <h1>Liste Navigation Automatique</h1>
    <ul>
        <?php foreach ($nav as $item):?>
            <li><a href="<?= $item["link"] ?>" target="_blank"><?= $item["label"] ?></li>
        <?php endforeach ?>
    </ul>
</body>
</html>