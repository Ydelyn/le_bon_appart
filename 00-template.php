<?php
require_once('inc/init.php');
?>

<!doctype html>
<html lang="fr_FR">

<head>
    <title>Le Bon Appart</title>
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