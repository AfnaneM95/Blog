<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="bg-dark">
    <div class="container mt-5 text-white">
        <div class="row">
            <div class="col-4 mx-auto">
                <form method="post" action="affichage_formulaire2.php" enctype="multipart/form-data" class="p-3 border">
                    <div class="mb-3">
                        <label for="pseudo">Pseudo</label>
                        <input type="text" name="pseudo" id="pseudo" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="prenom">prenom</label>
                        <input type="text" name="prenom" id="prenom" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="nom">nom</label>
                        <input type="text" name="nom" id="nom" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-outline-success w-100">Valider</button>
                </form>

            </div>
        </div>
    </div>

</body>

</html>