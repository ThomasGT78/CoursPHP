<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <title>Formulaire</title>
</head>
<body class="container-fluid">
    <nav>
        <a href="http://localhost:8081/">Home</a>
    </nav><br>
    <div class="row justify-content-center">
        <div class="col-md-4">
        <h1>Formulaire</h1>
            <form method="post" action="1.2-formulaire-traitement.php">
                <div class="container-fluid">
                    <label for="profession">Profession</label>
                    <input type="text" name="profession" class="form-control">
                </div>
                <div class="container-fluid">
                    <label for="salaire">Salaire</label>
                    <input type="text" name="salaire" class="form-control">
                </div>
                    <button type="submit" class="btn btn-primary btn-block mt-3">Envoyer</button>
                
            </form>
        </div>
    </div>
</body>
</html>