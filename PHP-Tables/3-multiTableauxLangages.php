<?php
$languages = [
[
    "name" => "Java",
    "frontend" => false,
    "backend" => true,
    "compiled" => true
],[
    "name" => "PHP",
    "frontend" => true,
    "backend" => true,
    "compiled" => false
],[
    "name" => "Python",
    "frontend" => true,
    "backend" => true,
    "compiled" => false
],[
    "name" => "JavaScript",
    "frontend" => true,
    "backend" => true,
    "compiled" => false
]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Langages</title>
</head>
<body>
    <h1>Langages</h1>
    <nav><a href="http://localhost:8081/">Home</a></nav><br>
    <table>
        <tr>
            <th>Nom</th>
            <th>Frontend</th>
            <th>Bbackend</th>
            <th>Compilé</th>
        </tr>
        <?php foreach($languages as $item): ?>
            <tr>
                <td><?=$item["name"]?></td>
                <td><?=$item["frontend"]? "oui" : "non" ?></td>
                <td><?=$item["backend"]? "oui" : "non" ?></td>
                <td><?=$item["compiled"]? "oui" : "non" ?></td>
            </tr>
        <?php endforeach ?>
    </table>
</body>
</html>