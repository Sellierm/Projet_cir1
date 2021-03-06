<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!--CSS Perso-->
    <link rel="stylesheet" href="../style.css" media="all">
    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Reggae+One&display=swap" rel="stylesheet">
    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
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
    <title>Competitive</title>
</head>
<body>
    <header>
        <div id="navbar">
          <a href="../index.html"> <i class="fas fa-home"></i> Home</a>
          <a href="../regles.html"><i class="fas fa-book-open"></i> Rules</a>
          <a href="../entrainement.php"><i class="fas fa-bullseye"></i> Training </a>
          <a href="../campagne.html"><i class="fas fa-map-marked-alt"></i> Campaign </a>
          <a href="index.php"><i class="fas fa-trophy"></i> Competitive </a>
          <button onclick="darkmode()"><i class="fas fa-moon"></i></button>
        </div>
        <div class="content"></div>
    </header>
    <main>
        <h1 class="container">Hello !</h1>
        <br>
        <div class="container">
            <p>Welcome to the competitive mode.</p>
            <p>Solve the grid as faster as you can.</p>
            <p>Good luck !</p>
        </div>
        
        <!--<a id="deco" href="deconnexion.php" class="btn btn-danger btn-lg">Disconnect</a>-->

        <div id="games">
            <div class="selection">
                <div class="titreGame">Numbers availables :</div>
                <div id="origine">
                    <div class="dragdrop" draggable="true" data-id="1">1</div>
                    <div class="dragdrop" draggable="true" data-id="2">2</div>
                    <div class="dragdrop" draggable="true" data-id="3">3</div>
                    <div class="dragdrop" draggable="true" data-id="4">4</div>
                    <div class="dragdrop" draggable="true" data-id="5">5</div>
                    <div class="dragdrop" draggable="true" data-id="6">6</div>
                    <div class="dragdrop" draggable="true" data-id="7">7</div>
                    <div class="dragdrop" draggable="true" data-id="8">8</div>
                    <div class="dragdrop" draggable="true" data-id="9">9</div>
                </div>
            </div>
            <div class="game">
                <div class="titreGame">Solve this Cr0ss Math3matics :</div>
                <div class="case" id="case1"></div>
                <div class="case" id="case2"></div>
                <div class="case" id="case3"></div>
                <div class="case" id="case4"></div>
                <div class="case" id="case5"></div>
                <div class="case" id="case6"></div>
                <div class="case" id="case7"></div>
                <div class="case" id="case8"></div>
                <div class="case" id="case9"></div>
                <div id="op1"></div>
                <div id="op2"></div>
                <div id="op3"></div>
                <div id="op4"></div>
                <div id="op5"></div>
                <div id="op6"></div>
                <div id="op7"></div>
                <div id="op8"></div>
                <div id="op9"></div>
                <div id="op10"></div>
                <div id="op11"></div>
                <div id="op12"></div>
                <div id="eg1">=</div>
                <div id="eg2">=</div>
                <div id="eg3">=</div>
                <div id="eg4">=</div>
                <div id="eg5">=</div>
                <div id="eg6">=</div>
                <div id="res1"></div>
                <div id="res2"></div>
                <div id="res3"></div>
                <div id="res4"></div>
                <div id="res5"></div>
                <div id="res6"></div>
                <div id="second-counter"></div>
            </div>
        </div>
        <br><br><br><br>
        <div class="boutonGame" onclick="console.log(getNumbers())">Verify</div>
        <br><br><br><br><br><br><br><br><br>
    </main>
    <footer>
        <div class="copyright">
            <p><i class="fas fa-copyright"></i> Computer Science Project A.H.E.M</p>
        </div>
    </footer>
