<?php
$profession = [
    "Web developer",
    "Web Designer",
    "Data Analyst",
    "Software Engineer"
];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>listeDeroulanteProfession</title>
</head>
<body>
    <nav><a href="http://localhost:8081/">Home</a></nav><br>
    <h1>Liste Déroulante de Professions</h1>
    <select>
        <?php foreach($profession as $item): ?>
        <option><?= $item ?></option>
        <?php endforeach ?>
    </select>

</body>
</html>