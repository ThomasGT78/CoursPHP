<?php
$sentence = "que j'aime à faire apprendre un nombre utile aux sages";
// Conversion de la phrase en tableau
$words = explode(" ", $sentence);
// Conversion du tableau en chaîne de caractères
$recup = implode(" ", $words);

?>

<nav><a href="http://localhost:8081/">Home</a></nav><br>

<h3>Phrase initiale</h3>
<p>
    <?=$sentence?>
</p>

<h3>Phrase convertie en tableau:</h3>
<p>
    <?=var_dump($words)?>
</p>

<h3>Tableau reconvertis en Chaîne de caractères</h3>
<p>
    <?=$recup?>
</p>