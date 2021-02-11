<?php

function getChessBoard()
{
    echo "<table>";
    for ($i=1 ; $i < 9 ; $i++) {
        getChessRow($i);
    }
    echo "</table>";

}

function getChessRow($i){
    echo "<tr>";
    for ($k = 1; $k < 9; $k++) {
        getChessCell($i, $k);
    }
    echo "</tr>";
}

function getChessCell($i, $k)
{
    if(($i+$k)%2 == 0){
        echo "<td class='blackCell'>";
    } else {
        echo "<td class='whiteCell'>";

    }
    
    echo "</td>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="css/7-Style_Echiquier.css" />
    <title>Echiquier</title>
</head>
<body>
    <nav><a href="http://localhost:8081/">Home</a></nav><br>
    <h1>Echiquier</h1>
    <?= getChessBoard() ?>
</body>
</html>
