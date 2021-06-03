<!--<pre><?php print_r($_POST) ?></pre>-->
<?php
require 'fonctions.php';

// Initialisation des variables
$empty = 0;
$size = '';
$indice = '';
$addition = '';
$soustraction = '';
$multiplication = '';
$division = '';

// Si le tableau $_POST est rempli
if (!empty($_POST)) {
    $size = $_POST['size'];
    $indice = $_POST['indice'];
    if(isset($_POST['addition'])) {
        $addition = $_POST['addition'];
    }
    if(isset($_POST['soustraction'])) {
        $soustraction = $_POST['soustraction'];
    }
    if(isset($_POST['multiplication'])) {
        $multiplication = $_POST['multiplication'];
    }
    if(isset($_POST['division'])) {
        $division = $_POST['division'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--CSS Perso-->
    <link rel="stylesheet" href="style.css" media="all">
    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Reggae+One&display=swap" rel="stylesheet">
    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- CSS Font Awesome -->
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <!-- Icone d'onglet -->
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/site.webmanifest">
    <link rel="mask-icon" href="favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#FFFFFF">
    <title>Entrainement</title>
</head>
<body>
    <header>
        <h1 class="titre">Tra1ning</h1>
        <div id="navbar">
          <a href="index.html"> <i class="fas fa-home"></i> Home</a>
          <a href="regles.html"><i class="fas fa-book-open"></i> Rules</a>
          <a href="entrainement.php"><i class="fas fa-bullseye"></i> Training </a>
          <a href="campagne.html"><i class="fas fa-map-marked-alt"></i> Campaign </a>
          <a href="utilisateur/index.php"><i class="fas fa-trophy"></i> Competitive </a>
          <button onclick="darkmode()"><i class="fas fa-moon"></i></button>
        </div>
        <div class="content"></div>
    </header>
    <main>
        <br>
        <div class="container">
            <h2>Welcome to the training area !</h2>
            <p>In this area you can choose your settings to train yourself.</p>
            <p>Have fun !</p>
        </div>
        

        <section class="left">
            <form action="entrainement_traitement.php" method="post">
                <fieldset id="fieldset" class="container">
                    <legend id="legend">Select your settings :</legend>
                    <div class="flexrow">
                        <label class="label" class="required">Number of unknown numbers (2 - 3) :</label>
                        <input class="input" type="number" name="size" id="size" min="2" max="3" placeholder="2" value="<?php echo $size ?>" required>
                    </div>
                    <div class="flexrow">
                        <label class="label" class="required">Number of hints available :</label>
                        <input class="input" type="number" name="indice" id="indice" min="0" max="9" placeholder="0" value="<?php echo $indice ?>" required>
                    </div>
                    <div class="flexrow">
                        <label class="label" class="required">Operators :</label><br>
                        <input class="input" type="checkbox" name="addition" id="addition" value="1">
                        <label class="label" for="addition"> Addition</label><br>
                        <input class="input" type="checkbox" name="soustraction" id="soustraction" value="1">
                        <label class="label" for="addition"> Soustraction</label><br>
                        <input class="input" type="checkbox" name="multiplication" id="multiplication" value="1">
                        <label class="label" for="addition"> Multiplication</label><br>
                        <input class="input" type="checkbox" name="division" id="division" value="1">
                        <label class="label" for="addition"> Division</label>
                    </div>
                    <br>
                    <div>
                        <button class="bouton" type="submit" value="confirmer">Confirm parameters</button>
                    </div>
                    <br>
                </fieldset>
            </form>
        </section>
        <br><br>
        <div class="container">
            <p>On the other hand, you can create your own Cr0ss Math3matics grid and see the results ! Beware of the decimal numbers generated by divisions !</p>
        </div>
        <br>
        <div class="wrapper">
                <a class="cta" href="concepteur.html">
                  <span>Create Your Own Grid</span>
                  <span>
                    <svg width="66px" height="43px" viewBox="0 0 66 43" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                      <g id="arrow" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <path class="one" d="M40.1543933,3.89485454 L43.9763149,0.139296592 C44.1708311,-0.0518420739 44.4826329,-0.0518571125 44.6771675,0.139262789 L65.6916134,20.7848311 C66.0855801,21.1718824 66.0911863,21.8050225 65.704135,22.1989893 C65.7000188,22.2031791 65.6958657,22.2073326 65.6916762,22.2114492 L44.677098,42.8607841 C44.4825957,43.0519059 44.1708242,43.0519358 43.9762853,42.8608513 L40.1545186,39.1069479 C39.9575152,38.9134427 39.9546793,38.5968729 40.1481845,38.3998695 C40.1502893,38.3977268 40.1524132,38.395603 40.1545562,38.3934985 L56.9937789,21.8567812 C57.1908028,21.6632968 57.193672,21.3467273 57.0001876,21.1497035 C56.9980647,21.1475418 56.9959223,21.1453995 56.9937605,21.1432767 L40.1545208,4.60825197 C39.9574869,4.41477773 39.9546013,4.09820839 40.1480756,3.90117456 C40.1501626,3.89904911 40.1522686,3.89694235 40.1543933,3.89485454 Z" fill="#FFFFFF"></path>
                        <path class="two" d="M20.1543933,3.89485454 L23.9763149,0.139296592 C24.1708311,-0.0518420739 24.4826329,-0.0518571125 24.6771675,0.139262789 L45.6916134,20.7848311 C46.0855801,21.1718824 46.0911863,21.8050225 45.704135,22.1989893 C45.7000188,22.2031791 45.6958657,22.2073326 45.6916762,22.2114492 L24.677098,42.8607841 C24.4825957,43.0519059 24.1708242,43.0519358 23.9762853,42.8608513 L20.1545186,39.1069479 C19.9575152,38.9134427 19.9546793,38.5968729 20.1481845,38.3998695 C20.1502893,38.3977268 20.1524132,38.395603 20.1545562,38.3934985 L36.9937789,21.8567812 C37.1908028,21.6632968 37.193672,21.3467273 37.0001876,21.1497035 C36.9980647,21.1475418 36.9959223,21.1453995 36.9937605,21.1432767 L20.1545208,4.60825197 C19.9574869,4.41477773 19.9546013,4.09820839 20.1480756,3.90117456 C20.1501626,3.89904911 20.1522686,3.89694235 20.1543933,3.89485454 Z" fill="#FFFFFF"></path>
                        <path class="three" d="M0.154393339,3.89485454 L3.97631488,0.139296592 C4.17083111,-0.0518420739 4.48263286,-0.0518571125 4.67716753,0.139262789 L25.6916134,20.7848311 C26.0855801,21.1718824 26.0911863,21.8050225 25.704135,22.1989893 C25.7000188,22.2031791 25.6958657,22.2073326 25.6916762,22.2114492 L4.67709797,42.8607841 C4.48259567,43.0519059 4.17082418,43.0519358 3.97628526,42.8608513 L0.154518591,39.1069479 C-0.0424848215,38.9134427 -0.0453206733,38.5968729 0.148184538,38.3998695 C0.150289256,38.3977268 0.152413239,38.395603 0.154556228,38.3934985 L16.9937789,21.8567812 C17.1908028,21.6632968 17.193672,21.3467273 17.0001876,21.1497035 C16.9980647,21.1475418 16.9959223,21.1453995 16.9937605,21.1432767 L0.15452076,4.60825197 C-0.0425130651,4.41477773 -0.0453986756,4.09820839 0.148075568,3.90117456 C0.150162624,3.89904911 0.152268631,3.89694235 0.154393339,3.89485454 Z" fill="#FFFFFF"></path>
                      </g>
                    </svg>
                  </span> 
                </a>
            </div>
        <br><br><br><br><br>
    </main>
    <footer>
        <div class="copyright">
            <p><i class="fas fa-copyright"></i> Computer Science Project A.H.E.M</p>
        </div>
    </footer>
</body>

<script src="fonctions.js"></script>
<script src="jquery.js"></script>
</html>