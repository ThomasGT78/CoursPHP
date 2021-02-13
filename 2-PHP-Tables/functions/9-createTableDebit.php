<?php

function createTableDebit($accountMoves)
{
    echo "<table>";
    createHeadDebit();
    foreach ($accountMoves as $item) {
        createRowsDebit($item);
    }
    createFooterDebit($accountMoves);
    echo "</table>";

}

function createRowsDebit($item)
{
    // var_dump($item["label"]);
    if ($item["type"] == "debit") {
        echo
        "<tr>
            <td>" . $item["label"] . "</td>
            <td>" . $item["date"] . "</td>
            <td>" . $item["amount"] . "</td>
        </tr>";
    }
}

function createHeadDebit()
{
    echo
    "<thead>
        <tr>
            <th>Label</th>
            <th>Date</th>
            <th>Débit</th>
        </tr>
    </thead>";
}

function createFooterDebit($accountMoves)
{
    $totalDebit = 0;

    foreach ($accountMoves as $item) {
        if ($item["type"] == "debit") {
            $totalDebit -= $item["amount"];
        }
    }

    echo
        "<tfoot>
        <tr>
            <th colspan='2'>Total Débit</th>
            <th>$totalDebit</th>
        </tr>
   </tfoot>";
}
