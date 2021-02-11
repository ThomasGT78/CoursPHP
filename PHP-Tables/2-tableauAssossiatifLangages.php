<?php
    $Java = [
        "name" => "Java",
        "frontend" => false,
        "backend" => true,
        "compiled" => true
    ];

foreach($Java as $key=>$value){
    if(is_bool($value)){
        $value = $value ? "oui" : "non";
    }
    echo "$key = $value <br>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Langages</title>
</head>
<body>
    <h1>Langages</h1>
    <nav><a href="http://localhost:8081/">Home</a></nav><br>
</body>
</html>