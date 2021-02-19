<?php

function getForm($hasPostedData, $accountMoves, $errors, &$hasError){
if ($hasPostedData) {

// Test Label
    $sanitizeLabel = filter_input(
        INPUT_POST,
        "label",
        FILTER_SANITIZE_STRING
    ) ?? "inconnu";

// test Date
    $date = $_POST["date"] ?? "";

    /* $validateDate = filter_input(
        INPUT_POST,
        "date",
        FILTER_VALIDATE_REGEXP
    );*/
 
// test Amount
    $amount = $_POST["amount"] ?? "";
    $sanitizeAmount = filter_input(
        INPUT_POST,
        "amount",
        FILTER_SANITIZE_NUMBER_INT
    ) ?? "inconnu";

    $validateAmount = filter_input(
        INPUT_POST,
        "amount",
        FILTER_VALIDATE_INT
    );
    // var_dump($_POST);
    // test Date
    $type = $_POST["type"];

    if (empty($sanitizeLabel)) {
        array_push($errors, "Vous devez saisir une description");
    }

    if (empty($date)) {
        array_push($errors, "Vous devez saisir une date");
    }

    if (empty($amount)) {
        array_push($errors, "Vous devez saisir un montant");
    } else if (!$validateAmount) {
        array_push($errors, "Le montant saisi est incorrect");
    }
} // end if

$hasError = !empty($errors);

if ($hasPostedData && !$hasError) {
    array_push($accountMoves, $_POST);
}

}

?>