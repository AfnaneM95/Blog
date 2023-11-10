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
            <?php
                if (isset($_POST['pseudo']) && isset($_POST['mdp']) && isset($_POST['email']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['adresse']) && isset($_POST['ville']) && isset($_POST['code_postal'])) {
                    $pseudo = trim($_POST['pseudo']);
                    $mdp = trim($_POST['mdp']);
                    $email = trim($_POST['email']);
                    $nom = trim($_POST['nom']);
                    $prenom = trim($_POST['prenom']);
                    $adresse = trim($_POST['adresse']);
                    $ville = trim($_POST['ville']);
                    $codePostal = trim($_POST['code_postal']);


                    $pseudo_lenght = iconv_strlen($pseudo);
                    $erreur = false;

                    if($pseudo_lenght <= 4 || $pseudo_lenght >= 14) {
                        echo '<div class="alert alert-danger mb-3">⚠️ Taille du pseudo incorrecte, <br>le pseudo doit avoir entre 4 et 14 caractères inclus.</div>';
                        $erreur = true;
                    } 

                    $verif_pseudo = preg_match('/^[a-zA-Z0-9._-]+$/', $pseudo);

                    if (!$verif_pseudo) {
                        echo '<div class="alert alert-danger mb-3">⚠️ Caractères autorisés pour le pseudo : az AZ 09, le point, le tiret et l\'underscore</div>';
                            // cas d'erreur
                            $erreur = true;
                    } else {
                        $pseudo = str_replace(['-', '_'], ' ', $pseudo);
                    }

                    $mdpHash = password_hash($mdp, PASSWORD_DEFAULT);

                    if(empty($mdpHash)) {
                        echo '<div class="alert alert-danger mb-3">⚠️ Veuillez renseignez un mot de passe</div>';
                    } 

                    if( !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        echo '<div class="alert alert-danger mb-3">⚠️ format du mail incorrect, <br>veuillez vérifier vos saisies.</div>';
                        $erreur = true;
                    } else {
                        echo '<div class="alert alert-success mb-3">Email : ' . $email . '</div>';
                    }

                    if(empty($nom)) {
                        echo '<div class="alert alert-danger mb-3">⚠️ Veuillez renseignez un nom</div>';
                    } 

                    if(empty($prenom)) {
                        echo '<div class="alert alert-danger mb-3">⚠️ Veuillez renseignez un prénom</div>';
                    } 

                    if(empty($adresse)) {
                        echo '<div class="alert alert-danger mb-3">⚠️ Veuillez renseignez une adresse</div>';
                    } 

                    if(empty($ville)) {
                        echo '<div class="alert alert-danger mb-3">⚠️ Veuillez renseignez une ville</div>';
                    } 

                    if(empty($codePostal)) {
                        echo '<div class="alert alert-danger mb-3">⚠️ Veuillez renseignez un code postal</div>';
                    } elseif ($codePostal < 5 || $codePostal > 5) {
                        echo '<div class="alert alert-danger mb-3">⚠️ le code postal doit contenir 5 chiffres</div>';
                    }



                    if($erreur == false) {
                        // si la variable erreur est toujours égale à false, alors nous ne sommes pas rentré dans les cas, il n'y donc pas d'erreur dans les  controles mis en place, on peut conserver les saisies.

                        // fopen() permet de gérer des fichiers, le mode 'a' en deuxième argument permet de créer le fichier s'il n'existe pas et donne la possibilité d'écrire à l'intérieur
                        // https://www.php.net/manual/fr/function.fopen.php
                        // fwrite() // pour écrire dans le fichier
                        // https://www.php.net/manual/fr/function.fwrite.php
                        // fclose() // pour fermer le fichier et libérer de l'espace mémoire
                        // https://www.php.net/manual/fr/function.fclose.php

                        // PHP_EOL : php end of line, permet de gérer les retours à la ligne dans un fichier (au lieu de devoir mettre les \n \r \r\n)

                        $f = fopen('liste.txt', 'a');
                        fwrite($f, $pseudo . ' - ' . $mdpHash . ' - ' . $email . ' - ' . $nom . ' - ' . $prenom . ' - '. $adresse . ' - '. $ville . ' - '. $codePostal . PHP_EOL);
                        fclose($f);

                    }

                }


            ?>
                <form method="post" action="" enctype="multipart/form-data" class="p-3 border">
                    <div class="mb-3">
                        <label for="pseudo">Pseudo</label>
                        <input type="text" name="pseudo" id="pseudo" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="mdp">Mot de passe</label>
                        <input type="password" name="mdp" id="mdp" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="nom">Nom</label>
                        <input type="text" name="nom" id="nom" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="prenom">Prénom</label>
                        <input type="text" name="prenom" id="prenom" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="adresse">Adresse</label>
                        <input type="text" name="adresse" id="adresse" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="ville">Ville</label>
                        <input type="text" name="ville" id="ville" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="code_postal">Code postal</label>
                        <input type="text" name="code_postal" id="code_postal" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-outline-success w-100">Valider</button>
                </form>

            </div>
        </div>
    </div>

</body>

</html>