<?php

function createTableCredit($accountMoves)
{
    echo "<table>";
    createHeadCredit();
    foreach ($accountMoves as $item) {
        createRowsCredit($item);
    }
    createFooterCredit($accountMoves);
    echo "</table>";

}

function createRowsCredit($item)
{
    // var_dump($item["label"]);
    if ($item["type"] == "credit") {
        echo
            "<tr>
                <td>" . $item["label"] . "</td>
                <td>" . $item["date"] . "</td>
                <td>" . $item["amount"] . "</td>
            </tr>";
    }
}

function createHeadCredit()
{
    echo
    "<thead>
        <tr>
            <th>Label</th>
            <th>Date</th>
            <th>Crédit</th>
        </tr>
    </thead>";
}

function createFooterCredit($accountMoves)
{
    $totalCredit = 0;

    foreach ($accountMoves as $item) {
        if ($item["type"] == "credit") {
            $totalCredit += $item["amount"];
        }
    }

    echo
        "<tfoot>
        <tr>
            <th colspan='2'>Total Crédits</th>
            <th>$totalCredit</th>
        </tr>
   </tfoot>";
}

?>