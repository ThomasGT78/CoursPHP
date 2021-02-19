
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>

<body>
    <h1>Cours PHP</h1>
    <div class="container">
        <div class="chapter">
            <h3>PHP-Intro</h3>
            <?php include "1-PHP-Intro/nav-intro.html"?>
        </div>
        <div class="chapter">
            <h3>PHP-Tables</h3>
            <?php include "2-PHP-Tables/nav-table.html"?>
        </div>
        <div class="chapter">
            <h3>PHP-Form</h3>
            <?php include "3-PHP-Form/nav-form.html"?>
            
            <h3>PHP-Persitence</h3>
            <?php include "4-PHP-Persistence/nav-persistence.html"?>
        </div>
        <div class="chapter">
            <h3>PHP-Persitence</h3>
            <?php include "5-PHP-DataBase/nav-database.html"?>
        </div>
    </div>

</body>

</html>

<style>
.container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
}

.chapter {
    margin: 1%;
    padding: 1%;
}
</style>