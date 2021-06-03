<?php

/*connexion à la base de données*/
    try{
        $basedonnee = new PDO('mysql:host=localhost;dbname=inscription;charset=utf8', 'root', '');

    } catch(Exception $e)

    {
        die('Erreur'.$e->getMessage());
    }
    