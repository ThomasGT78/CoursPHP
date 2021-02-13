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
    $total = 0;

    echo "<table class='table table-bordered table-striped'>";
    createHead();
    foreach($accountMoves as $item){
        createRows($item, $total);
    }
    createFooter($total);
    echo "</table>";

}

function createRows($item, &$total) {
    // var_dump($item["label"]);
    echo 
    "<tr>
        <td>" . $item["label"] . "</td>
        <td>" . $item["date"] . "</td>";
    echo createDebitCredit($item, $total);
    echo "</tr>";

}

function createDebitCredit($item, &$total)
{
    if($item["type"] == "credit"){
        echo "<td>" . $item["amount"] . "</td>
        <td>" . "" . "</td>";
        $total += $item["amount"];
    } else if ($item["type"] == "debit") {
        echo "<td>" . "" . "</td>
        <td>" . $item["amount"] . "</td>";
        $total -= $item["amount"];
    } else {
        echo "<td>" . "" . "</td>}
        <td>" . "" . "</td>";
}
}
function createHead()
{
    echo
    "<tr>
        <th>Label</th>
        <th>Date</th>
        <th>Crédit</th>
        <th>Débit</th>
    </tr>";
}

function createFooter($total){
    echo 
    "<tfoot> <!-- Pied de tableau -->
        <tr>
            <th colspan='2'>Total</th>
            <th colspan='2'>$total</th>
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
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css" />
    <title>DépensesV1</title>
</head>
<body>
    <nav>
        <a href="http://localhost:8081/">Home</a> - 
        <a href="http://localhost:8081/PHP-Tables/8-TP_DépensesV1.php">TP_DépensesV1</a> - 
        <a href="http://localhost:8081/PHP-Tables/9-TP_DépensesV2.php">TP_DépensesV2</a>
    </nav><br>
    <h1>DépensesV1</h1>
    <?=createTable($accountMoves)?>
</body>
</html>