</body>
<script>
    var element=null; // Variable globale de stockage de l'??l??ment drag
    var source=null;  // Variable globale de stockage de la zone d'??l??ments
    document.addEventListener("readystatechange", function(evt) {
    if (document.readyState=="interactive") {
        /* Parcourir tous les ??l??ments draggable */      
        var drags=document.querySelectorAll("div.dragdrop");
        for (var i=0; i<drags.length; i++) {
            var d=drags[i];
            d.addEventListener("drag", function(evt) {
                /* Mise ?? jour du style de l'??l??ment de d??part */  
                evt.currentTarget.style.border="2px dashed #aaa";
                evt.currentTarget.style.color="fff";
                evt.currentTarget.style.backgroundColor="#fff";        
            }); 
            d.addEventListener("dragstart", function(evt) {
                /* Mise ?? jour du style de l'??l??ment qui suit la souris */  
                evt.currentTarget.style.backgroundColor="#6f6";
                // Sauvegarde dans les variables globales
                element=evt.currentTarget; 
                source=evt.currentTarget.parentNode;
             }); 
            d.addEventListener("dragend", function(evt) {
                /* Retour ?? la normale en fin de drag and drop */  
                evt.currentTarget.style.border="2px solid #333";
                evt.currentTarget.style.color="#000";
                element=null;
                source=null;
            });      
        }
        /* Ev??nements dragover indispensables pour que l'event drop soit actif*/
        /*********************** Case 1 *************************/
        var case1=document.getElementById("case1");
        var origine=document.getElementById("origine");
        case1.addEventListener("dragover", function(evt) {
            event.preventDefault(); /* Pour autoriser le drop par JS */
        });
        origine.addEventListener("dragover", function(evt) {
            event.preventDefault();
        });
    
        /* Passage des activit??s de origine vers case */  
        case1.addEventListener("dragenter", function(evt) {
            if (source!==origine) {return false;}
            this.className="onDropZone"; /* case passe en surbrillance */
        }); 
        case1.addEventListener("dragleave", function(evt) {
            if (source!==origine) {return false;}
            console.log(evt.path);
            if (evt.target.className=="dragdrop") { return false;}
            if (evt.relatedTarget.className=="dragdrop") { return false;}
            this.className=""; /* La surbrillance s'efface */
        }); 
        case1.addEventListener("drop", function(evt) {
            if (source!==origine) {return false;}
            this.className="";
            this.appendChild(element); /* D??placement de l'??l??ment vers container */
            element=null;
            source=null;
        });
     
        /* Retour des activit??s de case vers origine */  
        origine.addEventListener("dragenter", function(evt) {
            if (source!==case1) {return false;}
            origine.className="onDropZone"; /* Origine passe en surbrillance */
        }); 
        origine.addEventListener("dragleave", function(evt) {
            if (source!==case1) {return false;}
            if (evt.target.className=="dragdrop") { return false;}
            if (evt.relatedTarget.className=="dragdrop") { return false;}
            origine.className="";
        }); 
        origine.addEventListener("drop", function(evt) {
            if (source!==case1) {return false;}
            this.className="";
            this.appendChild(element); /* D??placement de l'??l??ment vers origine */
            element=null;
            source=null; 
        });
        /*********************** Case 2 *************************/
        var case2=document.getElementById("case2");
        var origine=document.getElementById("origine");
        case2.addEventListener("dragover", function(evt) {
            event.preventDefault(); /* Pour autoriser le drop par JS */
        });
        origine.addEventListener("dragover", function(evt) {
            event.preventDefault();
        });
    
        /* Passage des activit??s de origine vers case */  
        case2.addEventListener("dragenter", function(evt) {
            if (source!==origine) {return false;}
            this.className="onDropZone"; /* case passe en surbrillance */
        }); 
        case2.addEventListener("dragleave", function(evt) {
            if (source!==origine) {return false;}
            console.log(evt.path);
            if (evt.target.className=="dragdrop") { return false;}
            if (evt.relatedTarget.className=="dragdrop") { return false;}
            this.className=""; /* La surbrillance s'efface */
        }); 
        case2.addEventListener("drop", function(evt) {
            if (source!==origine) {return false;}
            this.className="";
            this.appendChild(element); /* D??placement de l'??l??ment vers container */
            element=null;
            source=null;
        });
     
        /* Retour des activit??s de case vers origine */  
        origine.addEventListener("dragenter", function(evt) {
            if (source!==case2) {return false;}
            origine.className="onDropZone"; /* Origine passe en surbrillance */
        }); 
        origine.addEventListener("dragleave", function(evt) {
            if (source!==case2) {return false;}
            if (evt.target.className=="dragdrop") { return false;}
            if (evt.relatedTarget.className=="dragdrop") { return false;}
            origine.className="";
        }); 
        origine.addEventListener("drop", function(evt) {
            if (source!==case2) {return false;}
            this.className="";
            this.appendChild(element); /* D??placement de l'??l??ment vers origine */
            element=null;
            source=null; 
        });
        /*********************** Case 4 *************************/
        var case3=document.getElementById("case3");
        var origine=document.getElementById("origine");
        case3.addEventListener("dragover", function(evt) {
            event.preventDefault(); /* Pour autoriser le drop par JS */
        });
        origine.addEventListener("dragover", function(evt) {
            event.preventDefault();
        });
    
        /* Passage des activit??s de origine vers case */  
        case3.addEventListener("dragenter", function(evt) {
            if (source!==origine) {return false;}
            this.className="onDropZone"; /* case passe en surbrillance */
        }); 
        case3.addEventListener("dragleave", function(evt) {
            if (source!==origine) {return false;}
            console.log(evt.path);
            if (evt.target.className=="dragdrop") { return false;}
            if (evt.relatedTarget.className=="dragdrop") { return false;}
            this.className=""; /* La surbrillance s'efface */
        }); 
        case3.addEventListener("drop", function(evt) {
            if (source!==origine) {return false;}
            this.className="";
            this.appendChild(element); /* D??placement de l'??l??ment vers container */
            element=null;
            source=null;
        });
     
        /* Retour des activit??s de case vers origine */  
        origine.addEventListener("dragenter", function(evt) {
            if (source!==case3) {return false;}
            origine.className="onDropZone"; /* Origine passe en surbrillance */
        }); 
        origine.addEventListener("dragleave", function(evt) {
            if (source!==case3) {return false;}
            if (evt.target.className=="dragdrop") { return false;}
            if (evt.relatedTarget.className=="dragdrop") { return false;}
            origine.className="";
        }); 
        origine.addEventListener("drop", function(evt) {
            if (source!==case3) {return false;}
            this.className="";
            this.appendChild(element); /* D??placement de l'??l??ment vers origine */
            element=null;
            source=null; 
        });
        /*********************** Case 4 *************************/
        var case4=document.getElementById("case4");
        var origine=document.getElementById("origine");
        case4.addEventListener("dragover", function(evt) {
            event.preventDefault(); /* Pour autoriser le drop par JS */
        });
        origine.addEventListener("dragover", function(evt) {
            event.preventDefault();
        });
    
        /* Passage des activit??s de origine vers case */  
        case4.addEventListener("dragenter", function(evt) {
            if (source!==origine) {return false;}
            this.className="onDropZone"; /* case passe en surbrillance */
        }); 
        case4.addEventListener("dragleave", function(evt) {
            if (source!==origine) {return false;}
            console.log(evt.path);
            if (evt.target.className=="dragdrop") { return false;}
            if (evt.relatedTarget.className=="dragdrop") { return false;}
            this.className=""; /* La surbrillance s'efface */
        }); 
        case4.addEventListener("drop", function(evt) {
            if (source!==origine) {return false;}
            this.className="";
            this.appendChild(element); /* D??placement de l'??l??ment vers container */
            element=null;
            source=null;
        });
     
        /* Retour des activit??s de case vers origine */  
        origine.addEventListener("dragenter", function(evt) {
            if (source!==case4) {return false;}
            origine.className="onDropZone"; /* Origine passe en surbrillance */
        }); 
        origine.addEventListener("dragleave", function(evt) {
            if (source!==case4) {return false;}
            if (evt.target.className=="dragdrop") { return false;}
            if (evt.relatedTarget.className=="dragdrop") { return false;}
            origine.className="";
        }); 
        origine.addEventListener("drop", function(evt) {
            if (source!==case4) {return false;}
            this.className="";
            this.appendChild(element); /* D??placement de l'??l??ment vers origine */
            element=null;
            source=null; 
        });
        /*********************** Case 5 *************************/
        var case5=document.getElementById("case5");
        var origine=document.getElementById("origine");
        case5.addEventListener("dragover", function(evt) {
            event.preventDefault(); /* Pour autoriser le drop par JS */
        });
        origine.addEventListener("dragover", function(evt) {
            event.preventDefault();
        });
    
        /* Passage des activit??s de origine vers case */  
        case5.addEventListener("dragenter", function(evt) {
            if (source!==origine) {return false;}
            this.className="onDropZone"; /* case passe en surbrillance */
        }); 
        case5.addEventListener("dragleave", function(evt) {
            if (source!==origine) {return false;}
            console.log(evt.path);
            if (evt.target.className=="dragdrop") { return false;}
            if (evt.relatedTarget.className=="dragdrop") { return false;}
            this.className=""; /* La surbrillance s'efface */
        }); 
        case5.addEventListener("drop", function(evt) {
            if (source!==origine) {return false;}
            this.className="";
            this.appendChild(element); /* D??placement de l'??l??ment vers container */
            element=null;
            source=null;
        });
     
        /* Retour des activit??s de case vers origine */  
        origine.addEventListener("dragenter", function(evt) {
            if (source!==case5) {return false;}
            origine.className="onDropZone"; /* Origine passe en surbrillance */
        }); 
        origine.addEventListener("dragleave", function(evt) {
            if (source!==case5) {return false;}
            if (evt.target.className=="dragdrop") { return false;}
            if (evt.relatedTarget.className=="dragdrop") { return false;}
            origine.className="";
        }); 
        origine.addEventListener("drop", function(evt) {
            if (source!==case5) {return false;}
            this.className="";
            this.appendChild(element); /* D??placement de l'??l??ment vers origine */
            element=null;
            source=null; 
        });
        /*********************** Case 6 *************************/
        var case6=document.getElementById("case6");
        var origine=document.getElementById("origine");
        case6.addEventListener("dragover", function(evt) {
            event.preventDefault(); /* Pour autoriser le drop par JS */
        });
        origine.addEventListener("dragover", function(evt) {
            event.preventDefault();
        });
    
        /* Passage des activit??s de origine vers case */  
        case6.addEventListener("dragenter", function(evt) {
            if (source!==origine) {return false;}
            this.className="onDropZone"; /* case passe en surbrillance */
        }); 
        case6.addEventListener("dragleave", function(evt) {
            if (source!==origine) {return false;}
            console.log(evt.path);
            if (evt.target.className=="dragdrop") { return false;}
            if (evt.relatedTarget.className=="dragdrop") { return false;}
            this.className=""; /* La surbrillance s'efface */
        }); 
        case6.addEventListener("drop", function(evt) {
            if (source!==origine) {return false;}
            this.className="";
            this.appendChild(element); /* D??placement de l'??l??ment vers container */
            element=null;
            source=null;
        });
     
        /* Retour des activit??s de case vers origine */  
        origine.addEventListener("dragenter", function(evt) {
            if (source!==case6) {return false;}
            origine.className="onDropZone"; /* Origine passe en surbrillance */
        }); 
        origine.addEventListener("dragleave", function(evt) {
            if (source!==case6) {return false;}
            if (evt.target.className=="dragdrop") { return false;}
            if (evt.relatedTarget.className=="dragdrop") { return false;}
            origine.className="";
        }); 
        origine.addEventListener("drop", function(evt) {
            if (source!==case6) {return false;}
            this.className="";
            this.appendChild(element); /* D??placement de l'??l??ment vers origine */
            element=null;
            source=null; 
        });
        /*********************** Case 7 *************************/
        var case7=document.getElementById("case7");
        var origine=document.getElementById("origine");
        case7.addEventListener("dragover", function(evt) {
            event.preventDefault(); /* Pour autoriser le drop par JS */
        });
        origine.addEventListener("dragover", function(evt) {
            event.preventDefault();
        });
    
        /* Passage des activit??s de origine vers case */  
        case7.addEventListener("dragenter", function(evt) {
            if (source!==origine) {return false;}
            this.className="onDropZone"; /* case passe en surbrillance */
        }); 
        case7.addEventListener("dragleave", function(evt) {
            if (source!==origine) {return false;}
            console.log(evt.path);
            if (evt.target.className=="dragdrop") { return false;}
            if (evt.relatedTarget.className=="dragdrop") { return false;}
            this.className=""; /* La surbrillance s'efface */
        }); 
        case7.addEventListener("drop", function(evt) {
            if (source!==origine) {return false;}
            this.className="";
            this.appendChild(element); /* D??placement de l'??l??ment vers container */
            element=null;
            source=null;
        });
     
        /* Retour des activit??s de case vers origine */  
        origine.addEventListener("dragenter", function(evt) {
            if (source!==case7) {return false;}
            origine.className="onDropZone"; /* Origine passe en surbrillance */
        }); 
        origine.addEventListener("dragleave", function(evt) {
            if (source!==case7) {return false;}
            if (evt.target.className=="dragdrop") { return false;}
            if (evt.relatedTarget.className=="dragdrop") { return false;}
            origine.className="";
        }); 
        origine.addEventListener("drop", function(evt) {
            if (source!==case7) {return false;}
            this.className="";
            this.appendChild(element); /* D??placement de l'??l??ment vers origine */
            element=null;
            source=null; 
        });
        /*********************** Case 8 *************************/
        var case8=document.getElementById("case8");
        var origine=document.getElementById("origine");
        case8.addEventListener("dragover", function(evt) {
            event.preventDefault(); /* Pour autoriser le drop par JS */
        });
        origine.addEventListener("dragover", function(evt) {
            event.preventDefault();
        });
    
        /* Passage des activit??s de origine vers case */  
        case8.addEventListener("dragenter", function(evt) {
            if (source!==origine) {return false;}
            this.className="onDropZone"; /* case passe en surbrillance */
        }); 
        case8.addEventListener("dragleave", function(evt) {
            if (source!==origine) {return false;}
            console.log(evt.path);
            if (evt.target.className=="dragdrop") { return false;}
            if (evt.relatedTarget.className=="dragdrop") { return false;}
            this.className=""; /* La surbrillance s'efface */
        }); 
        case8.addEventListener("drop", function(evt) {
            if (source!==origine) {return false;}
            this.className="";
            this.appendChild(element); /* D??placement de l'??l??ment vers container */
            element=null;
            source=null;
        });
     
        /* Retour des activit??s de case vers origine */  
        origine.addEventListener("dragenter", function(evt) {
            if (source!==case8) {return false;}
            origine.className="onDropZone"; /* Origine passe en surbrillance */
        }); 
        origine.addEventListener("dragleave", function(evt) {
            if (source!==case8) {return false;}
            if (evt.target.className=="dragdrop") { return false;}
            if (evt.relatedTarget.className=="dragdrop") { return false;}
            origine.className="";
        }); 
        origine.addEventListener("drop", function(evt) {
            if (source!==case8) {return false;}
            this.className="";
            this.appendChild(element); /* D??placement de l'??l??ment vers origine */
            element=null;
            source=null; 
        });
        /*********************** Case 9 *************************/
        var case9=document.getElementById("case9");
        var origine=document.getElementById("origine");
        case9.addEventListener("dragover", function(evt) {
            event.preventDefault(); /* Pour autoriser le drop par JS */
        });
        origine.addEventListener("dragover", function(evt) {
            event.preventDefault();
        });
    
        /* Passage des activit??s de origine vers case */  
        case9.addEventListener("dragenter", function(evt) {
            if (source!==origine) {return false;}
            this.className="onDropZone"; /* case passe en surbrillance */
        }); 
        case9.addEventListener("dragleave", function(evt) {
            if (source!==origine) {return false;}
            console.log(evt.path);
            if (evt.target.className=="dragdrop") { return false;}
            if (evt.relatedTarget.className=="dragdrop") { return false;}
            this.className=""; /* La surbrillance s'efface */
        }); 
        case9.addEventListener("drop", function(evt) {
            if (source!==origine) {return false;}
            this.className="";
            this.appendChild(element); /* D??placement de l'??l??ment vers container */
            element=null;
            source=null;
        });
     
        /* Retour des activit??s de case vers origine */  
        origine.addEventListener("dragenter", function(evt) {
            if (source!==case9) {return false;}
            origine.className="onDropZone"; /* Origine passe en surbrillance */
        }); 
        origine.addEventListener("dragleave", function(evt) {
            if (source!==case9) {return false;}
            if (evt.target.className=="dragdrop") { return false;}
            if (evt.relatedTarget.className=="dragdrop") { return false;}
            origine.className="";
        }); 
        origine.addEventListener("drop", function(evt) {
            if (source!==case9) {return false;}
            this.className="";
            this.appendChild(element); /* D??placement de l'??l??ment vers origine */
            element=null;
            source=null; 
        });
    }  
});






