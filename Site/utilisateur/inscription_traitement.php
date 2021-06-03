<?php 
    require_once'config.php'; // base de données 
    // verifie si les variables POST existent 
    if (!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_retype'])){
        $pseudo = htmlspecialchars($_POST['pseudo']); // htmlspecialchars permet de se protéger contre la faille XSS en échappant les caractères en entité HTML. Surtout pour conserver leur signification
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $password_retype = htmlspecialchars($_POST['password_retype']);

        $check = $basedonnee->prepare('SELECT pseudo, email, password FROM utilisateur WHERE email');
        $check->execute(array($email)); // Exécute une requête préparée avec un tableau de valeurs
        $data = $check->fetch();
        $row = $check->rowCount(); // retourne nb lignes affecte par requetes sql


//utilisation de if imbrique car si 1er ok passe au suivant. Si faux recommence au debut 
        if($row == 0){ // personne n'est pas dans la base de donnée
            // verification par rapport a mes données sur mysql
            if(strlen($pseudo) <=50){
                
                if(strlen($email)<=100){
                    
                    if(filter_var($email, FILTER_VALIDATE_EMAIL)){

                        if($password === $password_retype){
                            $cost =['cost=>12'];
                            $password = password_hash($password, PASSWORD_BCRYPT, $cost);
                            $ip =$_SERVER['REMOTE_ADDR'];  //stocker adresse ip
                            $insert = $basedonnee->prepare('INSERT INTO utilisateur(pseudo, email, password, ip) VALUES(:pseudo, :email, :password, :ip)');
                            $insert->execute(array( // tableau associatif
                                'pseudo' => $pseudo,
                                'email' => $email,
                                'password' => $password,
                                'ip' => $ip
                            )); 

                            header('Location:inscription.php?reg_erreur=success');
                        }
                        else {
                            header('Location:inscription.php?reg_erreur=password');
                        }

                    }
                    else {
                        header('Location:inscription.php?reg_erreur=email');
                    }

                }
                else{
                    header('Location:inscription.php?reg_erreur=email_length');
                }

            }
            else {
                header('Location:inscription.php?reg_erreur=pseudo_length');
            }

        }
        else {
            header ('Location: inscription.php?reg_erreur=already');

        }
        
    }
    
 
    ?>

    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Icone d'onglet -->
        <link rel="apple-touch-icon" sizes="180x180" href="../favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../favicon/favicon-16x16.png">
        <link rel="manifest" href="../favicon/site.webmanifest">
        <link rel="mask-icon" href="../favicon/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#FFFFFF">
        <title>inscription réussi</title>
    </head>
    <body>
    <form action="inscription_traitement.php" method="post">
                <h2 class="text-center">Inscription</h2>       
                <div class="form-group">
                    <input type="text" name="pseudo" class="form-control" placeholder="Pseudo" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="password" name="password_retype" class="form-control" placeholder="Re-tapez le mot de passe" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Inscription</button>
                </div>   
            </form>
    </body>
    </html>