<?php
require_once('inc/init.php');
if (isset($_GET["id"]) && !empty($_GET["id"])) {
    $requete = $pdoSITE->query("SELECT * FROM advert WHERE id =" . $_GET["id"]);
    $ligne = $requete->fetch(PDO::FETCH_ASSOC);
} else {
    header('Location:02-consultation.php');
}

if (!empty($_POST)) {
    if (!isset($_POST['reservation_message']) || strlen($_POST['reservation_message']) < 5 || strlen($_POST['reservation_message']) > 200) {
        /* si le message n'est pas defini ou si il ne fait pas entre 5 et 200 caractères alors erreur */
        $contenu .= "<div class=\"alert alert-warning\">Vous devez ajouter un message de réservation !</div>";
    }
    if (empty($contenu)) { //si la variable $contenu est vide alors je n'ai pas d'erreurs et je peux lancer ma requête 
        $resa = $pdoSITE->prepare("UPDATE advert SET reservation_message = :reservation_message WHERE advert.id =" . $_GET['id']);
        $resa->execute(array(
            ':reservation_message' => $_POST['reservation_message'],
        ));
        if ($resa) {
            $contenu .= "<div class=\"alert alert-success\">Votre réservation a bien été prise en compte ! <br>
            <a href='02-consultation.php'>Cliquez ici pour accéder aux annonces</a></div>";
        } else {
            $contenu .= "<div class=\"alert alert-danger\">Erreur lors de l'ajout</div>";
        }
    }
}
?>

<!doctype html>
<html lang="fr_FR">

<head>
    <title>Le Bon Appart - <?php echo $ligne['title']; ?></title>
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
        ///////////////////////////////////   Main   /////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////////////// -->

        <main class="container bg-white m-5 mx-auto p-4">
            <div class="row">
                <h1 class="text-center">Le Bon Appart - <?php echo $ligne['title']; ?></h1>
                <?php
                echo    '<div class="col-sm-12 col-md-6 offset-md-3">
                                    <div  class="card position-relative">
                                    <img src="' . $ligne['photo'] . '" class="card-img-top" alt="Annonce n°' . $ligne['id'] . '">
                                    <div class="card-body text-center bg-white opacity-75">
                                        <p class="card-text">' . strtoupper($ligne['title']) . '</p>
                                        <p class="card-text bg-success text-white">' . strtoupper($ligne['type']) . '</p>
                                        <p class="card-text">' . $ligne['description'] . '</p>
                                        <p class="card-text">' . $ligne['postal_code'] . ' ' . $ligne['city'] . '</p>
                                        <p class="card-text bg-dark text-white">' . $ligne['price'] . '€</p>
                                    </div>
                                    <div>';
                echo $contenu;

                if ($ligne['reservation_message'] != NULL) {
                    echo '<p class="text-center">Réservation :</p>
                                        <p class="text-center">' . $ligne['reservation_message'] . '</p>';
                } else {
                    echo '<form action="#" method="POST" class="text-center">
                                        <div class="col">
                                        <label for="reservation_message">Message de réservation</label>
                                        <input placeholder="Entrez votre message de réservation : " type="textarea" name="reservation_message" id="reservation_message" class="form-control" required>
                                    </div>
        
                                    <div class="col">
                                        <input type="submit" value="Je réserve" class="btn btn-primary my-2">
                                    </div>
                                        </form>';
                }
                echo    '</div>
                                </div>
                            </div>';

                ?>
            </div>
        </main>

        <!--//////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////   Fin Main   /////////////////////////////////////////////////////
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