/******************** Concepteur **********************/


function entierAleatoire(min, max)
{
 return Math.floor(Math.random() * (max - min + 1)) + min;
}



var entier = new Array(6);
for(i=0; i<6; i++){
	entier[i] = new Array(6)
}
var tmp = new Array(9)
for(k=0; k<9; k++){
	var hasard = entierAleatoire(1,9)
	while(tmp[k] === undefined){
		if(tmp.indexOf(hasard) !== -1){
			hasard = entierAleatoire(1,9)
		}
		else{
			tmp[k] = hasard
		}
	}
}


var tmp2 = new Array(12)
for(k=0; k<12; k++){
	var hasard = entierAleatoire(1, 10)
	while(tmp2[k] === undefined){
		if(tmp2.indexOf(hasard) !== -1){
			hasard = entierAleatoire(1,10)
		}
		else{
			if(hasard == 1){
                tmp2[k] = '+'
            }
            if(hasard == 2){
                tmp2[k] = '-'
            }
            if(hasard == 3){
                tmp2[k] = '*'
            }
            else{
                tmp2[k] = '/'
            }
		}
	}
}
var l = 0
var u = 0
for(i=0; i<5; i++){
	for(j=0; j<5; j++){
        if( i % 2 == 0 && j % 2 == 0 ){
            entier[i][j] = tmp[l]
            l = l+1
        }
        if( i % 2 == 0 && j % 2 != 0 ){
            entier[i][j] = tmp2[u]
            u = u+1
        }
        if( i % 2 != 0 && j % 2 == 0 ){
            entier[i][j] = tmp2[u]
            u = u+1
        }
        if( i % 2 != 0 && j % 2 != 0 ){
            entier[i][j] = ' '
        }
        
	}
}

