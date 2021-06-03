/* Fonctions pour navbar */

// When the user scrolls the page, execute myFunction
window.onscroll = function() {myFunction()};

// Get the navbar
var navbar = document.getElementById("navbar");

// Get the offset position of the navbar
var sticky = navbar.offsetTop;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}

/* Fonction Darkmode */

function darkmode(){
    var paragraphe = document.getElementById("mainAccueils");
    console.log(paragraphe);
    if ($("main").hasClass("dark")){
        $("main").removeClass("dark");
      }
    else{
        $("main").addClass("dark");
    }
    
    var paragraphe2 = querySelectorAll("case");
    console.log(paragraphe2);
    if($("case").hasClass("dark")){
        
    }

}

/* Fonctions pour la Map */

var map= document.querySelector('#map')
var paths = map.querySelectorAll('.map__image a')
var links = map.querySelectorAll('.map__list a')

// Prolyfill du foreach

if(NodeList.prototype.forEach === undefined){
    NodeList.prototype.forEach = function (callback){
        [].forEach.call(this, callback)
    }
}

var activeArea = function (id) {
    map.querySelectorAll('.is-active').forEach(function (item){
        item.classList.remove('is-active')
    })
    if (id !== undefined){
        document.querySelector('#list-' + id).classList.add('is-active')
        document.querySelector('#FR-' + id).classList.add('is-active')
    }
    
}

paths.forEach(function (path){
    path.addEventListener('mouseenter', function (){
        var id = this.id.replace('FR-','')
        activeArea(id)
    })
})


links.forEach(function (link) {
    link.addEventListener('mouseenter', function() {
        var id = this.id.replace('list-','')
        activeArea(id)
    })
})

map.addEventListener('mouseover', function(){
    activeArea()
})
