<!--<?php
    session_start();
    //condition si jamais la session n'existe pas
    if (!isset($_SESSION['user'])){
        header('Location:index.php');
    }
    
    if(isset($_POST['number'])){
        $scores = $_POST['number'];
        enregistrer_record($scores);
    }


    function enregistrer_record($score) {
        try{
            $basedonnee = new PDO('mysql:host=localhost;dbname=inscription;charset=utf8', 'root', '');
            $secondes = $score;
            $tmp = $_SESSION['user'];
            $insert = $basedonnee->prepare('UPDATE utilisateur SET record = :secondes WHERE pseudo = "'.$tmp.'"');
            $insert->bindParam(':secondes', $secondes, PDO::PARAM_INT);
            $insert->execute(); 
        } catch(Exception $e)
    
        {
            die('Erreur'.$e->getMessage());
        }
    }

    
    
?>-->

<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="groupe04" content="NoSignal"/>

            <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <!-- CSS Font Awesome -->
            <link rel="stylesheet" href="../fontawesome/css/all.min.css">
            <!-- Icone d'onglet -->
            <link rel="apple-touch-icon" sizes="180x180" href="../favicon/apple-touch-icon.png">
            <link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
            <link rel="icon" type="image/png" sizes="16x16" href="../favicon/favicon-16x16.png">
            <link rel="manifest" href="../favicon/site.webmanifest">
            <link rel="mask-icon" href="../favicon/safari-pinned-tab.svg" color="#5bbad5">
            <meta name="msapplication-TileColor" content="#da532c">
            <meta name="theme-color" content="#FFFFFF">
            <title>Connexion</title>
        </head>
        <body>
        
        <div class="login-form">
             <?php 
             // utilisation de isset pour déterminer si une variable est déclarée et si elle est différente de null
                if(isset($_GET['login_erreur'])) { // si il y a une erreur on l'affiche 
                    $erreur = htmlspecialchars($_GET['login_erreur']);

                    //pour savoir quel est l'erreur : mdp ? email?...
                    switch($erreur) 
                    {
                        case 'password':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Error</strong> password incorrect
                            </div>
                        <?php
                        break;

                        case 'email':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Error</strong> email incorrect
                            </div>
                        <?php
                        break;

                        case 'already':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Error</strong> compte non existant
                            </div>
                        <?php
                        break;
                    }
                }
                ?> 
            <p class="text-center"><a href="../index.html"><i class="fas fa-undo-alt"></i> Retour à l'Accueil</a></p> <!--lien vers index.html-->
            <form action="connexion.php" method="post"> <!--envoie les données-->
                <h2 class="text-center">Connexion</h2>       
                <div class="form-group">
                    <!--3 champs input
                    Input (contrôle interactif dans un formulaire web) permet à l'utilisateur de saisir des données-->
                    <input type="email" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Connexion</button> <!-- creation bouton php-->
                </div>   
            </form>
            <p class="text-center"><a href="inscription.php">Inscription</a></p> <!--lien vers inscription.php-->
            </div>
        <style> /*css*/
            .login-form {
                width: 380px;
                margin: 50px auto;
            }
            .login-form form {
                margin-bottom: 15px; /*entre connexion et inscription*/
                background: #f7f7f7;
                box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3); /*effet relief*/
                padding: 40px;
            }
            .login-form h2 {
                margin: 0 0 15px;
            }
            .form-control, .btn {
                min-height: 40px;
                border-radius: 2px; /*bord carre un peu arondie*/
            }
            .btn {        
                font-size: 15px;
                font-weight: bolder;
            }
        </style>
        </body>
</html>