//console.log(entier)

for(i=0; i<6; i = i+2){
    for(j=1; j<6; j = j+2){
        if (entier[i][j] == '/'){
            var tmp3 = entier[i][j - 1] % entier[i][j + 1];
            if(tmp3 != 0){
                var hasard = entierAleatoire(1,3)
                if(hasard == 1){
                    entier[i][j] = '+'
                }
                if(hasard == 2){
                    entier[i][j] = '-'
                }
                if(hasard == 3){
                   entier[i][j] = '*'
                }
            }
        }
        
    }
    
}
for(i=1; i<5; i = i+2){
    for(j=0; j<5; j = j+2){
        if (entier[i][j] == '/'){
            var tmp3 = entier[i - 1][j] % entier[i + 1][j];
            if(tmp3 != 0 ){
                var hasard = entierAleatoire(1,3)
                if(hasard == 1){
                    entier[i][j] = '+'
                }
                if(hasard == 2){
                    entier[i][j] = '-'
                }
                if(hasard == 3){
                   entier[i][j] = '*'
                }
            }
        }
        
    }
    
}

var operat = new Array(12)
var chiffre = new Array(12)
var k = 0

//op??ration sur les lignes
for (i = 0; i < 5; i += 2) {
	k = 0
	//on r??cup??re les op??rateurs
	for (j = 1; j < 5; j += 2) {
		operat[k] = entier[i][j]
		k++
	}
	k = 0
	//on r??cup??re les chiffres
	for (j = 0; j < 5; j += 2) {
		//on remet les valeurs en int
		chiffre[k] = entier[i][j]
		k++;
	}
	//on effectue les calculs
	var tmp4 = 0;
	//si on a modification d'ordre de calcul -> priorit??e operat[0] < priorit??e operat[1] ex: + et /
	if ((operat[0] == '+' || operat[0] == '-') && (operat[1] == '*' || operat[1] == '/')) {
		//?? compl??ter
		switch (operat[1]) {
		case '*':
			tmp4 = chiffre[1] * chiffre[2]
			break

        case '/':
			tmp4 = chiffre[1] / chiffre[2]
			break
		}

		switch (operat[0]) {
		case '+':
			entier[i][5] = chiffre[0] + tmp4
			break

		case '-':
			entier[i][5] = chiffre[0] - tmp4
			break
		}
	}

		//si on n'a pas de modification d'ordre de calcul -> priorit??e operat[0] >= priorit??e operat[1] ex: * et +
	else {
		switch (operat[0]) {
		case '+':
			tmp4 = chiffre[0] + chiffre[1]
			break
		case '-':
			tmp4 = chiffre[0] - chiffre[1]
			break
		case '*':
			tmp4 = chiffre[0] * chiffre[1]
			break
		case '/':
			tmp4 = chiffre[0] / chiffre[1]
			break
		}
		switch (operat[1]) {
		case '+':
			entier[i][5] = tmp4 + chiffre[2]
			break
		case '-':
			entier[i][5]= tmp4 - chiffre[2]
			break
		case '*':
			entier[i][5] = tmp4 * chiffre[2]
			break
		case '/':
			entier[i][5] = tmp4 / chiffre[2]
			break
		}
	}
}

