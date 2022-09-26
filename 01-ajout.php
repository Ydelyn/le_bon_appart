<?php
require_once('inc/init.php');

if (!empty($_POST)) {
    /* Les if qui suivent vont permettre de vérifier si les valeurs passées dans $_POST correspondent bien à ce qui est attendu en BDD */

    if (!isset($_POST['photo'])) {
        /* si la photo n'est pas definie alors erreur */
        $contenu .= "<div class=\"alert alert-warning\">Vous devez ajouter une photo à votre annonce !</div>";
    }

    if (!isset($_POST['title']) || strlen($_POST['title']) < 2 || strlen($_POST['title']) >= 30) {
        /* si le titre n'est pas defini ou que le titre fait moins de 1 caractères ou plus de 30 alors erreur */
        $contenu .= "<div class=\"alert alert-warning\">Votre titre doit faire entre 2 et 30 caractères !</div>";
    }

    if (!isset($_POST['description']) || strlen($_POST['description']) <= 20 || strlen($_POST['description']) >= 200) {
        /* si la description n'est pas definie ou que la description fait moins de 20 caractères ou plus de 200 alors erreur */
        $contenu .= "<div class=\"alert alert-warning\">Votre description doit faire entre 20 et 200 caractères !</div>";
    }

    if (!isset($_POST['postal_code']) || strlen($_POST['postal_code']) != 5) {
        /* si le code postal n'est pas defini ou que le code postal fait plus ou moins de 5 caractères alors erreur */
        $contenu .= "<div class=\"alert alert-warning\">Votre code postal doit faire 5 caractères !</div>";
    }

    if (!isset($_POST['city']) || strlen($_POST['city']) < 2 || strlen($_POST['city']) >= 40) {
        /* si la ville n'est pas definie ou que la ville fait moins de 2 caractères ou plus de 40 caractères alors erreur */
        $contenu .= "<div class=\"alert alert-warning\">Votre ville doit faire entre 3 et 40  caractères !</div>";
    }

    if (!isset($_POST['price']) || strlen($_POST['price']) < 2 || ($_POST['price']) == 0) {
        /* si le prix n'est pas defini ou que le prix fait moins de 2 caractères ou est égal à 0 alors erreur */
        $contenu .= "<div class=\"alert alert-warning\">Votre prix doit être plus élevé !</div>";
    }

    if (empty($contenu)) { //si la variable $contenu est vide alors je n'ai pas d'erreurs et je peux lancer ma requête 
        $annonce = $pdoSITE->prepare("SELECT * FROM advert WHERE title = :title ");
        $annonce->execute(array(
            ':title' => $_POST['title'],
        ));

        if ($annonce->rowCount() > 0) {/* si au décompte de cette requête on obtient pas 0 c'est que le titre existe déjà */
            $contenu .= "<div class=\"alert alert-warning\">Ce titre est indisponible, veuillez en choisir un autre.</div>";
        } else {/* c'est que le pseudo est dispo, on entre les infos en BDD */

            $annonce = $pdoSITE->prepare(" INSERT INTO advert (photo, title, description, postal_code, city, type, price) VALUES (:photo, :title, :description, :postal_code, :city, :type, :price) ");

            $annonce->execute(array(
                ':photo' => $_POST['photo'],
                ':title' => $_POST['title'],
                ':description' => $_POST['description'],
                ':postal_code' => $_POST['postal_code'],
                ':city' => $_POST['city'],
                ':type' => $_POST['type'],
                ':price' => $_POST['price'],

            ));

            if ($annonce) {
                $contenu .= "<div class=\"alert alert-success\">Votre annonce a bien été prise en compte ! <br>
                <a href='02-consultation.php'>Cliquez ici pour accéder aux annonces</a></div>";
            } else {
                $contenu .= "<div class=\"alert alert-danger\">Erreur lors de l'ajout</div>";
            }
        }
    }
}
?>



<!doctype html>
<html lang="fr_FR">

<head>
    <title>Le Bon Appart - Ajouter une annonce</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- meta author pour le référencement -->
    <meta name="author" content="Lorris 'Ydelyn' Colini">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- link vers nos CSS -->
    <link rel="stylesheet" href="./css/style.css">
    <link href='./css/to-top.css' rel='stylesheet' type='text/css'>


    <!-- link pour ajouter notre logo en tant qu'icône sur l'onglet -->
    <link rel="icon" href="./img/logo.png">

