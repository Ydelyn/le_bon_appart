<?php
    // Fichier indispensable pour le fonctionnement du site

    /////////////////////////////////////////////////////////////////////////
    //////////////////////// Connexion à la base de données ///////////////////
    ////////////////////////////////////////////////////////////////////////


    // 1- Connexion à la BDD

    $pdoSITE = new PDO(
        'mysql:host=localhost;dbname=php_intermediaire_lorris',
        'root',
        '',
        array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'set NAMES utf8'
        )
    );

    // 2- Ouverture de session
    
    session_start();

    // 3- Chemin du site avec une constante

    define('RACINE_SITE', "http://localhost/php_intermediaire_lorris/");

    // 4- Variables pour les contenus

    $contenu = '';
    
?>