//op??rations sur les colonnes

for (j = 0; j < 5; j += 2) {
	k = 0
	//on r??cup??re les op??rateurs
	for (i = 1; i < 5; i += 2) {
		operat[k] = entier[i][j]
		k++
	}
	k = 0
	//on r??cup??re les chiffres
	for (i = 0; i < 5; i += 2) {
		//on remet les valeurs en int
		chiffre[k] = entier[i][j]
		k++;
	}
	//on effectue les calculs
	var tmp5 = 0;
	//si on a modification d'ordre de calcul -> priorit??e operat[0] < priorit??e operat[1] ex: + et /
	if ((operat[0] == '+' || operat[0] == '-') && (operat[1] == '*' || operat[1] == '/')) {
		//?? compl??ter
		switch (operat[1]) {
		case '*':
			tmp5 = chiffre[1] * chiffre[2]
			break

        case '/':
			tmp5 = chiffre[1] / chiffre[2]
			break
		}

		switch (operat[0]) {
		case '+':
			entier[5][j] = chiffre[0] + tmp5
			break

		case '-':
			entier[5][j] = chiffre[0] - tmp5
			break
		}
	}

		//si on n'a pas de modification d'ordre de calcul -> priorit??e operat[0] >= priorit??e operat[1] ex: * et +
	else {
		switch (operat[0]) {
		case '+':
			tmp5 = chiffre[0] + chiffre[1]
			break
		case '-':
			tmp5 = chiffre[0] - chiffre[1]
			break
		case '*':
			tmp5 = chiffre[0] * chiffre[1]
			break
		case '/':
			tmp5 = chiffre[0] / chiffre[1]
			break
		}
		switch (operat[1]) {
		case '+':
			entier[5][j] = tmp5 + chiffre[2]
			break
		case '-':
			entier[5][j]= tmp5 - chiffre[2]
			break
		case '*':
			entier[5][j] = tmp5 * chiffre[2]
			break
		case '/':
			entier[5][j] = tmp5 / chiffre[2]
			break
		}
	}
}