</head>

<body>
    <main class="bg-white mx-auto">
        <!--//////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////    En-tête avec navbar et menu burger   //////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <div class="row">
            <div class="col-sm-12">
                <nav class="navbar navbar-expand-lg bg-dark">
                    <div class="container-fluid w-75">
                        <a class="navbar-brand text-white" href="index.php">
                            <h2>Le Bon Appart</h2>
                        </a>
                        <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse align-right" id="navbarNav">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a class="nav-link text-white" aria-current="page" href="01-ajout.php">Ajouter une annonce</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="02-consultation.php">Toutes les annonces</a>
                                </li>
                            </ul>
                        </div> <!-- fin navbar collapse -->
                    </div> <!-- fin container fluid -->
                </nav> <!-- fin navbar -->
            </div> <!-- fin de la col -->
        </div> <!-- fin de la row -->

        <!--//////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////   Fin En-tête avec navbar et menu burger   ///////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////////////// -->

        <!--//////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////   Ajout formulaire    ////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////////////// -->

        <main class="container bg-white m-5 mx-auto p-4">
            <div class="row">
                <div class="col-sm-12 col-md-9 mx-auto text-center">
                    <h1>Le Bon Appart - Ajoutez votre annonce !</h1>
                    <?php echo $contenu; ?>

                    <form action="#" method="POST" class="w-75 mx-auto">

                        <div class="mb-3 row">

                            <div class="col">
                                <label for="photo">Photo</label>
                                <input placeholder="Insérer l'URL de votre photo" type="text" name="photo" id="photo" class="form-control" required>
                            </div>

                            <div class="col">
                                <label for="title">Titre</label>
                                <input placeholder="Entrez le titre de l'annonce" type="text" name="title" id="title" class="form-control" required>
                            </div>
                        </div>

                        <div class="mb-3 row">

                            <div class="col">
                                <label for="description">Description</label>
                                <input placeholder="Décrivez votre bien" type="textarea" name="description" id="description" class="form-control" required>
                            </div>

                            <div class="col">
                                <label for="postal_code">Code Postal</label>
                                <input placeholder="Entrez votre code postal" type="text" name="postal_code" id="postal_code" class="form-control" required>
                            </div>
                        </div>

                        <div class="mb-3 row">

                            <div class="col">
                                <label for="city">Ville</label>
                                <input placeholder="Entrez votre ville" type="text" name="city" id="city" class="form-control" required>
                            </div>

                            <div class="col">
                                <label for="type">Type d'annonce</label>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="radio" name="type" id="location" class="form-control" value="location" checked>
                                        <label for="location">Location</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="radio" name="type" id="vente" class="form-control" value="vente">
                                        <label for="vente">Vente</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col">
                                <label for="price">Prix</label>
                                <input placeholder="Entrez votre prix" type="number" name="price" id="price" class="form-control" required>
                            </div>
                        </div>

                        <div class="text-center">
                            <input type="submit" class="btn btn-info my-2">
                            <input type="reset" class="btn btn-warning my-2">
                        </div>
                    </form>
                </div>
            </div>
        </main>


        <!--//////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////   Fin Ajout formulaire    ////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////////////// -->

        <!--//////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////    Pied de page   ////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////////////// -->

        <div class="container-fluid">
            <div class="row bg-dark text-center text-white">
                <div class="col-sm-12 w-75 mx-auto">
                    <img class="my-3" width="70vh" src="./img/logo.png" alt="Logo Colombbus">
                    <div class="row">
                        <div class="col-sm-12">
                            <p>Le Bon Appart - © 2022 COLINI Lorris</p>
                        </div>
                    </div> <!-- row -->
                </div> <!-- fin de la col -->
            </div> <!-- fin de la row -->
        </div>

        <!--//////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////   Fin Pied de page   /////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////////////// -->

        <div id="scrollUp">
            <a href="#top"><img src="./img/to_top.png" /></a>
        </div>

    </main>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

    <!-- JavaScript ajouté -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
    <script src="./js/to-top.js"></script>
</body>

</html>