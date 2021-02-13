<?php

function createTableTotal($accountMoves)
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
    "<Table class='tableTotal'>
        <tr>
            <th>Total Crédits</th>
            <th>Total Débits</th>
            <th>Solde du Compte</th>
        </tr>
        <tr>
            <th>$totalCredit</th>
            <th>$totalDebit</th>
            <th class='solde'>$total</th>
        </tr>
   </Table>";
}
