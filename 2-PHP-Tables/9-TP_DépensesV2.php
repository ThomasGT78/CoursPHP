<?php
$accountMoves = [
    ["label" => "Salaire", "date" => "2021-01-01", "amount" => 1800, "type" => "credit"],
    ["label" => "Loyer", "date" => "2021-01-05", "amount" => 600, "type" => "debit"],
    ["label" => "Courses Lidl", "date" => "2021-01-08", "amount" => 110, "type" => "debit"],
    ["label" => "Location Parking", "date" => "2021-01-10", "amount" => 80, "type" => "credit"],
    ["label" => "Courses Epicerie", "date" => "2021-01-15", "amount" => 35, "type" => "debit"],
    ["label" => "Réparation Moto", "date" => "2021-01-25", "amount" => 670, "type" => "debit"],
    ["label" => "Solde Nike", "date" => "2021-01-27", "amount" => 110, "type" => "debit"],
];

include "functions/9-createTableCredit.php";
include "functions/9-createTableDebit.php";
include "functions/9-createTableTotal.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="css/8-9-Style_Depenses.css" />
    <title>DépensesV2</title>
</head>
<body>
    <nav>
        <a href="http://localhost:8081/">Home</a> - 
        <a href="http://localhost:8081/PHP-Tables/8-TP_DépensesV1.php">TP_DépensesV1</a> - 
        <a href="http://localhost:8081/PHP-Tables/8.2-TP_DépensesV1Bootstrap.php">TP_DépensesV1Bootstrap</a>
    </nav><br>
    <h1>DépensesV2</h1>
    <div class="flexBox">
        <?=createTableCredit($accountMoves)?>
        <?=createTableDebit($accountMoves)?>
    </div>
    <?=createTableTotal($accountMoves)?>
</body>
</html>