console.log(tmp)
//console.log(tmp2)
//console.log(entier)
//console.log(entier[5][0])

document.getElementById('op1').innerHTML=entier[0][1];
document.getElementById('op2').innerHTML=entier[0][3];
document.getElementById('op3').innerHTML=entier[1][0];
document.getElementById('op4').innerHTML=entier[1][2];
document.getElementById('op5').innerHTML=entier[1][4];
document.getElementById('op6').innerHTML=entier[2][1];
document.getElementById('op7').innerHTML=entier[2][3];
document.getElementById('op8').innerHTML=entier[3][0];
document.getElementById('op9').innerHTML=entier[3][2];
document.getElementById('op10').innerHTML=entier[3][4];
document.getElementById('op11').innerHTML=entier[4][1];
document.getElementById('op12').innerHTML=entier[4][3];
document.getElementById('res1').innerHTML=entier[0][5];
document.getElementById('res2').innerHTML=entier[2][5];
document.getElementById('res3').innerHTML=entier[4][5];
document.getElementById('res4').innerHTML=entier[5][0];
document.getElementById('res5').innerHTML=entier[5][2];
document.getElementById('res6').innerHTML=entier[5][4];









var seconds = 0;
var el = document.getElementById('second-counter');

function incrementSeconds() {
    seconds += 1;
    el.innerText = "Time : " + seconds + " seconds";
}

