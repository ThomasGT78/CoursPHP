<?php
$accountMoves = [
    ["label"=>"Salaire", "date"=>"2021-01-01", "amount"=>1800, "type"=>"credit"],
    ["label"=>"Loyer", "date"=>"2021-01-05", "amount"=>600, "type"=>"debit"],
    ["label"=>"Courses Lidl", "date"=>"2021-01-08", "amount"=>110, "type"=>"debit"],
    ["label"=>"Location Parking", "date"=>"2021-01-10", "amount"=>80, "type"=>"credit"],
    ["label"=>"Courses Epicerie", "date"=>"2021-01-15", "amount"=>35, "type"=>"debit"],
    ["label"=>"Réparation Moto", "date"=>"2021-01-25", "amount"=>670, "type"=>"debit"],
    ["label"=>"Solde Nike", "date"=>"2021-01-27", "amount"=>110, "type"=>"debit"]
];

function createTable ($accountMoves){
    
    echo "<table>";
    createHead();
    foreach($accountMoves as $item){
        createRows($item);
    }
    createFooter($accountMoves);
    echo "</table>";

}

function createRows($item) {
    // var_dump($item["label"]);
    echo 
    "<tr>
        <td>" . $item["label"] . "</td>
        <td>" . $item["date"] . "</td>";
    echo createDebitCredit($item);
    echo "</tr>";

}

function createDebitCredit($item)
{
    if($item["type"] == "credit"){
        echo "<td>" . $item["amount"] . "</td>
        <td>" . "" . "</td>";
    } else if ($item["type"] == "debit") {
        echo "<td>" . "" . "</td>
        <td>" . $item["amount"] . "</td>";
    } else {
        echo "<td>" . "" . "</td>}
        <td>" . "" . "</td>";
}
}
function createHead()
{
    echo
    "<thead>
        <tr>
            <th>Label</th>
            <th>Date</th>
            <th>Crédit</th>
            <th>Débit</th>
        </tr>
    </thead>";
}

function createFooter($accountMoves){
    $total = 0;
    $totalCredit = 0;
    $totalDebit = 0;

    foreach($accountMoves as $item){
        if($item["type"] == "credit"){
            $total += $item["amount"];
            $totalCredit += $item["amount"];

        } else {
            $total -= $item["amount"];
            $totalDebit -= $item["amount"];
        }
    }

    echo 
    "<tfoot>
        <tr>
            <th colspan='2'>Total Crédits/Débits</th>
            <th>$totalCredit</th>
            <th>$totalDebit</th>
        </tr>
        <tr>
            <th colspan='2'>Solde du Compte</th>
            <th colspan='2' class='solde'>$total</th>
        </tr>
   </tfoot>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="css/8-9-Style_Depenses.css" />
    <title>DépensesV1</title>
</head>
<body>
    <nav>
        <a href="http://localhost:8081/">Home</a> - 
        <a href="http://localhost:8081/PHP-Tables/8.2-TP_DépensesV1Bootstrap.php">TP_DépensesV1Bootstrap</a> - 
        <a href="http://localhost:8081/PHP-Tables/9-TP_DépensesV2.php">TP_DépensesV2</a>
    </nav><br>
    <h1>DépensesV1</h1>
    <?=createTable($accountMoves)?>
</body>
</html>