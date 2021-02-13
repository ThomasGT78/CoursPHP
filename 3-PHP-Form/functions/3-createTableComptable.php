<?php

function createTable($accountMoves)
{

    echo "<table>";
    createHead();
    foreach ($accountMoves as $item) {
        createRows($item);
    }
    createFooter($accountMoves);
    echo "</table>";

}

function createRows($item)
{
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
    if ($item["type"] == "credit") {
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

function createFooter($accountMoves)
{
    $total = 0;
    $totalCredit = 0;
    $totalDebit = 0;

    foreach ($accountMoves as $item) {
        if ($item["type"] == "credit") {
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