var cancel = setInterval(incrementSeconds, 1000);
















function getNumbers() {
    var case1=document.getElementById("case1");
    var case2=document.getElementById("case2");
    var case3=document.getElementById("case3");
    var case4=document.getElementById("case4");
    var case5=document.getElementById("case5");
    var case6=document.getElementById("case6");
    var case7=document.getElementById("case7");
    var case8=document.getElementById("case8");
    var case9=document.getElementById("case9");
    var numbers=[];
    var elts=case1.getElementsByClassName("dragdrop");
    for(var i=0; i<elts.length; i++) {
        numbers.push(elts[i].dataset.id);
    }
    var elts=case2.getElementsByClassName("dragdrop");
    for(var i=0; i<elts.length; i++) {
        numbers.push(elts[i].dataset.id);
    }
    var elts=case3.getElementsByClassName("dragdrop");
    for(var i=0; i<elts.length; i++) {
        numbers.push(elts[i].dataset.id);
    }
    var elts=case4.getElementsByClassName("dragdrop");
    for(var i=0; i<elts.length; i++) {
        numbers.push(elts[i].dataset.id);
    }
    var elts=case5.getElementsByClassName("dragdrop");
    for(var i=0; i<elts.length; i++) {
        numbers.push(elts[i].dataset.id);
    }
    var elts=case6.getElementsByClassName("dragdrop");
    for(var i=0; i<elts.length; i++) {
        numbers.push(elts[i].dataset.id);
    }
    var elts=case7.getElementsByClassName("dragdrop");
    for(var i=0; i<elts.length; i++) {
        numbers.push(elts[i].dataset.id);
    }
    var elts=case8.getElementsByClassName("dragdrop");
    for(var i=0; i<elts.length; i++) {
        numbers.push(elts[i].dataset.id);
    }
    var elts=case9.getElementsByClassName("dragdrop");
    for(var i=0; i<elts.length; i++) {
        numbers.push(elts[i].dataset.id);
    }
    /* V??rification */
    var myCount = 0;
    for(var j=0; j<9; j++) {
        if(tmp[j] == numbers[j]) {
            myCount = myCount + 1;
        }
    }
    if(myCount == 9) {
        if(confirm("Congratulation ! You complete the grid in "+seconds+" seconds !\nPress Ok to restart the game and try to beat your record !")){
            /*function showData(val){
                $.ajax({
                    type : "POST",
                    url : "classement.php",
                    data: {
                        action: "showData",
                        number: val
                    },
                    dataType : "dataType",
                    success: function(){
                        console.log(reponse)
                    }
                });
            }
            showData(seconds);
            document.location.href="classement.php";
            return numbers;*/
            document.location.reload();
            return numbers;
            
        }
        
        return numbers;
        
    }
    else {
        var error = 9 - myCount;
        alert("Nice try ! There is "+error+" error");
    return numbers;
    }
}
</script>

<script src="../fonctions.js"></script>
<script src="../jquery.js"></script>
</html>
