<?php
    session_start(); //demarre la session
    require_once'config.php'; // verifie si le fichier est déja inclus
     
    //verifier si les données existent (mail, mdp)
    if(!empty($_POST['email']) && !empty($_POST['password'])){
        // stocker les POST pour eviter un probleme
        $email = htmlspecialchars($_POST['email']); 
        $password = htmlspecialchars($_POST['password']);

        //verifier si la personne est bien inscrite 
        $check = $basedonnee->prepare('SELECT pseudo, email, password FROM utilisateur WHERE email = ?');
        // verifier execution
        $check->execute(array($email));
        $data = $check->fetch(); // fetch: controle comment la ligne sera récupéré
        $row = $check->rowCount(); // rowcount verifie s'il existe un data

        if($row == 1){ // si c'est bon
        // verifier si l'adresse email est valide
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){

                if (password_verify($password, $data['password'])) {// === pour eviter les fails
                    //creer une session 
                    $_SESSION['user'] = $data['pseudo'];
                    // lien avec inscription_traitement*/
                    header('Location:landing.php'); // redirige sur landing.php

                    

                }    
                else {
                    header('Location:index.php?login_erreur=password'); die();
                }
            }
            else {
                header('Location:index.php?login_erreur=email'); die();
            }

        }
        else {
            header('Location:index.php?login_erreur=already'); die();
        }

     }
    else {
        header('Location:index.php'); // si existe pas renvoie sur la page php
    }
